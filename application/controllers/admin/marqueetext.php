<?php

Class marqueetext extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("MarqueeText_Model");
        $this->load->model('News_Model');
    }

    function index() {
        if (!isset($_POST['option'])) {
            $result = $this->MarqueeText_Model->get_marqueetext();
            $data['result'] = $result;
            $this->load->view("marqueetext/index", $data);
        } elseif ($_POST['option'] == 'Add MarqueeText') {
            $result = $this->News_Model->get_news();
            $data['result'] = $result;
            $this->load->view('marqueetext/add_marqueetext', $data);
        } elseif ($_POST['option'] == 'Edit Selected') {//$_POST => id
            $marqueeText_result = $this->News_Model->get_news_by_id($_POST['id']);
            $news_result = $this->News_Catagory_Model->get_news_catagory();
            $data['marqueetext_result'] = $marqueeText_result;
            $data['news_result'] = $news_result;
            $this->load->view('marqueetext/edit_marqueetext', $data); //send all old data to represent to the admin
        } elseif ($_POST['option'] == 'Delete') {
            $this->delete_marqueetext($_POST['id']);
        }
    }

    function add_marqueetext() {
        $_POST['datetime'] = mdate('%Y-%m-%d %H:%i:%s', time());
        $marquee['isEnable'] = TRUE;
        if ('' == '') { // Manual Add{ //$_POST => content, newsID
            if ($_POST['content'] != '') {

                $marquee['newsID'] = 'NULL';
                $this->MarqueeText_Model->insert($_POST);
            }
        } elseif ('' == '') {// Choose from news  ////$_POST => content, newsID
            if (isset($_POST) && $_POST['content'] != '') {
                $this->MarqueeText_Model->insert($_POST);
            }
        }

        else
            echo 'Something Empty'; //blank input detect.
        $_POST['option'] = null;
        $this->index();
    }

    function delete_marqueetext($id) {
        $this->MarqueeText_Model->delete($id);
        $_POST['option'] = null;
        $this->index();
    }

    function set_enable() {//$_POST => id[]
        //$_POST['id'] = array(1,2,3,4,9);
        $this->MarqueeText_Model->set_enable($_POST["id"]);
    }

    function list_marqueetext() {
        $this->datatables->select('_datetime,content, isEnable,id');
        $this->datatables->from('marqueetext');
        $this->datatables->edit_column('isEnable','$1','isEnable');
        $this->datatables->edit_column('id', 'Edit | Delete', 'id');
        $json = $this->datatables->generate('UTF8');
        //  print_r($json);
        echo $json;
    }

}

?>
