<?php

class Location_Model extends CI_Model{
    
    function get_location(){
//        $query = $this->db->get('location');
//        return $query->result();
//        
        $this->db->select('l.ID, l.RoomName, l.HitCounter, l.Floor, l.ImagePath, c.Name, c.id AS CatagoryID');
        $this->db->from('location as l');
        $this->db->join('location_catagory as c','l.CatagoryID=c.id');
        $this->db->order_by('ID');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_location_by_catagory($cat){
        $query = $this->db->query('SELECT l.ID, l.RoomName, l.HitCounter, l.Floor, l.ImagePath, c.Name, c.id AS CatagoryID 
                                    FROM  location AS l
                                    JOIN location_catagory AS c ON l.CatagoryID = c.id
                                    WHERE c.name = \''.$cat.'\'');
        return $query->result();
    }
    
    function get_location_by_id($id){
        $query = $this->db->query('SELECT * 
                                    FROM location 
                                    WHERE ID = '.$id);
        return $query->first_row();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO location 
                          VALUES   (null, 
                                    "'.$row['roomname'].'",
                                    0, 
                                    "'.$row['imagepath'].'", 
                                    '.$row['catagoryID'].')'
                        );
    }
    
    function update_counter($id){
        $this->db->query('UPDATE location 
                          SET HitCounter=HitCounter+1 
                          WHERE id = '.$id);
    }
    
    function edit($row){
        $this->db->query('UPDATE location 
                         SET RoomName = "'.$row['roomname'].'", 
                             Floor = '.$row['floor'].', 
                             imagepath = "'.$row['imagepath'].'", 
                             CatagoryID = '.$row['catagoryID'].' 
                             WHERE ID = '.$row['id']
                        );
    }
    
    function delete($id){
        $this->db->query('DELETE FROM location WHERE id='.$id); 
    }
    
}

?>
