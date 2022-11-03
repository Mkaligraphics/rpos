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

                      <table id="dataTable"   class="table table-stripped ">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Description</td>
                                <td>Recdate</td>
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

                  <h4 class="card-title">A new department</h4>                  
                      <p class="card-description">
                        <span class="departmentfeedback"></span><span id="departmentfeedback"></span>
                      </p>
 
              <form class="newdeparment" action="process/newdepartment.php" method="POST">
                    <div class="form-group">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control"  name="description" type="text" >
                    </div>                   
                    <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-save fa-fw"></i> Save</button>
                    
            </form>
          
          
              </div>
            </div>
      </div>


       
    </div>
  </div>
</div>   
<?php require 'modals/department.php'; ?>
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/departments.js"></script>

</body>
</html>