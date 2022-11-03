<!-- Modal -->
<div class="modal fade" id="editfood" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit food</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="foodfeed"></div><div id="foodfeed"></div>
                
      <form class="editfoodform" action="process/editfood.php" method="POST" onsubmit="return false">
                    <div class="form-group newstock">
                      <label>Food name<span class="text-danger">*</span></label>
                      <input class="form-control" id="foodname" name="foodname" type="text" >
                    </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label>Units<span class="text-danger">*</span></label>
                      <select name="unit" id="unit" class="form-control">
                        <option value="0">Select unit</option>
                      <?php
                        $sql = $data->con->query("SELECT * FROM units WHERE active = '1'");
                        while($rws = mysqli_fetch_array($sql)){ ?>
                          <option value="<?php echo $rws['id']; ?>"><?php echo ucfirst($rws['unitname']); ?></option>
                        <?php } ?>
                                                
                      </select>
                    </div>

                <div class="col-sm-6">
                    <label>Stock status</label>                        
                    <select class="form-control" name="stockstatus" id="stockstatus">
                      <option value="0">Select status</option>
                          <option value="bom">BOM</option>
                          <option value="direct">Direct</option>                      
                    </select>
                </div>
                </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label>Price per unit <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="col-sm-6">
                        <label>Category</label>                        
                        <select class="form-control" name="category" id="category">
                          <option value="0">Select category</option>
                          <?php
                        $sql = $data->con->query("SELECT * FROM foodcategory WHERE active = '1'");
                        while($rws = mysqli_fetch_array($sql)){ ?>
                          <option value="<?php echo $rws['id']; ?>"><?php echo ucfirst($rws['foodcategory']); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>

                     <input type="hidden" id="foodid" name="foodid">             
           


            <!--Footer-->
            <div class="modal-footer">
                <button type="button" id="trial" class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success" id="updatefood">confirm</button>
</div>

     </form>          
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   