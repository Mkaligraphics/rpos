<?php
include '../classes/dbase.class.php';
    $data  =  new dbase();
$sql = $data->con->query("SELECT * FROM users WHERE id = '".$_POST['staffid']."'");
	while ($rw = mysqli_fetch_array($sql)){
			echo json_encode($rw);
	}

    ?>