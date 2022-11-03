<?php
 require '../classes/dbase.class.php';
 $db = new dbase();

 if (isset($_POST['description'])){
 	if (!empty($_POST['description'])){
 		$department = strtolower($_POST['description']);
 		$select  = $db->con->query("SELECT id FROM departments WHERE description = '$department'");
 		if (mysqli_num_rows($select) == true){
 			echo '<span class="text-danger">Department exists <i class="fa fa-warning"></i></span>';
 		} else {
 		$db->con->query("INSERT INTO departments (description) VALUES ('$department')");
 		echo  '<span class="text-success">New department added successfull <i class="fa fa-check"></i></span>';
 		}
 		
 	} else {
 		echo  '<span class="text-danger">Invalid operation <i class="fa fa-warning"></i></span>';
 	}
 }
 


?>