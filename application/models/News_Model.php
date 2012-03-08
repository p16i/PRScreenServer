<?php

class News_Model extends CI_Model{
    
    function get_news(){
        $query = $this->db->get('news');
        return $query->result();
    }
    
    function get_news_by_id($id){
        #query only rows that client doesn't have yet
        $query = $this->db->query('SELECT * FROM news 
                                   WHERE id > '.$id);
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO news 
                          VALUES    (null,
                                    '.$row['head'].',
                                    '.$row['content'].',
                                    '.$row['datetime'].', 
                                    '.$row['catagoryID'].', 
                                    '.$row['billboardID'].',    
                                    '.$row['marqueeID'].')'
                        );
    }
    
    
}

?>
