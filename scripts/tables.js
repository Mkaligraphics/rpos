let n = 0;
$(document).on('click','.customer_table',function(){
    let table_id = $(this).attr('id');
    $(this).hide(); 
 n++;
    $('.table_badge').html(n)
    let input = '<input name="cart[]" type="hidden" value="'+table_id+'" />';
    $('.cart').append(input);

});


$(document).on('submit','form.table',function(event){
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
                      data:  $("#table").serialize(),  
                      beforeSend : function(){               
                             $(".proceedbtn").html('Proceed...');
                        },
                  success: function(feedback){ 
                    if (feedback == '1'){
                        window.location.href="sales";
                    }else{
                        alert(feedback)
                    }
              }
    });     
  
      return false;
  });
  //end;


  $(".openbtn").hide();