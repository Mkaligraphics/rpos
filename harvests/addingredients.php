<?php
require '../classes/dbase.class.php';
 $data = new dbase();
$qry=$data->con->query("SELECT food.foodname, food.id FROM food, bom WHERE bom.active = '1' AND food.stockstatus = 'bom' AND food.id = bom.foodid ");

	?>	
			<tr>
						<td class="number"></td>					
					<td>

					<select class="form-control foodid chosen-select" name="foodid[]" id="foodid">
						<option value="0">--SELECT FOOD--</option>
					<?php 
						while($row = mysqli_fetch_assoc($qry)){?>
						<option value="<?php echo $row['id']; ?>"><?php  echo strtoupper($row['foodname']); ?></option>
					<?php } ?>
					
					</td>					

					<td><input name="item_qty[]" readonly="readonly" id="item_qty" type="text" min=1  class="form-control form-control-sm item_qty"/></td>
					
					<td>
						<input name="item_price[]" type="text" id="item_price" min=1  class="form-control form-control-sm item_price" readonly />
					</td>

					<td>
						<input name="quantity[]" type="text" id="quantity" min="1" value="1"  class="form-control form-control-sm quantity"  />
					</td>
					<td>
						<input name="item_total[]" type="text" id="item_total"   class="form-control form-control-sm item_total" readonly />
					</td>
					<td>
					<a href="#" id="" data-toggle="modal" data-target="#morebtn" class="btn btn-info btn-sm morebtn"><i class="fa fa-file"></i> More</a>
					</td>

					<td>
						<a href="#" class="btn btn-danger btn-sm"  onclick="deleteRow(this)" class="text-danger removerw"><i class="fa fa-close"></i> Delete </a>
					</td>
					
			</tr>
