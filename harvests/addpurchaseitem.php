<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

$query = $data->con->query("SELECT * FROM utensils WHERE `active`='1'");

$suppliers = $data->con->query("SELECT * FROM suppliers WHERE `active`='1' ");



?>
			<tr>
					<td><b class="number">1</b></td>
					<td> 
						<select name="purchaseid[]" class="form-control form-control-sm purchaseid chosen-select">
							<option value='null'>--CHOOSE ITEMS--</option>
							<?php
								while($row=mysqli_fetch_assoc($query)){?>
							<option value="<?php echo $row['id']; ?>">
								<?php echo strtoupper($row["description"]);?>									
							</option><?php	}?>
							
						</select>
				</td>
						
		<td>
			<input name="purchasequantity[]" value="1" type="text" class="form-control form-control-sm purchasequantity" id="purchasequantity" />
		</td>				
	<td>
		<input name="cost[]" type="text" class="form-control form-control-sm cost " value="0" />
	</td>

	<td>
		<input name="totalValue[]" type="text" class="form-control form-control-sm totalValue"  readonly/>
	</td>

	<span>
		<input name="purchaseid[]" type="hidden" class="form-control form-control-sm purchaseid"/>
	</span>
	<td>
						<button id="remove" onclick="deleteRow(this);" class="btn btn-danger btn-sm">
					        <i class="fa fa-close"></i> Remove
					    </button>
					</td>
			</tr>