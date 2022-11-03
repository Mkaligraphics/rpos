<?php
 session_start();
 require '../classes/dbase.class.php';
 $data = new dbase();
 $id = $_SESSION['id'];
 $billno = $_POST['billid'];
 $ended = date('Y-m-d H:i:s');

 if ($data->con->query("UPDATE servicetimeout SET ended = '$ended', servedby = '$id', status = '1' WHERE billno = '$billno' ")){
 	echo 1;
 }
 


?>