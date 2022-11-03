
  <form id="createbom"  onsubmit="return false" autocomplete="off" >
          
  <div class="card" style="box-shadow:0 0 2px 0 lightgrey; padding: 0 10px 10px 10px;">
            <div class="card-body table-responsive">
              <h4>Choose ingredients</h4>

    <table align="center" style="max-width: 800px;" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th style="text-align: center;">Ingredients</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: center;">UOM</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Total</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
      <tbody id="bom_items">
        
      </tbody>

    </table>
    <!--table ends here-->

  <center style="padding : 10px;">
      <button type="button" id="addRow" style="width:150px;" class="btn btn-success btn-sm">
        <i class="fa fa-plus fa-fw"></i> Add</button>      
    </center>
            </div><!--cardbody ends here-->
          </div> <!--invoice card ends here-->
          <p></p>

          <div class="row">
            <div class="col-lg-6">
             <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Number of units</label><br><br><br>
                <div class="col-lg-12">
                  <input type="number" required="required" name="output_tins_num" id="output_tins_num" class="form-control form-control-sm"/>
                  <small id="output_tins_num_error" class="form-text text-muted"></small>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Total value</label><br>
                <div class="col-lg-12">
                  <input type="text" name="rawvalue_subtotal" id="rawvalue_subtotal" class="form-control form-control-sm" readonly/>
                </div>
              </div>
             
            </div>
            <div class="col-lg-6">
              <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Select output</label><br>
                <div class="col-lg-12">
                  <select name="production_output" id="production_output"  class="form-control chosen-select" tabindex="2">
                    <option value="0">--SELECT OUTPUT--</option>
                <?php 
                  $select = $data->con->query("SELECT * FROM food WHERE active ='1' AND stockstatus ='bom' ORDER BY foodname");
                  while($rws = mysqli_fetch_array($select)){?>
                  <option value="<?php echo $rws['id']; ?>"><?php echo strtoupper($rws['foodname']); ?></option>
                   <?php } ?>             
                </select>
                   <small id="production_output_error" class="form-text text-muted"></small>
                </div>
              </div>
              

              <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Comments</label>
                <div class="col-lg-12">
                  <textarea class="form-control" rows="3" name="production_comments" id="production_comments"></textarea>
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <center>
              <button type="submit" id="save_production"  class="btn btn-dark" ><i class="fa fa-save fa-fw"></i> Save recipe</button>
            </center>
            </div>
        </div>
        </form>