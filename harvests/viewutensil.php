<?php
include '../classes/dbase.class.php';
    $data  =  new dbase();
$sql = $data->con->query("SELECT * FROM utensils WHERE id = '".$_POST['deleteid']."'");
	while ($rw = mysqli_fetch_array($sql)){
			echo json_encode($rw);
	}

    ?>