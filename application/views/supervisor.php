<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header">
  <h1>Supervisores</h1>
</div>
<div class="page-content">
    <div class="options-bar">
        <a href="#"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
    </div>
    <div class="search-fields">
        
    </div>
    <div class="item-list">
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Domicilio</td>
                    <td>Localidad</td>
                    <td>Sección</td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i> Editar</td>
                    <td><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <!--foreach supervisor from supervisor DB table there will be a row with the following structure-->
                <?php for($i=1; $i<=18; $i++){?>
                <tr>
                    <td>ASDASDASDASD</td>
                    <td>ASDASDASD 9999</td>
                    <td>ASDASDASD ASDASD</td>
                    <td>ASDASD999999</td>
                    <td><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
                    <td><a href="#"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>            
        </table>
    </div>
</div>