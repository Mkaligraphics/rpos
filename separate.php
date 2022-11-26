<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WAQANDA RESTAURANT POS</title>
    <?php include 'includes/headerlinks.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/iconbar.css">
</head>
<body>

 <?php require 'includes/navbar.php'; ?>
 <?php require 'includes/iconbar.php'; ?>
<div class="container-fluid page-body-wrapper">

    <div class="main-panel">
        <div class="content-wrapper">
                    <div class="main shadow-sm m-2">
                        <div class="row "> 

<div class="container-fluid">
<div class="container mt-8 p-4">

        <div class="row">
                <div class="col">
<table class="table table-striped">
    <h1><?php echo $_GET['rcp']; ?></h1>
    <h2>Table number :<?php echo $_GET['table']; ?></h2>
    <!-- <input type="text" value="<?php echo $_GET['rcp']; ?>" id="rcp" /> -->

                <?php  
                $details = $_GET['rcp'] ;
               
              $select  = $data->con->query("SELECT sales_details.unit_total, products_table.product_name, sales_table.total_items,sales_details.qty, sales_table.sub_total, sales_details.product_id FROM sales_table, sales_details, products_table WHERE products_table.id = sales_details.product_id AND sales_table.details = sales_details.details  AND  sales_details.details = '$details' ");
              while ($rows = mysqli_fetch_array($select)){
               
                ?>
                <tr>                                        
                      <td><?php echo $rows['product_name']; ?></td>
                      <td><?php echo $rows['qty']; ?></td>
                      <td><?php echo $rows['unit_total']; ?></td>
                      <td><a class="btn btn-success product" href="#" id="<?php echo $rows['product_id']; ?>"> <i class="fa fa-arrows-h fa fa-fw"></i> Move</a> </td>
 
                </tr>
            <?php } ?>
           
</table>            
                
                </div>    
                
                
                <div class="col">
                <h1><?php echo  $details = 'RCPT-'.(date('Ymd').''.rand(10,1000)); ?></h1>
                <div class="carts">
    <table class="table table-responsive w-100 d-block d-md-table" id="itemTable" style=" border: 1px dotted #343a40;  max-height: 15em; overflow-y: scroll;" >
                            <tbody class="separatecart">

                            </tbody>
                            
                            <button type="submit" class="btn btn-success btn-block" id="requestOrder">Separate bill</button>
                            <a href="#" id="cancel" class="btn btn-danger btn-block" > Cancel</a>  

                    </table> 

                </div>
            </div>
        </div>
</div>
                                                    
                                </div>
                        </div>
                </div>
        </div>
    </div>
</div>

<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript"  src="scripts/separate.js"></script>
</body>
</html>