<?php
 require '../classes/dbase.class.php';
 $db = new dbase();

 if (isset($_POST['description'])){
 	if (!empty($_POST['description'])){
 		$description = $_POST['description'];
 		$unit = $_POST['unit'];
 		$costperunit =$_POST['costperunit'];
 		$unitquantity = $_POST['unitquantity'];
 		$reorder = $_POST['reorder'];
 		

 		$select  = $db->con->query("SELECT id FROM products WHERE description = '$description'");
 		if (mysqli_num_rows($select) == true){
 			echo '<span class="text-danger">Product exists, update stock <i class="fa fa-warning"></i></span>';
 		} else {

 		if ($db->con->query("INSERT INTO products (description,unit,costperunit,unitquantity, reorder) VALUES ('$description','$unit','$costperunit','$unitquantity','$reorder')")){
 			echo  '<span class="text-success">New product added successful <i class="fa fa-check"></i></span>';
 		} else {
 			echo  '<span class="text-danger">Error, please try again! <i class="fa fa-warning"></i></span>';
 		}
 		
 		}
 		
 	} else {
 		echo  '<span class="text-danger">Description can\'t be empty,<i class="fa fa-warning"></i></span>';
 	}
 }
 


?>