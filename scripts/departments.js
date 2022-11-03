
let dataTable = $('#dataTable').DataTable({

        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/departments.php",
                    type:"post"
                }
  }); 


$(document).on('submit','form.newdeparment',function(event){
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
                                $('#departmentfeedback').html(' <img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.departmentfeedback').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#departmentfeedback").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});


$(document).on('click','.editdepartment',function(){
      let deleteid = $(this).attr('id');
         $.ajax({
                    url:'harvests/viewdepartments.php',
                    type:'POST',
                    data:{deleteid:deleteid},
                    dataType:'json',             
                   success: function(data){                 
                      $('#description').val(data.description); 
                      $('#depid').val(data.id);                               
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});


$(document).on('click','#updatedepartment',function(){
    let updatevalue = $("#description").val();
    let depid = $("#depid").val();
       $.post("process/editdepartment.php", {updatevalue:updatevalue, depid:depid}, function(data){
             dataTable.ajax.reload(); 
             if (data == 1){

               swal("Attention!", "Department updated successful!", {
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


$(document).on('click','.deletedepartment',function(){
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

              $.post("process/deletedepartment.php", {deleteid:deleteid}, function(data){
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
