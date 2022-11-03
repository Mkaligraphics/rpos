<?php
 require '../classes/dbase.class.php'; 
 $data = new dbase();
 if ($_POST['task']){
 	$sql = $data->con->query("SELECT count(id) FROM foodorder WHERE prepared = '1' ");
 	while ($rw = mysqli_fetch_array($sql)){
	   echo $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
	}
 	
 	 }

?>