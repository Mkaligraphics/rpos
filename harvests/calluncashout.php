<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

if (isset($_POST['order'])){
	$order = $_POST['order'];
$total = 0;
		$qry=$data->con->query("SELECT products_table.product_name, sales_details.unit_price,sales_details.qty,sales_details.unit_total FROM sales_details, products_table, sales_table WHERE sales_table.id = '$order' AND sales_details.product_id = products_table.id AND sales_table.details = sales_details.details ")or die(mysqli_error($data->con));
			while($row = mysqli_fetch_assoc($qry)) { $total = $total + $row['unit_total'];?>
						
			<tr class="newFood">
				<td><?php echo $row['qty']; ?> <?php echo $row['product_name']; ?></td>
				<td><?php echo $row['unit_total']; ?></td>								
				<input type="hidden" id="hiddensubtotal" value="<?php  echo $row['unit_total'];  ?>">
			</tr>

<?php
			}

}

?>

<tr>
                <td><strong>Total</strong></td>
               <td class="font-weight-bold text-success "><?php echo  number_format($total,2); ?></td>
</tr>