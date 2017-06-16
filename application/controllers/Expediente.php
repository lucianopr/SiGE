<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente extends CI_Controller {
    
	public function index(){
            $this->load->helper('url');
            
            $this->load->view('header');
            $this->load->view('expediente');
            $this->load->view('footer');
	}
        
        public function get_nro_transaccion(){
            $this->load->model('expediente_model');
            $nro = $this->expediente_model->get_nro_transac();
            $nro = $nro[0];
            $nro = $nro->AUTO_INCREMENT;
//            $nro = (int)$nro + 1;
            echo $nro;
        }
        
}
