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
  
    $('#nuevo_exp').click(function(){        
        $('#fondo_gris').fadeIn('slow');     
        return false;
    });    
    $('#nueva_seccion').click(function(){        
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
      $('#cerrar_popup_pase').click(function(){
        $(this).parent().parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
     $('#cerrar_popup_eliminar_edit').click(function(){
        $(this).parent().parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
     $('#cerrar_popup_eliminar_pase').click(function(){
        $(this).parent().parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris9').fadeOut('slow');  
      
        return false;
    });
    $('#cancelar').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
    $('#cancelar4').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');      
//        $('#new_exp_pop input[type="text"]').each(function(){
//            $(this).val('');
//        });
        return false;
    });
    $('#cancelar5').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');
        $('#edit_exp_pop input[type="text"]').each(function(){
            $(this).val('');
        });
        $('#edit_exp_pop tr:gt(0)').each(function(){
            $(this).remove();
        });
        return false;
    });
    
    
    
      $('#cancelar_supervisor').click(function(){
        $(this).parent().parent('.edit-popup').fadeOut('slow');
        $('#fondo_gris').fadeOut('slow');        
        return false;
    });
      $('#cancelar_expediente').click(function(){
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

