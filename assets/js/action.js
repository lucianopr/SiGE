/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('.search-link').click(function(){ 
        searchbox_toggle();
    });
});

function searchbox_toggle(){
    $('.search-fields').slideToggle();
}