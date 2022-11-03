<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['updatevalue']) && isset($_POST['utensilid'])){
	$description = strtolower($_POST['updatevalue']);
	if (empty($_POST['updatevalue']) || empty($_POST['utensilid'])){
		echo  'Field can\'t be empty' ;
	} else {
		
$select = $data->con->query("SELECT id FROM utensils WHERE description = '$description' AND active = '1'");
if (mysqli_num_rows($select) == true){
	echo  0;
	exit(0);
}

 	$updatevalue = $_POST['updatevalue'];
 	$depid = $_POST['utensilid'];
 	if ($data->con->query("UPDATE utensils SET description = '$description' WHERE id = '".$_POST['utensilid']."'")){
 		echo 1;
 	}
 }
}

?>