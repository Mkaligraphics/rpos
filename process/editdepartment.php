<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['updatevalue']) && isset($_POST['depid'])){
	$description = strtolower($_POST['updatevalue']);
	if (empty($_POST['updatevalue']) || empty($_POST['depid'])){
		echo  'Field can\'t be empty' ;
	} else {
		
$select = $data->con->query("SELECT id FROM departments WHERE description = '$description' AND active = '1'");
if (mysqli_num_rows($select) == true){
	echo  0;
	exit(0);
}

 	$updatevalue = $_POST['updatevalue'];
 	$depid = $_POST['depid'];
 	if ($data->con->query("UPDATE departments SET description = '$description' WHERE id = '$depid '")){
 		echo 1;
 	}
 }
}

?>