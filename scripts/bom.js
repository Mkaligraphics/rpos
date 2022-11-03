$(document).ready(function(){
    $(".chosen-select").chosen();

    $(document).on('click', '#addRow', function(){
        addBomRow();
    });

});



let dataTable = $('#dataTable').DataTable({
        "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"harvests/bomavailable.php",
                    type:"post"
                }
  }); 


function addBomRow(){
    $.ajax({
        url : "harvests/bomproducts.php",
     method : "POST",
       data : {getNewInvoiceItem:1},//,
    success : function(data){
            $("#bom_items").append(data);
            let n = 0;
            $(".number").each(function(){
                $(this).html(++n);
            });

            $(".chosen-select").chosen();
       }

    });
};

function deleteRow(e){
    $(e).parent().parent().remove();
    calculate();
}

$(document).on('change', '.productid', function(event){
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        var tablename="products";



 if ($('select option[value="'+ $(this).val() +'"]:selected').length > 1) {
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
                    url : "harvests/getboomrecord.php",
                     method : "POST",
                    dataType: "json",
                       data : {tablename:tablename ,pid: pid},
                    success : function(data){
                        tr.find(".productid").val(data["id"]);
                        tr.find(".productUnit").val(data["unitname"]);
                        tr.find(".unitprice").val(parseFloat(data["costperunit"] / data["unitquantity"]).toFixed(2));
                        tr.find(".total_amt").val(parseFloat(tr.find(".unitprice").val() * tr.find(".quantity").val()).toFixed(2));                    

                    }, complete:function(){
                        calculate();
                    }
                });

        }
      
});



$(document).on('keyup', '.quantity', function(){
    var qty = $(this);
    var tr = $(this).parent().parent();
    if(isNaN(qty.val())){

        swal("Error!", "Error, Please Enter a valid Qty", {
                        icon : "error",
                        buttons: {              
                          confirm: {
                            className : 'btn btn-danger'
                          }
                        },
    });
        
        qty.val(1);
        tr.find(".total_amt").val(qty.val() * tr.find(".unitprice").val() );
        calculate();
    }else{
        var unit=tr.find("#unitsprice").value;
        var ttl = (qty * unit);
        tr.find(".total_amt").val(parseFloat(qty.val() * tr.find(".unitprice").val()).toFixed(2));
        calculate();
    }
});

function calculate(){
        let subtotal = 0;
        let totalqty = 0;          

        $(".total_amt").each(function(){
            subtotal = subtotal + ($(this).val() * 1);
         });

        $("#rawvalue_subtotal").val(parseFloat(subtotal).toFixed(2));        
    };


//Update the product;
$(document).on('click', '#save_production', function(){
    if ($("#rawvalue_total").val() == "" || $("#vat").val() == ""){
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
                    url : "process/save_production.php",
                 method : "POST",
                   data : $("#createbom").serialize(),
                success : function(data){
                    if (data == 1){
                           

                    swal("Attension", "You have successful created ingredients" , {
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
                    dataTable.ajax.reload();
                    $("#createbom")[0].reset();

                }

                    
            });           
                
                
               
       
});


$(document).on('click','.deleteBom',function(){

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

              $.post("process/deletebom.php", {deleteid:deleteid}, function(data){
                   dataTable.ajax.reload();  
                   if (data == 1) {
                    swal("Your recipe has been deleted successful!", {
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

