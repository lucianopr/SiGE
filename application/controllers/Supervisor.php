<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
    
	public function index(){
            $this->load->helper('url');   
            $this->load->model('supervisor_model');
            $this->load->model('seccion_model');
            $all_supervisores = $this->supervisor_model->get_all();
            $all_secciones = $this->seccion_model->get_all_seccion();
            $data = Array(
                'supervisores' => $all_supervisores,
                'secciones' => $all_secciones
            );
            $this->load->view('header');
            $this->load->view('supervisor', $data);
            $this->load->view('footer');
	}
        
        public function eliminar(){
            $this->load->model('supervisor_model');
            $id = $_POST['id'];
            $result = $this->supervisor_model->eliminar($id);
            echo $result;
        }        
        
}
