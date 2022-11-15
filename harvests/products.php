
<?php 
 require '../classes/dbase.class.php';
 $data = new dbase;

if (isset($_POST['item']) && !empty($_POST['item'])){

      $item = $_POST['item']; 
      $sql = $data->con->query("SELECT * FROM products_table  WHERE category_id = '$item' ");
      if (mysqli_num_rows($sql) ==  false){
          echo '<span class="text-danger">No records</span>';
      } else {
      while ($rw =  $sql->fetch_assoc()) { ?> 

  <div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 18em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">
          <?php  echo ucfirst($rw['product_name']);  ?> 

           <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['product_name']); ?>" />
  <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['online_price']; ?>"  />    
        </span>
    <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo1']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['online_price'];  ?></small>
        </p>
        <span class="text-success"><?php echo $rw['no_units']; ?></span>
        </div>
  </div>


<?php }}}  elseif(isset($_POST['item'])){ 
      $sql = $data->con->query("SELECT * FROM products_table WHERE category_id = '".$_POST['categoryId']."' ");
      if (mysqli_num_rows($sql) ==  false){
          echo '<span class="text-danger">No records</span>';
      } else {
       while ($rw =  $sql->fetch_assoc()) {
  ?>
  
  <div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 18em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">
          <?php            echo ucfirst($rw['foodname']); ?>  
                   <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['product_name']); ?>" />
  <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['online_price']; ?>"  />      
        
        </span>
    <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['online_price']  ?></small>
        </p>
        <span class="text-success"><?php echo $rw['no_units']; ?></span>

        </div>
  </div>


<?php }}} elseif (isset($_POST['search'])){ 
  $categoryid = $_POST['categoryid'];
  $sql = $data->con->query("SELECT * FROM products_table WHERE product_name like '%".$_POST['search']."%' AND category_id = '".$_POST['categoryid']."'  " );
      if (mysqli_num_rows($sql) ==  false){
          echo '<span class="text-danger">No records</span>';
      } else {
       while ($rw =  $sql->fetch_assoc()) {?>
  
  <div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 18em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">
          <?php            echo ucfirst($rw['product_name']); ?>  
                   <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['product_name']); ?>" />
  <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['online_price']; ?>"  />      
        
        </span>
    <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo1']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['online_price']  ?></small>
        </p>
        <span class="text-success"><?php echo $rw['no_units']; ?></span>

        </div>
  </div>


<?php }}} else { ?>

<?php
     $sql = $data->con->query("SELECT * FROM products_table   ");
     if (mysqli_num_rows($sql) ==  false){
        echo '<span class="text-danger">No records</span>';
    } else {
    while ($rw =  $sql->fetch_assoc()) { ?> 

<div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 18em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">

          <?php  echo ucfirst($rw['product_name']);  ?> 

           <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['product_name']); ?>" />
          <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['online_price']; ?>"  />    
        </span>
          <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo1']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['online_price'];  ?></small>
        </p>
        <span class="text-success"><?php echo $rw['no_units']; ?></span>

        </div>
  </div>

  <?php 
      }}} 
  ?>

