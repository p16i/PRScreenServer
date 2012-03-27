<?php

    Class album extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form','url','file'));
            //date_default_timezone_set('Asia/Bangkok');
            $this->load->model("Album_Model");
            $this->load->model('Album_Catagory_Model');
            
        }
        
        function list_album(){
            $this->datatables->select('a.ID, a.Name, a.Quantity, a.Cover, a.catagoryID, c.catagory_name');
            $this->datatables->from('album as a');
            $this->datatables->join('album_catagory_relation as r','a.AlbumID=r.CatagoryID');
            $this->datatables->join('album_catagory as c','r.CatagoryID=c.catagory_name');
            $this->datatables->edit_column('a.Cover', '<img src="' .
                    base_url() .'image_album/$1/$2" width="64" height="84"/>', 'a.Name,a.Cover');
            $json = $this->datatables->generate('UTF8');
            //print_r($json);
            echo $json;
        }
        
//        function index(){
//            
//            if(!isset($_POST['option'])){
//                $result = $this->Album_Model->get_album();
//                $data['result'] = $result;
//                $this->load->view("album/index",$data);
//            }elseif($_POST['option']=='Add Album'){
//                $catagory_result = $this->Album_Catagory_Model->get_Album_catagory();
//                $data['catagory_result'] = $catagory_result;
//                $this->load->view('album/add_album',$data);
//            }elseif($_POST['option']=='Edit Selected'){//$_POST => id
//                $this->edit_album();
////                $album_row = $this->Album_Model->get_album_by_id($_POST['id']);
////                $catagory_result = $this->Album_Catagory_Model->get_album_catagory();
////                $data['album_row'] = $album_row;
////                
////                $data['catagory_result'] = $catagory_result;
////                $this->load->view('album/edit_album',$data); //send all old data to represent to the admin
//            }elseif($_POST['option']=='Delete'){
//                echo 'restttt';
//                $this->delete_album($_POST['id']);
//            }
//        }
//        
        function add_album(){ //$_POST => name, catagoryID, cover<integer => index of picture that is selected to be cover pic>
            if($_POST['name']!=''){
                if($_FILES['images']['name'][0]!=''){ //if at least one image are uploaded
                    $path = 'resources/album/'.$_POST['name'];
                    if(file_exists($path)) echo 'Album name already existed';
                    else {
                        $this->add_file();
                        
                        $count = count(get_filenames($path));
                        $_POST['quantity'] = $count;
                        
                        $_POST['cover'] = 0;
                        $_POST['cover'] = $_FILES['images']['name'][$_POST['cover']]; //$_POST['cover'] that come from submit form
                                                                                      //is index of image that is uploaded and selected
                                                                                      //as cover thumbnail
                        
                        //$image_data = $this->upload->data();
                        
                        
                        $this->Album_Model->insert($_POST);
                        
                    }
                }else echo 'no image uploaded';
                

            }else{
                echo 'Album Name is empty';
            }
            //redirect(base_url().'index.php/admin/album/');
            //$this->index();
        }
        
        function add_file(){// อันนี้ไม่เกี่ยว ใช้ในคลาสนี้เอง
            $path = 'resources/album/'.$_POST['name'];
            mkdir($path);
            $config['upload_path'] = $path.'/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
    //                
            //print_r($_FILES['image']);
    //                echo '<br><br>';
    //                print_r($_FILES['image2']);
            $this->load->library('upload', $config);
            for($i=0;$i<count($_FILES['images']['name']);$i++){ //multiple file upload
                foreach($_FILES['images'] as $key=>$value){
                    $temp[$key] = $value[$i];
                }
                $_FILES['image']=$temp;  //create parameter 'image' for each image that have been upload
                $this->upload->do_upload('image');
            }
        }
    
        
        function delete_album($id){//$_POST => id
            echo 'AAA : '.$id;
            if($id!='' && $id!=null){
                $row = $this->Album_Model->get_album_by_id($id);
                $path = 'resources/album/'.$row->Name;

                delete_files($path,TRUE);
                rmdir($path);

                $this->Album_Model->delete($id);

            }
            
            //redirect(base_url().'index.php/admin/album/');.
        }
        
        function edit_album_name(){//$_POST => id ,name
            //echo $_POST['id'];
            
            //rename('./image_album/AlbumTest', './image_album/AlbumTest');
            $row = $this->Album_Model->get_album_by_id($_POST['id']);
            rename('resources/album/'.$row->Name, 'resources/album/'.$_POST['name']);
            
            
            $this->Album_Model->edit($_POST);

            
            //redirect(base_url().'index.php/admin/album/');
        }

    }
?>
