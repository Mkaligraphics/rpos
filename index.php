<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WAQANDA RESTAURANT POS</title>
    <!-- Stylesheets -->
    <?php include 'includes/headerlinks.php'; ?>
    <link href="css/inputcss.css" rel="stylesheet" />
</head>
<body>

<!-- HEADER -->
<div id="header">

    <div class="container-fluid">
        <div id="login-intro">
            <h3 style="color: #FFBF00 !important">Waqanda Restaurant Dashboard</h3>
            <h6>Enter your credentials below</h6>    
                          <span class="text-danger" id="livedate"></span>
                          <span class="text-info" id="livetime"></span>
        </div>

    </div>
    <!-- end full-width -->

</div>


<!-- MAIN CONTENT -->
<div id="parent">

<div class="calculator">
      <div class="calc-row">
            <div class="screen">0</div>
      </div>
  
  <div class="calc-row">
    <a href="#" class="text-dark"><div class="button">7</div> <a href="#"  class="text-dark"><div class="button">8</div><div class="button">9</div></a>
  </div>
  
  <div class="calc-row">
    <a href="#"  class="text-dark"><div class="button">4</div> <a href="#"  class="text-dark"><div class="button">5</div><div class="button">6</div></a>
  </div>
  
  <div class="calc-row">
   <a href="#"  class="text-dark"><div class="button">1</div> <a href="#"  class="text-dark"><div class="button">2</div> <a href="#"  class="text-dark"><div class="button">3</div></a>
  </div>
  
  <div class="calc-row">
       <a href="#"  class="text-dark"><div class="button">0</div></a> <a href="#"  class="text-dark"><div class="button" style="width: 64%;">CLEAR</div></a> 
  </div>

    
  <div>
        <a href="#" class="enter "><div class="btn btn-dark btn-lg btn-block mr-1 ">ENTER</div></a> 
  </div>

</div>

</div>
<!-- end content -->


<!-- FOOTER -->
<div id="footer" class="fixed-bottom bg-dark text-white">
    <p class="text-center">Any Queries email to <a href="mailto:support@nicktechsolutions.com?subject=Restaurant%20Management%20System" target="_blank">support@nicktechsolutions.com</a>
    </p>
</div>
<!-- end footer -->


<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/login.js"></script>
<script type="text/javascript" src="scripts/inputjs.js"></script>

</body>


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