<?php 
 require '../classes/dbase.class.php';
 $data = new dbase();

if ($_POST['addquantity'] > 0){
	$productid = $_POST['addproduct'];
	$uom = $_POST['adduom'];
	$quantity = $_POST['addquantity'];
	$cost = $_POST['addcost'];
	$foodid = $_POST['foodid'];

$select = $data->con->query("SELECT id FROM bomdetails WHERE productid = '$productid' AND foodid = '$foodid' AND active = '1'");

if (mysqli_num_rows($select)){
	echo '<span class="text-danger">This product already exists </span>';
	exit(0);
}

	$data->con->query("INSERT INTO bomdetails (productid, quantity, uom, total, foodid) VALUES ('$productid','$quantity','$uom','$cost','$foodid') ");
		echo '<span class="text-success">You have successful added ingredient</span>';
} else {
	echo '<span class="text-danger">Quantity should not be less than zero </span>'; 
}

 ?>