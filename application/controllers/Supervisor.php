<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
    
	public function index(){
            $this->load->library('session'); 
            $this->load->helper('url');            
            $this->load->view('header');
            $this->load->view('supervisor');
            $this->load->view('footer');
	}
}
