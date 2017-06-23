<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente extends CI_Controller {
    
	public function index(){
<<<<<<< HEAD
            $this->load->library('session'); 
            $this->load->helper('url');            
            $this->load->view('header');            
            $this->load->view('expediente');
=======
            $this->load->helper('url');
            $this->load->model('expediente_model');
            $this->load->model('supervisor_model');
            $this->load->model('seccion_model');
            $all_expedientes = $this->expediente_model->get_all();
            $all_supervisores = $this->supervisor_model->get_all();
            $all_secciones = $this->seccion_model->get_all_seccion();
            $all_modalidades = $this->supervisor_model->get_modalidades();
            $all_sitprevistas = $this->supervisor_model->get_sitprev();
            $all_niveles_sup = $this->supervisor_model->get_niveles();
            
            $data = Array(
                'expedientes' => $all_expedientes,
                'supervisores' => $all_supervisores,
                'secciones' => $all_secciones,
                'modalidades' => $all_modalidades,
                'sitprevistas' => $all_sitprevistas,
                'niveles' => $all_niveles_sup
            );
            
            
            $this->load->view('header');
            $this->load->view('expediente', $data);
>>>>>>> 93675ac25391937cf16d80984c05be4f4ae40250
            $this->load->view('footer');
            
	}
        
<<<<<<< HEAD
//        public function logoutaction()
//    { 
//        $this->session->sess_destroy(); 
//        //$this->refresh();
//        //redirect('Welcome');//, 'refresh'
//        redirect('welcome');
//        
//        //echo "logout";         
//    }
=======
        public function get_nro_transaccion(){
            $this->load->model('expediente_model');
            $nro = $this->expediente_model->get_nro_transac();
            $nro = $nro[0];
            $nro = $nro->AUTO_INCREMENT;
            echo $nro;
        }
        
        public function nuevo(){
            $this->load->helper('url');
            $this->load->model('expediente_model');
            $this->load->model('supervisor_model');
            $data = $_GET;
            
//            guardar nuevos elementos si corresponde (zona, nivel, modalidad, situacion rev)
            $t = $this->supervisor_model->get_seccion($data['seccion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['seccion'] = $this->supervisor_model->nuevo_nivel($data['seccion']);
            }
            
            $t = $this->expediente_model->get_dependencia($data['dependencia']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['dependencia'] = $this->expediente_model->nueva_dependencia($data['situacion']);
            }
            
            $res = $this->expediente_model->nuevo($data);
            redirect(base_url().'expediente?nuevo_exp='.$res);
        }
        
>>>>>>> 93675ac25391937cf16d80984c05be4f4ae40250
}
