<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
        <title>Inicio - SiGE</title>
</head>
<body>
<div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>

<form method="post" name="LOGIN" action="index.php/Welcome/loginaction">
  

  <div class="container">
    <label><b>DNI: </b></label>
    <input type="number" placeholder="Ingrese su DNI." name="dni" required>

    <label><b>Contraseña</b></label>
    <input type="password" placeholder="Ingrese su Contraseña" name="psw" required>

    <button type="submit">Ingresar</button>    
  </div>
    </form>
<form method="post" name="CANCELAR" action="index.php/Welcome/logoutaction">
  <div class="container" style="background-color:#f1f1f1">
    <button type="submit" class="cancelbtn">Cancelar</button>   
  </div>
</form>
</body>
</html>
