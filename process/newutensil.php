<?php
 require '../classes/dbase.class.php';
 $db = new dbase();


 if (isset($_POST['description'])){
 	if (!empty($_POST['description'])){
 		$description = $_POST['description'];
 		
		
 		$select  = $db->con->query("SELECT id FROM utensils WHERE description = '$description'");
 		if (mysqli_num_rows($select) == true){
 			echo '<span class="text-danger">Utensils exists, update stock </span>';
 		} else {

 		if ($db->con->query("INSERT INTO utensils (description) VALUES ('$description')")){
 			
 			echo  '<span class="text-success">New utensil added successful <i class="fa fa-check"></i></span>';
 		} else {
 			echo  '<span class="text-danger">Error, please try again! <i class="fa fa-warning"></i></span>';
 		}
 		
 		}
 		
 	} else {
 		echo  '<span class="text-danger">Description can\'t be empty...</span>';
 	}
 }
 


?>