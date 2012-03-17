<?php

class Location_Catagory_Model extends CI_Model{
    
    function get_location_catagory(){
        $query = $this->db->get('location_catagory');
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO location_catagory 
                          VALUES    (null,
                                    '.$row['catagory'].')'
                        );
    }
    
}

?>
