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
    
</head>

<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">
          <div class="main pt-5">
    <br><br>
 
     <table class="table table-stripped display nowrap" id="borrowedTable">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Handed over </td>
                                <td>Item </td>
                                <td>Quantity</td>
                                <td>Status</td>
                              </tr>                            
                          </thead>
        <tbody>
        
        </tbody>
      
 </table>
           

        </div>
      </div>
    </div>   
<?php require 'includes/bottomlinks.php'; ?>

<script type="text/javascript" src="scripts/utensils.js"></script>
</body>


</html>