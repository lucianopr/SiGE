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
        <form action="#">
            <input name="nombre_supervisor" placeholder="Título" type="text"/>
            <select>
                <option>Sección</option>
                <option>Sección A</option>
                <option>Sección B</option>
                <option>Sección C</option>
            </select>
<!--            <input type="button" value="Región"/>-->
<!--            <div class="checkbox-container">
                <h4>Filtrar expediente por región asignada</h4>
                <hr />
                <p><input type="checkbox" name="check_region" value="r1" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r2" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r3" /> Región 1</p>
                <p><input type="checkbox" name="check_region" value="r4" /> Región 1</p>
            </div>-->
<!--            <input type="button" value="Zona"/>
            <div class="checkbox-container">
                <h4>Filtrar expediente por zona</h4>
                <hr />
                <input type="checkbox" name="check_zona" value="z1" />
                <input type="checkbox" name="check_zona" value="z2" />
                <input type="checkbox" name="check_zona" value="z3" />
                <input type="checkbox" name="check_zona" value="z4" />
            </div>-->
            <input type="text" placeholder="Nro de Expediente" name="num_expediente" />
            <input type="text" placeholder="Nro Interno" name="num_interno" />
            <input type="text" placeholder="Escuela Nro"/>
<!--            <div class="checkbox-container">
                <h4>Filtrar expediente por nro de escuela</h4>
                <hr />
                <input type="checkbox" name="check_escuela" value="1" />
                <input type="checkbox" name="check_escuela" value="2" />
                <input type="checkbox" name="check_escuela" value="3" />
                <input type="checkbox" name="check_escuela" value="4" />
            </div>-->
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
                    <td><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <!--foreach supervisor from supervisor DB table there will be a row with the following structure-->
                <?php for($i=1; $i<=18; $i++){?>
                <tr>
                    <td>99/99/9999</td>
                    <td>999999</td>
                    <td>99999999999</td>
                    <td>ASDASDASD ASDASD</td>
                    <td>ASDASD999999</td>
                    <td><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Ver/Editar</a></td>
                    <td><a href="#"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>            
        </table>
    </div>
</div>

<!--pop up de Nuevo Expediente-->
<div id="new_exp_pop" class="edit-popup">
    <div class="popup-head">
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
                    <option id="new_iniciador" value="new">Nuevo</option>
                <?php foreach ($iniciadores as $iniciador) { ?>
                    <option value="<?php echo $iniciador->id;?>"><?php echo $iniciador->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nuevo_iniciador" name="nuevo_iniciador" placeholder="Ingrese un nuevo iniciador" />
            </div>
            
            <!--supervisor-->
            <div>
                Supervisor:
                <select id="supervisor" name="supervisor">
                    <option value=""></option>
                    <option id="new_supervisor" value="new">Nuevo</option>
                <?php foreach ($iniciadores as $iniciador) { ?>
                    <option value="<?php echo $iniciador->id;?>"><?php echo $iniciador->nombre; ?></option>  
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
                    <option value="<?php echo $dependencia->id;?>"><?php echo $dependencia->nombre; ?></option>  
                <?php } ?>
                </select>
                <input style="display: none;" type="text" id="nueva_dependencia" name="nueva_dependencia" placeholder="Ingrese la nueva dependencia" />
            </div>
            
            <input type="text" id="referencia" placeholder="Ingrese una referencia" name="referencia" />
            
            <!--submit is hidden, gets fired up with "guardar button" bellow-->
            <input id="nuevo_sup_submit" type="submit" style="display: none;" />
        </form>
    </div>
    <div class="item-list" style="margin: 20px auto; border: 1px solid #ccc;"><!--tabla de pases-->
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
    </div>
    <div>
        <input id="guardar_supervisor" type="button" value="Guardar" />
        <input id="cancelar" type="button" value="Cancelar" />
    </div>
</div>