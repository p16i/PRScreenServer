<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Class gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Album_Model');
    }

    function list_gallery() {
        $this->datatables->select('cover,name,albumid');
        $this->datatables->from('album_catagory_relation');
        $this->datatables->join('album_catagory', 'album_catagory.id=album_catagory_relation.catagoryid');
        $this->datatables->join('album', 'album_catagory_relation.albumid=album.id');
        $this->db->group_by("albumid");
        $this->datatables->edit_column('albumid', 'Edit | Delete', 'albumid');
        $this->datatables->edit_column('cover', '<img src="resources/gallery/$1/$2" class="thumbnail"/>', 'name,cover');
        $json = $this->datatables->generate('UTF8');
        //  print_r($json);
        echo $json;
    }

}

?>
