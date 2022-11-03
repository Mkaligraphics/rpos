
$(document).ready(function(){

 $(document).on('click','.deleteingredient',function(){
      let thisId = $(this).attr('id');
      let tr = $(this).parent().parent();
      let amount = tr.find('#amount').val();
      let foodid = $("#foodid").val();

         swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            buttons:{
              cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
              },              
              confirm: {
                text : 'Yes, delete it!',
                className : 'btn btn-success'
              }
            }
          }).then((willDelete) => {
            if (willDelete) {

              $.post("process/delingredient.php", {thisId:thisId, amount:amount, foodid:foodid}, function(data){
                   if (data == 1) {
                    swal("Ingredient deleted successful!", {
                      icon: "success",
                      buttons : {
                        confirm : {
                          className: 'btn btn-success'
                        }                  
                      }
                    });
                  } else {
                    swal("Error!", "Pleae try again" , {
                      icon : "info",
                      buttons: {              
                        confirm: {
                          className : 'btn btn-info'
                        }
                      },
                    });
                  }

              });              

            } else {
              swal("Your imaginary records are safe!", {
                buttons : {
                  confirm : {
                    className: 'btn btn-success'
                  }
                }
              });
            }
          });
});

    $(document).on('click','.editingredient',function(){
      let thisId = $(this).attr('id');
         $.ajax({
                url : "harvests/getbominfo.php",
                 method : "POST",
                dataType: "json",
                   data : {thisId:thisId},
                success : function(data){                    
                   $("#quantity").val(data.quantity)
                   $('#product').val(data.productid).prop('selected',true);
                   $('#uom').val(data.uom).prop('selected',true);
                   $('#productid').val(data.productid);
                   $('#cost').val(data.total);
                   $('#fid').val(data.foodid);
                   $('#rowid').val(data.id);

                }
            });

    });

$(document).on('keyup','#quantity',function(){
      let productid = $("#productid").val();
      let quantity = $("#quantity").val();

      $.ajax({
                url : "harvests/bomamount.php",
                 method : "POST",
                   data : {productid:productid, quantity:quantity},
                success : function(data){                    
                  $("#cost").val(parseFloat(data).toFixed(2));
                }
            });

  });


});

$(document).on('submit','form.changebom',function(event){
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
    
          $.ajax({
                  url: url,
                    type: type,                                    
                    data:  data,  
                    
                success: function(feedback){ 
                  $('.bomfeed').html(feedback);
            }

  });     

    return false;
});
//end;
$(document).on('click','.bomadd',function(){
  let foodid = $("#foodid").val();
  $("#food").val(foodid);
});

$(document).on('keyup','#addquantity',function(){
      let productid = $("#addproduct").val();
      let quantity = $("#addquantity").val();

if (productid == 0 || isNaN($(this).val())){
      alert("Please  select product and unit");
      $("#addquantity").val(0);
      $("#addcost").val(parseFloat(0).toFixed(2));
} else {

   checkbomcost(productid, quantity);

}      

  });

$(document).on('change','#addproduct',function(){
    let that = $(this).val();
    let  quantity = $('#addquantity').val();
      checkbomcost(that, quantity);
});

function checkbomcost(productid, quantity ){
   $.ajax({
                    url : "harvests/bomcost.php",
                     method : "POST",
                     dataType:'json',
                       data : {productid:productid, quantity:quantity},
                    success : function(data){               
                      
                      $("#adduom").val(data.unitname);
                      let amount = (data.costperunit * $('#addquantity').val())/data.unitquantity;
                      $("#addcost").val(parseFloat(amount).toFixed(2));

                    }
                });

}


$(document).on('submit','form.newingredient',function(event){
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
    
          $.ajax({
                  url: url,
                    type: type,                                    
                    data:  data,  
                    
                success: function(feedback){ 
                  $('.addbomfeed').html(feedback);
            },complete:function(){
              setTimeout(function(){location.reload();}, 1000);
            }

  });     

    return false;
});
//end;
