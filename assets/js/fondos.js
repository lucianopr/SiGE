$(document).ready(function(){
//    $('.search-link').click(function(){ 
//        searchbox_toggle();
//    });    
//        
   $('#checkbox_region').click(function(){        
        $(this).next(".checkbox-container").show();     
        return false;
    }); 
    
  $('#abrir_popup').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });
    
    $('.edit-action').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });
    $('#new_supervisor').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });
    $('.eliminar-action').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });
      $('.eliminar-supervisor').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });
    $('.edit-supervisor').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });
    $('#cerrar_popup_nuevo').click(function(){
        $(this).parent().parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
    $('#cerrar_popup_edit').click(function(){
        $(this).parent().parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
    $('#cerrar_popup_eliminar').click(function(){
        $(this).parent().parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
    $('#cancelar').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
      $('#cancelar_supervisor').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
    $('#cancelar2').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
    
    
});

