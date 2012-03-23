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
        $success = $this->AboutFac_Model->insert($_POST);
    }

    function list_aboutfac() {
        $this->datatables->select('path,description, isEnable, catagory,id');
        $this->datatables->from('aboutfac');


//        //  $test = $this->products_model->query_page(5);
      $this->datatables->edit_column('path','<img src="resources/about_fac/$1" class="thumbnail" />', 'path');
      $this->datatables->edit_column('id', 'Edit | Delete', 'id');
        $json = $this->datatables->generate('UTF8');
      //  print_r($json);
        echo $json;
    }

}

?>
