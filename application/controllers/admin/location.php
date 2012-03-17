<?php

    Class location extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form','url','date'));
            date_default_timezone_set('Asia/Bangkok');
            $this->load->model("Location_Model");
            $this->load->model('Location_Catagory_Model');
        }
        
        function index(){
            if(!isset($_POST['option'])){
                $result = $this->Location_Model->get_location();
                //$result = $this->Location_Catagory_Model->get_location_catogory();
                $data['result'] = $result;
                $this->load->view("location/index",$data);
            }elseif($_POST['option']=='Add Location'){
                $result = $this->Location_Catagory_Model->get_location_catagory();
                $data['result'] = $result;
                
                $this->load->view('location/add_location',$data);
            }elseif($_POST['option']=='Edit Selected'){//$_POST => id
                $location_result = $this->Location_Model->get_location_by_id($_POST['id']);
                $catagory_result = $this->Location_Catagory_Model->get_news_catagory();
                $data['location_result'] = $location_result;
                $data['catagory_result'] = $catagory_result;
                $this->load->view('location/edit_location',$data); //send all old data to represent to the admin
               // $this->edit_location();
            }elseif($_POST['option']=='Delete'){ //$_POST => id
                $this->delete_location($_POST['id']);
            }
        }
        
        function add_location(){//$_POST => roomname, catagoryID :: upload file => image
            
            if($_POST['roomname']!=''){
                $config['upload_path'] = './image_location/';
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
                    $this->Location_Model->insert($_POST);
                    $_POST['option']=null;
                    $this->index();
                }else echo "image isn't upload";
            }
            else{
                echo 'roomname is empty';
            }
        }
        
        function edit_location(){ //$_POST => id, roomname, catagoryID, imagepath(oldPath)
//            $_POST['id'] = 7;
//            $_POST['roomname'] = 'TestEdit';
//            $_POST['catagoryID'] = 1;
//            $_POST['imagepath'] = '73p25.jpg';
            if($_POST['roomname']!=''){
                $config['upload_path'] = './image_location/';
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
                $this->Location_Model->edit($_POST);
            }
            
            $_POST['option'] = null;
            $this->index();
        }
        
        function delete_location($id){ 
            $this->Location_Model->delete($id);
            $_POST['option'] = null;
            $this->index();
        }
        
    }
?>
