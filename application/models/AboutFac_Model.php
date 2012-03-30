<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AboutFac_Model extends CI_Model{
    
    function insert($row){
//        $this->db->query('INSERT INTO aboutfac 
//                            VALUES (null, 
//                                    "'.$row['desc'].'", 
//                                    "'.$row['imagepath'].'",
//                                    '.TRUE.',
//                                    '.$row['catagoryID'].'
//                            )');
        $row['isEnable']=True;
        $this->db->insert('aboutfac', $row); 
    }
    
    function edit($row){
        $this->db->query('UPDATE aboutfac
                            SET description = "'.$row['description'].'",
                                path = "'.$row['path'].'",
                                catagory = '.$row['catagory'].' 
                            WHERE id = '.$row['id'].'
'                       );
    }
    
    function delete($id){
        $this->db->delete('aboutfac',array('id'=>$id));
    }
    
    function get_aboutfac_by_id($id){
        $query = $this->db->get_where('aboutfac',array('id'=>$id));
        return $query->first_row();
    }
        
    
    function get_aboutfac(){
        $this->db->select('a.id, a.description, a.path. a.isEnable, a.catagory, c.name');
        $this->db->from('aboutfac as a');
        $this->db->join('aboutfac_catagory as c','a.catagory=c.id');
        $this->db->order_by('ID');
        $query = $this->db->get();
        return $query->result();
    }

}
?>
