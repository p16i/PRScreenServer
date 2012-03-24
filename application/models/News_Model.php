<?php

class News_Model extends CI_Model{
    
    function get_news(){
        //$query = $this->db->get('news');
        $this->db->select('n.ID,n.Headline,n.Content,n._DateTime,c.Name');
        $this->db->from('news as n');
        $this->db->join('news_catagory as c','n.CatagoryID=c.id');
        $this->db->order_by('ID');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_news_from_id($id){

        $query = $this->db->query('SELECT n.ID,n.Headline,n.Content,n._DateTime,c.Name 
                                   FROM news AS n
                                   JOIN news_catagory AS c ON n.CatagoryID=c.id 
                                   WHERE n.ID > '.$id);
        
        return $query->result();
    }
    
    function get_news_by_id($id){
        $query = $this->db->query('SELECT n.ID,n.Headline,n.Content,n._DateTime,n.CatagoryID,c.Name 
                                   FROM news AS n
                                   JOIN news_catagory AS c ON n.CatagoryID=c.id 
                                   WHERE n.ID = '.$id);
        //echo $news->Content;
        //echo $news->CatagoryID;
        return $query->first_row();
    }
    
    function insert($data){
        $this->db->insert('news',$data);
    }
    
    function get_last_id(){
        $query =$this->db->query('SELECT max(id) as ID FROM news');
        $id = 0;
        foreach($query->result() as $row){
            $id = $row->ID;
        }
        return $id;
    }
    
    function delete($id){
        $this->db->query('DELETE FROM news WHERE id='.$id); 
    }
    
    function edit($row){
        $this->db->query('UPDATE news 
                            SET Headline = "'.$row['headline'].'", 
                                Content = "'.$row['content'].'", 
                                CatagoryID = '.$row['catagoryID'].' 
                            WHERE id = '.$row['id'] );
    }
    
}

?>
