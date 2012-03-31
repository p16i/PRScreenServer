<?php

Class billboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date', 'file'));
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("Billboard_Model");
        $this->load->model('News_Model');
    }

//    function index() {
//
//        if (!isset($_POST['option'])) {
//            $result = $this->Billboard_Model->get_billboard();
//            $data['result'] = $result;
//            $this->load->view("billboard/index", $data);
//        } elseif ($_POST['option'] == 'Add Billboard') {
//            $result = $this->News_Model->get_news();
//            $data['result'] = $result;
//            $this->load->view('billboard/add_billboard', $data);
//        } elseif ($_POST['option'] == 'Edit Selected') {
//            $row = $this->Billboard_Model->get_billboard_by_id($_POST['id']);
//            $this->load->view('billboard/edit_billboard', $data);
//            //$this->edit_billboard();
//        } elseif ($_POST['option'] == 'Delete') {
//            $this->delete_billboard($_POST['id']);
//        }
//    }

    function add_billboard() {//$_POST => content, datetime, newsID ::: uploadfile => image
        //$this->load->helper('url');
        if ($_POST['content'] != '') {
            $config['upload_path'] = 'resources/billboard/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            //print_r($this->upload->data());
            $image_data = $this->upload->data();
            if ($image_data['file_name'] != null) {
                //echo '<br><br>'.$_POST['content'].'<br><br>';
                $_POST['imagepath'] = $image_data['file_name'];
                $_POST['isEnable'] = TRUE;
                $_POST['datetime'] = mdate('%Y-%m-%d %H:%i:%s', time());            
                if (!isset($_POST['newsID']))
                    $_POST['newsID'] = null;
                $this->Billboard_Model->insert($_POST);
                $_POST['option'] = null;
                redirect(base_url()."welcome#billboard_page",'refresh');
            }else
                echo "image isn't upload";
            print_r($this->upload->display_errors());
        }else {
            echo 'Content is empty';
        }
    }

    function set_enable() {//$_POST => id[]
        //$_POST['id'] = array(1,2,3,4,9);
        $this->Billboard_Model->set_enable($_GET["id"]);
        redirect(base_url()."welcome#billboard_page",'refresh');
    }

    function delete_billboard() {
        $id = $_POST['id'];
        $row = $this->Billboard_Model->get_billboard_by_id($id);
        unlink('./resources/billboard/' . $row->ImagePath); //also delete image file from server
        $this->Billboard_Model->delete($id);
        //redirect(base_url()."welcome#billboard_page",'refresh');
    }

    function edit_billboard() {  //$_POST => id, content, newsID, imagepath(oldPath)
        if ($_POST['content'] != '') {
            $config['upload_path'] = 'resources/billboard/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            //print_r($this->upload->data());
            $image_data = $this->upload->data();
            if ($image_data['file_name'] == null) { //if user dont change image
                $_POST['imagepath'] = $_POST['oldpath'];
            }else{
                print_r($image_data);
                $_POST['imagepath'] = $image_data['file_name'];
            }
            $this->Billboard_Model->edit($_POST);
        }
        redirect(base_url()."welcome#billboard_page",'refresh');
        //$_POST['option'] = null;
        //$this->index();
    }
    
    function get_billboard(){
        $bill_row = $this->Billboard_Model->get_billboard_by_id($_GET['id']); 
        echo json_encode($bill_row);
    }

    function list_billboard() {
        $this->datatables->select('imagepath,_datetime,content,newsid,isEnable,id');
        $this->datatables->from('billboard');
        $this->datatables->edit_column('imagepath', '<img src="resources/billboard/$1" class="thumbnail"/>', 'imagepath');
        //$this->datatables->edit_column('id', 'Edit | Delete', 'id');
        $this->datatables->edit_column('isEnable', '<a href="'.  base_url().'admin/billboard/set_enable?id=$2">$1</a>','isEnable,id');
        //$this->datatables->edit_column('isEnable', ('$1'=='TRUE'?'True':'False') ,'isEnable');
//        $this->datatables->edit_column('id', '<a href="#billboard_page" onclick="return edit_billboard_link($1)">Edit</a> | 
//                                             <a href="'.  base_url().'admin/billboard/set_enable?id=$1">Delete</a>', 'id');
        $this->datatables->edit_column('id', '<a href="#billboard_page" onclick="return edit_billboard_link($1)">Edit</a> | <a href="#" onclick="return delete_billboard_link($1)">Delete</a>', 'id');
        
        
        $json = $this->datatables->generate('UTF8');
        //print_r($json);
        //str_replace("\r", "",$json);
        echo str_replace(array("\n","\r"), array("<br/>",""), $json);
    }

}

?>
