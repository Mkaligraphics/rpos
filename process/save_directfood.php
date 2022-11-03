<?php
session_start();
 require '../classes/dbase.class.php';
 $data = new dbase();
 $id = $_SESSION['id'];

	if (isset($_POST)){
		 $foodid = $_POST['foodid']; 
		 $quantity = $_POST['quantity']; 
		 $buyingprice = $_POST['buyingprice'];	
		 $totalquanity = $_POST['totalquanity'];		
		 $rawvalue_total = $_POST['rawvalue_total']; 
		 $total = $_POST['total']; 
		 $sellingprice = $_POST['sellingprice'];
		 $supplier = $_POST['supplier'];
		 $status = $_POST['status'];
		 $refno = rand(10,10000);
		

	$select =  $data->con->query("SELECT id FROM directpurchase WHERE refno = '$refno' ");
	if (mysqli_num_rows($select) > 0)	{
		echo 'Error, please try again';
		exit(0);
	}	 

if ($data->con->query("INSERT INTO directpurchase (total_items,total_buying,refno,userid) VALUES ('$totalquanity','$rawvalue_total','$refno','$id') ")){
		for($i=0; $i < count($quantity); $i++){

			$data->con->query("INSERT INTO directpurchaseinfo (foodid, buying, selling, quantity, subtotal,supplier, status, refno) VALUES ('$foodid[$i]', '$buyingprice[$i]', '$sellingprice[$i]', '$quantity[$i]','$total[$i]','$supplier[$i]','$status[$i]','$refno' ) ") || die(mysqli_error($data->con));

			$data->con->query("UPDATE food SET stock = stock + $quantity[$i] WHERE id = '$foodid[$i]' ");
			
	}


	echo  1;

}

}

?>