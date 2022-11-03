
  <form id="savedirectfood"  onsubmit="return false" autocomplete="off" >
          <div class="form-group row">
              <label class="col-lg-3 col-form-label" align="right">Purchase Date</label>
              <div class="col-lg-9">
                <input type="text" id="production_date" name="production_date" readonly class="form-control form-control-sm" value="<?php echo date('d/m/Y'); ?>"/>
              </div>
            </div>
          
  
  <div class="card" style="box-shadow:0 0 15px 0 lightgrey; padding: 0 10px 10px 10px;">
            <div class="card-body table-responsive">
              <h4>Choose items</h4>

    <table align="center" style="max-width: 800px;" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th style="text-align: center;">Description</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: center;">Supplier</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">B/price</th>
                    <th style="text-align: center;">S/price</th>
                    <th style="text-align: center;">Total buying</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
      <tbody id="direct_items">
        
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
                <label for="" class="col-lg-12 col-form-label">Total Items</label><br>
                <div class="col-lg-12">
                  <input type="text" name="totalquanity" id="totalquanity" class="form-control form-control-sm" readonly />
                </div>
              </div>
            </div>

            <div class="col-lg-6">
               <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Total buying price</label><br>
                <div class="col-lg-12">
                  <input type="text" name="rawvalue_total" id="totalbuying" class="form-control form-control-sm" readonly />
                </div>
            </div>       
            </div>

            <div class="col-lg-12">
              <center>
              <button type="submit" id="save_food"  class="btn btn-dark" ><i class="fa fa-save fa-fw"></i> Save Purchases</button>
            </center>
            </div>
        </div>
</form>