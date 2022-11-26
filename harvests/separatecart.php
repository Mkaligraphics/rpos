<?php 
session_start();
require '../classes/dbase.class.php';
$data = new dbase();
$product_id = $_POST['product_id'];
$sql = $data->con->query("SELECT sales_details.unit_price, sales_details.unit_price, sales_details.qty, products_table.product_name FROM sales_details, products_table WHERE products_table.id = sales_details.product_id AND sales_details.id = '$product_id' ");
while($rws = mysqli_fetch_array($sql)){
?>


				<tr class="product_tr">
					<td colspan="2" id="item_">
						<?php echo $rws['product_name']; ?>
					</td>	
					<td>
						<?php echo $rws['qty']; ?>
						<input name="quantity[]" type="hidden" />
					</td>
					
					<td>
						<?php echo $rws['unit_price']; ?>
						<input name="unit_price[]" type="hidden" />
					</td>

					<td>
					<?php echo $rws['unit_price']; ?>
						<input name="item_total[]" type="hidden" />
					</td>
				</tr>




   <?php

}
?>