<?php
 require '../classes/dbase.class.php';
 $data = new dbase();
$tablename=$_POST['tablename'];
$id=$_POST['pid'];
$sql="SELECT products.id, products.quantity,products.unitquantity,products.costperunit,units.unitname FROM ".$tablename.", units WHERE products.id='$id' AND products.unit = units.id";
$query=mysqli_query($data->con,$sql) or die(mysqli_error($con));
if ((mysqli_num_rows($query))>0){
	echo json_encode(mysqli_fetch_array($query));
}

?>