<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
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
</head>

<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">

          <div class="main p-5">    
         <!--  <a href="#" class="btn btn-info"> Update ingredients</a>  <br><br>    -->            
               <?php require 'includes/ingredients.php'; ?>
          </div>

    </div>
  </div>
</div>   

<?php require 'modals/ingredients.php'; ?>
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/ingredients.js"></script>
<script src="assets/core.js"></script>
  <script src="assets/datepicker.min.js"></script>

<script type="text/javascript">
   new GijgoDatePicker(document.getElementById('datepicker'), 
      { footer: true, modal: true, header: true });

</script>

</body>
</html>