<!-- Modal -->
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content panel-info">
            <!--Header-->
            <div class="modal-header">                
                <h4 class="modal-title w-100" id="myModalLabel">Edit product</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <span class="editfeed"></span> <span id="editfeed"></span>

        <form class="editstock" action="process/editstock.php" method="POST" onsubmit="return false">
                    <div class="form-group newstock">
                      <label>Description<span class="text-danger">*</span></label>
                      <input class="form-control" required="required"  name="description" id="description" type="text" >
                    </div>

                    <div class="form-group ">
                      <label>Units<span class="text-danger">*</span></label>
                      <select name="units" id="unit" class="form-control ">
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
                      <input class="form-control" id="reorder" required="required" name="reorder" type="text" value="1" >
                    </div>                     


              <div class="form-group row">
                    <div class="col-sm-6">
                  <label>Unity quantity <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" required="required" id="unitquantitys" name="unitquantity" value="0">
                    </div>
                    <div class="col-sm-6">
                        <label>Cost per unity</label>
                        <input type="text" name="costperunit" required="required" id="costperunits" value="0" class="form-control" >
                    </div>
                </div>

           <input type="hidden" id="proid" name="proid">

            <!--Footer-->
            <div class="modal-footer">
                <button type="button" id="trial" class="btn btn-info" data-dismiss="modal">Close</button>                 
                 <button type="submit" class="btn btn-success">confirm</button>
</div>
</form>
              
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  <!--/.End of modal Content-->   