<?php

    Class welcome extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form','url'));
            
        }
        
        function index(){
            //echo form_input('username','johndoe');
            $this->load->view('admin/welcome_view');
        }
        
        function verify(){
            //Coding area that verify username, password of admin
            $this->load->helper('url');
            $this->load->view('admin/home_view');
            //$this->load->view('news/test');
            
        }
        
    }
    
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
