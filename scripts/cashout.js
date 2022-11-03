
$(document).ready(function() {
    viewsupport();
    alerts();
    ordercount();
});


$(document).on('change','#status',function(){
          let that =  $(this).val();

          if (that == 'credit'){
              $("#paying").val(0.00);
              $("#discount").val(0.00);
              $("#balance").val(0.00);
              $("#paying").prop('readonly', 'readonly');
              $("#discount").prop('readonly', 'readonly');

          } else {
              $("#paying").prop('readonly', false);
              $("#discount").prop('readonly', false);
          }

});

$(document).on('keyup','#paying',function(){
		calculator();		
});

$(document).on('keyup','#discount',function(){
  let discount = parseInt($(this).val());
        let amount = parseInt($("#amount").val());
        let paying = parseInt($("#paying").val());
        let balance = ((discount + paying) - amount).toFixed(2)
        $("#balance").val(balance);    

});

function calculator(){
        let amount = parseInt($("#amount").val());
        let discount = parseInt($("#discount").val());
        let paying = parseInt($("#paying").val());
        let balance = ( (discount + paying) - amount).toFixed(2)
        $("#balance").val(balance);
}


//update new food bill
$(document).on('submit','form.cashoutBill',function(event){
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
    swal({
            title: 'Are you sure?',
            type: 'warning',
            buttons:{
              confirm: {
                text : 'Yes',
                className : 'btn btn-success'
              },
              cancel: {
                visible: true,
                className: 'btn btn-danger'
              }
            }
          }).then((Delete) => {
            if (Delete) {

              $.ajax({
                  url: url,
                    type: type,                                    
                    data:  $(".cashoutBill").serialize(), 
                success: function(feedback){
                  if (feedback == 1){
                        swal({
                            title: 'Success',
                            text: "You have successful cashout",
                            type: 'success',
                            buttons : {
                              confirm: {
                                className : 'btn btn-success'
                              }
                            }
                      });      
                } else{
                      swal("Attension", feedback, {
                          icon : "error",
                          buttons: {              
                            confirm: {
                              className : 'btn btn-danger'
                            }
                          },
                        });

                }            
            },complete:function(){
              dataTable.ajax.reload();
              viewsupport();
              ordercount();
            }
          });

            } else {
              swal.close();
            }
          });
        });

//end;


function alerts(){
  var time = 0; 
  var tsk = "alerts";

  function inTime(){
    setTimeout(inTime, 500);
    if(time == 2){
      $.post("harvests/alerts.php",{task:tsk}, function(data){
        
          if(data == 1){
            var audio = $("#audio")[0]; 
              audio.play();
              viewsupport();
              ordercount();
          }

          time = 0; 
          clearTimeout(inTime);

          //console.log(data);
      });
    } 

    if(time == 20){
      time = 0; 
      clearTimeout(inTime); 
    }

    time ++; 
  }

  inTime();
}' '

function ordercount(){
  let task = 'task';
  $.post("harvests/ordercount.php", {task:task}, function(data){
      $("#myalert").html(data);
    }); 
}



$(document).on('click',".vieworder",function(){
   let order = $(this).attr('id'); 
 
    $.ajax({
                    url:'harvests/cashoutdetails.php',
                    method: "POST",
                    data:{order: order},
                    dataType:"json",
                    success: function(customerDetails) { 
                      console.log(customerDetails);
                    $("#customerName").html(customerDetails.fullname);
                    $("#dueDate").html(customerDetails.recdate);
                    $("#tableNo").html(customerDetails.tablelabel);
                    $("#billNo").html('#'+customerDetails.id);
                    $("#orderid").val(customerDetails.id);              
                    
                },complete:function(){
                  $.post("harvests/payable.php", {order: order}, function(data){
                    $("#amount").val(data);
                   });  
                }  

          });  


});

function viewsupport(){ 
  let search = 0;
                $.ajax({
                    url:'harvests/support.php',
                    method: "post",
                    data:{search:search},
                    success: function(data) {                       
                        $('#viewsupport').html(data);
                }

              });
 }

$(document).on('keyup', '#searchTicket',function(){
    let search = $(this).val(); 
              $.ajax({
                      url:'harvests/support.php',
                      method: "POST",
                      data:{search:search},
                      success: function(data) { 
                          $('#viewsupport').html(data);
                  }    
            });

});
       var initial_date = $(".initial_date").val();
        var final_date = $(".final_date").val();
        var transaction = $("#transaction").val();

fetch_receipts(initial_date,final_date,transaction); 

function fetch_receipts(initial_date, final_date, transaction){
        var ajax_url = "harvests/waitercashouts.php";

        $('#fetch_generated_wills').DataTable({
          "order": [[ 0, "desc" ]],
          dom: 'Blfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          "processing": true,
          "serverSide": true,
          "stateSave": true,
          "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
                  "ajax" : {
                    "url" : ajax_url,
                    "dataType": "json",
                    "type": "POST",
                    "data" : { 
                      "action" : "fetch_receipts", 
                      "initial_date" : initial_date, 
                      "final_date" : final_date, 
                      "transaction" : transaction
                    },
            "dataSrc": "records"
          },
          "columns": [
            { "data" : "date" },
            { "data" : "mode" },
            { "data" : "amount" },
            { "data" : "status" },
            { "data" : "receipt" }
          ]
        }); 
  }  


$(document).on('click','#filter',function(){

       var initial_date = $(".initial_date").val();
        var final_date = $(".final_date").val();
        var transaction = $("#transaction").val();


        if(initial_date == '' && final_date == ''){
          $('#fetch_generated_wills').DataTable().destroy();
          fetch_receipts("", "", transaction); 
        }else{
          var date1 = new Date(initial_date);
          var date2 = new Date(final_date);
          var diffTime = Math.abs(date2 - date1);
          var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

          if(initial_date == '' || final_date == ''){
              $("#error_log").html("Warning: You must select both (start and end) date.</span>");
          }else{
            if(date1 > date2){
                $("#error_log").html("Warning: End date should be greater then start date.");
            }else{
               $("#error_log").html(""); 
               $('#fetch_generated_wills').DataTable().destroy();
               fetch_receipts(initial_date, final_date, transaction);
            }
          }
        }
  });

      

