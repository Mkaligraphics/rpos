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
        <link rel="stylesheet" href="css/azia.css">

</head>

<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
<div class="main-panel">
  <div class="content-wrapper">

      <div class="main pt-5">

        <!-- Card With Icon States Color -->
          <?php include 'includes/myiconbox.php'; ?> <br>

              <div class="container-fluid">

              <div class="row">        
                    <h6>Select year</h6>  
                        <select class="form-control chosen-select" name="year" class="form-control" id="year">
                          <option>Select year</option>
                          <?php
                          $qry = $data->con->query("SELECT DISTINCT YEAR(recdate) AS Y FROM incomes WHERE active = '1' ");
                              while($row = mysqli_fetch_assoc($qry)){?> 
                            <option><?php echo $row['Y']; ?></option>
                          <?php } ?>
                                                   
                        </select> 

                        
                        <div id="chart_area" style="width: 100%; height: 420px;"></div>
            </div>
                       
              </div>
      </div>
   
</div>
</div>
</div>   
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="gstatic/loader.js"></script>
<script type="text/javascript" src="scripts/barchart.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".chosen-select").chosen();
  });

</script>
</body>
</html>