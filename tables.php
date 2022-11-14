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
</head>
<body>

 <?php require 'includes/navbar.php'; ?>
<div class="container-fluid page-body-wrapper">

    <div class="main-panel">
        <div class="content-wrapper">
                    <div class="main shadow-sm m-2">
<div class="row "> 
    <div class="container-fluid"  >
                    <span class="badge badge-danger p-3 table_badge font-weight-bold">0</span>
                    <a href="sales" class="p-5" style="font-size:2em ;">Skip <i class="fa fa-forward fa-fw"></i></a>

                            <div class="float-right">
                                        <form onsubmit="return false" class="table" id="table" method="POST" autocomplete="off" action="process/tables.php">
                                                                    <div class="cart">

                                                                    </div>
                                                <input type="submit" value="Proceed" class="btn btn-success proceedbtn">
                                        </form>                                        
                            </div>
        </div>
</div>
                                <div class="row p-2">
                                                <?php
                                            $qry=$data->con->query("SELECT * FROM  customer_tables WHERE  served_by='-' AND active = '1'");
                                                    if (mysqli_num_rows($qry) > 0){
                                                        while($row = mysqli_fetch_assoc($qry)) {?>
                                                        <a href="#" class="p-4 customer_table" id="<?php echo $row['id']; ?>">
                                                                <img src="img/table.png" style="width:10em" /> 
                                                                <p class="text-center text-dark font-weight-bold"><?php echo $row['table_number'];?></p>   
                                                        </a>                    
                                            <?php }} else{?>
                                                    <p class="text-danger p-2">No records</p>
                                            <?php }?>
                                </div>

                    </div>
            </div>
    </div>
</div>

<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript"  src="scripts/tables.js"></script>
</body>
</html>