<?php
	require '../classes/dbase.class.php';
 	$data = new dbase;
 	$billno = $_POST['billno'];
 	$sql = $data->con->query("SELECT food.foodname, incomeinfo.qty, incomeinfo.price, incomeinfo.subtotal  FROM incomeinfo, food WHERE incomeinfo.billno = '$billno' AND food.id = incomeinfo.food_id");
 	while($rws = mysqli_fetch_array($sql)){ ?>
 			 <tr>
                          <td><?php echo ucfirst($rws['foodname']); ?></td>
                          <td><?php echo $rws['qty']; ?></td>
                          <td><?php echo $rws['price']; ?></td>
                          <td><?php echo $rws['subtotal']; ?></td>
             </tr>

	<?php
	 	}
	?>