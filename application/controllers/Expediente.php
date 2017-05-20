<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente extends CI_Controller {
    
	public function index(){
            $this->load->library('session'); 
            $this->load->helper('url');            
            $this->load->view('header');            
            $this->load->view('expediente');
            $this->load->view('footer');
            
	}
        
//        public function logoutaction()
//    { 
//        $this->session->sess_destroy(); 
//        //$this->refresh();
//        //redirect('Welcome');//, 'refresh'
//        redirect('welcome');
//        
//        //echo "logout";         
//    }
}
