let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/staffs.php",
                    type:"post"
                }
  }); 

$(document).ready(function(){
      $(".chosen-select").chosen();

    });

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).on('submit','form.newstaff',function(event){
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
                                $('#feedback').html('<img src="img/3.gif" />').fadeIn();  
                              },
                      success: function(responce){  
                          $('.feedback').html(responce); 
                            },complete:function(){        
                              setTimeout(function() { $("#feedback").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});

$(document).on('click','.editstaff',function(){
      let staffid = $(this).attr('id');
         $.ajax({
                    url:'harvests/viewstaff.php',
                    type:'POST',
                    data:{staffid:staffid},
                    dataType:'json',             
                   success: function(data){                 
                      $('#firstname').val(data.fname); 
                      $('#lastname').val(data.lname);
                      $('#phone').val(data.phone1);
                      $('#phone2').val(data.phone2);
                      $('#krapin').val(data.krapin);
                      $('#datepicker').val(data.engeged);
                      $('#idnumber').val(data.idno);
                      $('#email').val(data.email);
                      $('#editnssf').val(data.nssf);
                      $('#editnhif').val(data.nhif);
                      $('#gender').val(data.gender).prop('selected',true);                    
                      $('#designation').val(data.designation).prop('selected',true);
                      $('#mode').val(data.salarymode).prop('selected',true);
                      $('#department').val(data.department).prop('selected',true);
                      $('#salary').val(data.basicsalary);
                      $('#userid').val(data.id)
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});


$(document).on('submit','form.editstafform',function(event){
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
                                $('#stafffeed').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.stafffeed').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#stafffeed").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});

$(document).on('click','.moredetails',function(){
      let staffid = $(this).attr('id');
         $.ajax({
                    url:'harvests/viewstaffdetails.php',
                    type:'POST',
                    data:{staffid:staffid},
                    dataType:'json',             
                   success: function(data){    
                   $('#names').html(data.fname + ' '+data.lname);             
                   $('#designation').html(data.designation); 
                   $('#profile').attr('src','profile/'+data.profile);
                   $('#emailaddress').html(data.email);
                   $('#address2').html(data.phone2);
                   $('#kra').html(data.krapin);
                   $('#status').html(data.gender);
                   $('#ba').html(data.basicsalary);
                      
                   },error:function(){
                      alert("Error");
                   }
                
              }); 

});

$(document).on('change','#checkstaff',function(){
  let targetvalue = $(this).val();
  $.post("harvests/viewborrower.php", {targetvalue:targetvalue}, function(data){
      $("#displayuser").html(data);
    }); 
});

$(document).on('submit','form.disengage',function(event){
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
                                $('#engagedfeedback').html('<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){ 
                          $('.engagedfeedback').html(responce); 
                            },complete:function(){        
                             dataTable.ajax.reload();                         
                              setTimeout(function() { $("#engagedfeedback").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});


$(document).on('click','.profilepicture',function(){
  let staffid = $(this).attr('id');
   $.ajax({
                    url:'harvests/viewstaffdetails.php',
                    type:'POST',
                    data:{staffid:staffid},
                    dataType:'json',             
                   success: function(data){    
                   $("#userprofile").val(data.id);  
                   },error:function(){
                      alert("Error");
                   }
                
              }); 
    
});


$(document).on('submit','form.changeprofileform',function(event){
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
                $('#changeprofile').html('<img src="img/3.gif" />').fadeIn();  
              },
                success: function(responce){ 
          $('.changeprofile').html(responce); 
            },complete:function(){    
             dataTable.ajax.reload();    
              setTimeout(function() { $("#changeprofile").fadeOut(); }, 2000);
            },error:function(){
                alert(' Sorry, we are encoutering a technical issue, please try again!')
            }

  });     

    return false;
});
