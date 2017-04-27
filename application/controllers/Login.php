<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index(){
            $this->load->helper('url');            
            $this->load->view('header');
            $this->load->view('home');
            $this->load->view('footer');
	}


    function loginAction()
    {
        $username = $this->request->get('dni');
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
        }
    }

    function logoutAction()
    {
        if (AuthStorage::logged())
        {
            AuthStorage::remove();
            $this->redirect('index');
        }
        else
        {
            $this->view->message = 'Usted No está logueado..';
            $this->view->render('error');
        }
    }
}



