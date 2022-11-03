<?php
 require '../classes/dbase.class.php'; 
 $data = new dbase();
 if ($_POST['order']){
 	$order = $_POST['order'];
 	$sql = $data->con->query("SELECT sum(grandtotal) FROM foodorder WHERE id = '$order' ");
 	while ($rw = mysqli_fetch_array($sql)){
	   echo number_format($rw[0],2)> 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
	}
 	
 	 }

?>