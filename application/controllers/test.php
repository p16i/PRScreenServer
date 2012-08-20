<?php


Class test extends CI_Controller {
    function index(){
        $this->a = 'a';
        $this->load->view('test');
    }
    
    function b(){
        $this->b = 'b';
        $this->load->view('test2');
    }
    
    function c(){
        $this->c = 'c';
        echo $this->a." : ".$this->b." : ".$this->c;
    }
    
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
