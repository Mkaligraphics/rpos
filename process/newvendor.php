<?php
 require '../classes/dbase.class.php';
 $db = new dbase();
 
 if (isset($_POST)){
 	$description = $_POST['description'];
 	$mobile = $_POST['mobile'];
 	$email = $_POST['email']; 

 $select = $db->con->query("SELECT id FROM suppliers WHERE description = '$description' AND active ='1' ");
 		if (mysqli_num_rows($select) > 0){

 			echo '<span class="text-danger">Supplier exists!</span>';

 		} else {
 			if ($db->con->query("INSERT INTO suppliers (description,mobile, email) VALUES ('$description','$mobile','$email')")){
 				echo '<span class="text-success">New supplier added successfull</span>';
 			}
 		}


 }



?>