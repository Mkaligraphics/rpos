<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['that'])){
 	$id = $_POST['that'];
 	if ($data->con->query("UPDATE food SET active = '0' WHERE id = '$id'")){
 		echo 1;
 	}
}

?>