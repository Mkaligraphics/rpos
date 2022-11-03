<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

if ($_POST['theDate']){
	$date = $_POST['theDate'];
$foodsql = $data->con->query("SELECT food.id,food.foodname FROM ingredientscost, food WHERE food.id = ingredientscost.foodid AND ingredientscost.duedate= '$date' GROUP BY food.foodname ");

while ($food = mysqli_fetch_array($foodsql)) {?>

	<h3 class="text-info"><?php echo $food['foodname']; ?></h3>
	<p></p>
 

<table class="table table-stripped">

	<thead class="bg-info text-white">
		<tr>
			<td>Raw products</td>
			<td>Used quantity</td>
			<td>Total cost</td>
		</tr>		
	</thead>

	<tbody>

		<?php
		$total = 0;	
$sql = $data->con->query("SELECT products.description,ingredientscost.totalQuantity,ingredientscost.totalCost  FROM ingredientscost, products WHERE products.id = ingredientscost.productid AND ingredientscost.foodid = '".$food['id']."' AND ingredientscost.duedate = '$date' ");
 while($rw = mysqli_fetch_array($sql)){ $total = $total + $rw['totalCost']; ?> 
			<tr>
 					<td><?php echo strtoupper($rw['description']); ?></td>
 					<td><?php echo $rw['totalQuantity']; ?></td>
 					<td><?php echo $rw['totalCost']; ?></td>
 			</tr>

 <?php } ?>	
 <tr class="text-danger font-weight-bold">
 	<td></td>
 	<td class="text-danger">Total</td>
 	<td><?php echo $total; ?></td>
 </tr>	

	</tbody>
	


</table>
 	

<?php } }?>