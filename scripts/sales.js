
$(function() {
    $('.chosen-select').chosen();
});

$(document).on('keyup', '#search',function(){
    let search = $(this).val();
     let categoryid = $("#categoryid").val();
         if (!(categoryid)){
                swal("Error!", "You must select category for a better filter","error");
         } else{
              
              $.ajax({
                      url:'harvests/products.php',
                      method: "POST",
                      data:{search:search, categoryid:categoryid},
                      success: function(data) {  
                          $('.items').html(data);
                  }    
            });

         }              
    
});


//plus and minus button
  $(document).ready(function(){
    $('#qty_input').prop('disabled', true);
    $('#plus-btn').click(function(){
      $('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
          });
        $('#minus-btn').click(function(){
      $('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
      if ($('#qty_input').val() == 0) {
      $('#qty_input').val(1);
    }

          });
 });


//category dependency
$(document).on('change','#categorisedFood',function(){ 
        let categoryId = $(this).val(); 
            $.ajax({
                    url:'harvests/products.php',
                    method: "post",
                    data:{categoryId:categoryId},
                    success: function(data) {                       
                        $('.items').html(data);
                      }
               });
});

//call the category available 
categorytable();
function categorytable(){ 
    let categoryquery = $(".categoryquery").val();
                $.ajax({
                    url:'harvests/category.php',
                    method: "post",
                    data:{ categoryquery:categoryquery},
                    success: function(data) {                       
                      $('.categorydisplay').html(data);                                              
                }

               });
 }


 productstable();
function productstable(){ 
  let categoryid = $('#categoryquery').val();
                $.ajax({
                  url:'harvests/products.php',
                    method: "post",
                    data:{ categoryid:categoryid},
                    success: function(data) {                       
                      $('.items').html(data);                                          
                }

               });
 }


 $(document).on('click','.categoryItem',function(){
  let item = $(this).attr('id');
        $.ajax({
          url:'harvests/products.php',
          method: "post",
          data:{ item:item},
          success: function(data) {                       
            $('.items').html(data);   
            $("#categoryid").val(item);                               
      }

      });
  
});

 $(document).on('keyup','#categoryquery',function(){
    let categoryquery = $(this).val();
          $.ajax({
              url:'harvests/category.php',
              method: "post",
              data:{ categoryquery:categoryquery},
              success: function(data) {                       
                $('.categorydisplay').html(data);                       
          }
        });

    
 });


$(document).on('click','.stw_id',function(e){ e.preventDefault();
  let   product_id = $(this).attr('id'),
        product_name =  $('#name'+product_id).val(),
        product_price =  $('#item_price'+product_id).val(),
        product_quantity = $('#product_quantity'+product_id).val(),      
        action = "add";


    $.ajax({
                        url : "process/actioncart.php",
                     method : "POST",
                       data : {product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
                     
                    success : function(data){                                                
                               $('.cart').html(load_cart_data());                                  
                       }
      });
       
      
  });

//preparing the cart 
function load_cart_data()
  {
    $.ajax({
      url:"harvests/fetch_food.php",
      method:"POST",
      success:function(data)
      {

        $('.cart').html(data);
                let n = 0;
                    $(".number").each(function(){
                          $(this).html(++n);
                    });   
      }
    });
  }

load_cart_data();

//delete each row
$(document).on('click', '.delete', function(){
    var product_id = $(this).attr("id");
    var action = 'remove';

 swal({
                          title: "Delete this product?",
                          icon: "warning",
                         buttons: [
                          'No, cancel',
                          'Yes, confirm'
                        ],
                          dangerMode: true,
                        })
                .then((willDelete) => {
                  if (willDelete) {
                  $.ajax({
                                url:"process/actioncart.php",
                                method:"POST",
                                data:{product_id:product_id, action:action},
                                success:function()   {
                                load_cart_data();      
                              $.notify('Item removed successfuly','success') ;     
                          } 
                        });
                    } 
                });

  });

//clear the cart
$(document).on('click', '#clear_cart', function(){
    var action = 'empty';

                swal({
                          title: "Clear your cart?",
                          icon: "warning",
                         buttons: [
                          'No, cancel',
                          'Yes, confirm'
                        ],
                          dangerMode: true,
                        })
                .then((willDelete) => {
                  if (willDelete) {
                $.ajax({
                        url:"process/actioncart.php",
                        method:"POST",
                        data:{action:action},
                        success:function()   {
                        load_cart_data();      
                        $.notify('You have cleared your cart','success') ;     
   
                        }
                      });
                    } 
                });
    
  });
    




//calculate the price
function calprice(){
        let sub_total = 0;      
      $(".item_total").each(function(){
          sub_total = sub_total + ($(this).val() * 1);
       });

    $(".topay").html(sub_total.toFixed(2));  

    //hiden fields
  $(".pricetotal").val(sub_total.toFixed(2));
        
};

//multiply the price with quantity
$(document).on('keyup', '.qty-in', function(){  
   let qty = $(this);
    let tr = $(this).parent().parent().parent();
    if(isNaN(qty.val()) ){
      $.notify("Please Enter a valid Qty","error");
        qty.val(1);
          tr.find(".item_total").val(Number(qty.val() * tr.find("#item_price").val()).toFixed(2));
        calprice();
    }else{
        let unit =tr.find("#item_total").value,
        ttl = (qty * unit);
        tr.find(".item_total").val(Number(qty.val() * tr.find("#item_price").val()).toFixed(2) );
        calprice();
     
    }
});


$(document).on('click', '.qty-plus', function () {
   let tr =  $(this).parent().parent();
   tr.find(".qty-in").val(parseFloat(tr.find(".qty-in").val())+1);
   let trparent=tr.parent();
   let total=parseFloat(tr.find(".qty-in").val())*parseFloat(trparent.find(".item_price").val());
   trparent.find(".item_total").val(total.toFixed(2));
   calprice();
});

$(document).on('click', '.qty-minus', function () {
   let tr =  $(this).parent().parent();
   let quantity = tr.find(".qty-in").val();
if (quantity <= 1){       
        $.notify('quantity must be greater than 0!','warn')
        quantity = 1;
        calprice();
} else{
    tr.find(".qty-in").val(parseFloat(tr.find(".qty-in").val())-1);
   let trparent=tr.parent();
   let total=parseFloat(tr.find(".qty-in").val())*parseFloat(trparent.find(".item_price").val());
   trparent.find(".item_total").val(total.toFixed(2));
   calprice();
}
  

});

//Make sales forms
$(document).on('submit','form.sale',function(event){
  event.preventDefault();
      var that = $(this),
      url = that.attr('action'),
      type = that.attr('method'),
      data={};
      that.find('[name]').each(function(index,value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();
      data[name] = value;
   
    });

swal({
                          title: "Are you sure?",
                          icon: "success",
                         buttons: [
                          'No, cancel',
                          'Yes, confirm'
                        ],
                        })
                .then((willDelete) => {
                  if (willDelete) {
                              $.ajax({
                            url: url,
                            type: type,                                    
                            data:  $("#sale").serialize(),  
                            
                                success:function(feedback)  {
                                load_cart_data();      
                                    swal(feedback, {icon: "success", });
                                },complete:function(){
                                     pulltable();
                                 calluncashout();                                 
                                }
               
                        });
                    } 
                });
    
});
//end;

calluncashout();
function calluncashout(){
  let table_id = $('#table').val();
  $.post("harvests/uncashout.php", {table_id:table_id}, function(data){
        $("#uncashout").html(data);
    }); 
}

$(document).on('change','#table',function(){
  let table_id = $(this).val();
  $.post("harvests/uncashout.php", {table_id:table_id}, function(data){
    $("#uncashout").html(data);
}); 
});

$(document).on('click','.uncashout',function(){ 
    let order = $(this).attr('id'); 
    $.ajax({
                    url:'harvests/cashoutdetails.php',
                    method: "POST",
                    data:{order: order},
                    dataType:"json",
                    success: function(customerDetails) {                       
                    $("#customerName").html(customerDetails.name);
                    $("#dueDate").html(customerDetails.timestamp);
                    $("#tableNo").html(customerDetails.table_number);
                    $("#order").html(customerDetails.details);
                    $("#billN").val(customerDetails.details);    
            $(".separate").html('<a href="separate.php?rcp='+customerDetails.details+'&&table='+customerDetails.table_number+'" class="btn btn-dark"> <i class="fa fa-sort-amount-desc fa-fw"></i> Separate bill</a>');
                
                },complete:function(){
                  $.post("harvests/calluncashout.php", {order: order}, function(data){
                   $(".uncashoutItems").html(data);
                   $(".pos").html('<a href="#"='+order+'" class="btn btn-success" onClick="printJS('+"'rpos/reports/printorder?orderid="+order+"'"+')" id="printorder"> <i class="fa fa-print"></i> Print order</a>');

                   });  
                }  

          });  
       
});


$(".openbtn").click(function(){
    $(".leftpanel").toggle();
});
 


