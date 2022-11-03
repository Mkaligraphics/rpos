$(document).ready(function(){
  $(".chosen-select").chosen();
});

$(document).on('click','#addRow',function(){
  addDirectRow();
});

function addDirectRow(){
 $.ajax({
     url : "harvests/addutensils.php",
  method : "POST",
    data : {getNewInvoiceItem:1},//,
 success : function(data){
         $("#utensils_items").append(data);
         let n = 0;
         $(".number").each(function(){
             $(this).html(++n);
         });
    }
 });
};


$(document).on('change', '.utensil_id', function(){
  var pid = $(this).val();
  var tr = $(this).parent().parent();
  var tablename="utensils";

   if ($('select option[value="' + pid + '"]:selected').length > 1) {
      $(this).val('-1').change();

       swal("Error!", "Error, You have already selected this option", {
                        icon : "error",
                        buttons: {              
                          confirm: {
                            className : 'btn btn-danger'
                          }
                        },
    });
       
            $(this).parent().parent().remove();

    } else {
  $.ajax({
          url : "harvests/getutensilsrecord.php",
           method : "POST",
          dataType: "json",
             data : {tablename:tablename ,id:pid},
          success : function(data){
              tr.find(".utensil_id").val(data["id"]);
              tr.find(".stock").val(data["quantity"]);
             
          }
      });
}

});


function deleteRow(e){
  $(e).parent().parent().remove();  
}


let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/utensils.php",
                    type:"post"
                }
  }); 

$(document).on('click','.deletedeutensil',function(){

     let deleteid = $(this).attr('id');
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

              $.post("process/deleteutensil.php", {deleteid:deleteid}, function(data){
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


$(document).on('click','.editutensil',function(){
      let deleteid = $(this).attr('id');
         $.ajax({
                    url:'harvests/viewutensil.php',
                    type:'POST',
                    data:{deleteid:deleteid},
                    dataType:'json',             
                   success: function(data){                 
                      $('#description').val(data.description); 
                      $('#utensilid').val(data.id);                               
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});


$(document).on('click','#updateutensil',function(){
    let updatevalue = $("#description").val();
    let utensilid = $("#utensilid").val();
       $.post("process/updateutensil.php", {updatevalue:updatevalue, utensilid:utensilid}, function(data){
             dataTable.ajax.reload(); 
             if (data == 1){

               swal("Attention!", "Utensil updated successful!", {
                  icon : "success",
                  buttons: {              
                    confirm: {
                      className : 'btn btn-success'
                    }
                  },
                }); 
                    

             }else {

                 swal("Error!", "Error, please try again!", {
                        icon : "error",
                        buttons: {              
                          confirm: {
                            className : 'btn btn-danger'
                          }
                        },
                      });

             }              
          
        });    

});


$(document).on('submit','form.newutensil',function(event){
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
                                $('#utensilsfeedback').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.utensilsfeedback').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#utensilsfeedback").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

});

$(document).on('change','#lendidsearch',function(){
  let targetvalue = $(this).val();
      $.post("harvests/viewborrower.php", {targetvalue:targetvalue}, function(data){
          $("#viewborrower").html(data);
        }); 

        $.post("harvests/borroweditems.php", {targetvalue:targetvalue}, function(data){
          $(".borroweditems").html(data);
       
        }); 
});

$(document).on("click", ".returnid", function(){
      let that = $(this).attr("id");
      var tr = $(this).parent().parent();
      var utensil = tr.find(".utensilid").val();
      var quantity = tr.find(".quantity").val();
      var tableid = tr.find(".tableid").val();

        $.ajax({
                      url: 'process/returnutensil.php',
                        type: 'POST',                                    
                        data:{that:that,utensil:utensil,quantity:quantity,tableid:tableid}, 
                        beforeSend: function() {                                 
                    $('#lendfeedback').html('<img src="img/3.gif" />').fadeIn();  
                  },                  
            success: function(responce){ 
              $('.lendfeedback').html(responce); 
                },complete:function(){        
                  setTimeout(function() { $("#lendfeedback").fadeOut(); }, 2000);
                },error:function(){
                    alert(' Sorry, we are encoutering a technical issue, please try again!')
                }

      });     
   

});

$(document).on('submit','form.lendutensil',function(event){
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
                        data:$(".lendutensil").serialize(), 
                        beforeSend: function() {                                 
                    $('#lendfeedback').html('<img src="img/3.gif" />').fadeIn();  
                  },
                    success: function(responce){ 
              $('.lendfeedback').html(responce); 
                },complete:function(){        
                  setTimeout(function() { $("#lendfeedback").fadeOut(); }, 2000);
                },error:function(){
                    alert(' Sorry, we are encoutering a technical issue, please try again!')
                }

      });     

});




  $('#borrowedTable').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
     url:"harvests/borrowed.php",
    type:"POST"
   }, dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]  

  });  

  
 



$(document).on('click','#addRowpurchase',function(){
  addPurchaseItem();
});

function addPurchaseItem(){
       $.ajax({
           url : "harvests/addpurchaseitem.php",
        method : "POST",
          data : {getNewInvoiceItem:1},//,
       success : function(data){
               $("#purchase_items").append(data);
               let n = 0;
               $(".number").each(function(){
                   $(this).html(++n);
               });
          }
       });
};

$(document).on('change','.purchaseid ',function(){

        if ($('select option[value="' + $(this).val()+ '"]:selected').length > 1) {
      $(this).val('-1').change();

       swal("Error!", "Error, You have already selected this option", {
                        icon : "error",
                        buttons: {              
                          confirm: {
                            className : 'btn btn-danger'
                          }
                        },
    });
       
            $(this).parent().parent().remove();
return false;
    } 

});



$(document).on('submit','form.purchase_item',function(event){
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
                                    data:$("#purchase_item").serialize(),                                     
                                success: function(responce){
                                 if (responce == 1){

                           swal("Attention!", "Utensil recorded successful!", {
                              icon : "success",
                              buttons: {              
                                confirm: {
                                  className : 'btn btn-success'
                                }
                              },
                            }); 

                    setTimeout(function(){location.reload();}, 1000);

             }else {

                 swal("Error!", "Error, " + responce, {
                        icon : "error",
                        buttons: {              
                          confirm: {
                            className : 'btn btn-danger'
                          }
                        },
                      });

             }                 
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

});

$(document).on('keyup','.purchasequantity',function(){
      let that = $(this).val(),
          tr = $(this).parent().parent(),
          rowCost = tr.find('.cost').val(),
          totalSum = that * rowCost;
          rowTotal = tr.find('.totalValue').val( totalSum);    
subtotal()
});

$(document).on('keyup','.cost',function(){
      let that = $(this).val(),
          tr = $(this).parent().parent(),
          rowCost = tr.find('.purchasequantity').val(),
          totalSum = that * rowCost;
          rowTotal = tr.find('.totalValue').val( totalSum);  
subtotal()
});

function subtotal(){
        let subTotal = 0;
        
        $(".totalValue").each(function(){
            subTotal = subTotal + ($(this).val() * 1);
         });

        $(".sub_purchase").val(subTotal);
        
    };