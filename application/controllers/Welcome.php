<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');    
        $this->load->helper('cookie');
        $this->load->model('usuario_model');
        $this->load->library('session');
        
         if(!empty($_SESSION['id_user'])){
             //echo $this->session->userdata('dni') . $this->session->userdata('nombre'); 
             $rows = $this->usuario_model->validar_usuario($this->session->userdata('dni'), $this->session->userdata('password'));  
            if ( $rows != null)
            {                
                $this->session->set_userdata(array(
                'id_user'=>$rows->id_user,
                'nombre'=>$rows->nombre,
                'codigo'=>$rows->codigo,
                'administrador'=>$rows->administrador,
                'dni'=>$rows->dni,
                'password'=>$rows->password,   
                'status'=> TRUE
                    ));            
                echo "datos ok"; 
            
                redirect('supervisor');
                
            }
             
             
            //redirect('expediente');
         }
    }     
    
    
	public function index(){           
            
           
                //unserialize($_COOKIE['value'])['logged_in']
           // echo unserialize($_COOKIE['usuario']['value'])['logged_in']
                //redirect('expediente'); 
            
//             if(unserialize($cookie['usuario']['value'])['logged_in']){           
           
            $this->load->helper('form');            
           // $this->load->helper('url');            
           // $this->load->view('header');
            $this->load->view('welcome');
            $this->load->view('footer');             
        //parent::__construct();
        //$this->load->model('site_model');   
       
	}

        
        public function loginaction()
    {
        $dni= $_REQUEST['dni'];
        //echo $dni;  
        $password = $_REQUEST['psw'];
//        $this->load->model('usuario_model');
        $rows = $this->usuario_model->validar_usuario($dni, $password);  
        if ( $rows != null)
        {
//            $datos = inplode(array('id_user'=>$rows->id_user,
//            'nombre'=>$rows->nombre,
//            'codigo'=>$rows->codigo,
//            'administrador'=>$rows->administrador,
//            'dni'=>$rows->dni,
//            'password'=>$rows->password,   
//            'logged_in'=>TRUE
//                ));             
//            $cookie = array(               
//            'name'   => "usuario",
//            'value'  => $datos,
//            'expire' => '86500',
//            'secure' => FALSE
//            );
//            $this->input->set_cookie($cookie, "usuario");
            
            $this->load->library('session');
            $this->session->set_userdata(array(
            'id_user'=>$rows->id_user,
            'nombre'=>$rows->nombre,
            'codigo'=>$rows->codigo,
            'administrador'=>$rows->administrador,
            'dni'=>$rows->dni,
            'password'=>$rows->password,   
                            'status'        => TRUE
                    ));
            
            $this->session->set_flashdata('message', 'Datos Correctos');
            
            redirect('supervisor');
        }
        else
        {$this->session->set_flashdata('message', 'El Usuario no Existe...');
            redirect();     
        }
        
   /*     
        $password = $this->request->get('psw');
        echo $password;

       $this->loadModel('usuario');
        if ($this->users->validate($dni, $psw))
        {
            $userData = $this->users->fetch($dni);
            AuthStorage::save($nombre, $userData);
            $this->redirect('supervisor');
        }
        else
        {
            $this->view->message = 'Datos inválidos...';
            $this->view->render('error');
        }*/
    }

    public function logoutaction()
    { 
        $this->session->sess_destroy(); 
        //$this->refresh();
        //redirect('Welcome');//, 'refresh'
        redirect();
        
        //echo "logout";         
    }
}



