<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AboutFac_Model extends CI_Model{
    
    function insert($data){
        $data['isEnable'] = TRUE;
        $this->db->insert('aboutfac', $data); 
    }
    
    function get_aboutfac(){
        $this->db->select('a.id, a.description, a.path. a.isEnable, a.catagory, c.name');
        $this->db->from('aboutfac as a');
        $this->db->join('aboutfac_catagory as c','a.catagory=c.id');
        $this->db->order_by('ID');
        $query = $this->db->get();
        return $query->result();
    }

}
?>
