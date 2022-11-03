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
    <link rel="stylesheet" type="text/css" href="css/keyboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    

</head>
<body>

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
                  style="overflow-x: scroll; width: 100%;" >                       
                </div>
                      
                  
                      <div class="row">

                         <?php require 'forms/salesheader.php'; ?>         
                      </div>
                                                          
                                    <div class="carts">
                                       <!-- Display selected carts -->
                                              <div class="cart " >
                                                    
                                              </div>
                                    </div>
                        </div>                     
          </form>
             <!-- end form -->

            <div class="col-md-2" style="overflow-y: scroll; height: 100%;">
  
  <input type="text" class="form-control use-keyboard-input" id="basic-url" aria-describedby="basic-addon3">


            
    <div class="card" style="width: 18rem; ">
                      <div class="card-header font-weight-bold bg-dark text-white">
                        CAREGORIES
                      </div>
                      <ul class="list-group list-group-flush">
                        <?php

function randomHex() {
  $chars = 'ABCDEF0123456789';
  $color = '#';
  for ( $i = 0; $i < 6; $i++ ) {
     $color .= $chars[rand(0, strlen($chars) - 1)];
  }
  return $color;
}
   
 $sql =$data->con->query("SELECT * FROM category_table ");
 if (mysqli_num_rows($sql) == true){
   while ($rws = mysqli_fetch_array($sql)){ ?>
                    
                        <a href="##">
                          <li class="list-group-item cursor-pointer font-weight-bold text-white" style=" background-color: <?php echo randomHex(); ?>">
                          <?php echo strtoupper($rws['category_name']); ?>
                        </li></a>
                        <?php 
   }}
                        ?>
                       
                      </ul>
                    </div>
            </div>
   

<div class="col-md-5">
      <div class="container-fluid ">   

 <!--POS CATEGORY-->
  <div class="row"> 
            <div class="col-sm-6">
                          <select  name="department" id="department" class="input-sm chosen-select">
                                <option value="restaurant">Restaurant</option>
                                <option value="bar">Bar</option>
                            </select>
           </div>  

        <div class="col-sm-6">
            <div>
                  <select name="foodcategory" id="categorisedFood" class="form-control input-sm" >              

                  </select>
          </div>
     </div>     
  </div>
   <!--#POS CATEGORY-->

<!--SEARCH BAR-->
  <div class="filteritem mt-2">
      <input type="text" id="search" class="form-control" placeholder="search" name="search">
</div>
<!--#SEARCH BAR-->
          <hr>

 <div style="max-height: 30em; overflow-y: scroll;">                                          
                     
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
<script type="text/javascript"  src="scripts/keyboard.js"></script>



</body>


</html>