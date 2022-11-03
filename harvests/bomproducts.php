<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

$query = $data->con->query("SELECT * FROM products WHERE `active`='1' ORDER BY id DESC");
?>
			<tr>
					<td><b class="number">1</b>
					</td>
					<td> 
						<select name="productid[]" class="input-sm form-control full-width productid " id="pro_id">
							<option value="">--choose--</option>
							<?php
								while($row=mysqli_fetch_assoc($query)){?>
							<option value="<?php echo $row['id']; ?>">
								<?php echo strtoupper($row["description"]);?>									
							</option><?php	}?>
							
						</select>
					</td>
		
		<td>
			<input name="quantity[]" type="text" min="1" id="unitQuantity" value="1" class="form-control form-control-sm quantity"/>
		</td>

		<td>
		<input  type="text" id="productUnit" name="productUnit[]"  readonly="readonly" class="form-control form-control-sm productUnit"/>
		</td>


		<td><input name="amount[]" type="text" class="form-control form-control-sm unitprice" id="unitprice"  readonly /></td>
				
	<td><input name="total[]" type="text" class="form-control form-control-sm total_amt"  readonly/></td>
	<span><input name="productid[]" type="hidden" class="form-control form-control-sm productid"/></span>
	<td>
						<button id="remove" onclick="deleteRow(this);" class="btn btn-danger btn-sm">
					        <i class="fa fa-trash-o"></i> Remove
					    </button>
					</td>
			</tr>