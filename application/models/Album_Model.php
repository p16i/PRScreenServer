<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Album_Model extends CI_Model{
    
    function insert($data){
        $data['isEnable'] = TRUE;
        $this->db->insert('aboutfac', $data); 
    
        
    }
    function get_list_catagory($albumID){
        $this->db->select('catagory_name') ; 
    
        $this->db->join('album_catagory','album_catagory.id=album_catagory_relation.catagoryid');
        $result=$this->db->get('album_catagory_relation');
        $result = $result->result();
        return $result;
    }
}

?>
