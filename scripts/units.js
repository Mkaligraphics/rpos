let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/units.php",
                    type:"post"
                }
  }); 

$(document).on('submit','form.newunit',function(event){
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
                    $(".unitfeed").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.unitfeed').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;

$(document).on('click','.editunit',function(){
  let that = $(this).attr('id');
     $.ajax({
                    url:'harvests/viewunits.php',
                    type:'POST',
                    data:{that:that},
                    dataType:'json',             
                   success: function(data){                 
                      $('#unitName').val(data.unitname);                       
                      $('#unitid').val(data.id);                             
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});


$(document).on('submit','form.updateunit',function(event){
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
                    $(".changeunit").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.changeunit').html(feedback);
            },complete:function(){
              dataTable.ajax.reload(); 
            }
  });     

    return false;
});
//end;


$(document).on('click','.deleteunit',function(){
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

              $.post("process/deleteunit.php", {deleteid:deleteid}, function(data){
                   dataTable.ajax.reload();  
                   if (data == 1) {
                    swal("Unit has been deleted successful!", {
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