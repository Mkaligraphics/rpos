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
                    <span id="utensilspurchase"></span><span class="utensilspurchase"></span>

                      <?php require 'includes/utensilspurchase.php' ?>

                </div>
              </div>
            </div>

        </div>
      </div>
    </div>   

<?php require 'includes/bottomlinks.php'; ?>
<script src="assets/core.js"></script>
  <script src="assets/datepicker.min.js"></script>
<script type="text/javascript" src="scripts/utensils.js"></script>
</body>
<script>    

    new GijgoDatePicker(document.getElementById('purchae_date'), 
      { footer: true, modal: true, header: true });
 </script>
</html>