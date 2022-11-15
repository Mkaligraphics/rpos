<?php 
session_start();
 require '../classes/dbase.class.php';
 $data = new dbase();
 $id = $_SESSION['id'];

echo'ok';
 die();
	if (isset($_POST)){

	if (empty($_POST["totalitems"]) || empty($_POST['pricetotal'])){
		echo 'Your cart is empty';
		exit();
	}
	
		 $items = $_POST['totalitems']; 
		 $totalpayable = $_POST['pricetotal']; 
		 $customer = $_POST['customer']; 
		 $table = $_POST['table']; 
		 $billno = date('dmY').''.rand(10,1000);	

	 //Arrays
		 $count = count($_POST['item_id']);
		 $item_ar = $_POST['item_id'];
		 $item_price_ar = $_POST['item_price'];
		 $item_total_ar = $_POST['item_total'];
		 $qty_ar = $_POST['quantity'];


/*for ($i=0; $i < $count; $i++ ){	
$sql=mysqli_query($data->con,"SELECT * FROM food WHERE `stock` >= '$qty_ar[$i]' AND id = '$item_ar[$i]'");
		if(mysqli_num_rows($sql)<1){
			echo '<span class="text-danger"> Kindly check your Entries. Less product in store </span>';
			exit(0);
		}
	}	*/


for ($i=0; $i < $count; $i++ ){	
			if (empty($qty_ar[$i])){
			echo 'Item quantity in your cart is empty ';
			exit(0);
		}
}	

$sql = $data->con->query("SELECT id FROM foodorder WHERE billno = '$billno' ");
if (mysqli_num_rows($sql)>0){
	echo  'Dupicate of billno, refresh and try again';
	exit(0);
}

if ($data->con->query("INSERT INTO foodorder (total_items,grandtotal,billno,userid,tablelabel,customer ) VALUES ('$items','$totalpayable','$billno','$id','$table','$customer')")){

	for($i=0; $i < $count; $i++ ){
			$data->con->query("INSERT INTO  foodorder_details (food_id,qty,billno,price,subtotal)
			 VALUES ('".$item_ar[$i]."','".$qty_ar[$i]."','".$billno."','".$item_price_ar[$i]."','".$item_total_ar[$i]."') ") ;
	}
	
	/*for ($i=0; $i < $count; $i++ ){
		$data->con->query("UPDATE food SET stock = (stock-'$qty_ar[$i]') WHERE id = '$item_ar[$i]' ");
	}*/	


}

echo  'Your order request is successful';


}

?>
