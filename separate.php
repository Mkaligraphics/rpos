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
                                            <div class="container-fluid"  >

<div class="container mt-8 p-4">
        <div class="row">
                <div class="col">
<table class="table table-striped">
    <h1><?php echo $_GET['rcp']; ?></h1>
    <h2>Table number :<?php echo $_GET['table']; ?></h2>
    <input type="text" value="<?php echo $_GET['rcp']; ?>" id="rcp" />

                <?php  
                $details = $_GET['rcp'] ;
                $total_items = 0;
                $total_amount = 0;
              $select  = $data->con->query("SELECT sales_details.unit_total, products_table.product_name, sales_table.total_items,sales_details.qty, sales_table.sub_total, sales_details.product_id FROM sales_table, sales_details, products_table WHERE products_table.id = sales_details.product_id AND sales_table.details = sales_details.details  AND  sales_details.details = '$details' ");
              while ($rows = mysqli_fetch_array($select)){
                $total_items = $total_items + $rows['qty'];
                $total_amount = $total_amount + $rows['unit_total'];
                ?>
                <tr>                                        
                      <td><?php echo $rows['product_name']; ?></td>
                      <td><?php echo $rows['qty']; ?></td>
                      <td><?php echo $rows['unit_total']; ?></td>
                      <td><a class="btn btn-success product" href="#" id="<?php echo $rows['product_id']; ?>"> <i class="fa fa-arrows-h fa fa-fw"></i> Move</a> </td>
                     <input type="text" id="name" name="product_name" value="<?php echo $rows['product_name']; ?>" />
                     <input type="text" id="item_price" name="product_name" value="<?php echo $rows['unit_total']; ?>" />
                     <input type="text" id="product_quantity" name="product_quantity" value="<?php echo $rows['total_items']; ?>" />
                </tr>
            <?php } ?>
            <tr class="font-weight-bold bg-dark text-white">
                <td >TOTALS</td>
                <td><?php echo $total_items; ?></td>
                <td><?php echo number_format($total_amount,2); ?></td>
                <td></td>
            </tr>
</table>            
                
                </div>    
                
                
                <div class="col">
                <h1><?php echo  $details = 'RCPT-'.(date('Ymd').''.rand(10,1000)); ?></h1>
                    <table class="table table-striped">
                            <tbody class="separatecart">

                            </tbody>

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