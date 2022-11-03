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
                   <a href="reports/sales" target="_blank" class="btn btn-primary"><i class="fa fa-file"></i> Export pdf</a>              
                </li>
              </ul>
            </nav>

                        <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Date</td>
                                <td>Attendant</td>
                                <td>Customer</td>
                                <td>Total items</td>
                                <td>Payable</td>
                                <td>Paid</td>
                                <td>Discount</td>                                
                                <td>Change</td>
                                
                                                                
                              </tr>                            
                          </thead>
                          <tbody>                            
              <?php
              $total_items = 0;
              $total_payable = 0;
              $total_paid = 0;
              $total_discount = 0;
              $total_returned = 0; 
              $select  = $data->con->query("SELECT incomes.recdate, users.fname,users.lname,customer.fullname, incomes.total_items, incomes.payable,incomes.paid,incomes.discount,incomes.returned FROM incomes,customer,users WHERE incomes.active ='1' AND incomes.cashout = '1' AND incomes.status = 'debit' AND users.id = incomes.userid AND customer.id = incomes.customer");
              while ($rows = mysqli_fetch_array($select)){
                  $total_items = $total_items + $rows['total_items'];
                  $total_payable = $total_payable + $rows['payable'];
                  $total_paid = $total_paid + $rows['paid'];
                  $total_discount = $total_discount + $rows['discount'];
                  $total_returned = $total_returned + $rows['returned'];


                ?>
                <tr>
                  <td><?php echo date('d/m/Y',strtotime($rows['recdate'])); ?></td>
                    <td><?php echo strtoupper($rows['fname']).' '.strtoupper($rows['lname']); ?></td>        
                      <td><?php echo $rows['fullname']; ?></td>
                      
                      <td><?php echo $rows['total_items']; ?></td>
                      <td><?php echo number_format($rows['payable'],2); ?></td>
                      <td><?php echo number_format($rows['paid'],2); ?></td>
                      <td><?php echo number_format($rows['discount'],2); ?></td>
                      <td><?php echo number_format($rows['returned'],2); ?></td>
                      
                     
                </tr>
            <?php } ?>
                            
      </tbody>

      <tr>
        <td></td>
        <td></td>
        <td class="text-danger font-weight-bold">Total</td>
        <td class="text-success font-weight-bold"><?php echo number_format($total_items,2); ?></td>
        <td class="text-success font-weight-bold"><?php echo number_format($total_payable,2); ?></td>
        <td class="text-success font-weight-bold"><?php echo number_format($total_paid,2); ?></td>
        <td class="text-success font-weight-bold"><?php echo number_format($total_discount,2); ?></td>
        <td class="text-success font-weight-bold"><?php echo number_format($total_returned,2); ?></td>

      </tr>
    
              </table>
         
       
        </div>
      </div>
    </div>  



<?php require 'includes/bottomlinks.php'; ?>
 




</body>
</html>