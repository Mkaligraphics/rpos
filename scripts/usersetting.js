

$(document).on('submit','form.changepassword',function(event){
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
                    $(".password").html('<img src="img/3.gif" />');
                      },
                success: function(feedback){ 
                  $('.password').html(feedback);
            }
  });     

    return false;
});
//end;

