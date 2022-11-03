<?php
require 'classes/autoloader.php'; 
$data =  new modules();
$profile = new profile();
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

                      <table id="dataTable"  class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Photo</td>
                                <td>Food type</td>
                                <td>Category</td>
                                <td>Price</td>
                                <td>Action</td>
                              </tr>                            
                          </thead>
                          <tbody>
                            
                          </tbody>
                        
                      </table>

                      

                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">New food type</h4>                  
                      <p class="card-description">
                        <span class="foodfeedback"></span><span id="foodfeedback"></span>
                      </p>
 
              <form class="newfood" action="process/newfood.php" method="POST" onsubmit="return false">
                    <div class="form-group newstock">
                      <label>Food name<span class="text-danger">*</span></label>
                      <input class="form-control"  name="foodname" type="text" >
                    </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label>Units<span class="text-danger">*</span></label>
                      <select name="unit" class="form-control chosen-select">
                        <option value="0">--SELECT UNIT--</option>
                      <?php
                        $sql = $data->con->query("SELECT * FROM units WHERE active = '1'");
                        while($rws = mysqli_fetch_array($sql)){ ?>
                          <option value="<?php echo $rws['id']; ?>"><?php echo strtoupper($rws['unitname']); ?></option>
                        <?php } ?>
                                                
                      </select>
                    </div>

                <div class="col-sm-6">
                    <label>Stock status</label>                        
                    <select class="form-control chosen-select" name="stockstatus">
                      <option value="0">--SELECT STATUS--</option>
                          <option value="bom">BOM</option>
                          <option value="direct">DIRECT</option>                      
                    </select>
                </div>
                </div>


                    <div class="form-group ">
                        <label for="inputCity">Upload photo</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="photo">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>  
                    </div>  

              <div class="form-group row">
                <div class="col-sm-6">
                  <label>Price per unit <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="unitprice" name="unitprice" value="0">
                    </div>
                    <div class="col-sm-6">
                        <label>Category</label>                        
                        <select class="form-control" name="category">
                          <option value="0">Select category</option>
                          <?php
                        $sql = $data->con->query("SELECT * FROM foodcategory WHERE active = '1'");
                        while($rws = mysqli_fetch_array($sql)){ ?>
                          <option value="<?php echo $rws['id']; ?>"><?php echo ucfirst($rws['foodcategory']); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

               
                    <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-save fa-fw"></i> Save product</button>
                    
            </form>
          
          
              </div>
            </div>
      </div>

          

        </div>
      </div>
    </div>   
  <?php require 'modals/editfood.php'; ?>
  <?php require 'modals/editphoto.php'; ?>
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/food.js"></script>

</body>
</html>