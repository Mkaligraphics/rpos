<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SweetJoint Restaurant Point of Sale</title>

    <!-- Stylesheets -->
    <?php include 'includes/headerlinks.php'; ?>
    
    <style type="text/css">
       
input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

  input[type=password] {
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
  }

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}

    </style>
</head>
<body>

<!-- HEADER -->
<div id="header">

    <div class="container-fluid">

        <div id="login-intro">
            <h3 style="color: #ea7a17 !important">Login to Dashboard</h3>
            <h6>Enter your credentials below</h6>
        </div>

        <div class="float-right" class="font-weight-bold">
            <span class="text-danger" id="livedate"></span>
            <span class="text-info" id="livetime"></span>
        </div>
        
    </div>
    <!-- end full-width -->
    <div class="clearfix"></div>

</div>


<!-- MAIN CONTENT -->
<div id="parent">

    <form action="process/login.php" id="form_login" method="POST" id="login-form" class="loginform" autocomplete="off">

        <fieldset>
    <p class="feedback"></p>           
        <p>

          <img src="img/logo.png" style="width: 8.5em;"> <br><br>
            
        </p>

        <p>
            <input type="password" required="required" id="login-password" name="password" placeholder="Password"/>
        </p>

            <a href="forget_pass.php" class="button ">Forgot your password?</a>

            <input type="submit" class="btn btn-primary" name="submit" value="LOG IN"/>
        </fieldset>
        <br/>       

    </form>

</div>
<!-- end content -->


<!-- FOOTER -->
<div id="footer" class="fixed-bottom">
    <p class="text-center">Any Queries email to <a href="mailto:nkhalammar@gmail.com?subject=SweetJoint%20Management%20System" target="_blank">nkhalammar@gmail.com</a>.
    </p>
</div>
<!-- end footer -->


<?php require 'includes/bottomlinks.php'; ?>
</body>

<script type="text/javascript" src="scripts/login.js"></script>
<script>
let daysoftheWeek=['Sun','Mon','Tue','Wed','Thur','Fri','Sat'];
let month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
console.log(daysoftheWeek[today.getDay()])
if(dd<10) {
  dd='0'+dd
} 

if(mm<10) {
  mm='0'+mm
} 

// today = mm+'/'+dd+'/'+yyyy;
let datestring=daysoftheWeek[today.getDay()]+', '+today.getDate() + '-' + month[today.getMonth()] + '-' + today.getFullYear()
document.getElementById("livedate").innerHTML = datestring;
var myVar=setInterval(function(){myTimer()},1000);

function myTimer() {
    var d = new Date();
    document.getElementById("livetime").innerHTML = d.toLocaleTimeString();
}
</script>

</html>