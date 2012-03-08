<?php

class Test extends CI_Controller{
	
    function index(){
        echo "Hello World";
    }
    function first(){
        date_default_timezone_set("Asia/Bangkok");
       if(isset($_GET['data'])){
           echo "\n".date('Y-m-d H:i:s',$_GET['data']);
       }else{
           echo 'data is undefined';
       }
       #$this->load->model("News_Model");
       #$date = "11:11:20";
       #$this->News_Model->get_news_by_date($date);
    }
       
    
    function testDB(){
        #$data['query'] = $this->db->get("table1");
        #foreach($data['query']->result() as $row):
        #    echo 'Name : '.$row->name.'<br>';
         #   echo 'Height : '.$row->height;
        #endforeach;
        #foreach($data as $key => $value):
            
        #endforeach;
        #$this->db->query(' $this->db->get("table1");
        #foreach($data['query']->result() as $row):
        #    echo 'Name :INSERT INTO news_catagory 
        #                  VALUES (null,\'รับสมัครงาน\')');
        $this->load->model("News_Model");
        $result = $this->News_Model->get_news();
        
        foreach($result as $row):
           echo 'HeadLine : '.$row->Headline.'<br>';
           echo 'Content : '.$row->Content.'<br><br>';
           $test[] = array("headline"=>$row->Headline,
                           "content"=>$row->Content);
        endforeach;
        echo json_encode($test);
        
        $test = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        echo '<br><br>'.json_encode($test);
    }
    function testRequest(){
        $person[] = array('name'=>'P1','age'=>20,'weight'=>40,'height'=>60);
        $person[] = array('name'=>'P2','age'=>30,'weight'=>50,'height'=>70);
        echo json_encode($person);
        
    }
    
    function testImage(){
        //$this->load->helper('html');
        //$this->load->helper('file');
        $this->load->helper('url');
        //$url = 'http://www.forum.munkonggadget.com/upload/2012/01/20120109095611.gif';
        //$img = 'D:\\test.gif';
        //echo 'abcdsasdasdasd';

        $test = file_get_contents('D:\\music.jpg');
        //echo $test;
        echo base_url().'Image/music.jpg';
        
        //$img = imagecreatefromjpeg($test);
        //echo $img;
        //'<img src='.imagejpeg($img).'/>';
        //echo $img;
        //echo '<img src="'.imagejpeg($img).'" alt="some_text"/>';
        //$this->load->view('index22.html');
        
    }
}

?>