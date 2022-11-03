let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/customers.php",
                    type:"post"
                }
  }); 

$(document).on('submit','form.newcustomer',function(event){
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
                    $(".customerfeed").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.customerfeed').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;

$(document).on('click','.editcustomer',function(){
  let that = $(this).attr('id');
     $.ajax({
                    url:'harvests/viewcustomer.php',
                    type:'POST',
                    data:{that:that},
                    dataType:'json',             
                   success: function(data){                 
                      $('#des').val(data.fullname); 
                      $('#phone').val(data.mobile);  
                      $('#address').val(data.email);
                      $('#supplierid').val(data.id);                             
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});


$(document).on('submit','form.editclient',function(event){
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
                    $(".changecustomer").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.changecustomer').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;


$(document).on('click','.deletecustomer',function(){
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

              $.post("process/deletecustomer.php", {deleteid:deleteid}, function(data){
                   dataTable.ajax.reload();  
                   if (data == 1) {
                    swal("Customer has been deleted successful!", {
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