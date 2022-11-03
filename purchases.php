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

                      <table id="productTable"   class="table table-stripped">
                          <thead class="font-weight-bold">
                              <tr>
                                <td>Description</td>
                                <td>Quantity</td>
                                <td>Unit quanity</td>
                                <td>Price</td>
                                <td>Reorder level</td>
                                <td>Action</td>
                              </tr>                            
                          </thead>
                          <tbody>
                            <?php 
                               $sel = $data->con->query("SELECT * FROM products WHERE active = '1'");
                                while ($rws = mysqli_fetch_array($sel)){ ?>
                                    <tr>
                                      <td><?php echo strtoupper($rws['description']); ?></td>
                                      <td><?php echo $rws['quantity']; ?></td>
                                      <td><?php echo $rws['unitquantity']; ?></td>
                                      <td><?php echo $rws['costperunit']; ?></td>
                                      <td><?php echo $rws['reorder']; ?></td>
                                      <td><button id="<?php echo $rws['id']; ?>" class="btn btn-info addstock">Add</button></td>
                                    </tr>
                                  <?php } ?>
                            
                          </tbody>
                      </table>
                        
                  </div>                 
                 
                </div>
              </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">Buy stocks</h4>                  
                      <p class="card-description">
                        <span class="addstockfeed"></span><span id="addstockfeed"></span>
                      </p>
 
              <form class="morestock" action="process/morestock.php" method="POST" onsubmit="return false">

                <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Select supplier <span class="text-danger">*</span></label>
                  <select class="form-control chosen-select" name="supplier">
                    <option value="0">--SELECT SUPPLIER--</option>
                    <?php
                    $qry=$data->con->query("SELECT * FROM suppliers WHERE active  = '1' ");
                  while($row = mysqli_fetch_assoc($qry)){?>                   
                    <option value="<?php echo $row['id']; ?>"><?php echo strtoupper($row['description']); ?></option>
                  <?php } ?>
                  </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Status</label>                        
                              <select class="form-control chosen-select" name="status" id="status">
                                  <option value="debit">DEBIT</option>
                                  <option value="credit">CREDIT</option>
                              </select>
                    </div>
                </div>

                    <div class="form-group">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control text-success" required="required" readonly="readonly" id="adddescription"  name="adddescription" type="text" >
                    </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                  <label>UOM <span class="text-danger">*</span></label>
                  <input class="form-control text-success" required="required" readonly="readonly" id="addunit" name="addunit" type="text" >
                    </div>

                    <div class="col-sm-6">
                        <label>Unit quantity</label>
                        <input class="form-control text-success" readonly="readonly" id="addquantities"  name="addquantities" type="text" >
                    </div>
                </div>

              <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Quantity <span class="text-danger">*</span></label>
                  <input type="text" class="form-control text-success" id="addunitquantity" required="required" name="addunitquantity" value="0">
                    </div>
                    <div class="col-sm-6">
                        <label>Cost per unity</label>
                        <input class="form-control text-success" readonly="readonly" id="addprice"  name="addprice" type="text" >
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-6">
                 <label>Total<span class="text-danger">*</span></label>
                      <input class="form-control text-success" required="required" readonly="readonly" id="addtotalcost"  name="addtotalcost" type="text" >
                    </div>

                    <div class="col-sm-6">
                        <label>Paid</label>
                        <input class="form-control text-success" id="paid" readonly="readonly"  name="paid" type="text" >
                    </div>
                </div>




                <input type="hidden" id="productid" name="productid">

                    <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-save fa-fw"></i> save product</button>
                    
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

<script type="text/javascript">
  $('#productTable').DataTable();
</script>


</body>
</html>