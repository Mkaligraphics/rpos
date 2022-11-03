<?php 
session_start();
 require '../classes/dbase.class.php';
 $data = new dbase();

 $id = $_SESSION['id'];

 	if (isset($_POST)){

 			$specify = $_POST['specify'];
 			$amount = $_POST['amount'];
 			$category = $_POST['category'];
 			$duedate = $_POST['duedate'];
 			$narrative = $_POST['narrative'];

 		if (($specify == "0") && ($category == "0")) {
 			echo '<span class="text-danger">Important fields are empty</span>';
 			exit(0);
 		}
 		
 		
 	if ($data->con->query("INSERT INTO adjustments (specified, category, reason, amount, duedate, user) VALUES ('$specify','$category', '$narrative', '$amount', '$duedate', '$id')  ")){

 		echo '<span class="text-success">New adjustmenst made successsfully</span>';
 	}


 		}


?>