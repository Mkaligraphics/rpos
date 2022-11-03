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
<style type="text/css">
 
</style>
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

                      <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Description</td>
                                <td>Quantity</td>
                                <td>Action</td>
                              </tr>                            
                          </thead>
                          <tbody>
                            
                          </tbody>
                        
                      </table>

                      

                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">New Utensils</h4>                  
                      <p class="card-description">
                        <span class="utensilsfeedback"></span><span id="utensilsfeedback"></span>
                      </p>
 
              <form class="newutensil" action="process/newutensil.php" method="POST" onsubmit="return false">

                    <div class="form-group newstock">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control"  name="description" type="text" >
                    </div>

                
                    <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-save fa-fw"></i> Save utensils</button>
                    
            </form>
          
          
              </div>
            </div>
      </div>

       
        </div>
      </div>
    </div>   

<?php require 'modals/utensils.php'; ?> 
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/utensils.js"></script>
</body>
</html>