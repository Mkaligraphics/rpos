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
</head>
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

                      <table id="dataTable" class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Description</td>
                                <td>Quantity</td>
                                <td>Unit quanity</td>
                                <td>Price</td>
                                <td>Reorder</td>
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

                  <h4 class="card-title">New product</h4>                  
                      <p class="card-description">
                        <span class="stockfeedback"></span><span id="stockfeedback"></span>
                      </p>
 
              <form class="newstock" action="process/newstock.php" method="POST" onsubmit="return false">
                    <div class="form-group newstock">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control "  name="description" type="text" >
                    </div>

                    <div class="form-group">
                      <label>Units<span class="text-danger">*</span></label>
                      <select name="unit" class="form-control chosen-select">
                        <?php
                        $sql = $data->con->query("SELECT * FROM units WHERE active ='1' ");
                        if (mysqli_num_rows($sql) > 0){
                          while ($rw = mysqli_fetch_array($sql)){

                        ?>
                          <option value="<?php echo $rw['id'] ?>"><?php echo strtoupper($rw['unitname']) ?></option>
                          
                          <?php }} ?>
                      </select>
                    </div> 

                    <div class="form-group">
                      <label>Reorder level<span class="text-danger">*</span></label>
                      <input class="form-control" name="reorder" type="text" value="1" >
                    </div>                     


              <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Unity quantity <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="unitquantity" name="unitquantity" value="0">
                    </div>
                    <div class="col-sm-6">
                        <label>Cost per unity</label>
                        <input type="text" name="costperunit" id="costperunit" value="0" class="form-control" >
                    </div>
                </div>

                    <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-save fa-fw"> </i>Save product</button>
                    
            </form>
          
          
              </div>
            </div>
      </div>

       
        </div>
      </div>
    </div>   
 <?php require 'modals/editproduct.php'; ?>   
<?php require 'includes/bottomlinks.php'; ?>
<script type="text/javascript" src="scripts/stock.js"></script>

</body>
</html>