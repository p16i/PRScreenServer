<?php

class Guestbook_Model extends CI_Model{
    
    function get_guestbook(){
        $query = $this->db->get('guestbook');
        return $query->result();
    }
    
    function get_guestbook_by_id($id){
        $query = $this->db->query('SELECT * FROM guestbook 
                                    WHERE id = '.$id);
        return $query->first_row();
    }
    
    function get_last_guestbook(){
        $query = $this->db->query('SELECT * FROM guestbook 
                                    WHERE id = (SELECT MAX(id) FROM guestbook)');
        
        return $query->first_row();
    }
    
    function insert($data){
        $this->db->insert('guestbook',$data);
    }
    
    function delete($id){
        $this->db->query('DELETE FROM guestbook
                            WHERE id = '.$id);
    }
    
    function get_qr_key($client_id){
        $query = $this->db->query('SELECT * FROM qr_key 
                                    WHERE client_id = '.$client_id);
        return $query->first_row();
    }
    
    function add_client($client_id){
        $new_key = $this->gen_qr_key($client_id);
        $this->db->query('INSERT INTO qr_key VALUES('.$client_id.',"'.$new_key.'");');
        return $new_key."";
    }
    
    function gen_qr_key($client_id){
        $this->load->helper(array('form', 'url', 'date'));
        date_default_timezone_set('Asia/Bangkok');
        
        $gen = md5($client_id.mdate('%H:%i:%s', time()));
        $temp = str_split($gen, 4);
        return $temp[0];
    }
}

?>
