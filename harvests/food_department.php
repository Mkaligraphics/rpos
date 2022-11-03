 <option selected="selected" disabled >Select category</option>
<?php
	require '../classes/dbase.class.php';
 	$data = new dbase();

 		if (isset($_POST['department'])){
 				$qry=$data->con->query("SELECT * FROM foodcategory  WHERE department = '".$_POST['department']."' ");
			while($row = mysqli_fetch_array($qry)) {?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['foodcategory']; ?> </option>

			<?php						

							}
				
 		}

?>

