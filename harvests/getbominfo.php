<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();
 		if (isset($_POST['thisId'])){
 			$thisId = $_POST['thisId'];
 				$qry=$data->con->query("SELECT * FROM bomdetails  WHERE id = '$thisId' AND active='1' ");
 				if (mysqli_num_rows($qry) > 0){
							while($row = mysqli_fetch_assoc($qry)) {
										echo json_encode($row);
							}
				} 
 		}

?>

