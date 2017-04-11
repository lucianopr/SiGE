<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                    <li><a href="#">Sección-circuito-zona</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        </header>
        <div class="main-content">