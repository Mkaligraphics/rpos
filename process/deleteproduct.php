<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['productid'])){
 	$id = $_POST['productid'];
 	if ($data->con->query("UPDATE products SET active = '0' WHERE id = '$id'")){
 		echo 1;
 	}
}

?>