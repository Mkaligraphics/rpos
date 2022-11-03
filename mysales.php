<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$sales =  new sales();
$profile = new profile();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SweetJoint Restaurant Point of Sale</title>
    <?php include 'includes/headerlinks.php'; ?>
</head>
<style type="text/css">
 
</style>
<body>

 <?php require 'includes/navbar.php'; ?>
        
<div class="container-fluid page-body-wrapper">
<div class="main-panel">
  <div class="content-wrapper">

      <div class="main pt-5">

        <!-- Card With Icon States Color -->
          <?php include 'includes/myiconbox.php'; ?> <br>

           <!-- My general service -->
                    <div class="container-fluid">
                    <div class="row">
                       <table class="table" id="dataTabale">
                            <thead>
                                <tr class="font-weight-bold">
                                    <td>Billno</td>
                                    <td>Customer</td>
                                    <td>Total items</td>                                  
                                    <td>Discount</td>
                                    <td>Change</td>
                                    <td>Payable</td>
                                    <td>Paid</td>                                    
                                    <td>View</td>
                                </tr>
                            </thead>  
                            <tbody>
                            <?php 
                            $today = date('Y-m-d');
                            $id = $_SESSION['id'];
                            $sql =$data->con->query("SELECT incomes.payable,incomes.paid, incomes.discount, incomes.returned, incomes.total_items, incomes.billno, customer.fullname FROM incomes, customer,servicetimeout WHERE incomes.customer = customer.id AND incomes.active = '1' AND DATE_FORMAT(recdate, '%Y-%m-%d') = '$today' AND servicetimeout.billno = incomes.billno AND servicetimeout.status = '0' AND incomes.userid = '$id'  ORDER BY incomes.id DESC ");
                            if (mysqli_num_rows($sql) == true){
                              while ($rws = mysqli_fetch_array($sql)){ ?>
                              <tr>
                                <td><?php echo $rws['billno']; ?></td>
                                <td><?php echo $rws['fullname']; ?></td>
                                <td><?php echo $rws['total_items']; ?></td>
                                <td><?php echo $rws['discount']; ?></td>
                                <td><?php echo $rws['returned']; ?></td>
                                <td><?php echo $rws['payable']; ?></td>
                                <td><?php echo $rws['paid']; ?></td>
                                <td><a href="#" id="<?php echo $rws['billno']; ?>" class="mysale" data-toggle="modal" data-target="#mysales" >View</a></td>
                                
                              </tr>
                            <?php }} ?>
                            </tbody>                       
                       </table>
                     </div>
              </div>
      </div>
   <?php require 'modals/mysales.php'; ?>
</div>
</div>
</div>   
<?php require 'includes/bottomlinks.php'; ?>

</body>
<script type="text/javascript" src="scripts/mysales.js"></script>
</html>