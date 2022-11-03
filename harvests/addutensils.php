<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

$query = $data->con->query("SELECT * FROM utensils WHERE `active`='1'");

$suppliers = $data->con->query("SELECT * FROM suppliers WHERE `active`='1' ");


?>
			<tr>
					<td><b class="number">1</b></td>
					<td> 
						<select name="utensil_id[]" class="chosen-select form-control form-control-sm utensil_id">
							<option value="">--CHOOSE UTENSILS--</option>
							<?php
								while($row=mysqli_fetch_assoc($query)){?>
							<option value="<?php echo $row['id']; ?>">
								<?php echo strtoupper($row["description"]);?>									
							</option><?php	}?>
							
						</select>
				</td>

    <td>
        <input name="quantity[]" type="text" min="1" value="1"  class="form-control form-control-sm quantity"/>
    </td>

		<td>
			<input name="stock[]" type="text" readonly class="form-control form-control-sm stock" id="stock" />
		</td>				
	
    <td>
            <button id="remove" onclick="deleteRow(this);" class="btn btn-danger btn-sm">
                <i class="fa fa-close"></i> Remove
            </button>
        </td>
</tr>