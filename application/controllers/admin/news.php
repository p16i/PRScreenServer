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

    function add_news() { //$_POST => headline, content, datetime, catagoryID
        //echo "TEST".$_POST['datetime'];
        $_POST['_datetime'] = mdate('%Y-%m-%d %H:%i:%s', time());
        if ($_POST['headline'] != '' && $_POST['content'] != '') {
            $_POST['content'] = addslashes($_POST['content']);
            
            $data = array();
            $data['_datetime'] = $_POST['_datetime'];
            $data['headline'] = $_POST['headline'];
            $data['content'] = $_POST['content'];
            $data['catagoryid'] = $_POST['catagoryID'];
            $this->News_Model->insert($data);
//            if (isset($_POST['marquee'])) { //if admin want to bind the news to marquee
//                //echo '<br>ABCDASDAWEDAWD<br>';
//                $marquee = array();
//                $marquee['Content'] = $_POST['headline'];
//                $marquee['_datetime'] = $_POST['_datetime'];
//                $marquee['isEnable'] = TRUE;
//                $marquee['news_id'] = $this->News_Model->get_last_id();
//                $this->MarqueeText_Model->insert($marquee);
//            }
        }else
            echo 'Something Empty'; //blank input detect.
        
        redirect(base_url()."welcome#news_page",'refresh');
    }

    function delete_news() {//$_POST => id
        $this->News_Model->delete($_POST['id']);
    }

    function edit_news() {//$_POST => id, content, headline, catagoryID
        //echo $_POST['id'];
        //$_POST['id'] = $_POST['news_id'];

        if ($_POST['headline'] != '' && $_POST['content'] != '') {
            
            //$_POST['content'] = substr_count($_POST['content'],"\n");
            //$_POST['content'] = str_replace("\n", '\\n', $_POST['content']);
            //$_POST['content'] = str_replace("\r", '', $_POST['content']);
            
            $this->News_Model->edit($_POST);
            //change content of marquee in case of news headline have change
//            $marquee['newsID'] = $_POST['id'];
//            $marquee['content'] = $_POST['headline'];
//
//            $this->MarqueeText_Model->edit($marquee);
            
        }else
            echo 'Something Empty';
    }

    function list_news() {
        $this->datatables->select('_datetime,headline, SUBSTRING(content FROM 1 FOR 70) AS cutted_content, c.name, news.id, c.id AS catagoryid, content');
        $this->datatables->from('news');
        $this->datatables->join('news_catagory as c','news.catagoryid=c.id');
        $this->datatables->edit_column('news.id', 
                                        '<a href="#news_page" onclick="return edit_news_link($1,\'$2\',\'$3\',$4)">Edit</a> | <a href="#" onclick="return delete_news_link($1)">Delete</a>',
                                        'news.id,headline, content,catagoryid');
        $this->datatables->edit_column('cutted_content','$1...','cutted_content');
        $json = $this->datatables->generate('UTF8');
        
        //print_r($json);
        //echo $json;
        
        echo str_replace(array("\n","\r"), array("<br/>",""), $json);
    }

    function get_catagory(){
        
        
    }
}

?>
