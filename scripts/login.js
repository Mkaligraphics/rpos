
$(document).on('submit','form.loginform',function(event){
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
                                $('.feedback').html(' Processing...<img src="img/3.gif" />').fadeIn();  
                              },
                                success: function(responce){                               
                                 
                          $('.feedback').html(responce); 
                            },complete:function(){                               
                              setTimeout(function() { $(".feedback").fadeOut(); }, 2000);
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }

                  });     

    return false;
});
