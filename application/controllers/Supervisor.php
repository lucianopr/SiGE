<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
    
	public function index(){
            $this->load->library('session'); 
            $this->load->helper('url');
            $this->load->helper('url');   
            $this->load->model('supervisor_model');
            $this->load->model('seccion_model');
            $all_supervisores = $this->supervisor_model->get_all();
            $all_secciones = $this->seccion_model->get_all_seccion();
            $all_modalidades = $this->supervisor_model->get_modalidades();
            $data = Array(
                'supervisores' => $all_supervisores,
                'secciones' => $all_secciones,
                'modalidades' => $all_modalidades
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
        
        public function nuevo(){
            $this->load->helper('url');
            $this->load->model('supervisor_model');
            $data = $_GET;
            $res = $this->supervisor_model->nuevo($data);
            redirect(base_url().'/supervisor?nuevo_sup='.$res);
        }
        
}
