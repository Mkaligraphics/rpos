$(document).ready(function(){
    $(".chosen-select").chosen();
  });

let dataTable = $('#dataTable').DataTable({
				"processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/viewfood.php",
                    type:"post"
                }
	});	

$(document).on('submit','form.newfood',function(event){
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
                                    data:  new FormData(this),
                                      contentType: false,
                                      cache: false,
                                      processData:false, 
                                    beforeSend: function() {                                 
                                $('#foodfeedback').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.foodfeedback').html(responce); 
                            },complete:function(){        
                              setTimeout(function() { $("#foodfeedback").fadeOut(); }, 2000);
                              $('#dataTable').DataTable().ajax.reload();
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});

//Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).on('click','.deletefood',function(){
  let that = $(this).attr("id"); 
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

              $.post("process/deletefood.php", {that:that}, function(data){
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

$(document).on('click','.editfood',function(){
    let that = $(this).attr('id'); 
          $.ajax({
                          url:'harvests/editfood.php',
                          type:'POST',
                          data:{that:that},
                          dataType:'json',             
                         success: function(data){                 
                            $('#foodname').val(data.foodname); 
                            $('#foodid').val(data.id);   
                            $('#unit').val(data.units).prop('selected',true);
                            $('#stockstatus').val(data.stockstatus).prop('selected',true);
                            $('#category').val(data.category).prop('selected',true);  
                            $('#price').val(data.price);  
                         },error:function(){
                            alert("Error");
                         }
                      
                    }); 

});

   //Update food;
$(document).on('submit','form.editfoodform',function(event){
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
                    beforeSend : function(){               
                    $(".foodfeed").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.foodfeed').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;

$(document).on('click','.editphoto',function(){
  let that = $(this).attr('id');
   $.ajax({
                    url:'harvests/editfood.php',
                    type:'POST',
                    data:{that:that},
                    dataType:'json',             
                   success: function(data){    
                   $("#foodpicture").val(data.id);  
                   },error:function(){
                      alert("Error");
                   }
                
              }); 
    
});


$(document).on('submit','form.changepictureform',function(event){
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
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,
                    beforeSend: function() {                                 
                $('#changephoto').html('<img src="img/3.gif" />').fadeIn();  
              },
                success: function(responce){ 
          $('.changephoto').html(responce); 
            },complete:function(){    
             dataTable.ajax.reload();    
              setTimeout(function() { $("#changephoto").fadeOut(); }, 2000);
            },error:function(){
                alert(' Sorry, we are encoutering a technical issue, please try again!')
            }

  });     

    return false;
});