<?php

class News_Model extends CI_Model{
    
    function get_news(){
        //$query = $this->db->get('news');
        $this->db->select('n.ID,n.Headline,n.Content,n._DateTime,c.Name,n.MarqueeID');
        $this->db->from('news as n');
        $this->db->join('news_catagory as c','n.CatagoryID=c.id');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_news_by_id($id){
        #query only rows that client doesn't have yet
        $query = $this->db->query('SELECT n.ID,n.Headline,n.Content,n._DateTime,c.Name,n.MarqueeID 
                                   FROM news AS n
                                   JOIN news_catagory AS c ON n.CatagoryID=c.id 
                                   WHERE n.ID > '.$id);
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO news 
                          VALUES    (null,
                                    '.$row['head'].',
                                    '.$row['content'].',
                                    '.$row['datetime'].', 
                                    '.$row['catagoryID'].',     
                                    '.$row['marqueeID'].')'
                        );
    }
    
    
}

?>
