<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

 		if (isset($_POST['order'])){
 			$order = $_POST['order'];
 			$total = 0;
 					 $qry=$data->con->query("SELECT food.foodname, foodorder_details.price,foodorder_details.qty,foodorder_details.subtotal FROM foodorder_details, food, foodorder WHERE foodorder.id = '$order' AND foodorder_details.food_id = food.id AND foodorder.billno = foodorder_details.billno ");
							while($row = mysqli_fetch_assoc($qry)) { $total = $total + $row['subtotal'];?>
										
							<tr class="newFood">
								<td><?php echo $row['qty']; ?> <?php echo $row['foodname']; ?></td>
								<td><?php echo $row['subtotal']; ?></td>								
                                <input type="hidden" id="hiddensubtotal" value="<?php  echo $row['subtotal'];  ?>">
    						</tr>

		<?php
							}

 		}

?>

<tr>
                <td><strong>Total</strong></td>
               <td class="font-weight-bold text-success "><?php echo  number_format($total,2); ?></td>
</tr>