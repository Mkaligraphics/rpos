<form method="POST" onsubmit="return false" class="lendutensil" action="process/lendutensils.php">  

  <div class="form-group row">
    <div class="col-sm-12">
        <label>Choose staff</label>
        <select class="form-control chosen-select" id="lendidsearch" name="userid">
          <option value="0">--SELECT STAFF--</option>
            <?php 
          $select  = $data->con->query("SELECT * FROM users WHERE active ='1' AND level != '1'");
          while ($rows = mysqli_fetch_array($select)){?>
            <option value="<?php echo $rows['id']; ?>"><?php echo strtoupper($rows['fname']).' '.strtoupper($rows['lname']); ?></option>
            <?php 
          }
            ?> 
        </select>     
      </div>
  </div>
   
  
  <div class="card" style="box-shadow:0 0 15px 0 lightgrey; padding: 0 10px 10px 10px;">
            <div class="card-body table-responsive">
              <h4>Choose items</h4>

    <table align="center" style="max-width: 800px;" class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th style="text-align: center;">Utensil</th>
                    <th style="text-align: center;">quantity</th>
                    <th style="text-align: center;">stock</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>

      <tbody id="utensils_items">
        
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


         

    <div class="col-lg-12">
        <center>
              <button type="submit" id="save_utensils"  class="btn btn-dark" ><i class="fa fa-save fa-fw"></i> Lend items</button>
        </center>
            </div>
    </div>
</form>