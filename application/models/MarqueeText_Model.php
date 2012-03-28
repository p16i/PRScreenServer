<?php
class MarqueeText_Model extends CI_Model{
    
    function get_marqueetext(){
        $query = $this->db->get('marqueetext');
        return $query->result();
    }

    function get_enable(){
        $query = $this->db->query('SELECT * FROM marqueetext 
                                   WHERE isEnable = true ');
        return $query->result();
    }
    
    function insert($data){
        $this->db->insert('marqueetext',$data);
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
