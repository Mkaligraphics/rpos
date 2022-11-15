<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

function randomHex() {
  $chars = 'ABCDEF0123456789';
  $color = '#';
  for ( $i = 0; $i < 6; $i++ ) {
     $color .= $chars[rand(0, strlen($chars) - 1)];
  }
  return $color;
}
$category = $_POST['categoryquery'];
  if (!empty($_POST['categoryquery'])) {
    $sql = $data->con->query("SELECT * FROM category_table WHERE category_name LIKE '%".$category."%'  ");
   
  }else{
    $sql = $data->con->query("SELECT * FROM category_table ");
  }


 if (mysqli_num_rows($sql) == true){    
   while ($rws = mysqli_fetch_array($sql)){ ?>
                    
                      <a href="##" class="categoryItem" id="<?php echo $rws['id']; ?>">
                          <li class="list-group-item cursor-pointer font-weight-bold text-white" style=" background-color: <?php echo randomHex(); ?>">
                          <?php echo strtoupper($rws['category_name']); ?>
                        </li>
                      </a>
                     
                        <?php 
   }}else{ ?>

<p class="text-danger p-4 font-weight-bold"> <i class="fa fa-warning fa-fw"></i> Record not found </p>
<?php } ?>
                       