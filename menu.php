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
                   <a href="reports/menu" target="_blank" class="btn btn-primary"><i class="fa fa-file"></i> Export pdf</a>              
                </li>
              </ul>
            </nav>

                        <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Food type</td>
                                <td>Category</td>
                                <td>Stock</td>
                                <td>Price</td>              
                              </tr>                            
                          </thead>
                          <tbody>                            
              <?php
              
              $select  = $data->con->query("SELECT food.id,food.stock, food.foodname,food.category,food.units,food.price,food.photo, foodcategory.foodcategory FROM food, foodcategory WHERE food.active = '1' AND food.category = foodcategory.id ");
              while ($rows = mysqli_fetch_array($select)){?>
                <tr>
                                        
                      <td><?php echo strtoupper($rows['foodname']); ?></td>
                      <td><?php echo strtoupper($rows['foodcategory']); ?></td>
                      <td><?php echo $rows['stock']; ?></td>
                      <td><?php echo $rows['price']; ?></td>
                      
                </tr>
            <?php } ?>
                            
      </tbody>
              </table>
         
       
        </div>
      </div>
    </div>  

<?php require 'includes/bottomlinks.php'; ?>
 
</body>
</html>