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
</head>
<style type="text/css">
 
</style>
<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">

          <div class="main pt-5">

              <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card panel panel-info">
                <div class="card-body">
                  <div class="clearfix">                     
                        <?php require 'includes/directform.php'; ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">Direct food</h4>                  
                      <p class="card-description">
                        <span class="addstockfeed"></span><span id="addstockfeed"></span>
                      </p>

                       <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                            <td>Food name</td>
                            <td>Stock</td>
                            <td>Price</td>
                          </thead>

                        <?php 
                        $sql = $data->con->query("SELECT * FROM food WHERE active = '1' AND stockstatus = 'direct'");
                      while($rws = mysqli_fetch_array($sql)){ ?>
              <tr>
                          <td><?php echo strtoupper($rws['foodname']); ?></td>
                          <td><?php echo $rws['stock']; ?></td>
                          <td><?php echo $rws['price']; ?></td>
             </tr>
             <?php 
           }

             ?>
                        
                      </table>
 
             
              </div>
            </div>
      </div>

       
        </div>
      </div>
    </div>   
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/direct.js"></script>
<script type="text/javascript">
  $("#dataTable").dataTable();
</script>
</body>
</html>