<?php
 require '../classes/dbase.class.php';
 $data = new dbase();?>

 <table class="table table-stripped" style="width: 100% !important">
                    <tr class="font-weight-bold">  
                              <td>Ingredients</td>
                              <td>Rate</td>
                              <td>Constant Qty</td>
                              <td>Value</td>
                              <td>New qty</td>
                              <td>New value</td>
                                                          
                          </tr>
                      </thead>
                     
                      <tbody>
<?php
 if (isset($_POST['foodid'])){
 	$foodid = $_POST['foodid'];
 	$total = 0;
 	$totalcost = 0;
 	$sql=$data->con->query("SELECT products.unitquantity, products.description, units.unitname, bomdetails.quantity, products.costperunit, bomdetails.total FROM bomdetails, products,units WHERE bomdetails.active='1' AND products.id = bomdetails.productid AND bomdetails.foodid = '$foodid' AND products.unit = units.id ") ;
 	while($rows = mysqli_fetch_array($sql)){ 
 		$total = $total + $rows['total']; 
 		$units = $rows['quantity'].' '.$rows['unitname'];

 		$divisionNum = number_format((($_POST['qty'] * $rows['quantity']))/ ($_POST['unitnumber']),3);

    $totalcost = (($rows['total']) * (($_POST['qty'] * $rows['quantity']))/ ($_POST['unitnumber']) /$rows['quantity']) + $totalcost;
 		?>
		
	<tr>
		<td><?php echo strtoupper($rows['description']); ?></td>
    <td ><?php echo $rows['unitquantity'].' '.$rows['unitname']; ?>/<?php echo $rows['costperunit']; ?></td>
		<td><?php echo $units; ?></td>
		<td><?php echo $rows['total']; ?></td>

		<td><?php echo $divisionNum.' '.$rows['unitname']; ?></td>

		<td>
      <?php  
            echo number_format(($rows['costperunit'] / $rows['unitquantity']) *  $divisionNum, 2);
        ?>			
		</td>

	</tr>			


<?php
		}

 }


?>
  					</tbody>

                      <tfoot>
                            <tr>
                              <td></td>
                              <td ></td>
                              <td class="font-weight-bold text-danger">Total</td>
                              <td><?php echo number_format($total,2); ?></td>
                              <td></td>

                              <td class="text-success font-weight-bold"><?php echo number_format($totalcost,2); ?></td>

                            </tr>
                      </tfoot>
                      
                    </table>
                    