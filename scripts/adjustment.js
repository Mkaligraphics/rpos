
$(document).ready(function(){
    $(".chosen-select").chosen();
})

let dataTable = $('#dataTable').DataTable({

        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/adjustments.php",
                    type:"post"
                }
  }); 


$(document).on('submit','form.adjust',function(event){
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
                                $('#feedback').html(' <img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.feedback').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#feedback").fadeOut(); }, 2000);
                              $('.adjust')[0].reset();
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});



$(document).on('click','.deleteadjustment',function(){
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

              $.post("process/deleteadjust.php", {deleteid:deleteid}, function(data){
                   dataTable.ajax.reload();  
                   if (data == 1) {
                    swal("Adjustment has been deleted successful!", {
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


