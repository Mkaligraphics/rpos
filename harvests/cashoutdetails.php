<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();
 		if (isset($_POST['order'])){
 			$order = $_POST['order'];
 				$qry=$data->con->query("SELECT sales_table.timestamp, sales_table.details, customer_tables.table_number, clients_table.name FROM  customer_tables, sales_table, clients_table  WHERE  customer_tables.id = sales_table.table_id AND clients_table.id = sales_table.customer_id AND sales_table.id = '$order'  ");
 				if (mysqli_num_rows($qry) > 0){
							while($row = mysqli_fetch_assoc($qry)) {
										echo json_encode($row);
							}
				} 
 		}

?>

