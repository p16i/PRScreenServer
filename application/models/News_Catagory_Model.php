<?php

class News_Catagory_Model extends CI_Model{  
    function get_news_catagory(){
        $query = $this->db->get('news_catagory');
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO news 
                          VALUES    (null,
                                    '.$row['name'].')'
                        );
    }
}

?>
