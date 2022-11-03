  <?php $today = date('m/d/Y');  ?>
  
  <div id="invoice_response"></div>
  
<form class="purchase_item" id="purchase_item" method="POST" onsubmit="return false" autocomplete="off" action="process/purchase.php" >

        <div class="form-group row">
          <label for="order" class="col-sm-3 col-form-label">Purchase date:</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="purchae_date" name="purchase_date" value="<?php echo $today; ?> "readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="order" class="col-sm-3 col-form-label">Batch no:</label>
          <div class="col-sm-9">
            <?php 
            $sql = $data->con->query("SELECT batchno FROM utensilspurchase ORDER BY id DESC LIMIT 1");
            if (mysqli_num_rows($sql) >0){
            while ($row = mysqli_fetch_array($sql)) {?>
                <input type="text" class="form-control" id="batchno" name="batchno" value="<?php echo $row['batchno']; ?>">
          <?php } } else{?>
              <input type="text" class="form-control" id="batchno" name="batchno" value="1">
          <?php } ?>
          </div>
        </div>

       
   <div class="card" style="box-shadow:0 0 2px 0 lightgrey; padding: 0 10px 10px 10px;">
            <div class="card-body table-responsive">
              <h4>Purchase lists</h4>
              <table align="center" style="max-width: 100%;" class="table">
                <thead>
                  <tr> 
                  <th>#</th>                   
                    <th style="text-align: center;">Utensil</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Total cost</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody id="purchase_items">
                  
                </tbody>
              </table><!--table ends here-->
    </div> 

  <center style="padding : 10px;">
                <button type="button" id="addRowpurchase" style="width:150px;" class="btn btn-success btn-sm"><i class="fa fa-plus fa-fw">&nbsp;</i> Add</button>
                
              </center> 
   </div><!--cardbody ends here-->
          

<section>
      <div class="row">
            <div class="col-lg-12">
              <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Sub total</label><br>
                <div class="col-lg-12">
                  <input type="text" name="sub_purchase" id="sub_purchase" class="form-control form-control-sm sub_purchase"  readonly/>
                </div>
              </div>             
            </div>
           </div>
              <center>
            <button type="submit" id="save_purchase"  class="btn btn-dark"><i class="fa fa-save fa-fw"></i> Save purchase</button>
          </center><br/>
            </div>
        </div>
        
    
    
 </section>
 </form>
</div>
