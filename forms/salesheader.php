
<div class="form-group col-xs-10 col-sm-12 col-md-12 col-lg-12 ">
    <select class="form-control chosen-select input-sm" id="table" name="table">
        <?php 
            $qry = $data->con->query("SELECT * FROM customer_tables WHERE active = '1'");
            while ($rw = mysqli_fetch_array($qry)) { ?>
                    <option value="<?php echo $rw['id']; ?>"><?php echo strtoupper($rw['table_number']); ?></option>  
            <?php }  ?>                                    
    </select>
</div>

</div>   


<div class="row">             
             <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <select class="chosen-select form-control" id="customer" name="customer" data-placeholder="Choose a Country"  tabindex="2">                    
                                            <?php 
    $qry = $data->con->query("SELECT * FROM  clients_table  WHERE s = '1' ");
            while ($rw = mysqli_fetch_array($qry)) { ?>
<option value="<?php echo $rw['id'];?>"><?php echo strtoupper($rw['name']); ?></option>   
             <?php }  ?>          
     </select>
</div>


