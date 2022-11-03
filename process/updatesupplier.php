<?php
require '../classes/dbase.class.php';
 $data = new dbase();

if (isset($_POST)){

	if (empty($_POST['description']) &&  empty($_POST['mobile'])){
		echo '<span class="text-danger">All fields are mandatory</span>';
		exit(0);
	}

	$sql = $data->con->query("SELECT id FROM suppliers WHERE description = '".$_POST['description']."'");

	if (mysqli_num_rows($sql) > 0){
		echo '<span class="text-danger">Suplliers already exists</span>';
		exit(0);
	}
		$supplierid = $_POST['supplierid'];
		$description = $_POST['description'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		
		if ($data->con->query("UPDATE suppliers SET description = '$description', mobile = '$mobile', email ='$email' WHERE id = '$supplierid' ")){
			echo '<span class="text-success">Supplier updated successfull</span>';
		}                    
        


}


?>