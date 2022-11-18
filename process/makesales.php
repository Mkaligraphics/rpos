<?php 
 session_start();
 require '../classes/dbase.class.php';
 $data = new dbase();
 $id = $_SESSION['id'];


	if (isset($_POST)){
			if (empty($_POST['table'])){
				echo 'Please choose a table...';
				exit(0);
			}

	if (empty($_POST["totalitems"]) || empty($_POST['pricetotal'])){
		echo 'Your cart is empty';
		exit(0);
	}

	$items = $_POST['totalitems']; 
	$totalpayable = $_POST['pricetotal']; 
	$customer = $_POST['customer']; 
	$table = $_POST['table']; 	
	
	//Arrays
	$count = count($_POST['item_id']);
	$item_ar = $_POST['item_id'];
	$item_price_ar = $_POST['item_price'];
	$item_total_ar = $_POST['item_total'];
	$qty_ar = $_POST['quantity'];
   
	for ($i=0; $i < $count; $i++ ){	
		$sql=mysqli_query($data->con,"SELECT * FROM products_table  WHERE `no_units` >= '$qty_ar[$i]' AND id = '$item_ar[$i]'");
				if(mysqli_num_rows($sql)<1){
					echo 'Kindly check your Entries. Less product in store ';
					exit(0);
				}
			}	
		


			for ($i=0; $i < $count; $i++ ){	
				if (empty($qty_ar[$i])){
				echo 'Item quantity in your cart is empty ';
				exit(0);
			}
	}	


	$tablesql= $data->con->query("SELECT sales_table.details FROM customer_tables, sales_table  WHERE sales_table.table_id = customer_tables.id AND customer_tables.served_by = '$id' AND customer_tables.id = '$table'");
	if (mysqli_num_rows($tablesql) == 1){
			while($rs = mysqli_fetch_array($tablesql)){
//update sales from served table
$details = $rs['details'];	
if ($data->con->query("UPDATE sales_table SET sub_total = sub_total + '$totalpayable', total_items = total_items + '".$_POST['totalitems']."' WHERE details = '$details'")){

					for($i=0; $i < $count; $i++ ){
							$data->con->query("INSERT INTO  sales_details (details, unit_price, qty, product_id,unit_total)
							 VALUES ('$details', '$item_price_ar[$i]','$qty_ar[$i]','0','$item_ar[$i]','$item_total_ar[$i]') ") ;
					}
					
					for ($i=0; $i < $count; $i++ ){
						$data->con->query("UPDATE products_table SET no_units = (no_units-'$qty_ar[$i]') WHERE id = '$item_ar[$i]' ");
					}
				
				
				}
//#update sales from served table

			}		
	}else {

		 $details = 'RCPT-'.(date('Ymd').''.rand(10,1000));

			$sql = $data->con->query("SELECT id FROM sales_table  WHERE details = '$details' ");
			if (mysqli_num_rows($sql)>0){
				echo  'Dupicate RCPT, refresh and try again';
				exit(0);
			}

			if ($data->con->query("INSERT INTO sales_table (user_id,details, total_items, sub_total, table_id, customer_id ) VALUES ('$id','$details','$items','$totalpayable','$table','$customer')")){

				for($i=0; $i < $count; $i++ ){
						$data->con->query("INSERT INTO  sales_details (details, unit_price, qty ,product_id,unit_total)
						 VALUES ('$details', '$item_price_ar[$i]','$qty_ar[$i]','0','$item_ar[$i]','$item_total_ar[$i]') ") ;
				}
				
				for ($i=0; $i < $count; $i++ ){
					$data->con->query("UPDATE products_table SET no_units = (no_units-'$qty_ar[$i]') WHERE id = '$item_ar[$i]' ");
				}
			
			
			}


	}
		
	

echo  'Your order request is successful';


}

?>
