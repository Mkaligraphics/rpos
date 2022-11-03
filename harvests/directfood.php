<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

$query = $data->con->query("SELECT * FROM food WHERE `active`='1' AND stockstatus = 'direct' ");

$suppliers = $data->con->query("SELECT * FROM suppliers WHERE `active`='1' ");



?>
			<tr>
					<td><b class="number">1</b></td>
					<td> 
						<select name="foodid[]" class="form-control form-control-sm foodid " id="foodid">
							<option value="0">--CHOOSE FOOD--</option>
							<?php
								while($row=mysqli_fetch_assoc($query)){?>
							<option value="<?php echo $row['id']; ?>">
								<?php echo strtoupper($row["foodname"]);?>									
							</option><?php	}?>
							
						</select>
				</td>

		<td>
			<input name="quantity[]" type="text" min=1 value="1" class="form-control form-control-sm quantity"/>
		</td>

		<td>
			<select name="supplier[]" class="form-control form-control-sm supplier " id="supplier">
							<option value="0">--CHOOSE SUPPLIER--</option>
							<?php
								while($row=mysqli_fetch_assoc($suppliers)){?>
							<option value="<?php echo $row['id']; ?>">
								<?php echo strtoupper($row["description"]);?>								
							</option><?php	}?>							
			</select>
		</td>
		<td>
			<select name="status[]" class="form-control form-control-sm status ">
							<option value="debit">DEBIT</option>
							<option value="credit">CREDIT</option>							
			</select>
		</td>
		
		<td>
			<input name="buyingprice[]" type="text" value="0" class="form-control form-control-sm buyingprice" id="buyingprice" required="required" />
		</td>				
	<td>
		<input name="sellingprice[]" type="text" class="form-control form-control-sm sellingprice" required="required"   readonly/>
	</td>

	<td>
		<input name="total[]" value="0" type="text" class="form-control form-control-sm total_buying" required="required" readonly/>
	</td>

	<span>
		<input name="foodid[]" type="hidden" class="form-control form-control-sm foodid"/>
	</span>
	<td>
						<button id="remove" onclick="deleteRow(this);" class="btn btn-danger btn-sm">
					        <i class="fa fa-close"></i> Remove
					    </button>
					</td>
			</tr>