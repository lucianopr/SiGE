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
    
    $.ajax({
        url: '/seccion/nueva',
        method: 'POST',
        data: 'nombre_zona='+nombre_zona
    });
    
}