<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

 	if (empty($_POST['rawvalue_subtotal']) ||$_POST['rawvalue_subtotal']== 0 ){
 		echo 'You are sending an empty array';
 		exit(0);
 	}

 	$rawvalue_subtotal = $_POST['rawvalue_subtotal']; 	
 	$production_output = $_POST['production_output'];
 	$output_tins_num = $_POST['output_tins_num'];
 	$production_comments = $_POST['production_comments'];

 	//Arrays data
 	$productid = $_POST['productid'];
 	$productUnit = $_POST['productUnit'];
 	$quantity = $_POST['quantity'];
 	$total = $_POST['total'];


 	

 	if (empty($production_output)){
 		echo  'Please select output';
 		exit(0);
 	}
 	

 	$select = $data->con->query("SELECT id FROM bom WHERE foodid = '$production_output' AND active ='1'");
 	if (mysqli_num_rows($select) == true){
 			echo  'The output results exists, just update!';
 		exit(0);
 	}

if ($data->con->query("INSERT INTO bom (foodid,subtotal,unitsnumber,narrative) VALUES ('$production_output','$rawvalue_subtotal','$output_tins_num','$production_comments')")) {

	for ($i=0; $i  < count($productid); $i++){

		$data->con->query("INSERT INTO bomdetails (uom,productid,quantity,total,foodid) VALUES ('$productUnit[$i]','$productid[$i]','$quantity[$i]','$total[$i]','$production_output')");

	}
		echo 1;

	}
?>