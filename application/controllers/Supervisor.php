<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
    
	public function index(){
            $this->load->helper('url');   
            $this->load->model('supervisor_model');
            $this->load->model('seccion_model');
            $all_supervisores = $this->supervisor_model->get_all();
            $all_secciones = $this->seccion_model->get_all_seccion();
            $all_modalidades = $this->supervisor_model->get_modalidades();
            $all_sitprevistas = $this->supervisor_model->get_sitprev();
            $all_niveles_sup = $this->supervisor_model->get_niveles();
            $data = Array(
                'supervisores' => $all_supervisores,
                'secciones' => $all_secciones,
                'modalidades' => $all_modalidades,
                'sitprevistas' => $all_sitprevistas,
                'niveles' => $all_niveles_sup
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
            
//            guardar nuevos elementos si corresponde (zona, nivel, modalidad, situacion rev)
            $t = $this->supervisor_model->get_nivel($data['nivel']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['nivel'] = $this->supervisor_model->nuevo_nivel($data['nivel']);
            }
            
            $t = $this->supervisor_model->get_modalidad($data['modalidad']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['modalidad'] = $this->supervisor_model->nuevo_nivel($data['modalidad']);
            }
            
            $t = $this->supervisor_model->get_seccion($data['seccion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['seccion'] = $this->supervisor_model->nuevo_nivel($data['seccion']);
            }
            
            $t = $this->supervisor_model->get_situacion($data['situacion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['situacion'] = $this->supervisor_model->nuevo_nivel($data['situacion']);
            }
            
            $res = $this->supervisor_model->nuevo($data);
            redirect(base_url().'supervisor?nuevo_sup='.$res);
            
        }
        
        public function get_supervisor(){
            $this->load->helper('url');
            $this->load->model('supervisor_model');
            $id = $_GET['id'];
            $supervisor = $this->supervisor_model->get_supervisor($id);
            echo json_encode($supervisor);
        }
        
        public function edit(){
            $this->load->helper('url');
            $this->load->model('supervisor_model');
            $data = $_GET;
//            guardar nuevos elementos si corresponde (zona, nivel, modalidad, situacion rev)
            $t = $this->supervisor_model->get_nivel($data['nivel']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['nivel'] = $this->supervisor_model->nuevo_nivel($data['nivel']);
            }
            $t = $this->supervisor_model->get_modalidad($data['modalidad']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['modalidad'] = $this->supervisor_model->nuevo_nivel($data['modalidad']);
            }
            $t = $this->supervisor_model->get_seccion($data['seccion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['seccion'] = $this->supervisor_model->nuevo_nivel($data['seccion']);
            }
            $t = $this->supervisor_model->get_situacion($data['situacion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['situacion'] = $this->supervisor_model->nuevo_nivel($data['situacion']);
            }
            $res = $this->supervisor_model->edit($data);
            redirect(base_url().'supervisor?edit_sup='.$res);            
        }
        
        public function nuevo_exp(){
            $this->load->helper('url');
            $this->load->model('supervisor_model');
            $data = $_GET;
            
//            guardar nuevos elementos si corresponde (zona, nivel, modalidad, situacion rev)
            $t = $this->supervisor_model->get_nivel($data['nivel']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['nivel'] = $this->supervisor_model->nuevo_nivel($data['nivel']);
            }
            
            $t = $this->supervisor_model->get_modalidad($data['modalidad']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['modalidad'] = $this->supervisor_model->nuevo_nivel($data['modalidad']);
            }
            
            $t = $this->supervisor_model->get_seccion($data['seccion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['seccion'] = $this->supervisor_model->nuevo_nivel($data['seccion']);
            }
            
            $t = $this->supervisor_model->get_situacion($data['situacion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['situacion'] = $this->supervisor_model->nuevo_nivel($data['situacion']);
            }
            
            $res = $this->supervisor_model->nuevo($data);
            echo $res;
//            redirect(base_url().'supervisor?nuevo_sup='.$res);
            
        }
        
}
