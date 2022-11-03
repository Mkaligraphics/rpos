<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

 		if (isset($_POST['productid'])){
 			$thisId = $_POST['productid'];
 				$qry=$data->con->query("SELECT products.costperunit, products.unitquantity, units.unitname FROM products,units WHERE products.id = '$thisId' AND products.unit = units.id ");
							while($row = mysqli_fetch_assoc($qry)) {
									echo json_encode($row);

							}
				
 		}

?>

