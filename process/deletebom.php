<?php

require '../classes/dbase.class.php';
 $data = new dbase();

if (isset($_POST['deleteid'])){
 	$id = $_POST['deleteid'];
 	if ($data->con->query("UPDATE bom SET active = '0' WHERE foodid = '$id'")){
 			$data->con->query("UPDATE bomdetails SET active = '0' WHERE foodid = '$id'");
 		echo 1;
 		
 	}
}


?>