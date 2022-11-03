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

                    <span id="lendfeedback"></span><span class="lendfeedback"></span>

<form method="POST" onsubmit="return false" class="lendutensil" action="process/lendutensils.php">
                <div class="form-group row">
                    <div class="col-sm-12">
                       <label>Id number</label>
                      <select class="form-control chosen-select" id="lendidsearch" name="userid">
                        <option value=""> --SELECT STAFF--</option>
                          <?php 
                        $select  = $data->con->query("SELECT * FROM users WHERE active ='1' AND level != '1'");
                        while ($rows = mysqli_fetch_array($select)){?>
                          <option value="<?php echo $rows['id']; ?>"><?php echo strtoupper($rows['fname']).' '.strtoupper($rows['lname']); ?></option>
                          <?php 
                        }
                          ?>     
                        
                      </select>     
              </div>                  
                    
                </div>

            <table class='table table-stripped'>
                <tr class="font-weight-bold">
                    <td>Utensil</td>
                    <td>Quantity</td>
                    <td>Action</td>
                </tr>

                <tbody class="borroweditems">


                </tbody>

                
            </table>
                   

</form>
                      

                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                                           <div id="viewborrower"></div>
          
              </div>
            </div>
      </div>

       
        </div>
      </div>
    </div>   
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/utensils.js"></script>
<script type="text/javascript">
  $('#utensilsTable').DataTable();
</script>



</body>
</html>