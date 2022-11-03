<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['deleteid'])){
 	$id = $_POST['deleteid'];
 	if ($data->con->query("UPDATE utensils SET active = '0' WHERE id = '$id'")){
 		echo 1;
 	}
}

?>