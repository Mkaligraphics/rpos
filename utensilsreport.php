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

             <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span> 
                   <a href="reports/utensils" target="_blank" class="btn btn-primary"><i class="fa fa-file"></i> Export pdf</a>              
                </li>
              </ul>
            </nav>

                <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Description</td>
                                <td>Quantity</td>                                           
                              </tr>                            
                          </thead>
                          <tbody>
                <?php $sql =$data->con->query("SELECT * FROM utensils WHERE active = '1' ");
                if (mysqli_num_rows($sql) > 0){
                  while($rws = mysqli_fetch_array($sql)){ ?>
                            <tr>
                              <td><?php echo strtoupper($rws['description']); ?></td>
                              <td><?php echo $rws['quantity']; ?></td>
                            </tr>

                          <?php }} ?>
                            
                          </tbody>
                        
                </table>
         
       
        </div>
      </div>
    </div>  


<?php require 'includes/bottomlinks.php'; ?>
 <script type="text/javascript">
   $("#dataTable").dataTable();
 </script>

</body>
</html>