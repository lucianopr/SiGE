<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seccion extends CI_Controller {
    
	public function index(){
            $this->load->helper('url');
            $this->load->model('seccion_model');
            
            $all_secciones = $this->seccion_model->get_all_seccion();
            $data = Array(
                'secciones' => $all_secciones
            );
//            die(var_dump($data));
            
            $this->load->view('header');
            $this->load->view('seccion', $data);
            $this->load->view('footer');
	}
}
