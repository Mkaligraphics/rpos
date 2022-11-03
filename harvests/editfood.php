<?php
include '../classes/dbase.class.php';
    $data  =  new dbase();
$sql = $data->con->query("SELECT * FROM food WHERE id = '".$_POST['that']."'");
	while ($rw = mysqli_fetch_array($sql)){
			echo json_encode($rw);
	}

    ?>