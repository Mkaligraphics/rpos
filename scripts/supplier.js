let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/suppliers.php",
                    type:"post"
                }
  }); 

$(document).on('submit','form.newvendor',function(event){
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
                    $(".vendorfeed").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.vendorfeed').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;


$(document).on('click','.deletesupplier',function(){
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

              $.post("process/deletesupplier.php", {deleteid:deleteid}, function(data){
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

$(document).on('click','.editsupplier',function(){
  let that = $(this).attr('id');
     $.ajax({
                    url:'harvests/viewsupplier.php',
                    type:'POST',
                    data:{that:that},
                    dataType:'json',             
                   success: function(data){                 
                      $('#des').val(data.description); 
                      $('#phone').val(data.mobile);  
                      $('#address').val(data.email);
                      $('#supplierid').val(data.id);                             
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});

$(document).on('submit','form.updatesupplier',function(event){
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
                    $(".changesupplier").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.changesupplier').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;
