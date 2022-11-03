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
    <link href="assets/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="assets/core.css" rel="stylesheet" type="text/css">
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

<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <span class="feedback"></span><span id="feedback"></span>


  <form onsubmit="return false"  class="adjust" action="process/adjust.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6">
                      <label>Specify<span class="text-danger">*</span></label>
                       <select class="form-control chosen-select" name="specify">
                            <option value="0">--specify --</option>                            
                            <option value="product">Product</option>
                            <option value="service">Service</option>
                       </select>
                    </div>

                    <div class="col-sm-6">
                        <label>Amount<span class="text-danger">*</span></label>
                        <input type="text" required="required" class="form-control" id="amount" name="amount" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                      <select class="form-control chosen-select" name="category">
                            <option value="0">--select category--</option>
                            <option value="loss">Loss account</option>
                            <option value="profit">Profit account</option>
                      </select>
                      </div> 

                    <div class="col-sm-6">
                    <input type="text" id="datepicker" value="<?php echo date('m/d/Y'); ?>" required="required" readonly="readonly" class="form-control" name="duedate">
                    </div>
                </div>
                

                 <div class="form-group row">
                   <div class="col-sm-12">
                      <textarea name="narrative" class="form-control" placeholder="write the reason"></textarea>    
                      </div>              
                </div>

                <button type="submit" class="btn btn-dark px-4 float-right"><i class="fa fa-save fa-fw"></i> Save adjustments</button>
            </form>
        </div>
    </div>
</div>

                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">Recent adjustments</h4>                  
                      <p class="card-description">
                        <span class="engagedfeedback"></span><span id="engagedfeedback"></span>
                      </p>

                       <table id="dataTable"   class="table table-stripped ">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Specified</td>
                                <td>Category</td>
                                <td>Duedate</td>
                                <td>Amount</td>
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
  </div>
</div>   
<?php require 'includes/bottomlinks.php'; ?>
    <script src="assets/core.js"></script>
    <script src="assets/datepicker.min.js"></script>


<script type="text/javascript" src="scripts/adjustment.js"></script>
<script>
    new GijgoDatePicker(document.getElementById('datepicker'), 
      { footer: true, modal: true, header: true });   
 </script>



</body>
</html>