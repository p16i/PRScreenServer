<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Album_Model extends CI_Model{
    
    function __construct(){
            parent::__construct();
            $this->load->helper(array('file'));
            
        }
    
    function get_album(){
        $this->db->select('*');
        $this->db->from('album');
        //$this->db->join('album_catagory as c','a.CatagoryID=c.id');
        $this->db->order_by('ID');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_catagory($id){//get all catagorys of this Album.
        $query = $this->db->query("SELECT catagory_name
                            FROM album_catagory 
                            JOIN album_catagory_relation ON CatagoryID = ID 
                            
                            WHERE albumID = ".$id
                );
        
        return $query->result();
    }
    
    function get_album_by_id($id){
        $query = $this->db->query('SELECT * 
                                    FROM album 
                                    WHERE id = '.$id
                                    );
        return $query->first_row();
    }
    
    function get_pics_from_album($index){ //$index can be either ID or Name_of_album  
        if(is_int($index)){//if index is int (id)
            $query = $this->db->query('SELECT Name 
                                        FROM album 
                                        WHERE id = '.$index
                    );
            $index = $query->first_row()->Name;
        }//else -> index should be name of album
        
        $pics = get_filenames('./image_album/'.$index.'/');
        
        return $pics;
    }
    
    
    function insert($row){
        $this->db->query('INSERT INTO album 
                          VALUES    (null,
                                    "'.$row['name'].'",
                                    '.$row['quantity'].',
                                    "'.$row['cover'].'")'
                        );
        $query = $this->db->query('SELECT MAX(id) as ID FROM album');
        $id = $query->first_row()->ID;
        foreach($row['catagoryID'] as $catID){
            $this->db->query('INSERT INTO album_catagory_relation 
                                VALUES ('.$id.','.$catID.')'
                            );
        }
        
        
    }
    
    
    
     function delete($id){
        $this->db->query('DELETE FROM album
                            WHERE id = '.$id);
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
