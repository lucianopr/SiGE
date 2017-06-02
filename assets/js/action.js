/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
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
            $('#nombre_nuevo_sup').focus();
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
    $('#new_sec_sel').change(function(){
        var elm = $(this);
        if (elm.val() === 'new'){
            $('#nueva_seccion').show();
        }else{
            $('#nueva_seccion').hide();
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