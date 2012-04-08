<?php

class Guestbook_Model extends CI_Model{
    
    function get_guestbook(){
        $query = $this->db->get('guestbook');
        return $query->result();
    }
    
    function get_guestbook_by_id($id){
        $query = $this->db->query('SELECT ^ FROM guestbook 
                                    WHERE id = '.$id);
        return $query->first_row();
    }
    
  
    
    function insert($data){
        $this->db->insert('guestbook',$data);
    }
    
     function delete($id){
        $this->db->query('DELETE FROM guestbook
                            WHERE id = '.$id);
    }
    
    
}

?>
