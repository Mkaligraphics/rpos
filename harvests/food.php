
<?php 
 require '../classes/dbase.class.php';
 $data = new dbase;

if (isset($_POST['department']) && !empty($_POST['department'])){

      $department = $_POST['department']; 
      $sql = $data->con->query("SELECT food.id AS id, food.foodname, food.price, food.photo FROM food, foodcategory WHERE foodcategory.department = '$department' AND food.active = '1' AND food.category = foodcategory.id");
      if (mysqli_num_rows($sql) ==  false){
          echo '<span class="text-danger">No records</span>';
      } else {
      while ($rw =  $sql->fetch_assoc()) { ?> 

  <div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 15em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">
          <?php  echo ucfirst($rw['foodname']);  ?> 

           <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['foodname']); ?>" />
  <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['price']; ?>"  />    
        </span>
    <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['price'];  ?></small>
        </p>
        </div>
  </div>


<?php }}}  elseif(isset($_POST['categoryId'])){ 
      $sql = $data->con->query("SELECT * FROM food WHERE category = '".$_POST['categoryId']."' ");
      if (mysqli_num_rows($sql) ==  false){
          echo '<span class="text-danger">No records</span>';
      } else {
       while ($rw =  $sql->fetch_assoc()) {
  ?>
  
<div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 15em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">
          <?php            echo ucfirst($rw['foodname']); ?>  
                   <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['foodname']); ?>" />
  <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['price']; ?>"  />      
        
        </span>
    <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['price']  ?></small>
        </p>
        </div>
  </div>


<?php }}} elseif (isset($_POST['search'])){ 
  $sql = $data->con->query("SELECT food.id AS id, food.foodname, food.price, food.photo FROM food, foodcategory WHERE  food.foodname like '%".$_POST['search']."%' AND food.category = '".$_POST['categorie']."' AND foodcategory.department = '".$_POST['departmento']."' AND food.category = foodcategory.id " );
      if (mysqli_num_rows($sql) ==  false){
          echo '<span class="text-danger">No records</span>';
      } else {
       while ($rw =  $sql->fetch_assoc()) {?>
  
<div class="card p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 15em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">
          <?php            echo ucfirst($rw['foodname']); ?>  
                   <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['foodname']); ?>" />
  <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['price']; ?>"  />      
        
        </span>
    <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['price']  ?></small>
        </p>
        </div>
  </div>


<?php }}} else { ?>

<?php
     $department = $_POST['department']; 
    $sql = $data->con->query("SELECT food.id AS id, food.foodname, food.price, food.photo FROM food, foodcategory WHERE foodcategory.department = '$department' AND food.active = '1' AND food.category = foodcategory.id");
    if (mysqli_num_rows($sql) ==  false){
        echo '<span class="text-danger">No records</span>';
    } else {
    while ($rw =  $sql->fetch_assoc()) { ?> 

  <div class="card  p-2 mb-2 stw_id" id="<?php echo $rw['id']; ?>" style="width: 10em; float: left; margin: 2px; text-align: center; height: 15em; cursor: pointer;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;" >
    <span class="d-block text-center text-info">

          <?php  echo ucfirst($rw['foodname']);  ?> 

           <input type="hidden" name="product_quantity" id="product_quantity<?php echo $rw['id']; ?>" class="form-control" value="1" />
        <input type="hidden" name="hidden_name" id="name<?php echo $rw['id']; ?>" value="<?php echo ucfirst($rw['foodname']); ?>" />
          <input type="hidden" name="hidden_price" id="item_price<?php echo $rw['id']; ?>" value="<?php echo $rw['price']; ?>"  />    
        </span>
          <a href="#" class="mt-2"><img src="photos/<?php echo  $rw['photo']; ?>" style="width: 6em; height: 6em;"></a>
        <div class="card-body" >
          <p class="card-text">
            <small class="font-weight-bold d-block text-center text-danger">Ksh <?php echo $rw['price'];  ?></small>
        </p>
        </div>
  </div>

  <?php 
      }}} 
  ?>

