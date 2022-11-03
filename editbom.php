<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
$statistics = new statistics();
$security = new security();
$id = $security->aes('decrypt', $_GET['ref']);
  $query = $data->con->query("SELECT bomdetails.id, products.description, bomdetails.quantity, bomdetails.uom, bomdetails.total FROM bomdetails, products WHERE bomdetails.active ='1' AND bomdetails.foodid = '$id' AND products.id = bomdetails.productid  ") ;

  $bomquery = $data->con->query("SELECT food.foodname, bom.foodid FROM bom, food WHERE food.id = bom.foodid AND bom.foodid = '$id'") ;
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SweetJoint Restaurant Point of Sale</title>
    <?php include 'includes/headerlinks.php'; ?>

</head>


<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">

          <div class="main pt-5">

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card panel panel-info">
                <div class="card-body">
                  <div class="clearfix">


                    
                 <?php while ($rw = mysqli_fetch_array($bomquery)) {  ?>
                  <input type="hidden" id="foodid" value="<?php echo $rw['foodid']; ?>">
                 <h2><?php echo strtoupper($rw['foodname']); ?> </h2>
                 <a href="bom" class="float-right"> Back to recipe</a>
               <?php } ?> 
                      <table  class="table table-stripped ">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Product name</td>
                                <td>Quantity</td>
                                <td>UOM</td>
                                <td>Amount</td>
                                <td>Action</td>
                              </tr>                            
                          </thead>
                          <tbody>
                               <?php 
                               $totalQuantity = 0;
                                $totalAmount = 0;
                        while ($row = mysqli_fetch_array($query)){
                          $totalQuantity = $totalQuantity + $row['quantity'];
                          $totalAmount = $totalAmount + $row['total'];
                    ?>
                            <tr>
                                <td><?php echo strtoupper($row['description']); ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo strtoupper($row['uom']); ?></td>
                              <td>
                                 <?php echo $row['total']; ?>
                                <input type="hidden" name="amount" id="amount" value="<?php echo $row['total']; ?>">
                                </td>
                              <td>
                                  <button class="btn btn-info editingredient" data-toggle="modal" data-target="#editbom" id="<?php echo $row['id']; ?>"> <i class="fa fa-edit"></i> edit</button>
                                  <button class="btn btn-danger deleteingredient" id="<?php echo $row['id']; ?>"> <i class="fa fa-trash"></i> delete</button>
                                </td>

                              </tr>    
                             <?php
                        }
                    ?>

                    <tr class="font-weight-bold text-danger">
                      <td></td>
                      <td><?php echo $totalQuantity; ?></td>
                      <td></td>
                      <td><?php echo $totalAmount ?></td>
                      <td></td>
                      
                    </tr>
                          </tbody>



     <tr>
        <button data-toggle="modal" data-target="#addBom" class="btn btn-primary btn-block bomadd">Add ingredient</button>
 </tr>
                        
                      </table>

                      
<p class="text-danger">Try to be accurate to avoid redundancy...!</p>
                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            
      </div>


       
    </div>
  </div>
</div>   
<?php require 'modals/editbom.php'; ?>   

<?php require 'modals/addBom.php'; ?>   

<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/editbom.js"></script>

</body>
</html>