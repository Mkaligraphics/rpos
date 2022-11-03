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
        <link rel="stylesheet" type="text/css" href="css/iconbar.css">

</head>
<body>

 <?php require 'includes/navbar.php'; ?>
    
     <?php require 'includes/iconbar.php'; ?>

<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">

          <div class="main pt-5">



 <form onsubmit="return false" class="changepassword" id="changepassword" method="POST" autocomplete="off" action="process/changepassword.php">

          <section>

                 <div class="col-md-4 form-group">
                    <h3>CHANGE PASSWORD</h3>
                        <small>Keep your password safe</small>
                          <span class="password"></span> <span id="password"></span>
                 </div>

                 <div class="col-md-8 form-group">
                  <label>Old password</label>
                  <input type="password" required="required" name="oldpassword" class="form-control" >

                  <label>New password</label>
                  <input type="password" required="required" name="newpassword" class="form-control" >                  

                  <label>Repeat password</label>
                  <input type="password" required="required" name="repeatpassword" class="form-control" ><br>

                  <input type="submit" class="btn btn-info" value="Change Password" name=""> 
                  </div>
         </section>

    </form>

          </div>
    </div>
  </div>
</div>   

<?php require 'includes/bottomlinks.php'; ?>

</body>
<script type="text/javascript"  src="scripts/sales.js"></script>
<script type="text/javascript"  src="scripts/usersetting.js"></script>
</html>