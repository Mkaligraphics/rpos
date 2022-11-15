<?php
session_start();
$id = $_SESSION['id'];
 require '../classes/dbase.class.php';
 $data = new dbase();
 if ($_POST['table_id']){
	$table_id = $_POST['table_id'];
	 $sel = $data->con->query("SELECT id, details FROM sales_table WHERE table_id = '$table_id' AND user_id = '$id' ORDER BY id DESC");
		 if (mysqli_num_rows($sel) > 0){
		 while ($rws = mysqli_fetch_array($sel)) {?>	
	        <button type="button" id="<?php echo $rws['id']; ?> "  data-toggle="modal" data-target="#servedModal" class="btn btn-secondary uncashout"> <?php echo $rws['details']; ?>	        		
	        	</button>		 		
<?php		 	}	
		 }
}
?>