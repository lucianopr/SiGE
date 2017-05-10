<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//die(var_dump(isset($_SESSION['id_user'])));
//if($_SESSION['id_user'] == null || !isset($_SESSION['id_user'])){
//if(session_id() == '' || !isset($_SESSION)){ 
//redirect('welcome');
//}
//if(empty($_SESSION['id_user'])){
  //  redirect('welcome');
//
//$this->load->library('session'); 
//if(!$this->session->userdata("id_user")){
//    redirect('welcome');   
//}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>SiGE - Gestión de Expedientes</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/action.js" ></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">SiGE</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>expediente">Expedientes</a></li>
                    <li><a href="<?php echo base_url(); ?>supervisor">Supervisores</a></li>
                    <li><a href="<?php echo base_url(); ?>seccion">Sección-circuito-zona</a></li>
                    <li><a href="<?php echo base_url(); ?>welcome/logoutaction">Salir</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        </header>
        <div class="main-content">