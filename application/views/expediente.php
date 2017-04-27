<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header">
  <h1>Expedientes</h1>
</div>
<div class="page-content">
    <div class="options-bar">
        <a href="#" class="search-link"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
    </div>
    <div class="search-fields">
        <h3>Buscar Expediente:</h3>
        <form action="#">
            <input name="nombre_supervisor" placeholder="Nombre" type="text"/>
            <input type="button" value="Región"/>
            <div class="checkbox-container">
                <h4>Filtrar expediente por región asignada</h4>
                <hr />
                <p><input type="checkbox" name="check_region" value="r1" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r2" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r3" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r4" /> Región 1</p>
            </div>
            <input type="button" value="Zona"/>
            <div class="checkbox-container">
                <h4>Filtrar expediente por zona</h4>
                <hr />
                <input type="checkbox" name="check_zona" value="z1" />
                <input type="checkbox" name="check_zona" value="z2" />
                <input type="checkbox" name="check_zona" value="z3" />
                <input type="checkbox" name="check_zona" value="z4" />
            </div>
            <input type="text" placeholder="Nro de Expediente" name="num_expediente" />
            <input type="text" placeholder="Nro Interno" name="num_interno" />
            <input type="button" value="Escuela Nro"/>
            <div class="checkbox-container">
                <h4>Filtrar expediente por nro de escuela</h4>
                <hr />
                <input type="checkbox" name="check_escuela" value="1" />
                <input type="checkbox" name="check_escuela" value="2" />
                <input type="checkbox" name="check_escuela" value="3" />
                <input type="checkbox" name="check_escuela" value="4" />
            </div>
            <input type="submit" value="Buscar" name="buscar" />            
        </form>        
    </div>
    <h3>Lista de Expedientes:</h3>
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