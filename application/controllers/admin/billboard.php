<?php

    Class billboard extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form','url','date','file'));
            date_default_timezone_set('Asia/Bangkok');
            $this->load->model("Billboard_Model");
            $this->load->model('News_Model');
        }
        
        function index(){
            
            if(!isset($_POST['option'])){
                $result = $this->Billboard_Model->get_billboard();
                $data['result'] = $result;
                $this->load->view("billboard/index",$data);
            }elseif($_POST['option']=='Add Billboard'){
                $result = $this->News_Model->get_news();
                $data['result'] = $result;                
                $this->load->view('billboard/add_billboard',$data);
            }elseif($_POST['option']=='Edit Selected'){
                $row = $this->Billboard_Model->get_billboard_by_id($_POST['id']);
                $this->load->view('billboard/edit_billboard',$data);
                //$this->edit_billboard();
            }elseif($_POST['option']=='Delete'){
                $this->delete_billboard($_POST['id']);
            }
        }
        
        function add_billboard(){//$_POST => content, datetime, newsID ::: uploadfile => image
            //$this->load->helper('url');
            if($_POST['content']!=''){
                $config['upload_path'] = './image_billboard/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                //print_r($this->upload->data());
                $image_data = $this->upload->data();
                if($image_data['file_name']!=null){
                    //echo '<br><br>'.$_POST['content'].'<br><br>';
                    $_POST['imagepath']= $image_data['file_name'];
                    $_POST['isEnable'] = true;
                    $_POST['datetime'] = mdate('%Y-%m-%d %H:%i:%s',time());
    //            $target_path = base_url().'image_billboard/'.basename($_FILES['image']['name']);
    //            
    //            $_FILES['imagepath'] = $target_path;
    //            echo $_FILES['image']['tmp_name'];
    //            
    //            if(move_uploaded_file($_FILES['image']['tmp_name'], 'C:\\abc.gif')) {
    //                echo "The file ".  basename( $_FILES['image']['name']). 
    //                        " has been uploaded";
    //            } else{
    //                echo "There was an error uploading the file, please try again!";
    //            }
                    if(!isset($_POST['newsID'])) $_POST['newsID'] = null;
                    $this->Billboard_Model->insert($_POST);
                    $_POST['option']=null;
                    $this->index();   
                }else echo "image isn't upload";
            }else{
                echo 'Content is empty';
            }
            
        }
        
        function set_enable(){//$_POST => id[]
            //$_POST['id'] = array(1,2,3,4,9);
            $this->Billboard_Model->set_enable($_POST["id"]);
        }
        
        function delete_billboard($id){
            $row = $this->Billboard_Model->get_billboard_by_id($id);
            unlink('./image_billboard/'.$row->ImagePath); //also delete image file from server
            $this->Billboard_Model->delete($id);
            $_POST['option'] = null;
            $this->index();
        }

        function edit_billboard(){  //$_POST => id, content, newsID, imagepath(oldPath)
            if($_POST['content']!=''){
                $config['upload_path'] = './image_billboard/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';

                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                //print_r($this->upload->data());
                $image_data = $this->upload->data();
                if($image_data['file_name']!=null){
                    $_POST['imagepath'] = $image_data['file_name'];
                }
                $this->Billboard_Model->edit($_POST);
            }
            
            $_POST['option'] = null;
            $this->index();
        }
    }
?>