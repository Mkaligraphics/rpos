<!-- Modal -->
<div class="modal fade" id="addBom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">New ingredient</h4>
            </div>
            <!--Body-->
            <div class="modal-body">

              <div class="addbomfeed"></div>

 <form onsubmit="return false" action="process/addingredient.php" method="POST" class="newingredient">
           <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Choose product</label>
                        <select class="form-control " name="addproduct" id="addproduct">
                            <option value="0">--SELECT PRODUCT--</option>
                            <?php 
                           $qry=$data->con->query("SELECT * FROM products WHERE active = '1' ORDER BY description");
                           while($row = mysqli_fetch_assoc($qry)){?>                       
                          <option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['description']); ?></option>
                              <?php } ?>
                          
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label>UOM</label>
                        <input type="text" readonly="readonly" class="form-control " name="adduom" id="adduom">                            
                    </div>
                    

                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Quantity <span class="text-danger">*</span></label>
                  <input type="text" required="required" class="form-control" id="addquantity" value="0" name="addquantity" >
                    </div>

                    <div class="col-sm-6">
                        <label>Amount</label>
                        <input type="text"  name="addcost" class="form-control" id="addcost" readonly >
                    </div>
                </div>

<input type="hidden" name="foodid" id="food">

          <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-save fa-fw"></i> Add ingredient</button>

</form>
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   