$(document).on('click','.enter',function(){
  let password =  $('.screen').html();
  if (password =='0'){
      $.notify('Please input your password...','error');
      return false;
  }
                        $.ajax({
                                  url: 'process/login.php',
                                    type: 'POST',
                                    data:{password: password},                                    
                                success: function(responce){
                                  if (responce == '0'){
                                     $.notify('Authentication failed...','error');
                                  }  else{
                                        switch (responce) { 
                                            case 'accounts': 
                                            window.location = "accounts";                                   
                                              break;
                                              case 'Admin': 
                                                  window.location = "admin";
                                              break;                                   
                                            default:
                                              window.location = "tables";
                                        }
                                        
                                  }                        
                                  
                            },error:function(){
                                alert(' Sorry, we are encoutering a technical issue, please try again!')
                            }
        })
})