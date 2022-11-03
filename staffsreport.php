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

             <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span> 
                   <a href="reports/staffs" target="_blank" class="btn btn-primary"><i class="fa fa-file"></i> Export pdf</a>              
                </li>
              </ul>
            </nav>

                        <table id="dataTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Profile</td>
                                <td>Full name</td>
                                <td>Id number</td>
                                <td>Phone 1</td>                                
                                <td>Department</td>
                                <td>Designation</td>
                                <td>Salary mode</td>
                                <td>Engeged</td>                                
                              </tr>                            
                          </thead>
                          <tbody>
                            
                          </tbody>
                        
              </table>
         
       
        </div>
      </div>
    </div>  
<?php require 'modals/editstaff.php'; ?>
<?php require 'modals/morestaffdetails.php'; ?>
<?php require 'modals/profile.php'; ?>


<?php require 'includes/bottomlinks.php'; ?>
 <script src="assets/core.js"></script>
  <script src="assets/datepicker.min.js"></script>
<script type="text/javascript" src="scripts/staffs.js"></script>

<script>
    new GijgoDatePicker(document.getElementById('datepicker'), 
      { footer: true, modal: true, header: true });
 </script>


</body>
</html>