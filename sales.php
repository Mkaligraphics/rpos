<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WAQANDA RESTAURANT POS</title>
    <?php include 'includes/headerlinks.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/iconbar.css">
    <link rel="stylesheet" type="text/css" href="css/keyboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="
   height: 100%;
   margin: 0;
   overflow: hidden;
">

 <?php require 'includes/navbar.php'; ?>


<?php require 'includes/iconbar.php'; ?>


<div class="container-fluid page-body-wrapper">
<div class="main-panel">
  <div class="content-wrapper">

      <div class="main">
          <form onsubmit="return false" class="sale" id="sale" method="POST" autocomplete="off" action="process/makesales.php">

              <div class="row"> 
                <div class="col-md-5">
                  <div class="btn-group" role="group"  id="uncashout" 
                  style="overflow-x: scroll; width: 100%; " >                      
                </div>                      
                      <div class="row">
                         <?php require 'forms/salesheader.php'; ?>         
                      </div>
                                                          
                                    <div class="carts">
                                              <div class="cart " >
                                                    
                                              </div>
                                    </div>
                        </div>                     
          </form>
             <!-- end form -->

      <div class="col-md-2" style="overflow-y: scroll; height: 50em;">  
          <input type="text" placeholder="category search" class="form-control use-keyboard-input categoryquery mb-2" id="categoryquery" id="basic-url" aria-describedby="basic-addon3">                    
              <div class="card" style="width: 100% ">                     
                    <ul class="list-group list-group-flush categorydisplay mb-2">
                    
                    </ul>
              </div>
    </div>
   

<div class="col-md-5">
      <div class="container-fluid ">   

<!--SEARCH BAR-->
  <div class="filteritem mt-2">
      <input type="text" id="search" class="form-control" placeholder="Product search" name="search">
      <input type="hidden" id="categoryid" class="form-control"  name="categoryid" value="" >
</div>
<!--#SEARCH BAR-->
          <hr>

 <div style="height: 50em; overflow-y: scroll;">  
                          <div class="items pt-2 " >
              
                              
                          </div>                        
                  </div>
                </div>
        </div>

      </div> 

        </div>
    </div>
</div>

   <?php require 'modals/uncashout.php'; ?>
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript"  src="scripts/sales.js"></script>
<!-- <script type="text/javascript"  src="scripts/keyboard.js"></script> -->
</body>
</html>