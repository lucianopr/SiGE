<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-header">
  <h1>Expedientes</h1>
</div>
<div class="page-content">
    <div class="options-bar">
        <a href="#" class="search-link"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
        <a id="nuevo_exp" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
    </div>
    
    <div class="search-fields">
        <h3>Buscar Expediente:</h3>
        <form action="<?php echo base_url();?>expediente">
            <select id="ex_buscar_supervisor" name="ex_buscar_supervisor">
                <option value="none">Supervisor</option>
                <?php foreach ($supervisores as $supervisor) { ?>
                    <option value="<?php echo $supervisor->id_supervisor;?>"><?php echo $supervisor->nombre; ?></option>  
                <?php } ?>
            </select>
            <select id="ex_buscar_seccion" name="ex_buscar_seccion">
                <option value="none">Sección</option>
                <?php foreach ($secciones as $seccion) { ?>
                    <option value="<?php echo $seccion->id_zona;?>"><?php echo $seccion->nombre_zona; ?></option>  
                <?php } ?>
            </select>
            <input type="text" placeholder="Nro de Expediente" name="num_expediente" />
            <input type="text" placeholder="Nro Interno" name="num_interno" />
            <input type="text" placeholder="Escuela Nro" name="num_escuela"/>
            <input type="text" placeholder="Iniciador" name="iniciador"/>
            <input type="submit" value="Buscar" name="buscar" />            
        </form>        
    </div>
    <h3>Lista de Expedientes:</h3>
    <div class="item-list">
        <table>
            <thead>
                <tr>
                    <td>Fecha de Ingreso</td>
                    <td>Transacción</td>
                    <td>Nro de Expediente</td>
                    <td>Modalidad</td>
                    <td>Sección</td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i> Ver/Editar</td>
                    <!--<td><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</td>-->
                </tr>
            </thead>
            <tbody>
                <?php
                $seccion = Array();
                foreach ($secciones as $sec){
                    $sec_id = $sec->id_zona;
                    $sec_name = $sec->nombre_zona;
                    $seccion[$sec_id] = $sec_name;
                }
                $modalidad = Array();
                foreach ($modalidades as $mod){
                    $mod_id = $mod->id;
                    $mod_name = $mod->nombre;
                    $modalidad[$mod_id] = $mod_name;
                }
                ?>
                <!--foreach supervisor from supervisor DB table there will be a row with the following structure-->
                <?php foreach ($expedientes as $e) {?>
                <tr id="<?php echo $e->id_expediente; ?>">
                    <td><?php echo $e->fecha_ingreso; ?></td>
                    <td><?php echo $e->id_expediente; ?></td>
                    <td><?php echo $e->num_expediente; ?></td>
                    <td><?php $id_mod = $e->id_modalidad; echo $modalidad[$id_mod];?></td>
                    <td><?php $id_sec = $e->seccion_circuito_zona; echo $seccion[$id_sec];?></td>
                    <td><a href="#" class="call_edit_exp"><i class="fa fa-pencil" aria-hidden="true"></i> Ver/Editar</a></td>
                    <!--<td><a href="#"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></td>-->
                </tr>
                <?php } ?>
            </tbody>            
        </table>
    </div>
</div>

<div id="fondo_gris" class="gray-backgroud"></div>

<!--pop up de Nuevo Expediente-->
<div id="new_exp_pop" class="edit-popup">
    <div class="popup-head"> 
        <div class="close"><a href="#" id="cerrar_popup_eliminar"><i class="fa fa-window-close" aria-hidden="true"></i></a></div>      
        
        <h3>Nuevo Expediente:</h3>
    </div>
    <div>
        <form action="<?php echo base_url();?>expediente/nuevo">
            <!--fecha de ingreso-->
            <input type="text" class="datepicker" id="fecha_expte" placeholder="Seleccione una fecha" name="fecha_ingreso" />
            <input type="text" id="nro_transac" disabled="disabled" name="nro_transac" title="éste nro se generará automaticamente al guardar el nuevo expediente." />
            <input type="text" id="nro_expediente" placeholder="Nro de Expediente" name="nro_expediente" />
            <input type="text" id="nro_escuela" placeholder="Nro de Escuela" name="nro_escuela" />
            
            <!--iniciador-->
            <div>
                Iniciador:
                <select id="iniciador" name="iniciador">
                    <option value=""></option>
                    <option id="new_iniciador" value="new">Otro</option>
                <?php foreach ($supervisores as $iniciador) { ?>
                    <option value="<?php echo $iniciador->nombre;?>"><?php echo $iniciador->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nuevo_iniciador" name="nuevo_iniciador" placeholder="Ingrese el nombre del iniciador" />
            </div>
            
            <!--supervisor-->
            <div>
                Supervisor:
                <select id="supervisor" name="supervisor">
                    <option value=""></option>
                    <option id="new_supervisor" value="new">Nuevo</option>
                <?php foreach ($supervisores as $supervisor) { ?>
                    <option value="<?php echo $supervisor->id_supervisor;?>"><?php echo $supervisor->nombre; ?></option>  
                <?php } ?>
                </select>
                <!--Show popup to create a new supervisor if new is selected above-->
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
            
            <!--dependencia-->
            <div>
                Dependencia:
                <select id="dependencia" name="dependencia">
                    <option value=""></option>
                    <option id="new_dependencia" value="new">Nueva</option>
                <?php foreach ($dependencias as $dependencia) { ?>
                    <option value="<?php echo $dependencia->id_dependencia;?>"><?php echo $dependencia->nombre_dependencia; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_dependencia" name="nueva_dependencia" placeholder="Ingrese la nueva dependencia" />
            </div>
            
            <!--modalidad-->
            <div>
                Modalidad:
                <select id="modalidad" name="modalidad">
                    <option value=""></option>
                    <option id="new_modalidad" value="new">Nueva</option>
                <?php foreach ($modalidades as $modalidad) { ?>
                    <option value="<?php echo $modalidad->id;?>"><?php echo $modalidad->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_modalidad" name="nueva_modalidad" placeholder="Ingrese la nueva modalidad" />
            </div>
            
            <input type="text" id="referencia" placeholder="Ingrese una referencia" name="referencia" />
            
            <input type="text" id="folio" placeholder="Folios" name="folio" />
            
            <!--submit is hidden, gets fired up with "guardar button" bellow-->
            <input id="nuevo_exp_submit" type="submit" style="display: none;" />
        </form>
    </div>
    <!--Tabla de pases es innecesaria en el pop up para NUEVO expediente (no existen pases aún)-->
<!--    <div class="item-list" style="margin: 20px auto; border: 1px solid #ccc;">
        <h3>Pases:</h3>
        <table>
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Folios</td>
                    <td>Asignación</td>
                    <td>Supervisor</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>-->
    <div>
        <input id="guardar_expediente" type="button" value="Guardar" />
        <input class="cancelar" id="cancelar4" type="button" value="Cancelar" />
    </div>
</div>

<!--pop up de Nuevo Supervisor-->
<div id="new_sup_pop" class="edit-popup">
    <div class="popup-head">
        <h3>Nuevo Supervisor:</h3>
    </div>
    <div>
        <form action="<?php echo base_url();?>supervisor/nuevo_exp">
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
                <select id="new_mod_sel_sup" name="modalidad">
                    <option value=""></option>
                    <option id="nueva_mod_opt_sup" value="new">Nueva</option>
                <?php foreach ($modalidades as $modalidad) { ?>
                    <option value="<?php echo $modalidad->id;?>"><?php echo $modalidad->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_modalidad_sup" name="nueva_modalidad_sup" placeholder="Ingrese la nueva modalidad" />
            </div>
            <!--zona/secc/niv-->
            <div>
                Sección:
                <select id="new_sec_sel_sup" name="seccion">
                    <option value=""></option>
                    <option id="nueva_sec_opt_sup" value="new">Nueva</option>
                <?php foreach ($secciones as $seccion) { ?>
                    <option value="<?php echo $seccion->id_zona;?>"><?php echo $seccion->nombre_zona; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_seccion_sup" name="nueva_seccion_sup" placeholder="Ingrese la nueva sección" />
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

<!--pop up de Expediente-->
<div id="fondo_gris" class="gray-backgroud"></div>
<div id="edit_exp_pop" class="edit-popup">
    <div class="popup-head">
        <div class="close"><a href="#" id="cerrar_popup_pase"><i class="fa fa-window-close" aria-hidden="true"></i></a></div>
        <h3>Expediente:</h3>
    </div>
    <div>
        <form action="<?php echo base_url();?>expediente/guardar">
            <!--fecha de ingreso-->
            <input type="text" class="datepicker" id="fecha_expte_edit" placeholder="Seleccione una fecha" name="fecha_ingreso" disabled="disabled" />
            <input type="text" id="nro_transac_edit" disabled="disabled" name="nro_transac" title="éste nro se generará automaticamente al guardar el nuevo expediente." />
            <input type="text" id="nro_expediente_edit" disabled="disabled" placeholder="Nro de Expediente" name="nro_expediente" />
            <input type="text" id="nro_escuela_edit" disabled="disabled" placeholder="Nro de Escuela" name="nro_escuela" />
            
            <!--iniciador-->
            <div>
                Iniciador:
                <input type="text" id="iniciador_edit" disabled="disabled" placeholder="Iniciador" name="iniciador" />
<!--                <select id="iniciador_edit" name="iniciador">
                    <option value=""></option>
                    <option id="new_iniciador" value="new">Otro</option>
                <?php foreach ($supervisores as $iniciador) { ?>
                    <option value="<?php echo $iniciador->nombre;?>"><?php echo $iniciador->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nuevo_iniciador" name="nuevo_iniciador" placeholder="Ingrese el nombre del iniciador" />-->
            </div>
            
            <!--supervisor-->
            <div>
                Supervisor:
                <select id="supervisor_edit" disabled="disabled" name="supervisor">
                    <option value=""></option>
                    <option id="new_supervisor" value="new">Nuevo</option>
                <?php foreach ($supervisores as $supervisor) { ?>
                    <option value="<?php echo $supervisor->id_supervisor;?>"><?php echo $supervisor->nombre; ?></option>  
                <?php } ?>
                </select>
                <!--Show popup to create a new supervisor if new is selected above-->
            </div>
            
            <!--zona/secc/niv-->
            <div>
                Sección:
                <select id="new_sec_sel_edit" disabled="disabled" name="seccion">
                    <option value=""></option>
                    <option id="nueva_sec_opt" value="new">Nueva</option>
                <?php foreach ($secciones as $seccion) { ?>
                    <option value="<?php echo $seccion->id_zona;?>"><?php echo $seccion->nombre_zona; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_seccion" name="nueva_seccion" placeholder="Ingrese la nueva sección" />
            </div>
            
            <!--dependencia-->
            <div>
                Dependencia:
                <select id="dependencia_edit" disabled="disabled" name="dependencia">
                    <option value=""></option>
                    <option id="new_dependencia" value="new">Nueva</option>
                <?php foreach ($dependencias as $dependencia) { ?>
                    <option value="<?php echo $dependencia->id_dependencia;?>"><?php echo $dependencia->nombre_dependencia; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_dependencia" name="nueva_dependencia" placeholder="Ingrese la nueva dependencia" />
            </div>
            
            <!--modalidad-->
            <div>
                Modalidad:
                <select id="modalidad_edit" disabled="disabled" name="modalidad">
                    <option value=""></option>
                    <option id="new_modalidad" value="new">Nueva</option>
                <?php foreach ($modalidades as $modalidad) { ?>
                    <option value="<?php echo $modalidad->id;?>"><?php echo $modalidad->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_modalidad" name="nueva_modalidad" placeholder="Ingrese la nueva modalidad" />
            </div>
            
            <input type="text" id="referencia_edit" disabled="disabled" placeholder="Ingrese una referencia" name="referencia" />
            
            <!--<input type="text" id="folio_edit" disabled="disabled" placeholder="Folios" name="folio" />-->
            
            <!--submit is hidden, gets fired up with "guardar button" bellow-->
            <input id="nuevo_exp_submit" type="submit" style="display: none;" />
        </form>
    </div>
    <!--Tabla de pases es innecesaria en el pop up para NUEVO expediente (no existen pases aún)-->
    <h3>Pases:<span style="float: right; font-size: 14px; margin-right: 20px;"><a id="nuevo_pase" href="#" style="vertical-align: sub;"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo pase</a></span></h3>
    <div class="item-list" style="margin: 20px auto; border: 1px solid #ccc;">
        <table id="tabla_pases_edit">
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Folios</td>
                    <td>Asignación</td>
                    <td>Supervisor</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div>
        <!--<input id="guardar_expediente" type="button" value="Guardar" />-->
        <input class="cancelar" id="cancelar5" type="button" value="Cancelar"  />
    </div>
</div>

 
        
<div id="fondo_gris9" style="background-color: rgba(0, 0, 0, 0.4); height: 300%; position: absolute; width: 100%; display: none; top: 0; left: 0" class="gray-backgroud"></div>
<div id="nuevo_pase_pop" class="edit-popup">
    <div class="popup-head">
        <div class="close"><a href="#" id="cerrar_popup_eliminar_pase"><i class="fa fa-window-close" aria-hidden="true"></i></a></div>      
    

        <h3>Nuevo Pase:</h3>
    </div>
    <div>
        <form action="<?php echo base_url();?>expediente/new_pase">
            <input type="text" style="display:none" id="id_exp_pase" name="id_exp" />
            <input type="text" class="datepicker" id="fecha_nuevo_pase" placeholder="Seleccione una fecha" name="fecha_pase" />
            <input type="text" id="folio_pase" placeholder="Folios" name="folio" />
            <div>
                Asignación:
                <select id="dependencia_pase" name="dependencia">
                    <option value=""></option>
                    <option id="new_dependencia" value="new">Nueva</option>
                <?php foreach ($dependencias as $asig) { ?>
                    <option value="<?php echo $asig->id_dependencia;?>"><?php echo $asig->nombre_dependencia; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_asignacion_pase" name="nueva_asignacion" placeholder="Ingrese la dependencia" />
            </div>
            <div>
                Supervisor:
                <select id="supervisor_pase" name="supervisor">
                    <option value=""></option>
                <?php foreach ($supervisores as $sup) { ?>
                    <option value="<?php echo $sup->id_supervisor;?>"><?php echo $sup->nombre; ?></option>  
                <?php } ?>
                </select>
                <!--Show popup to create a new supervisor if new is selected above-->
            </div>
            <input id="nuevo_pase_submit" type="submit" style="display: none;" />
        </form>
    </div>
    <div>
        <input id="guardar_pase" type="button" value="Guardar" />
        <input class="cancelar" id="cancelar69" type="button" value="Cancelar"  />
    </div>
</div>

<!--campos con los nombres necesarios para mostrar los datos-->
<div style="display: none">
    
     <?php
 foreach ($supervisores as $s) {?>
    <input id="sup_<?php echo $s->id_supervisor; ?>" value="<?php echo $s->nombre;?>" />
 <?php }    ?>
    
    <?php
 foreach ($dependencias as $d) {?>
    <input id="dep_<?php echo $d->id_dependencia; ?>" value="<?php echo $d->nombre_dependencia;?>" />
 <?php }    ?>
</div>

<h2 id="pase_exito" style="display: <?php echo $pase;?>; background-color: lightgreen; top:0; width: 100%; position:absolute">Nuevo pase generado con éxito</h2>