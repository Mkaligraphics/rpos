<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
$statistics = new statistics();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>SweetJoint Restaurant Point of Sale</title>
    <?php include 'includes/headerlinks.php'; ?>
    <link href="assets/datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="assets/core.css" rel="stylesheet" type="text/css">
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

<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <span class="feedback"></span><span id="feedback"></span>


  <form onsubmit="return false"  class="newstaff" action="process/newstaff.php" method="POST" 
  enctype="multipart/form-data">

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>First name <span class="text-danger">*</span></label>
                        <input type="text" required="required" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Last name <span class="text-danger">*</span></label>
                        <input type="text" required="required" class="form-control" id="lastname" name="lastname" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Phone <span class="text-danger">*</span></label>
                  <input type="number" required="required" class="form-control" id="phone" name="phone1" >
                    </div>
                    <div class="col-sm-6">
                        <label>Phone (Line 2)</label>
                        <input type="number"  name="phone2" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCity">Upload photo</label>
                        <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="photo">
                  <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="inputState">Gender <span class="text-danger">*</span></label>
                            <select class="form-control chosen-select" name="gender">
                                <option value="0">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="inputPostalCode">KRA PIN</label>
                        <input type="text" class="form-control" name="krapin">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">Designation <span class="text-danger">*</span></label>
                            <select class="form-control chosen-select" name="designation">
                              <option>Waiter/Waitres</option>
                              <option>Accounts</option>
                              <option>Cook</option>                              
                            </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputWebsite">Engaged on <span class="text-danger">*</span></label>
                            <input type="text" id="datepicker" required="required" readonly="readonly" value="<?php echo date('m/d/Y'); ?>" class="form-control" name="engaged">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">NSSF </label>
                            <input type="text" id="nssf"  class="form-control" name="nssf">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputWebsite">NHIF </label>
                            <input type="text" id="nhif"  class="form-control" name="nhif">
                    </div>
                </div>

                <div class="form-group row">                   
                    <div class="col-sm-3">
                        <label for="inputState">Basic salary <span class="text-danger">*</span></label>
                            <input type="text" required="required" class="form-control" name="salary">
                    </div>

                    <div class="col-sm-3">
                        <label for="inputPostalCode">Mode <span class="text-danger">*</span></label>
                            <select class="form-control chosen-select" name="mode">
                                    <option value="0">Select mode</option>
                                    <option value="daily">DAILY</option>
                                    <option value="weekly">WEEKLY</option>                                    
                                    <option value="monthly">MONTHLY</option>                              
                            </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="inputWebsite">Department <span class="text-danger">*</span></label>
                        <select class="form-control chosen-select" name="department">
                            <option value="0">--SELECT DEPARTMENT--</option>
                            <?php 
                           $qry=$data->con->query("SELECT * FROM departments WHERE active = '1' ORDER BY description");
                           while($row = mysqli_fetch_assoc($qry)){?>                       
                          <option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['description']); ?></option>
                              <?php } ?>
                          
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputContactNumber">Id number <span class="text-danger">*</span></label>
                        <input type="number" required="required" class="form-control" name="idnumber" >
                    </div>

                    <div class="col-sm-6">
                        <label for="inputWebsite">Email</label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                </div>



                <button type="submit" class="btn btn-dark px-4 float-right"><i class="fa fa-save fa-fw"></i> Save record</button>
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

                  <h4 class="card-title">Disengage staff</h4>                  
                      <p class="card-description">
                        <span class="engagedfeedback"></span><span id="engagedfeedback"></span>
                      </p>
 
   <form class="disengage" action="process/disengage.php" method="POST">                    
                <div class="form-group row">
                  <div class="col-sm-6">
                      <label>Choose staff <span class="text-danger">*</span></label>
                  <select class="form-control chosen-select" id="checkstaff" name="staff">
                    <option value="0">--SELECT STAFF--</option>
                 <?php   $qry=$data->con->query("SELECT * FROM users WHERE active = '1' AND level != '1' ");
                    while($row = mysqli_fetch_assoc($qry)){?> 
                    <option value="<?php echo $row['id']; ?>"><?php echo strtoupper($row['fname']).' '.strtoupper($row['lname']); ?></option>
                  <?php } ?>
                                             
                  </select>
                  </div>
                  <div class="col-sm-6">
                      <label for="inputWebsite">Due date<span class="text-danger">*</span></label>
                          <input type="text" id="disengagedpicker" value="<?php echo date('m/d/Y'); ?>" required="required" readonly="readonly" class="form-control" name="engagedate">
                  </div>
            </div>

          <div id="displayuser"></div>

    
        <div class="form-group">
          <label>Give reason<span class="text-danger">*</span></label>
          <textarea  class="form-control" name="narrative" placeholder="Write....."></textarea>    
      </div>                   
        
        <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-refresh fa-fw"></i> Update record</button>                    
            </form>
          
          
              </div>
            </div>
      </div>


       
    </div>
  </div>
</div>   
<?php require 'includes/bottomlinks.php'; ?>
    <script src="assets/core.js"></script>
  <script src="assets/datepicker.min.js"></script>


<script type="text/javascript" src="scripts/staffs.js"></script>
<script>
    new GijgoDatePicker(document.getElementById('datepicker'), 
      { footer: true, modal: true, header: true });

    new GijgoDatePicker(document.getElementById('disengagedpicker'), 
      { footer: true, modal: true, header: true });
 </script>



</body>
</html>