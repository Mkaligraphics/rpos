<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$accounts =  new accounts();
$profile = new profile();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SweetJoint Restaurant Point of Sale</title>
    <?php include 'includes/headerlinks.php'; ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    
</head>

<body>

 <?php require 'includes/cashiernav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">

<div class="main pt-5">

        <div class="row">
            <?php require 'includes/cashierleft.php'; ?>


          <div class="col-md-6 grid-margin stretch-card ">
              <div class="card panel panel-info">
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                          <select class="form-control">
                              <option value="contract">Contract</option>
                              <option value="monthly">Monthly</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="textbox1">Payment of</label>
                          <input class="form-control" id="textbox1" type="text"/>
                      </div>
                      <div class="col-md-6 form-group">
                          <label for="textbox2">Select employee</label>
                          <input class="form-control" id="textbox2" type="text"/>
                      </div>
                    </div>

                    <hr>
                        <div class="row">
                            <div class="col-md-6 form-group">
                              <label for="textbox1">Identity</label>
                              <input class="form-control" id="textbox1" type="text"/>
                          </div>
                          <div class="col-md-6 form-group">
                              <label for="textbox2">KRA pin</label>
                              <input class="form-control" id="textbox2" type="text"/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 form-group">
                            <label for="textbox1">Designation</label>
                            <input class="form-control" id="textbox1" type="text"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="textbox2">Select employee</label>
                            <input class="form-control" id="textbox2" type="text"/>
                        </div>
                    </div>

                    <div class="row">
                          <div class="col-md-4 form-group">
                            <label for="textbox1">NSSF</label>
                            <input class="form-control" id="textbox1" type="text"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="textbox2">NHIF</label>
                            <input class="form-control" id="textbox2" type="text"/>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="textbox2">Tax</label>
                            <input class="form-control" id="textbox2" type="text"/>
                        </div>
                    </div>

                    <div class="row">
                          <div class="col-md-4 form-group">
                            <label for="textbox1">Gross pay</label>
                            <input class="form-control" id="textbox1" type="text"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="textbox2">Total deductions</label>
                            <input class="form-control" id="textbox2" type="text"/>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="textbox2">Salary after deductions</label>
                            <input class="form-control" id="textbox2" type="text"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="container">
                            <input type="submit" name="" value="Submit" class="btn btn-primary">
                        </div>
                       
                    </div>


                </div>
              </div>
            </div>

        

            
         <?php require 'includes/cashierright.php'; ?>
        <!-- content-wrapper ends -->

        </div>
    </div>
</div>   
<?php require 'modals/cashout.php'; ?>

<?php require 'includes/bottomlinks.php'; ?>

</body>
<script type="text/javascript" src="scripts/cashout.js"></script>
</html>