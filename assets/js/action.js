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
    
});

function searchbox_toggle(){
    $('.search-fields').slideToggle();
}
function newboxbox_toggle(){
    $('.edit-popup').slideToggle();
}

//funciones de SECCION
function nueva_zona(){
    var nombre_zona = $('#nueva_zona').val();
    if (nombre_zona != ''){    
        $.ajax({
            url: '/seccion/nueva',
            method: 'POST',
            data: 'nombre_zona='+nombre_zona,
            success: function(response){
                if (response == 'already exists'){
                    alert('Error: ya existe una sección con el nombre '+nombre_zona);
                }else if (response == true){
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
    $('.edit-popup').slideToggle();
}
//fin funciones de SECCION