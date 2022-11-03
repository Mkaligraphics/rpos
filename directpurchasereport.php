<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
$statistics = new statistics();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SweetJoint Restaurant Point of Sale</title>
    <?php include 'includes/headerlinks.php'; ?>
    <link href="assets/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="assets/core.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
 
</style>
<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">

          <div class="main pt-5">

             <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span> 
                   <a href="reports/directpurchasereport" target="_blank" class="btn btn-primary"><i class="fa fa-file"></i> Export pdf</a>              
                </li>
              </ul>
            </nav>

                        <table class="table table-stripped" id="dataTable">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Purchase date</td>
                                <td>Supplier</td>
                                <td>Food name</td>
                                <td>Quantity</td>
                                <td>Buying price</td>
                                <td>Selling price</td>                                                    
                                <td>Subtotal</td>                                                         
                              </tr>                            
                          </thead>
                          <tbody>
                           <?php
                           $totalquantity = 0;
                           $totalsales = 0;                           
                           $totalsubtotal = 0;
                           $totalbuy = 0;
                            $sel = $data->con->query("SELECT suppliers.description, food.foodname,directpurchase.recdate, directpurchaseinfo.buying,directpurchaseinfo.selling,directpurchaseinfo.quantity,directpurchaseinfo.subtotal FROM directpurchaseinfo, food, directpurchase, suppliers WHERE directpurchaseinfo.foodid = food.id AND directpurchase.refno = directpurchaseinfo.refno AND directpurchaseinfo.supplier = suppliers.id  ");
                            while($rws = mysqli_fetch_array($sel)){
                                $totalquantity = $totalquantity + $rws['quantity'];
                                $totalbuy  = $totalbuy + $rws['buying'];
                                $totalsales = $totalsales + $rws['selling'];
                                $totalsubtotal = $totalsubtotal + $rws['subtotal'];
                             ?>
                            <tr>
                                <td><?php echo date('d-m-Y',strtotime($rws['recdate'])); ?></td>
                                <td><?php echo $rws['description']; ?></td>
                                <td><?php echo $rws['foodname']; ?></td>
                                <td><?php echo $rws['quantity']; ?></td>
                                <td><?php echo $rws['buying']; ?></td>
                                <td><?php echo $rws['selling']; ?></td>                                
                                <td><?php echo $rws['subtotal']; ?></td>
                            </tr>
                            <?php
                          }

                            ?>

                            <tr class="font-weight-bold">
                              <td></td> <td></td><td>Total</td>
                              <td><?php echo $totalquantity;  ?></td>
                              <td><?php echo $totalbuy;  ?></td>
                              <td><?php echo $totalsales;  ?></td>
                              <td><?php echo $totalsubtotal; ?></td>
                            </tr>
                            
                          </tbody>
                        
              </table>
         
       
        </div>
      </div>
    </div>  



<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript">
  $("#dataTable").dataTable();  
</script>


</body>
</html>