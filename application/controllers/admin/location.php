<?php

Class location extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("Location_Model");
        $this->load->model('Location_Catagory_Model');
    }

    function add_location() {//$_POST => roomname, catagoryID, floor :: upload file => image
        if ($_POST['roomname'] != '') {
            $config['upload_path'] = 'resources/location/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

           // print_r($this->upload->data());
            $image_data = $this->upload->data();
            if ($image_data['file_name'] != null) {
                //echo '<br><br>'.$_POST['content'].'<br><br>';
                $_POST['imagepath'] = $image_data['file_name'];
                $this->Location_Model->insert($_POST);
                $_POST['option'] = null;
                //$this->index();
                redirect(base_url().'welcome#location_page', 'refresh');
            } else {
                echo "image isn't upload";
               // print_r($this->upload->display_errors());
            }
        } else {
            echo 'roomname is empty';
        }
    }

    function edit_location() { //$_POST => id, roomname, catagoryID, imagepath(oldPath)
//            $_POST['id'] = 7;
//            $_POST['roomname'] = 'TestEdit';
//            $_POST['catagoryID'] = 1;
//            $_POST['imagepath'] = '73p25.jpg';
        if ($_POST['roomname'] != '') {
            $config['upload_path'] = './image_location/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            //print_r($this->upload->data());
            $image_data = $this->upload->data();
            if ($image_data['file_name'] != null) {
                $_POST['imagepath'] = $image_data['file_name'];
            }
            $this->Location_Model->edit($_POST);
        }

        $_POST['option'] = null;
        $this->index();
    }

    function delete_location($id) {
        $this->Location_Model->delete($id);
        $_POST['option'] = null;
        $this->index();
    }

    function list_location() {
        $this->datatables->select('imagepath,roomname,hitcounter, name,id');
        $this->datatables->from('location');
        $this->db->join('location_catagory', 'location_catagory.catagoryid = location.catagoryid');
        $this->datatables->edit_column('imagepath', '<img src="resources/location/$1" class="thumbnail"/>', 'imagepath');
        $this->datatables->edit_column('id', 'Edit | Delete', 'id');
        $json = $this->datatables->generate('UTF8');
        //  print_r($json);
        echo $json;
    }

}

?>
