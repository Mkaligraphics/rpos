<?php
 require '../classes/dbase.class.php';
 $db = new dbase();
 
 if (isset($_POST)){
 	$description = $_POST['description'];
 	$mobile = $_POST['mobile'];
 	$email = $_POST['email']; 

 $select = $db->con->query("SELECT id FROM customer WHERE fullname = '$description' AND active ='1' ");
 		if (mysqli_num_rows($select) > 0){

 			echo '<span class="text-danger">Customer exists!</span>';

 		} else {
 			if ($db->con->query("INSERT INTO customer (fullname,mobile, email) VALUES ('$description','$mobile','$email')")){
 				echo '<span class="text-success">New customer added successfull</span>';
 			}
 		}


 }



?>