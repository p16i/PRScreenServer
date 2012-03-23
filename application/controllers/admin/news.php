<?php

Class news extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("News_Model");
        $this->load->model('News_Catagory_Model');
        $this->load->model('MarqueeText_Model');
    }

    function index() {
        if (!isset($_POST['option'])) {
            $result = $this->News_Model->get_news();
            $data['result'] = $result;
            $this->load->view("news/index", $data);
        } elseif ($_POST['option'] == 'Add News') {
            $result = $this->News_Catagory_Model->get_news_catagory();
            $data['result'] = $result;
            $this->load->view('news/add_news', $data);
        } elseif ($_POST['option'] == 'Edit Selected') {//$_POST => id
            $news_result = $this->News_Model->get_news_by_id($_POST['id']);
            $catagory_result = $this->News_Catagory_Model->get_news_catagory();
            $data['news_result'] = $news_result;
            $data['catagory_result'] = $catagory_result;
            $this->load->view('news/edit_news', $data); //send all old data to represent to the admin
        } elseif ($_POST['option'] == 'Delete') {
            $this->delete_news($_POST['id']);
        }
    }

    function add_news() { //$_POST => headline, content, datetime, catagoryID
        //echo "TEST".$_POST['datetime'];
        $_POST['datetime'] = mdate('%Y-%m-%d %H:%i:%s', time());
        if ($_POST['headline'] != '' && $_POST['content'] != '') {
            if (isset($_POST['marquee'])) { //if admin want to bind the news to marquee
                //echo '<br>ABCDASDAWEDAWD<br>';
                $marquee['content'] = $_POST['headline'];
                $marquee['datetime'] = $_POST['datetime'];
                $marquee['isEnable'] = TRUE;
                $marquee['newsID'] = $this->News_Model->get_last_id() + 1;
            }
            $this->News_Model->insert($_POST);
            $this->MarqueeText_Model->insert($marquee);
            $_POST['option'] = null;
            $this->index();
        }else
            echo 'Something Empty'; //blank input detect.
    }

    function delete_news($id) {//$_POST => id
        $this->News_Model->delete($id);
        $_POST['option'] = null;
        $this->index();
    }

    function edit_news() {//$_POST => id, content, headline, catagoryID
        //echo $_POST['id'];
        $this->News_Model->edit($_POST);

        if ($_POST['headline'] != '' && $_POST['content'] != '') {
            //change content of marquee in case of news headline have change
            $marquee['newsID'] = $_POST['id'];
            $marquee['content'] = $_POST['headline'];

            $this->MarqueeText_Model->edit($marquee);
            $this->index();
        }else
            echo 'Something Empty';
    }

    function list_news() {
        $this->datatables->select('_datetime,headline, content, catagoryid,id');
        $this->datatables->from('news');


        $this->datatables->edit_column('id', 'Edit | Delete', 'id');
        $json = $this->datatables->generate('UTF8');
        //  print_r($json);
        echo $json;
    }

}

?>
