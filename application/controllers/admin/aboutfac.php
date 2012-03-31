<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Class aboutfac extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AboutFac_Model');
    }

    function add_aboutfac() {
        if ($_POST['description'] != '') {
            
            $config['upload_path'] = 'resources/aboutfac/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            //print_r($this->upload->data());
            $image_data = $this->upload->data();
            if ($image_data['file_name'] != null) {
                $_POST['path'] = $image_data['file_name'];
            }else{
                //image isn't upload added
            }
            $this->AboutFac_Model->insert($_POST);
            redirect(base_url().'welcome#about_fac_page', 'refresh');
        }else{
            //desc is blank
        }
    }
    
    function edit_aboutfac() {
        if ($_POST['description'] != '') {
            
            $config['upload_path'] = 'resources/aboutfac/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            //print_r($this->upload->data());
            $image_data = $this->upload->data();
            if ($image_data['file_name'] != null) {
                $_POST['path'] = $image_data['file_name'];
            }else{
                $_POST['path'] = $_POST['oldpath'];
            }
            $this->AboutFac_Model->edit($_POST);
            redirect(base_url().'welcome#about_fac_page', 'refresh');
        }else{
            //desc is blank
        }
    }
    
    function delete_aboutfac(){
        $id = $_POST['id'];
        $row = $this->AboutFac_Model->get_aboutfac_by_id($id);
        unlink('./resources/aboutfac/' . $row->path); //also delete image file from server
        $this->AboutFac_Model->delete($id);
    }

    function list_aboutfac() {
        $this->datatables->select('path, description, isEnable, name, a.id, c.id AS catagoryID');
        $this->datatables->from('aboutfac as a');
        $this->datatables->join('aboutfac_catagory as c','a.catagory=c.id');
        $this->datatables->edit_column('a.id', 
                                            '<a href="#" onclick="return edit_aboutfac_link($1,\'$2\',\'$3\',$4)">Edit</a> | <a href="#" onclick="return delete_aboutfac_link($1)">Delete</a>', 
                                            'a.id,description,path,catagoryID');
        $this->datatables->edit_column('path','<img src="resources/aboutfac/$1" class="thumbnail" />', 'path');
        
        $json = $this->datatables->generate('UTF8');
        echo str_replace(array("\n","\r"), array("<br/>",""), $json);
    }

}

?>
