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
                   <a href="reports/stock" target="_blank" class="btn btn-primary"><i class="fa fa-file"></i> Export pdf</a>              
                </li>
              </ul>
            </nav>

                        <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Description</td>
                                <td>Quantity</td>
                                <td>Unit quanity</td>
                                <td>Price</td>
                                <td>Reorder</td>
                                
                              </tr>                                
                          </thead>
                          <tbody>                            
              <?php
              $color = NULL;
$color1 = "lightblue";
$color2 = "lighgoldenrodyellow";


//

              $select  = $data->con->query("SELECT * FROM products WHERE active = '1' ");
              while ($rows = mysqli_fetch_array($select)){ $color == $color1 ? $color = $color2 : $color = $color1;
?>
                <tr style="background-color: <?php echo $color;  ?>">
                                        
                      <td><?php echo strtoupper($rows['description']); ?></td>
                      <td><?php echo $rows['quantity']; ?></td>
                      <td><?php echo $rows['unitquantity'].' '.$rows['unit']; ?></td>
                      <td><?php echo $rows['costperunit']; ?></td>
                      <td><?php echo $rows['reorder']; ?></td>
                      
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