<?php
if (isset($_POST)){
require '../classes/dbase.class.php';
 $data = new dbase();

	if (empty($_POST['unitnem'])){
		echo '<span class="text-danger">All fields are mandatory</span>';
		exit(0);
	}

	$sql = $data->con->query("SELECT id FROM units WHERE unitname = '".$_POST['unitnem']."'");

	if (mysqli_num_rows($sql) > 0){
		echo '<span class="text-danger">unit already exists</span>';
		exit(0);
	}
		$unitid = $_POST['unitid'];		
		$unitName = $_POST['unitnem'];
		
		if ($data->con->query("UPDATE units SET unitname = '$unitName' WHERE id = '$unitid' ")){
			echo '<span class="text-success">Unit updated successfull</span>';
		}                    
        


}

?>