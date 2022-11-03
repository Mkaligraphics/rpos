<?php
session_start();
	require '../classes/dbase.class.php';
 	$data = new dbase();
$id = $_SESSION['id'];
if ($_POST){
		if ($_POST['supplier'] == '0'){
			echo '<span class="text-danger">Select your supplier and add raw</span>';
			exit(0);
		}

		if ($_POST['addunitquantity'] < 1){
				echo '<span class="text-danger">Enter atlist 1 quantity</span>';
			exit(0);
		}

		if ($_POST['paid'] > $_POST['addtotalcost'] ){
			echo '<span class="text-danger">You are not supposed to pay more</span>';
			exit(0);
		}

	 $supplier = $_POST['supplier']; 
	 $status = $_POST['status'];
	 $addunit = $_POST['addunit'];
	 $addquantities = $_POST['addquantities'];  
	 $addprice = $_POST['addprice']; 
	 $addunitquantity = $_POST['addunitquantity'];
	 $paid = $_POST['paid'];  
	 $addtotalprice = $_POST['addtotalcost'];
	 $productid = $_POST['productid'];

	 //unit quantity * new qty
	$newQty = $addquantities * $addunitquantity;

	if (empty($_POST['adddescription'])){
				echo '<span class="text-danger">You have to select a product</span>';
	} else {

		
if ($data->con->query("UPDATE products SET quantity = quantity + $newQty WHERE id = '$productid'")){

	$data->con->query("INSERT INTO stocklogs (productid,supplierid,unit,quantity,unitquantity, costperunitQuantity,totalamount, status,paid,userid) VALUES ('$productid', '$supplier','$addunit','$addunitquantity','$addquantities','$addprice','$addtotalprice','$status','$paid','$id') ");

		echo '<span class="text-success">Raw product update successful</span>';
}

		
	}
	
}

?>