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
    <link rel="stylesheet" type="text/css" href="css/iconbar.css">
    <link rel="stylesheet" type="text/css" href="css/keyboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

 <?php require 'includes/navbar.php'; ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
                    <div class="main">
                        <?php
                    $qry=$data->con->query("SELECT * FROM  customer_tables  WHERE  active='1' ");
 				            if (mysqli_num_rows($qry) > 0){
							    while($row = mysqli_fetch_assoc($qry)) {?>
                                <a href="#">
                                         <img src="img/table.png" style="width:10em" /> 
                                         <p><?php echo $row['table_number'];?></p>   
                                </a>                    
                    <?php }} ?>

                        </div>
            </div>
    </div>
</div>

<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript"  src="scripts/sales.js"></script>
<!-- <script type="text/javascript"  src="scripts/keyboard.js"></script> -->
</body>
</html>