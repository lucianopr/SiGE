<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header">
  <h1>Supervisores</h1>
</div>
<div class="page-content">
    <div class="options-bar">
        <a href="#" class="search-link"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
    </div>
    <div class="search-fields">
        <h3>Buscar Supervisores:</h3>
        <form action="#">
            <input name="nombre_supervisor" placeholder="Nombre" type="text"/>
            <input type="button" value="Región"/>
            <div class="checkbox-container">
                <h4>Filtrar supervisor por región asignada</h4>
                <hr />
                <p><input type="checkbox" name="check_region" value="r1" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r2" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r3" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r4" /> Región 1</p>
            </div>
            <input type="button" value="Zona"/>
            <div class="checkbox-container">
                <h4>Filtrar supervisor por zona</h4>
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
                <h4>Filtrar supervisor por nro de escuela</h4>
                <hr />
                <input type="checkbox" name="check_escuela" value="1" />
                <input type="checkbox" name="check_escuela" value="2" />
                <input type="checkbox" name="check_escuela" value="3" />
                <input type="checkbox" name="check_escuela" value="4" />
            </div>
            <input type="submit" value="Buscar" name="buscar" />            
        </form>        
    </div>
    <h3>Lista de Supervisores:</h3>
    <div class="item-list">
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>DNI</td>
                    <td>Sección</td>
                    <td>Localidad</td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i> Ver/Editar</td>
                    <td><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                //organizar un array con los id y nombre de cada seccion en la BD --> [id=>nombre, id2=>nombre2,...,idn=>nombren];
                $seccion = Array();
                foreach ($secciones as $sec){
                    $sec_id = $sec->id_zona;
                    $sec_name = $sec->nombre_zona;
                    $seccion[$sec_id] = $sec_name;
                }
                
                foreach ($supervisores as $supervisor) {?>
                <tr id="<?php echo $supervisor->id_supervisor;?>">
                    <td id="nombre_sup_<?php echo $supervisor->id_supervisor;?>"><?php echo $supervisor->nombre; ?></td>
                    <td><?php echo $supervisor->dni; ?></td>
                    <td><?php $id_sec = $supervisor->id_zona; echo $seccion[$id_sec];?></td>
                    <td><?php echo $supervisor->localidad; ?></td>
                    <td><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Ver/Editar</a></td>
                    <td><a class="eliminar-supervisor" href="#"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>            
        </table>
    </div>
</div>

<!--pop up de Nuevo Supervisor-->
<div class="edit-popup" style="display:block;">
    <div class="popup-head">
        <h3>Nuevo Supervisor:</h3>
    </div>
    <div>
        <form action="<?php echo base_url();?>supervisor/nuevo">
            <!--nivel-->
            <div>
                Nivel:
                <select id="new_niv_sel" name="nivel">
                    <option value=""></option>
                    <option id="nuevo_niv_opt" value="new">Nuevo</option>
                <?php foreach ($niveles as $nivel) { ?>
                    <option value="<?php echo $nivel->id;?>"><?php echo $nivel->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nuevo_nivel" name="nuevo_nivel" placeholder="Ingrese el nuevo nivel" />
            </div>
            <!--modalidad-->
            <div>
                Modalidad:
                <select id="new_mod_sel" name="modalidad">
                    <option value=""></option>
                    <option id="nueva_mod_opt" value="new">Nueva</option>
                <?php foreach ($modalidades as $modalidad) { ?>
                    <option value="<?php echo $modalidad->id;?>"><?php echo $modalidad->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_modalidad" name="nueva_modalidad" placeholder="Ingrese la nueva modalidad" />
            </div>
            <!--zona/secc/niv-->
            <div>
                Sección:
                <select id="new_sec_sel" name="seccion">
                    <option value=""></option>
                    <option id="nueva_sec_opt" value="new">Nueva</option>
                <?php foreach ($secciones as $seccion) { ?>
                    <option value="<?php echo $seccion->id_zona;?>"><?php echo $seccion->nombre_zona; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_seccion" name="nueva_seccion" placeholder="Ingrese la nueva sección" />
            </div>
            <!--situacion revista-->
            <div>
                Situación revista:
                <select id="new_sit_sel" name="situacion">
                    <option value=""></option>
                    <option id="nueva_sit_opt" value="new">Nueva</option>
                <?php foreach ($sitprevistas as $sit) { ?>
                    <option value="<?php echo $sit->id;?>"><?php echo $sit->situacion; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_situacion" name="nueva_situacion" placeholder="Ingrese la nueva situación revista" />
            </div>
            <!--nombre y ap-->
            <input type="text" id="nombre_nuevo_sup" placeholder="Nombre y Apellido" name="nombre" />
            <!--telefono-->
            <input type="tel" placeholder="Teléfono" name="tel" />
            <!--email-->
            <input type="email" placeholder="Email" name="email" />
            <!--dni-->
            <input type="text" id="dni_nuevo_sup" placeholder="Nro de documento" name="documento" />
            <!--domicilio-->
            <input type="text" placeholder="Domicilio" name="domicilio" />
            <!--localidad-->
            <input type="text" placeholder="Localidad" name="localidad" />
            <!--Codigo postal-->
            <input type="text" placeholder="Código postal" name="cp" />
            <!--submit is hidden, gets fired up with "guardar button" bellow-->
            <input id="nuevo_sup_submit" type="submit" style="display: none;" />
        </form>
    </div>
    <div>
        <input id="guardar_supervisor" type="button" value="Guardar" />
        <input id="cancelar" type="button" value="Cerrar" />
    </div>
</div>

<!--eliminar supervisor popup-->
<div id="eliminar_popup" class="edit-popup">
    <div class="popup-head">
        <h3>Eliminar Supervisor:</h3>
    </div>
    <div>
        <p id="eliminar_msj"></p>
        <input id="eliminar_nombre" type="hidden" />
        <input id="id_eliminar" type="hidden" />
        <input id="eliminar_supervisor" type="button" value="Eliminar" />
        <input id="cancelar" type="button" value="Cancelar" />
    </div>
</div>