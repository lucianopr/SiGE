<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($_SESSION['id_user'])){
    redirect('expediente');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
        <title>Inicio - SiGE</title>        
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/action.js" ></script>
    
</head>
<body>
    <div class="navbar navbar-default">
  <h1>Bienvenido</h1>
</div>

    <div class="panel panel-primary" style="width: 50%;left: 25%; margin-left: 25%;">
<!--<h3>Ingrese sus Datos:</h3>-->
<div class="panel-heading" >Ingrese sus Datos:</div>
<!--<div class="panel-body" >-->
    

<div class="alert-info" id="infoMessage"><?php echo $this->session->flashdata('message');?></div>

<form class="panel-body" method="post" name="LOGIN" action="index.php/Welcome/loginaction">  

    <fieldset>
    <label><b>DNI: </b></label>
    <input type="number" placeholder="Ingrese su DNI." name="dni" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <label><b>Contraseña</b></label>
    <input type="password" placeholder="Ingrese su Contraseña" name="psw" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</fieldset>
    <hr>
    
    <button type="submit" class="btn-primary"> Ingresar</button>    
 
    </form>
<!--</div>-->
</div>

<!--<form method="post" name="CANCELAR" action="index.php/Welcome/logoutaction" style="wleft: 25%; margin-left: 25%;">
  <div class="cancelbtn alert" >
    <button type="submit" class="cancelbtn">Salir</button>   
  </div>
</form>-->
</body>
</html>
