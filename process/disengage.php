<?php
	 require '../classes/dbase.class.php';
 	 $data = new dbase();

 	 	$userid = $_POST['staff'];
 	 	$engagedate = $_POST['engagedate'];
 	 	$narrative = $_POST['narrative'];

 	 if ($_POST['staff'] == '0' || $_POST['engagedate'] == "" || $_POST['narrative'] ==""){
 	 	echo '<span class="text-danger">All fields are mandatory *<i class="fa fa-warning"></i></span>';
 	 	exit(0);
 	 }

 	 	$select = $data->con->query("SELECT id FROM users WHERE id = '$userid' AND active = '0'");
 	 	if (mysqli_num_rows($select) == true){
 	 		echo '<span class="text-danger">Staff already disengaged</span>';
 	 		exit(0);
 	 	}

 	 	if ($insert = $data->con->query("INSERT INTO disengaged (userid,duedate,narrative) VALUES ('$userid','$engagedate','$narrative')")){
 	 			$data->con->query("UPDATE users SET active = '0' WHERE id = '$userid'");
 	 		echo '<span class="text-success">Staff disengaged successful!</span>';
 	 	}

 	 	
 	 	

 	 



?>