<?php

class Location_Model extends CI_Model{
    
    function get_location(){
        $query = $this->db->get('location');
        return $query->result();
    }
    
    function get_location_by_id($id){
        $query = $this->db->query('SELECT * FROM location 
                                   WHERE id > '.$id);
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO location 
                          VALUES   ('.$row['roomnumber'].',
                                    '.$row['name'].',
                                    '.$row['hitcounter'].', 
                                    '.$row['imagePath'].', 
                                    '.$row['catagoryID'].')'
                        );
    }
    
    function update_counter($row){
        $this->db->query('UPDATE location 
                          SET HitCounter=HitCounter+1 
                          WHERE roomNumber = '.$row['roomnumber']);
    }
    
    
}

?>
