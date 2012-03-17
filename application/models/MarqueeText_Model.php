<?php
class MarqueeText_Model extends CI_Model{
    
    function get_marqueetext(){
        $query = $this->db->get('marqueetext');
        return $query->result();
    }

    function get_enable($stat){
        $query = $this->db->query('SELECT * FROM marqueetext 
                                   WHERE isEnable = true ');
        return $query->result();
    }
    
    function insert($row){
        $this->db->query('INSERT INTO marqueetext 
                          VALUES    (null,
                                    "'.$row['content'].'",
                                    "'.$row['datetime'].'",   
                                    '.$row['isEnable'].',
                                    '.$row['newsID'].')'
                        );
    }
    
    function set_enable($allid){
        $this->disable_all();
        $temp = '(';
        foreach($allid as $id){
            $temp = $temp.$id.','; 
        }
        $temp=$temp.'0)';
        $this->db->query('UPDATE marqueetext  
                          SET isEnable = TRUE 
                          WHERE id in '.$temp);
    }
    
    function edit($row){
        $this->db->query('UPDATE marqueetext 
                          SET Content = "'.$row['content'].'" 
                          WHERE newsID = '.$row['newsID']);
    }
    
    function delete($id){
        $this->db->query('DELETE FROM marqueetext 
                            WHERE ID = '.$id);
    }
}
?>
