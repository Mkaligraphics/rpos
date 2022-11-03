<!-- Modal -->
<div class="modal fade" id="editbom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit ingredient</h4>
            </div>
            <!--Body-->
            <div class="modal-body">

              <div class="bomfeed"></div>

 <form onsubmit="return false" action="process/changebom.php" method="POST" class="changebom">
           <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Choose product</label>
                        <select class="form-control " name="product" id="product">
                            <option value="0">--SELECT PRODUCT--</option>
                            <?php 
                           $qry=$data->con->query("SELECT * FROM products WHERE active = '1' ORDER BY description");
                           while($row = mysqli_fetch_assoc($qry)){?>                       
                          <option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['description']); ?></option>
                              <?php } ?>
                          
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label >UOM </label>
                        <select class="form-control " name="uom" id="uom">
                            <option value="0">--SELECT UNIT--</option>
                            <?php 
                           $qry=$data->con->query("SELECT * FROM units WHERE active = '1' ORDER BY unitname");
                           while($row = mysqli_fetch_assoc($qry)){?>                       
                          <option value="<?php echo $row['unitname'] ?>"><?php echo strtoupper($row['unitname']); ?></option>
                              <?php } ?>
                          
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Quantity <span class="text-danger">*</span></label>
                  <input type="text" required="required" class="form-control" id="quantity" name="quantity" >
                    </div>

                    <div class="col-sm-6">
                        <label>Amount</label>
                        <input type="text"  name="cost" class="form-control" id="cost" readonly >
                    </div>
                </div>

                <input type="hidden" id="productid" name="productid" >

                <input type="hidden" id="fid" name="foodid" >

                <input type="hidden" id="rowid" name="rowid" >

          <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-refresh fa-fw"></i>Update</button>

</form>
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   