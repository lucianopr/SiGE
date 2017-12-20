<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente extends CI_Controller {
    
	public function index(){
            $this->load->helper('url');
            $this->load->model('expediente_model');
            $this->load->model('supervisor_model');
            $this->load->model('seccion_model');
            
            $get = $_GET;
            if(isset($get['buscar']) && !empty($get['buscar'])){
                $all_expedientes = $this->expediente_model->get_expediente($get);
            } else {
                $all_expedientes = $this->expediente_model->get_all();
            }
            
            $all_supervisores = $this->supervisor_model->get_all();
            $all_secciones = $this->seccion_model->get_all_seccion();
            $all_modalidades = $this->supervisor_model->get_modalidades();
            $all_sitprevistas = $this->supervisor_model->get_sitprev();
            $all_niveles_sup = $this->supervisor_model->get_niveles();
            $all_dependencias = $this->expediente_model->get_dependencias();
            
            if(isset($get['nuevo_pase']) && ($get['nuevo_pase'] === 'yes')){
                $pase = 'block';
            }else{
                $pase = 'none';
            }
            
            $data = Array(
                'expedientes' => $all_expedientes,
                'supervisores' => $all_supervisores,
                'secciones' => $all_secciones,
                'modalidades' => $all_modalidades,
                'sitprevistas' => $all_sitprevistas,
                'niveles' => $all_niveles_sup,
                'dependencias' => $all_dependencias,
                'pase' => $pase
            );
            
            
            $this->load->view('header');
            $this->load->view('expediente', $data);
            $this->load->view('footer');
	}
        
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
            
//            content of $_GET
//            array(14) { ["fecha_ingreso"]=> string(10) "07/18/2017" ["nro_expediente"]=> string(1) "1" ["nro_escuela"]=> string(1) "1" 
//            ["iniciador"]=> string(3) "new" ["nuevo_iniciador"]=> string(14) "otro iniciador" ["supervisor"]=> string(1) "7" 
//            ["seccion"]=> string(1) "1" ["nueva_seccion"]=> string(0) "" ["dependencia"]=> string(3) "new" ["nueva_dependencia"]=> string(17) "nueva dependencia" 
//            ["modalidad"]=> string(1) "5" ["nueva_modalidad"]=> string(0) "" ["referencia"]=> string(22) "prueba referencia test" ["folio"]=> string(1) "1" } 
            
//            guardar nuevos elementos si corresponde (zona, nivel, modalidad, situacion rev)
            $t = $this->supervisor_model->get_seccion($data['seccion']);
            if (sizeof($t) === 0){ //si no existe; agregar nuevo nivel
                $data['seccion'] = $this->supervisor_model->nuevo_nivel($data['seccion']);
            }
            
            if ($data['iniciador'] === "new"){
                $data['iniciador'] = $data['nuevo_iniciador'];
            }
            
            if ($data['dependencia'] === "new"){
                $data['dependencia'] = $this->expediente_model->nueva_dependencia($data['nueva_dependencia']);
            }
            
            $res = $this->expediente_model->nuevo($data);
            
            $datos_pase = Array(
                'exp_id' => $res['id'],
                'fecha' => $data['fecha_ingreso'],
                'folio' => $data['folio'],
                'asignacion' => $data['dependencia'],
                'supervisor' => $data['supervisor']
            );
            $res_pase = $this->expediente_model->nuevo_pase($datos_pase);
            
            redirect(base_url().'expediente?nuevo_exp='.$res['res'].'&pase='.$res_pase);
        }
        
        public function get_expediente_id(){
            $this->load->helper('url');
            $this->load->model('expediente_model');
            $id = $_GET['id'];
            $exp = $this->expediente_model->get_expediente_id($id);
            $pases = $this->expediente_model->get_pases_id($id);
            $response = Array(
                'exp' => $exp,
                'pases' => $pases
            );
            echo json_encode($response);
            die();
        }
        
        public function new_pase(){
            $this->load->helper('url');
            $this->load->model('expediente_model');
            $data = $_GET;
            
            if ($data['dependencia'] === 'new'){
                $data['dependencia'] = $this->expediente_model->nueva_dependencia($data['nueva_asignacion']);
            }
            
            $datos_pase = Array(
                'exp_id' => $data['id_exp'],//este no lo reconoce
                'fecha' => $data['fecha_pase'],
                'folio' => $data['folio'],
                'asignacion' => $data['dependencia'],
                'supervisor' => $data['supervisor']
            );
            $res_pase = $this->expediente_model->nuevo_pase($datos_pase);
            redirect(base_url().'expediente?nuevo_pase=yes');
        }
        
}
