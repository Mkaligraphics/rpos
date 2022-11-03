<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

 		if (isset($_POST['productid'])){
 			$thisId = $_POST['productid'];
 				$qry=$data->con->query("SELECT * FROM products WHERE id = '$thisId' ");
							while($row = mysqli_fetch_assoc($qry)) {
										$costperunit = $row['costperunit'];
										$unitquantity = $row['unitquantity'];
										$quantity = $_POST['quantity'];
										echo $newAmount = ($quantity * $costperunit)/ $unitquantity;

							}
				
 		}

?>

