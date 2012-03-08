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
        $this->db->query('INSERT INTO news 
                          VALUES    (null,
                                    '.$row['content'].',
                                    '.$row['datetime'].',   
                                    '.$row['isEnable'].')'
                        );
    }
    
    function set_enable($row){
        $this->db->query('UPDATE marqueetext 
                          SET isEnable='.$row['isEnable'].' 
                          WHERE id='.$row['id']);
    }
    
}
?>
