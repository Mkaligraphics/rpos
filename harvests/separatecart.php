
<?php 
session_start();
$total_price = 0;
$total_item = 0;
?>

<div class="carts">
    <table class="table table-responsive w-100 d-block d-md-table" id="itemTable" style=" border: 1px dotted #343a40;  max-height: 15em; overflow-y: scroll;" >

<?php 
 if(!empty($_SESSION["shopping_cart"])){
	foreach($_SESSION["shopping_cart"] as $keys => $values)	{ 

		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;	?>			
		<tr class="product_tr">
			<td colspan="2" id="item_<?php  echo $values['product_id']; ?>">
				<?php  echo ucfirst($values['product_name']); ?>
				<input type="hidden" name="item_id[]" id="item_id" class="itemids" value="<?php  echo $values['product_id']; ?>"  />
			</td>	
			<td>
				   <input name="quantity[]" type="text" id="product_quantity<?php  echo $values['product_quantity']; ?>" 
				   value="<?php  echo $values['product_quantity']; ?>" class="qty-in form-control no-padding add-color text-center">
			</td>
			<td>
				<input name="item_price[]" type="text" id="item_price" min=1 value="<?php echo  $values['product_price']; ?>"  class="item_price form-control" readonly />
			</td>
			<td>
				<input name="item_total[]" type="text" id="item_total"  value="<?php echo  number_format($values["product_quantity"] * $values["product_price"], 2); ?>"  class="form-control form-control-sm item_total" readonly />
			</td>
			<td>
				<a href="#" id="<?php  echo $values['product_id']; ?>" class="text-danger delete"> Remove </a>
			</td>
					
		</tr>
<?php
	}
}else {?>
<tr>
    <td colspan="6" class="text-danger" align="center">
        Your Cart is Empty!
    </td>
</tr>

<?php
        }
?>
</div>
</table>

<blockquote class="blockquote">
              <p class="Titems" style="border-bottom: 1px #ccc dotted; padding-bottom: 10px;">
                Total Items  <span class="tqty text-danger" style="float: right;"><?php echo $total_item; ?></span>
              </p>

               <p class="payment" style="border-bottom: 1px #ccc dotted;  padding-bottom: 10px;">
               Total payment <span class="topay text-danger" style="float: right;">
               	<?php echo number_format($total_price,2); ?></span>
              </p>
              </blockquote>

<input type="hidden" name="totalitems" class="totalitems"  value="<?php echo $total_item; ?>">
<input type="hidden" name="pricetotal" class="pricetotal"  value="<?php echo $total_price; ?>">

<button type="submit" class="btn btn-success btn-block" id="requestOrder"><i class="fa fa-flash"></i> Request order</button>
<a href="#" id="clear_cart" class="btn btn-danger btn-block" ><i class="fa fa-refresh"></i> Clear your cart</a>  

   