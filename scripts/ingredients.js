$(document).ready(function(){
     $(document).on('click', '#addRow', function(){
         addBomRow();
    });
$(".chosen-select").chosen();
});


function addBomRow(){
    $.ajax({
        url : "harvests/addingredients.php",
     method : "POST",
       data : {getNewInvoiceItem:1},//,
    success : function(data){
            $("#ingredients_items").append(data);
            let n = 0;
            $(".number").each(function(){
                $(this).html(++n);
            });
       } 
    });
};

function deleteRow(e){
    $(e).parent().parent().remove();
    
}

$(document).on('change', '.foodid', function(){
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        var tablename="bom";

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
                url : "harvests/getingredients.php",
                 method : "POST",
                dataType: "json",
                   data : {tablename:tablename ,id:pid},
                success : function(data){
                    tr.find(".item_qty").val(data["unitsnumber"]);
                    tr.find(".item_price").val(data["subtotal"]);
                    tr.find(".item_total").val(data["subtotal"]);
                    tr.find(".quantity").val(data["unitsnumber"]);
                    tr.find(".morebtn").attr('id',pid);
                   
                }, complete:function(){
                        calculator();
                }

            });
      }
});

$(document).on('click','.morebtn',function(){
    let tr = $(this).parent().parent();
    let unitnumber =  tr.find(".item_qty").val();
	  let foodid = $(this).attr('id');
    let qty = tr.find(".quantity").val();
      $.ajax({
                url : "harvests/moreingredients.php",
                 method : "POST",
                   data : {foodid:foodid,qty:qty,unitnumber:unitnumber},
                success : function(data){
                    $(".moreingredients").html(data);                   
                }

            });
	
	
})

$(document).on('keyup','#quantity',function(){

     var tr = $(this).parent().parent();
    let unitnumber =  tr.find(".item_qty").val();
    let unitprice = tr.find(".item_price").val();
    let totalcost = ((unitprice * $(this).val())/unitnumber).toFixed(2);
    tr.find(".item_total").val(totalcost);
    calculator();

});


function calculator(){
  let sub_total = 0;
   $(".item_total").each(function(){
            sub_total = sub_total + ($(this).val() * 1);
        });

      $("#sub_total").val(parseFloat(sub_total).toFixed(2));
}

$(document).on('submit','form.save_ingredients',function(event){
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
                        data:$("#save_ingredients").serialize(),                                    
                success: function(responce){ 
                    if (responce == 1){


                       swal({
                            title: 'Print receipt?',
                            text: "Ingrients have been saved!",
                            buttons:{
                              cancel: {
                                visible: true,
                                text : 'No',
                                className: 'btn btn-danger'
                              },              
                              confirm: {
                                text : 'Yes',
                                className : 'btn btn-success'
                              }
                            }
                          }).then((willDelete) => {
                              if (willDelete) {
                                  location.href="printingredients.php";
                              }
                          });

                       
                    } else {
                      swal("Error!",responce, {
                         icon : "error",
                          buttons : {
                            confirm : {
                              className: 'btn btn-success'
                            }
                          }
                        });

                    }
                                      
                },complete:function(){
                  $(".save_ingredients")[0].reset();
                },
                error:function(){
                    alert(' Sorry, we are encoutering a technical issue, please try again!');
                }

      });     

    return false;
});


//view ingredients cost
$(document).on('change','.ingredientDate',function(){
    let that = $(this).val();
    ingredientCOst(that);
});

let ingredientDate = $(".ingredientDate").val();
ingredientCOst(ingredientDate);

function ingredientCOst(theDate){
      $.ajax({
            url:'harvests/ingredientsconst.php',
              type: "POST",
              data: {theDate:theDate},                                    
            success: function(responce){ 
              $(".ingredientscost").html(responce);
            }
      });

}


$(document).on('click','#printingredient',function(){
      printData();

});

function printData()
{
   var divToPrint=document.getElementById("ingredientsArea");
    $('#ingredientsArea').css("color:red");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

