<?php
require '../classes/dbase.class.php';
 $data = new dbase();

if (isset($_POST)){

	if (($_POST['unit']) == '0' || ($_POST['stockstatus']) == '0' || ($_POST['category']) == '0' || empty($_POST['price'])){
		echo '<span class="text-danger">All fields are mandatory</span>';
		exit(0);
	}
		$foodname = $_POST['foodname'];
		$unit = $_POST['unit'];
		$stockstatus = $_POST['stockstatus'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		$foodid = $_POST['foodid'];

		if ($data->con->query("UPDATE food SET foodname = '$foodname', units = '$unit', category ='$category',price ='$price',stockstatus = '$stockstatus' WHERE id = '$foodid' ")){
			echo '<span class="text-success">Food updated successfull</span>';
		}                    
        


}


?>