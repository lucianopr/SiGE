<div class="page-header">
  <h1>Sección - Circuito - Zona</h1>
</div>
<div class="page-content">
    <div class="options-bar">
        <a href="#" class="search-link"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
        <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
    </div>
    <h3>Lista de Sec/niv/zona:</h3>
    <div class="item-list">
        <table>
            <thead>
                <tr>
                    <td>Sección/Nivel/Zona</td>
                    <td><i class="fa fa-pencil" aria-hidden="true"></i> Editar</td>
                    <td><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <!--foreach supervisor from supervisor DB table there will be a row with the following structure-->
                <?php foreach ($secciones as $seccion){?>
                <tr>
                    <td id="<?php echo $seccion->id_zona; ?>"><?php echo $seccion->nombre_zona; ?></td>
                    <td><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
                    <td><a href="#"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>            
        </table>
    </div>
</div>