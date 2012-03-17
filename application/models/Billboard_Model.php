<?php

class Billboard_Model extends CI_Model{
    
    function get_billboard(){
        $query = $this->db->get('billboard');
        return $query->result();
    }
    
    function get_billboard_by_id($id){
        $query = $this->db->query('SELECT * FROM billboard 
                                   WHERE id = '.$id);
        return $query->first_row();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO billboard 
                          VALUES    (null,
                                    "'.$row['content'].'",
                                    "'.$row['imagepath'].'",
                                    "'.$row['datetime'].'", 
                                    '.$row['isEnable'].', 
                                    '.$row['newsID'].')'
                        );
    }
    
//    function set_enable($row){
//        $this->db->query('UPDATE billboard  
//                          SET isEnable='.$row['isEnable'].' 
//                          WHERE id='.$row['id']);
//    }
//    
    function set_enable($allid){
        $this->disable_all();
        $temp = '(';
        foreach($allid as $id){
            $temp = $temp.$id.','; 
        }
        $temp=$temp.'0)';
        $this->db->query('UPDATE billboard  
                          SET isEnable = TRUE 
                          WHERE id in '.$temp);
    }
    
    function disable_all(){
        $this->db->query('UPDATE billboard 
                          SET isEnable = FALSE');
    }
    
    function get_enable(){
        $query = $this->db->query('SELECT * FROM billboard 
                                   WHERE isEnable = true');
        return $query->result();
    }
    
    function delete($id){
        $this->db->query('DELETE FROM billboard 
                            WHERE id = '.$id);
    }
    
    function edit($row){
        $this->db->query('UPDATE billboard
                            SET Content = "'.$row['content'].'", 
                                ImagePath = "'.$row['imagepath'].'",
                                NewsID = '.$row['newsID'].'
                            WHERE id = '.$row['id'] );
    }
    
}

?>
