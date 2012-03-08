<?php

class Guestbook_Model extends CI_Model{
    
    function get_guestbook(){
        $query = $this->db->get('guestbook');
        return $query->result();
    }
    
    function get_guestbook_by_id($id){
        $query = $this->db->query('SELECT * FROM guestbook 
                                   WHERE id>'.$id);
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO guestbook 
                          VALUES    (null,
                                    '.$row['content'].',
                                    '.$row['soundpath'].',
                                    '.$row['imagepath'].', 
                                    '.$row['datetime'].')'
                        );
    }
    
    
}

?>
