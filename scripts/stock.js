$(document).ready(function(){
    $(".chosen-select").chosen();
  });

let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/products.php",
                    type:"post"
                }
  }); 

$(document).on('submit','form.newstock',function(event){
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
                                    data:data, 
                                    beforeSend: function() {                                 
                                $('#stockfeedback').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.stockfeedback').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#stockfeedback").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

});


$(document).on('click','.deleteproduct',function(){
   let productid = $(this).attr('id');
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

              $.post("process/deleteproduct.php", {productid:productid}, function(data){
                   dataTable.ajax.reload();  
                   if (data == 1) {
                    swal("Your food type has been deleted successful!", {
                      icon: "success",
                      buttons : {
                        confirm : {
                          className: 'btn btn-success'
                        }                  
                      }
                    });
                  } else {
                    swal("Error!", "Pleae try again", {
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





$(document).on('click','.editproduct',function(){
   let productid = $(this).attr('id'); 
            $.ajax({
                            url:'harvests/viewproduct.php',
                            method: "POST",
                            data:{productid: productid},
                            dataType:"json",
                            success: function(feedback) { 
                            $("#description").val(feedback.description);
                            $("#reorder").val(feedback.reorder);
                            $("#unitquantitys").val(feedback.unitquantity);
                            $("#costperunits").val(feedback.costperunit);
                            $("#unit").val(feedback.unitId).prop('selected',true);
                            $('#proid').val(feedback.id);                                                          
                            
                        }

                  });  
});

$(document).on('submit','form.editstock',function(event){
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
                                    data:data, 
                                    beforeSend: function() {                                 
                                $('#editfeed').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){ 
                          $('.editfeed').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#editfeed").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

});

$(document).on('click','.addstock',function(){
  let productid = $(this).attr('id');
  $.ajax({
                            url:'harvests/viewproduct.php',
                            method: "POST",
                            data:{productid: productid},
                            dataType:"json",
                            success: function(feedback) { 
                            $("#adddescription").val(feedback.description);
                            $("#addprice").val(feedback.costperunit);
                            $("#addunit").val(feedback.unitname);
                            $("#productid").val(feedback.id);
                            $("#addquantities").val(feedback.unitquantity);
                            
                        }

                  });  
});


$(document).on('submit','form.morestock',function(event){
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
                                    data:data, 
                                    beforeSend: function() {                                 
                                $('#addstockfeed').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){ 
                          $('.addstockfeed').html(responce); 
                            },complete:function(){        
                              setTimeout(function() { $("#addstockfeed").fadeOut(); }, 2000);
                              $('.morestock')[0].reset();

                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

});

$(document).on('keyup','#addunitquantity',function(){
      if (isNaN($(this).val()) || $(this).val() == ""){

        alert('Invalid operation');
        $(this).val(0)
        $('#addtotalcost').val(0);
        
      } else {
          let thisquantity = parseFloat($(this).val());      
          $('#addtotalcost').val(calculation(thisquantity));
          $("#paid").val(calculation(thisquantity));
      }
  
});

function calculation(totalquantity){
      let price = parseFloat($('#addprice').val());
           return price * totalquantity;
}


$(document).on('change','#status',function(){
    let status = $(this).val();
        if (status == 'debit'){
          $("#paid").val($('#addtotalcost').val());
          $("#paid").attr("readonly",true);
        } else {
          $("#paid").val(0);
          $("#paid").attr("readonly",false);
        }
});