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
            
            $this->load->view('header');
            $this->load->view('seccion', $data);
            $this->load->view('footer');
	}
        
        public function nueva(){
            $this->load->model('seccion_model');
            $nombre = $_POST['nombre_zona'];
            $result = $this->seccion_model->save_zona($nombre);
            echo $result;
        }
        
        public function editar(){
            $this->load->model('seccion_model');
            $id = $_POST['id'];
            $nombre = $_POST['nombre_zona'];
            $result = $this->seccion_model->edit_zona($id, $nombre);
            echo $result;
        }
        
        public function eliminar(){
            $this->load->model('seccion_model');
            $id = $_POST['id'];
            $result = $this->seccion_model->eliminar_zona($id);
            echo $result;
        }
        
}
