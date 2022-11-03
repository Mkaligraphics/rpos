<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

  if (isset($_POST['product']) && isset($_POST['uom']) && isset($_POST['quantity']) && isset($_POST['cost'])){
  		$product = $_POST['product'];
  		$uom = $_POST['uom'];
  		$quantity = $_POST['quantity'];
  		$cost = $_POST['cost'];
  		$foodid = $_POST['foodid'];
  		$rowid = $_POST['rowid'];

		$rst = $data->con->query("SELECT total FROM bomdetails WHERE id = '$rowid' ");
		$row=mysqli_fetch_array($rst); 
		$defCost = $row['total'] - $cost;

	if ($data->con->query("UPDATE bomdetails SET productid = '$product' , quantity = '$quantity', uom = '$uom', total = '$cost' WHERE id ='$rowid' ")){

		 
		  if ($data->con->query("UPDATE bom SET subtotal = subtotal - '$defCost' ")){

		  	echo '<span class="text-success">You have successfully updated your recipe</span>';
		  }




	}

  }

?>