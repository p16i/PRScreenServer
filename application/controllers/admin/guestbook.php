<?php

    Class guestbook extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form','url','date'));
            date_default_timezone_set('Asia/Bangkok');
            $this->load->model("Guestbook_Model");
        }
        
        function index(){
             if(!isset($_POST['option'])){
                $result = $this->Guestbook_Model->get_guestbook();
                $data['result'] = $result;
                $this->load->view("guestbook/index",$data);
            }elseif($_POST['option']=='Add'){
                
            }elseif($_POST['option']=='Delete'){ //$_POST => id
                $this->delete_guestbook($_POST['id']);
            }
        }
        
        function add_guestbook(){//$_POST => content, soundPath, imagePath, datetime
            ////////////////////////////////////////
            $this->load->model("Guestbook_Model");
            $this->Guestbook_Model->insert($_POST);
        }
        
        function delete_guestbook($id){
            $row = $this->Guestbook_Model->get_guestbook_by_id($id);
            if(isset($row->ImagePath)){
                if($row->ImagePath!=Null){
                    unlink('./image_guestbook/'.$row->ImagePath);
                }
                
            }
            $this->Guestbook_Model->delete($id);
            $_POST['option'] = null;
            $this->index();
        }
        
    }
?>
