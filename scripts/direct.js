$(document).on('click','#addRow',function(){
     addDirectRow();
});

function addDirectRow(){
    $.ajax({
        url : "harvests/directfood.php",
     method : "POST",
       data : {getNewInvoiceItem:1},//,
    success : function(data){
            $("#direct_items").append(data);
            let n = 0;
            $(".number").each(function(){
                $(this).html(++n);
            });
       }

    });
};



$(document).on('change', '.foodid', function(){
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        var tablename="food";

      if ($('select option[value="' + pid + '"]:selected').length > 1) {
      $(this).val('-1').change();

       swal("Error!", "Error, You have already selected this option", {
                        icon : "error",
                        buttons: {              
                          confirm: {
                            className : 'btn btn-danger'
                          }
                        },
    });
       
            $(this).parent().parent().remove();

    } else {  
        $.ajax({
                url : "harvests/getfoodrecord.php",
                 method : "POST",
                dataType: "json",
                   data : {tablename:tablename ,id:pid},
                success : function(data){
                    tr.find(".foodid").val(data["id"]);
                    tr.find(".sellingprice").val(data["price"]);
                    tr.find(".total_buying").val(tr.find(".buyingprice").val() * tr.find(".quantity").val());
                   
                }, complete:function(){
                    calculator();
                }
            });
    }
});

function deleteRow(e){
    $(e).parent().parent().remove();
    calculator();
}

$(document).on('keyup', '.quantity', function(){
    var qty = $(this);
    var tr = $(this).parent().parent();
    if(isNaN(qty.val())){
        alert("Please Enter a valid Qty");
        qty.val(1);
        tr.find(".total_buying").val(qty.val() * tr.find(".buyingprice").val());
        calculator();
    }else{
        var unit=tr.find("#buyingprice").value;
        var ttl = (qty * unit);
        tr.find(".total_buying").val(qty.val() * tr.find(".buyingprice").val());
        calculator();
    }
    calculate();
});

$(document).on('keyup', '.buyingprice', function(){
    var buying = $(this);
    var tr = $(this).parent().parent();
    if(isNaN(buying.val())){
        alert("Please Enter a valid Buying price");
        buying.val(1);
        tr.find(".total_buying").val(buying.val() * tr.find(".quantity").val());
        calculate();
    }else{
        var unit=tr.find("#quantity").value;
        var ttl = (buying * unit);
        tr.find(".total_buying").val(buying.val() * tr.find(".quantity").val());
        calculator();
    }
});

function calculator(){
        let subtotal = 0;
        let totalqty = 0;          

        $(".total_buying").each(function(){
            subtotal = subtotal + ($(this).val() * 1);
         });  

         $(".quantity").each(function(){
            totalqty = totalqty + ($(this).val() * 1);
         });       

        $("#totalbuying").val(subtotal);
        $("#totalquanity").val(totalqty);
        

}


$(document).on('click', '#save_food', function(){
    if ($("#totalbuying").val() == "" || $("#totalquanity").val() == "" || $("#foodid").val() == "" || $("#supplier").val() == "0" || $("#buyingprice").val() < 5){
                swal("Attention!", "Important fields are empty", {
                        icon : "error",
                        buttons: {                  
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    });
        return false;
    }
           $.ajax({
                    url : "process/save_directfood.php",
                 method : "POST",
                   data : $("#savedirectfood").serialize(),
                success : function(data){
                    if (data == 1){

                    swal("Attension", "You have successful added new food" , {
                        icon : "success",
                        buttons: {                  
                            confirm: {
                                className : 'btn btn-success'
                            }
                        },
                    });

                        } else {
                            swal("Attention!", data, {
                                icon : "error",
                                buttons: {                  
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                    }
                       
                },complete:function(){
                  $("#savedirectfood")[0].reset();
                }
                    
            }); 
});


