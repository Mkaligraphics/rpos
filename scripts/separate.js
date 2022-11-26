$(function() {
    $('.chosen-select').chosen();
});


$(document).ready(function(){

     

});


$(document).on('click','.product',function(){
    let product_id = $(this).attr("id");
    $(this).parent().parent().hide();      
    $.ajax({
                        url : "harvests/separatecart.php",
                     method : "POST",
                       data : {product_id:product_id},                     
                    success : function(data){                                                
                               $('.separatecart').append(data);                                  
                       }
      });     
        
})
$(document).on('click','#cancel',function(){
    window.location.reload();
})

$(".openbtn").click(function(){
    $(".leftpanel").toggle();
});
 