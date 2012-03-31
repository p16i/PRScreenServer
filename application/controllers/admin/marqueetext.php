<?php

Class marqueetext extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("MarqueeText_Model");
        $this->load->model('News_Model');
    }

    function add_marqueetext() {
        $_POST['_datetime'] = mdate('%Y-%m-%d %H:%i:%s', time());
        $_POST['isEnable'] = TRUE;
        
        //// Tle's Code 
        $this->MarqueeText_Model->insert($_POST);
        
//        if ('' == '') { // Manual Add{ //$_POST => content, newsID
//            if ($_POST['content'] != '') {
//
//                $marquee['newsID'] = 'NULL';
//                $this->MarqueeText_Model->insert($_POST);
//            }
//        } elseif ('' == '') {// Choose from news  ////$_POST => content, newsID
//            if (isset($_POST) && $_POST['content'] != '') {
//                $this->MarqueeText_Model->insert($_POST);
//            }
//        }
//
//        else
//            echo 'Something Empty'; //blank input detect.
//        $_POST['option'] = null;
       // $this->index();
    }

    function delete_marqueetext() {
        $this->MarqueeText_Model->delete($_POST['id']);
    }

    function set_enable() {//$_POST => id[]
        //$_POST['id'] = array(1,2,3,4,9);
        $this->MarqueeText_Model->set_enable($_POST["id"]);
    }
    
    function edit_marqueetext(){
        if($_POST['content']!=''){
            $this->MarqueeText_Model->edit($_POST);
        }else{
            //content is blank
        }
    }

    function list_marqueetext() {
        $this->datatables->select('_datetime,content,isEnable,id');
        $this->datatables->from('marqueetext');
        $this->datatables->edit_column('isEnable','$1','isEnable');
        $this->datatables->edit_column('id', 
                                        '<a href="#" onclick="return edit_marquee_link($1,\'$2\')">Edit</a> | <a href="#" onclick="return delete_marquee_link($1)">Delete', 
                                        'id,content');
        $json = $this->datatables->generate('UTF8');
        //  print_r($json);
        echo str_replace(array("\n","\r"), array("<br/>",""), $json);
    }

}

?>
