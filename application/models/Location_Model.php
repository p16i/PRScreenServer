<?php

class Location_Model extends CI_Model{
    
    function get_location(){
//        $query = $this->db->get('location');
//        return $query->result();
//        
        $this->db->select('*');
        $this->db->from('location as l');
        $this->db->join('location_catagory as c','l.CatagoryID=c.id');
        $query = $this->db->get();
        echo 'testttt';
        return $query->result();
    }
    
    function get_location_by_catagory($cat){
        $query = $this->db->query('SELECT * 
                                    FROM  location AS l
                                    JOIN location_catagory AS c ON l.CatagoryID = c.id
                                    WHERE c.name = \''.$cat.'\'');
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO location 
                          VALUES   ('.$row['roomnumber'].',
                                    '.$row['roomname'].',
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
