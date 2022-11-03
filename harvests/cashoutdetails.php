<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();
 		if (isset($_POST['order'])){
 			$order = $_POST['order'];
 				$qry=$data->con->query("SELECT foodorder.id, foodorder.recdate,tables.label AS tablelabel,customer.fullname FROM foodorder, customer, tables  WHERE foodorder.id = '$order' AND foodorder.customer = customer.id AND tables.id = foodorder.tablelabel AND foodorder.prepared != '2' ");
 				if (mysqli_num_rows($qry) > 0){
							while($row = mysqli_fetch_assoc($qry)) {
										echo json_encode($row);
							}
				} 
 		}

?>

