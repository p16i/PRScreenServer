<?php

class Billboard_Model extends CI_Model{
    
    function get_billboard(){
        $query = $this->db->get('billboard');
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO billboard 
                          VALUES    (null,
                                    '.$row['content'].',
                                    '.$row['imagepath'].',
                                    '.$row['datetime'].', 
                                    '.$row['isEnable'].')'
                        );
    }
    
    function set_enable($row){
        $this->db->query('UPDATE billboard  
                          SET isEnable='.$row['isEnable'].' 
                          WHERE id='.$row['id']);
    }
    
    function get_enable(){
        $query = $this->db->query('SELECT * FROM billboard 
                                   WHERE isEnable = true');
        return $query->result();
    }
    
}

?>
