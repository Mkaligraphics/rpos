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
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card panel panel-info">
                <div class="card-body">
                  <div class="clearfix">

                    <?php require 'includes/bomform.php'; ?>

                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">Available recipes</h4>                  
                      <p class="card-description">
                        <span class="addstockfeed"></span><span id="addstockfeed"></span>
                      </p>

                      <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Output food</td>
                                <td>Total value</td>
                                <td>Action</td>                                
                              </tr>                            
                          </thead>
                          <tbody>
                         
                          </tbody>
                        
                      </table>
 
       
        </div>
      </div>
    </div>   
<?php require 'modals/editproduct.php'; ?>   
<?php require 'includes/bottomlinks.php'; ?>  
<script type="text/javascript" src="scripts/bom.js"></script>

</body>
</html>