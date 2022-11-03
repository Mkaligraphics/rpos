<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['thisId']) && isset($_POST['amount']) && isset($_POST['foodid'])){
 	$id = $_POST['thisId'];
 	$amount = $_POST['amount'];
 	$foodid = $_POST['foodid'];

 	$sel = $data->con->query("SELECT id FROM bomdetails WHERE id = '$id' AND active = '0' ");
 	if (mysqli_num_rows($sel) == true){ 				
 		exit(0);
 	}
 	if ($data->con->query("UPDATE bomdetails SET active = '0' WHERE id = '$id'")){
 			$data->con->query("UPDATE bom SET subtotal = subtotal- $amount  WHERE foodid = '$foodid'");
 		echo 1;
 	}
}

?>