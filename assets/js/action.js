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
    
//    funciones de SECCION
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
            alert('Introduzca el nombre de la sección');
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