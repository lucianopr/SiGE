/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    $('#pase_exito').fadeOut(5000);
    
    $('.search-link').click(function(){ 
        searchbox_toggle();
    });
    
    $('.new-link').click(function(){ 
        newboxbox_toggle();
    });
    
//    funciones de SECCION ////////////////////////////////////////////////////////////////
    $('#guardar_zona').click(function(){
        nueva_zona();
    });
    $('.edit-action').click(function(event){
        event.preventDefault();
        var id = $(this).parent().parent().attr('id');
        var nombre = $(this).parent().prev().html();
        show_zona_editbox(id, nombre);
    });
    $('#editar_zona').click(function(){
        var id = $('#id_zona_edit').val();
        var nombre = $('#edit_nombre_zona').val();
        if (nombre !== ''){
            guardar_edit_zona(id, nombre);
        }else{
            alert('Introduzca el nombre de la seccion');
        }
    });
    $('.eliminar-action').click(function(event){
        event.preventDefault();
        var id = $(this).parent().parent().attr('id');
        var nombre = $(this).parent().prev().prev().html();
        show_eliminar_popup(id, nombre);
    });
    $('#eliminar_zona').click(function(){
        var id = $('#id_zona_eliminar').val();
        eliminar_zona(id);
    });
    
//  funciones de SUPERVISOR ////////////////////////////////////////////////////////////////
    $('.eliminar-supervisor').click(function(event){
        event.preventDefault();
        var id = $(this).parent().parent().attr('id');
        var nombre = $('#nombre_sup_'+id).html();
        show_eliminar_supervisor(id, nombre);
    });
    $('#eliminar_supervisor').click(function(){
        var id = $('#id_eliminar').val();
        eliminar_supervisor(id);
    });
    $('#guardar_supervisor').click(function(){
        var nombre = $('#nombre_nuevo_sup').val();
        var dni = $('#dni_nuevo_sup').val();
        if (dni === '' || nombre === ''){
            alert('Complete los campos "Nombre" y "Documento" por favor.');
            if(nombre === ''){
                $('#nombre_nuevo_sup').focus();
            }else{
                $('#dni_nuevo_sup').focus();
            }
        }else{
            $('#nuevo_sup_submit').click();
        }
    });
    $('#new_niv_sel').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nuevo_nivel').show();
        }else{
            $('#nuevo_nivel').hide();
        }
    });
    $('#new_mod_sel').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_modalidad').show();
        }else{
            $('#nueva_modalidad').hide();
        }
    });
    $('#new_mod_sel_sup').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_modalidad_sup').show();
        }else{
            $('#nueva_modalidad_sup').hide();
        }
    });
    $('#new_sec_sel').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_seccion').show();
        }else{
            $('#nueva_seccion').hide();
        }
    });
    $('#new_sec_sel_sup').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_seccion_sup').show();
        }else{
            $('#nueva_seccion_sup').hide();
        }
    });
    $('#new_sit_sel').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_situacion').show();
        }else{
            $('#nueva_situacion').hide();
        }
    });
    $('#nuevo_nivel').change(function(){
        $('#nuevo_niv_opt').val($(this).val());
    });
    $('#nueva_modalidad').change(function(){
        $('#nueva_mod_opt').val($(this).val());
    });
    $('#nueva_seccion').change(function(){
        $('#nueva_sec_opt').val($(this).val());
    });
    $('#nueva_situacion').change(function(){
        $('#nueva_sit_opt').val($(this).val());
    });
    $('#new_supervisor').click(function(){
        $('#new_sup_pop').slideToggle();
    });
    $('.edit-supervisor').click(function(e){
        e.preventDefault();
        var id_sup = $(this).parent().parent().attr('id');
        ver_supervisor(id_sup);
    });
    $('#guardar_supervisor2').click(function(){
        var nombre = $('#nombre_nuevo_sup2').val();
        var dni = $('#dni_nuevo_sup2').val();
        if (dni === '' || nombre === ''){
            alert('Complete los campos "Nombre" y "Documento" por favor.');
            $('#nombre_nuevo_sup').focus();
        }else{
            $('#nuevo_sup_submit2').click();
        }
    });
    $('#cancelar').click(function(){
        $(this).parent().parent().slideUp();
    });
    
    $('#cancelar2').click(function(){
        $(this).parent().parent().slideUp();
    });
    $('#cancelar3').click(function(){
        $(this).parent().parent().slideUp();
    });
     $('#cancelar4').click(function(){
        $(this).parent().parent().slideUp();
    });
     $('#cancelar69').click(function(){
        $('#nuevo_pase_pop').slideUp();
        $('#fondo_gris9').slideUp();
        
    });
    
//    funciones de EXPEDIENTE ////////////////////////////////////////////////////////////////
    $('#nuevo_exp').click(function(){
        set_nro_transaccion(); //setea el nro de transaccion (AUTO_INCREMENT de la tabla expediente) y abre el popup
    });
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $('.datepicker').datepicker();
    $('#iniciador').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nuevo_iniciador').show();
        }else{
            $('#nuevo_iniciador').hide();
        }
    });
    $('#supervisor').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#new_sup_pop').show();
        }else{
            $('#new_sup_pop').hide();
        }
    });
    $('#dependencia').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_dependencia').show();
        }else{
            $('#nueva_dependencia').hide();
        }
    });
    $('#guardar_expediente').click(function(){
        if ($('#fecha_expte').val() !== ''){
            if ($('#supervisor').val() !== ''){
                if ($('#new_sec_sel').val() !== ''){
                    if ($('#modalidad').val() !== ''){
                        $('#nuevo_exp_submit').click();
                    }else{
                        alert('Seleccione una modalidad');
                    }
                }else{
                    alert('Seleccione una sección')
                }
            }else{
                alert('Seleccione un supervisor');
            }
        }else{
            alert('Seleccione una fecha');
        }
    });
    $('#modalidad').change(function(){
        if ($(this).val() === 'new'){
            $('#nueva_modalidad').show();
        }else{
            $('#nueva_modalidad').hide();
        }
    });
    
    $('.call_edit_exp').click(function(){
        var exp_id = $(this).parent().parent().attr('id');
        show_edit_exp(exp_id);
//        $('#edit_exp_pop').show();
    });
    
    $('#nuevo_pase').click(function(){
        $('#nuevo_pase_pop').fadeIn();
        $('#id_exp_pase').val($('#nro_transac_edit').val());
        $('#fondo_gris9').fadeIn();
    });
    
    $('#dependencia_pase').change(function(){
        if ($(this).val() === 'new'){
            $('#nueva_asignacion_pase').show();
        }else{
            $('#nueva_asignacion_pase').hide();
        }
    });
    
    $('#guardar_pase').click(function(){
        if($('#fecha_nuevo_pase').val() !== ''){
            if($('#folio_pase').val() !== ''){
                if ($('#dependencia_pase').val() !== ''){
                    if ($('#supervisor_pase').val() !== ''){
                        $('#nuevo_pase_submit').click();
                    }else{
                        aler('Seleccione un supervisor');
                    }
                }else{
                    alert('Seleccione la nueva asignación');
                }
            }else{
                alert('Complete el campo "Folio"');
            }
        }else{
            alert('Ingrese una fecha');
        }
    });
    
    $('#nro_expediente_edit').change(function(){
        var num = $('#nro_expediente_edit').val();
        $('#fondo_gris10').show();
        $('#eliminar_msj').html('Se cambiara el numero de expediente a '+num+'. Desea guardar el nuevo nro?');
        $('#edit_nro_exp_popup').show();
    });
    $('#editar_nro_expte').click(function(){
        var num = $('#nro_expediente_edit').val();
        var id = $('#nro_transac_edit').val();
        editar_nro_exp(num, id);
    });
    $('#cancelar_edit_exp').click(function(){
        $('#edit_nro_exp_popup').hide();
        $('#fondo_gris10').hide();
        $('#cancelar5').click();
    });
    
});

function searchbox_toggle(){
    $('.search-fields').slideToggle();
}
function newboxbox_toggle(){
    $('#nueva_zona_popup').slideToggle();
}

//funciones de SECCION
function nueva_zona(){
    var nombre_zona = $('#nueva_zona').val();
    if (nombre_zona !== ''){    
        $.ajax({
            url: '/seccion/nueva',
            method: 'POST',
            data: 'nombre_zona='+nombre_zona,
            success: function(response){
                if (response === 'already exists'){
                    alert('Error: ya existe una sección con el nombre '+nombre_zona);
                }else if (response === true || response === '1'){
                    alert('La nueva sección/zona fue guardada con éxito.');
                    location.reload();
                }else{
                    alert('Ups.. ocurrió algún error al momento de guardar el nuevo nombre. Intente de nuevo.');
                }
            },
            error: function(data){
                alert('ocurrió un error ('+data+'). Intente de nuevo.');
            }
        });
        $('#nueva_zona').val('');
    }else{
        alert('El nombre de la nueva sección no puede quedar vacío.');
    }
    $('#nueva_zona_popup').slideToggle();
}
function show_zona_editbox(id, nombre){
    $('#edit_nombre_zona').val(nombre);
    $('#id_zona_edit').val(id);
    $('#editar_zona_popup').slideToggle();
}
function guardar_edit_zona(id, nombre){
    $.ajax({
        url: '/seccion/editar',
        method: 'POST',
        data: 'id='+id+'&nombre_zona='+nombre,
        success: function(response){
            if (response === 'already exists'){
                alert('Error: ya existe una sección con el nombre '+nombre);
            }else if (response === true || response === '1'){
                alert('La sección/zona fue editada con éxito.');
                location.reload();
            }else{
                alert('Ups.. ocurrió algún error al momento de guardar el nuevo nombre. Intente de nuevo.');
            }
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo.');
        }
    });
}
function show_eliminar_popup(id, nombre){
    $('#eliminar_nombre_zona').val(nombre);
    $('#id_zona_eliminar').val(id);
    $('#eliminar_msj').html('¿Eliminar la sección '+nombre+'?');
    $('#eliminar_popup').slideToggle();
}
function eliminar_zona(id){
    $.ajax({
        url: '/seccion/eliminar',
        method: 'POST',
        data: 'id='+id,
        success: function(result){
            if (result === '1' || result === true){
                alert('La sección/zona ha sido eliminada.');
                location.reload();
            }else{
                alert('Ups.. ocurrió algún error al intentar eliminar la sección. Intente de nuevo.');
            }
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo.');
        }
    });
}
//fin funciones de SECCION

//funciones de SUPERVISOR
function show_eliminar_supervisor(id, nombre){
    $('#eliminar_nombre').val(nombre);
    $('#id_eliminar').val(id);
    $('#eliminar_msj').html('Esta por eliminar al supervisor '+nombre+'. Realmente quiere eliminarlo?');
    $('#eliminar_popup').slideToggle();
}
function eliminar_supervisor(id){
    $.ajax({
        url: '/supervisor/eliminar',
        method: 'POST',
        data: 'id='+id,
        success: function(result){
            if (result === '1' || result === true){
                alert('El supervisor ha sido eliminado.');
                location.reload();
            }else{
                alert('Ups.. ocurrió algún error al intentar eliminar el supervisor. Intente de nuevo.');
            }
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo o contacte al administrador del sistema.');
        }
    });
}
function ver_supervisor(id){
    $.ajax({
        url: '/supervisor/get_supervisor',
        method: 'GET',
        data: 'id='+id,
        success: function(result){
            var sup = JSON.parse(result);
            sup = sup[0];
            poblar_edit_popup(sup);
            $('#edit_sup_pop').slideToggle();
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo o contacte al administrador del sistema.');
        }
    });
}
function poblar_edit_popup(s){
    $('#edit_sup_id').val(s.id_supervisor);
    $('#new_niv_sel2').val(s.id_nivel);
    $('#new_mod_sel2').val(s.id_modalidad);
    $('#new_sec_sel2').val(s.id_zona);
    $('#new_sit_sel2').val(s.id_sit_revista);
    $('#nombre_nuevo_sup2').val(s.nombre);
    $('#tel_sup_edit').val(s.tel);
    $('#email_sup_edit').val(s.email);
    $('#dni_nuevo_sup2').val(s.dni);
    $('#domic_sup_edit').val(s.domicilio);
    $('#localidad_sup_edit').val(s.localidad);
    $('#cp_sup_edit').val(s.cod_postal);
}

function set_nro_transaccion(){
    $.ajax({
        url: '/expediente/get_nro_transaccion',
        method: 'GET',
        success: function(result){
            $('#nro_transac').val(result);
            $('#new_exp_pop').slideToggle();
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo o contacte al administrador del sistema.');
        }
    });
}

function show_edit_exp(id){
    $.ajax({
        url: '/expediente/get_expediente_id',
        method: 'GET',
        data: 'id='+id,
        dataType: 'json',
        success: function(result){
            var exp = result.exp[0];//obtenemos el objeto Expediente
            var pases = result.pases;//obtenemos un Array con uno o más objetos Pase
            poblar_exp_edit(exp, pases);
            $('#edit_exp_pop').show();
            $('#fondo_gris').fadeIn('slow');             
//            alert(exp.id_expediente);
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo o contacte al administrador del sistema.');
        }
    });
}

function poblar_exp_edit(e, p){
    $('#fecha_expte_edit').val(e.fecha_ingreso);
    $('#nro_transac_edit').val(e.id_expediente);
    $('#nro_expediente_edit').val(e.num_expediente);
    $('#nro_escuela_edit').val(e.num_escuela);
    $('#iniciador_edit').val(e.iniciador);
    $('#supervisor_edit').val(e.id_supervisor);
    $('#new_sec_sel_edit').val(e.seccion_circuito_zona);
    $('#dependencia_edit').val(e.id_dependencia);
    $('#modalidad_edit').val(e.id_modalidad);
    $('#referencia_edit').val(e.referencia);
    
    var ix = p.length;
    for (i = 0; i < ix; i++){
        var pase = p[i];
//        alert(pase.dependencia);
        var n_dep = $('#dep_'+pase.dependencia).val(); 
//        alert(n_dep);
        var n_sup = $('#sup_'+pase.id_supervisor).val();
        
        $('#tabla_pases_edit tr:last').after('<tr><td>'+pase.fecha+'</td><td>'+pase.folio+'</td><td>'+n_dep+'</td><td>'+n_sup+'</td></tr>');
//        alert(pase.id_pases);
    }
//    $('#myTable tr:last').after('<tr>...</tr><tr>...</tr>');
    
}

function editar_nro_exp(num, id){
    $.ajax({
        url: '/expediente/edit_nro_exp',
        method: 'POST',
        data: 'id='+id+'&num='+num,
        dataType: 'json',
        success: function(){
            alert('El nuevo nro. fue modificado correctamente.');
        },
        error: function(data){
            alert('ocurrió un error ('+data+'). Intente de nuevo o contacte al administrador del sistema.');
        }
    });
    $('#edit_nro_exp_popup').hide();
    $('#fondo_gris10').hide();
}