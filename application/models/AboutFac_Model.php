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

}
?>
