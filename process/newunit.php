<?php
 require '../classes/dbase.class.php';
 $db = new dbase();
 
 if (isset($_POST)){
 	$unitname = strtoupper($_POST['unitname']);

 	if (empty($unitname)){
 		echo '<span class="text-danger">unit name can\'t be empty</span>;';
 		exit(0);
 	}
 	
 $select = $db->con->query("SELECT id FROM units WHERE unitname = '$unitname' AND active ='1' ");
 		if (mysqli_num_rows($select) > 0){

 			echo '<span class="text-danger">Unit name exists!</span>';

 		} else {
 			if ($db->con->query("INSERT INTO units (unitname) VALUES ('$unitname')")){
 				echo '<span class="text-success">New unit added successfull</span>';
 			}
 		}


 }



?>