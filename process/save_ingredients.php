<?php
	require '../classes/dbase.class.php';
    $data = new dbase();

if (empty($_POST['sub_total'])){
			echo  'You are posting an empty array';
		exit(0);
	}
 	

	$datePicker = date('d-m-Y',strtotime($_POST['datePicker']));
	$foodid = $_POST['foodid'];
	$item_qty = $_POST['item_qty'];
	$item_price = $_POST['item_price'];
	$quantity = $_POST['quantity'] ;
	$item_total = $_POST['item_total'];
	$count = count($foodid);
	$subtotal = $_POST['sub_total'];


	
for ($i=0; $i<$count; $i++){
	$sql = $data->con->query("SELECT * FROM bomdetails WHERE foodid = '$foodid[$i]' AND active = '1'");
			$newQty = $quantity[$i];
			$oldQty = $item_qty[$i];

		foreach ($sql as $output) {

			$rawQuantity = ($newQty * $output['quantity']) / $oldQty;
			$totalCost = ($rawQuantity * $output['total']) / $output['quantity'];
			$productid = $output['productid'];

	$sql=mysqli_query($data->con,"SELECT * FROM products WHERE `quantity` >= '$rawQuantity' AND id = '$productid'");
		if(mysqli_num_rows($sql) ==  false){			
				echo 'Kindly check your Entries. Less product in store';
			exit(0);
		}

			if ($data->con->query("UPDATE products SET quantity = quantity - '$rawQuantity'  WHERE id = '$productid' ")){

	$data->con->query("INSERT INTO ingredientscost (productid,duedate,totalQuantity,totalCost,foodid) VALUES ('$productid','$datePicker','$rawQuantity','$totalCost','$foodid[$i]')") || die(mysqli_error($data->con));

			}
		}


$data->con->query("UPDATE food SET stock = stock + '$quantity[$i]' WHERE id = '$foodid[$i]' ") || die(mysqli_error($data->con));
	

}

if ($data->con->query("INSERT INTO ingredients (subtotal,duedate) VALUES ('$subtotal', '$datePicker')")){	
	echo 1;	
	}	


?>