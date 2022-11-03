<?php 
 require '../classes/dbase.class.php';
 $data = new dbase();

if ($_POST){

if (empty($_POST['purchaseid']) || empty( $_POST['sub_purchase']))	
		{
		echo 'important fields are empty!';
		exit(0);
	}		
		$purchase_date = date('Y-m-d',strtotime($_POST['purchase_date']));
		$batchno = $_POST['batchno'];
		$subtotal = $_POST['sub_purchase'];

		//array
		$purchaseid = $_POST['purchaseid'];
		$quantity = $_POST['purchasequantity'];
		$cost = $_POST['cost'];
		$totalvalue = $_POST['totalValue'];
		$purchaseid = $_POST['purchaseid'];

	

$sql = $data->con->query("SELECT id FROM utensilspurchase WHERE batchno = '$batchno' AND active = '1'");
		if (mysqli_num_rows($sql) == true){
			echo 'Batch number exists!';
			exit(0);
		}

if ($data->con->query("INSERT INTO utensilspurchase (batchno, due,subtotal) VALUES ('$batchno', '$purchase_date',$subtotal) ")){

for ($i=0; $i < count($purchaseid); $i++){
		$data->con->query("UPDATE utensils SET quantity = quantity + '$quantity[$i]' WHERE id = '$purchaseid[$i]' ");		
	}

	for ($i=0; $i < count($purchaseid); $i++){
			$data->con->query("INSERT INTO utensilspurchaseinfo (utensil, quantity,price,subcost,batchno) VALUES ('$purchaseid[$i]', '$quantity[$i]',$cost[$i],'$totalvalue[$i]','$batchno') ");		
			}

	echo 1;
		}
}



?>