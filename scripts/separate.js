$(function() {
    $('.chosen-select').chosen();
});

$(document).ready(function(){

   
     

});


$(document).on('click','.product',function(){
    let product_id = $(this).attr("id"),
         product_price =  $(this).parent(),

        current_rcpt = $("#rcp").val(),        
        product_name =  $('#name').val(),
        product_quantity = $('#product_quantity').val(),      
        action = "add";

        alert(product_price);

    $.ajax({
                        url : "process/separatecart.php",
                     method : "POST",
                       data : {product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
                     
                    success : function(data){                                                
                               $('.separatecart').html(load_cart_data());                                  
                       }
      });     
        
})

function load_cart_data()  {
    $.ajax({
      url:"harvests/separatecart.php",
      method:"POST",
      success:function(data) {
        $('.separatecart').html(data);
                let n = 0;
                    $(".number").each(function(){
                          $(this).html(++n);
                    });  
                }
         });
  }
load_cart_data();


$(".openbtn").click(function(){
    $(".leftpanel").toggle();
});
 