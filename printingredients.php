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
</head>

<body>

 <?php require 'includes/adminnav.php'; ?>
        
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
      <div class="content-wrapper">

          <div class="main p-5"> 

                  <div class="form-group row">

                      <div class="col">
                        <select class="form-control chosen-select ingredientDate">
                             <?php
                                $sql = $data->con->query("SELECT duedate FROM ingredients WHERE active = '1' GROUP BY duedate ORDER BY id DESC ");
                                  while($row = mysqli_fetch_array($sql)){?>
                                   <option value="<?php echo $row['duedate'];?>"><?php echo $row['duedate']; ?></option>
                                 <?php }
                               ?>
                              
                        </select>
                      </div>

                      <div class="col ">
                            <button class="btn btn-primary btn-block" id="printingredient"><i class="fa fa-print fa-fw"></i> Download</button>
                      </div>

                  </div>

              
                  <div id="ingredientsArea" class="ingredientscost">
                             
                    
                  </div>
                
                
         

          </div>

    </div>
  </div>
</div>   


<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/ingredients.js"></script>

</body>
</html>