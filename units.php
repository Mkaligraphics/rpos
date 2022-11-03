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

                    <table id="dataTable"  class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Unit name</td>                                
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
                  <span class="unitfeed"></span><span id="unitfeed"></span>

<form onsubmit="return false"  class="newunit" action="process/newunit.php" method="POST">

    <div class="form-group row">
        <div class="col-sm-12">
            <label>Unit name <span class="text-danger">*</span></label>
            <input type="text" required="required" class="form-control" id="unitname" name="unitname">
        </div>                    
    </div>

                <button type="submit" class="btn btn-dark px-4 float-right"><i class="fa fa-save fa-fw"></i> Save record</button>
            </form>

       
    </div>
  </div>
</div>   
<?php require 'modals/editunit.php'; ?>
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/units.js"></script>

</body>
</html>