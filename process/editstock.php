<?php
require '../classes/dbase.class.php';
 $db = new dbase();
	
 if (isset($_POST)){
 	if (!empty($_POST['description'])){
 		$description = $_POST['description'];
 		$unit = $_POST['units'];
 		$costperunit =$_POST['costperunit'];
 		$unitquantity = $_POST['unitquantity'];
 		$reorder = $_POST['reorder'];
 		$proid = $_POST['proid'];
 		

 		$select  = $db->con->query("SELECT id FROM products WHERE description = '$description'");
 		if (mysqli_num_rows($select) > 1){
 			echo '<span class="text-danger">Product exists, update stock <i class="fa fa-warning"></i></span>';
 		} else {

 		if ($db->con->query("UPDATE products SET description = '$description',unit = '$unit',costperunit = '$costperunit',unitquantity = '$unitquantity', reorder ='$reorder' WHERE id = '$proid'")){
 			echo  '<span class="text-success">Product updated successful <i class="fa fa-check"></i></span>';
 		} else {
 			echo  '<span class="text-danger">Error, please try again! <i class="fa fa-warning"></i></span>';
 		}
 		
 		}
 		
 	} else {
 		echo  '<span class="text-danger">Description can\'t be empty,<i class="fa fa-warning"></i></span>';
 	}
 }
 


?>