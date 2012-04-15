<?php

Class guestbook extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("Guestbook_Model");
    }

    function index() {
        $this->load->view('guestbook/index.php');
//        if (!isset($_POST['option'])) {
//            $result = $this->Guestbook_Model->get_guestbook();
//            $data['result'] = $result;
//            $this->load->view("guestbook/index", $data);
//        } elseif ($_POST['option'] == 'Add') {
//            
//        } elseif ($_POST['option'] == 'Delete') { //$_POST => id
//            $this->delete_guestbook($_POST['id']);
//        }
    }

    function add_guestbook() {//$_POST => content, soundPath, imagePath, datetime
        ////////////////////////////////////////
        $cid = $this->input->post('cid');
        $key = $this->input->post('key');
        $isKeyValid = $this->isValidKey($cid, $key);
        if ($isKeyValid) {
            $now = mdate('%Y-%m-%d %H:%i:%s', time());
            if (!isset($_POST['soundPath']))
                $_POST['soundPath'] = 'Null';
            if (!isset($_POST['imagePath']))
                $_POST['imagePath'] = 'Null';
            $this->load->model("Guestbook_Model");
            if (isset($_POST["name"]) && isset($_POST["content"])) {
                $data = array("name" => $this->input->post("name"),
                    "content" => $this->input->post("content"),
                    "_datetime" => $now,
                    "imagepath" => $this->input->post("imagepath")
                );

                $this->Guestbook_Model->insert($data);
            } else {
                //error => name, content missing
            }

            $this->load->view("guestbook/thankyou.php");
        } else {
           // echo "id " . $cid."  ".$key;
            $this->load->view("guestbook/401.php");
        }
    }

    function delete_guestbook() {
        $id = $this->input->post('id');
//        $row = $this->Guestbook_Model->get_guestbook_by_id($id);
//        if (isset($row->ImagePath)) {
//            if ($row->ImagePath != Null) {
//                unlink('./resources/guestbook/' . $row->ImagePath);
//            }
//        }
        $this->Guestbook_Model->delete($id);
    }

    function list_guestbook() {
        $this->datatables->select('_datetime,name,content,id');
        $this->datatables->from('guestbook');
        $this->datatables->edit_column('id', '<a href="#guestbook_page" onclick="return delete_guestbook_link($1)">Delete</a>', 'id');
        $json = $this->datatables->generate('UTF8');
        //  print_r($json);
        echo str_replace(array("\n", "\r"), array("<br/>", ""), $json);
    }

    function getAvatar($name) {
        $temp = "http://followcost.com/";
        $url = curl_init($temp . $name . ".json");
        curl_setopt($url, CURLOPT_HEADER, false);
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($url);
        echo $data;
        curl_close($url);
    }

    function isValidKey($cid, $key) {
        $validKey = $this->Guestbook_Model->get_qr_key($cid);
        $isValid = false ; 
        if($key == $validKey->key){
            $isValid = true ; 
        }
        return $isValid;
    }

}

?>
