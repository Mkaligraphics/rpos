<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

 		if (isset($_POST['productid'])){
 			$id = $_POST['productid'];
 				$qry=$data->con->query("SELECT products.id, units.id As unitId, products.description, units.unitname,products.quantity,products.unitquantity, products.costperunit,products.reorder FROM products, units WHERE products.id='$id' AND products.unit = units.id ");
							while($row = mysqli_fetch_assoc($qry)) {
										echo json_encode($row);
							}

 		}

?>
