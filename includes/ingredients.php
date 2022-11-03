  <?php 
                    $today = date('m/d/Y'); 
                   
  ?>
  <div id="invoice_response"></div>
  
<form class="save_ingredients" id="save_ingredients" method="POST" onsubmit="return false" autocomplete="off" action="process/save_ingredients.php" >

        <div class="form-group row">
          <label for="order" class="col-sm-3 col-form-label">Select food</label>
          <div class="col-sm-9">
            <input type="text" id="datepicker" class="form-control" name="datePicker" value="<?php echo $today; ?> " readonly>
          </div>
        </div>

       
   <div class="card" style="box-shadow:0 0 2px 0 lightgrey; padding: 0 10px 10px 10px;">
            <div class="card-body table-responsive">
              <h4>Food list</h4>
              <table align="center" style="max-width: 100%;" class="table">
                <thead>
                  <tr> 
                  <th>#</th>                   
                    <th style="text-align: center;">Food</th>
                    <th style="text-align: center;">Unit numbers</th>
                    <th style="text-align: center;">Cost</th>
                    <th style="text-align: center;">Quanity</th>
                    <th style="text-align: center;">Total cost</th>
                    <th style="text-align: center;">Details</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody id="ingredients_items">
                  
                </tbody>
              </table><!--table ends here-->
    </div> 

  <center style="padding : 10px;">
                <button type="button" id="addRow" style="width:150px;" class="btn btn-success btn-sm"><i class="fa fa-plus fa-fw">&nbsp;</i> Add</button>
   </center> 
   </div><!--cardbody ends here-->
          

<section>
      <div class="row">
            <div class="col-lg-12">
              <div class="form-group row">
                <label for="" class="col-lg-12 col-form-label">Sub total</label><br>
                <div class="col-lg-12">
                  <input type="text" name="sub_total" id="sub_total" class="form-control form-control-sm"  readonly/>
                </div>
              </div>             
            </div>
           </div>
              <center>
            <button type="submit" id="save_order"  class="btn btn-dark"><i class="fa fa-save fa-fw"></i> Save ingredients</button>
          </center><br/>
            </div>
        </div>
        
    
    
 </section>
 </form>
</div>
