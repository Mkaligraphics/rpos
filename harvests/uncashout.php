<?php
session_start();
$id = $_SESSION['id'];
 require '../classes/dbase.class.php';
 $data = new dbase();
 if ($_POST['order']){
	 $sel = $data->con->query("SELECT id FROM foodorder WHERE prepared != '2' AND userid = '$id' ORDER BY id DESC");
		 if (mysqli_num_rows($sel) > 0){
		 while ($rws = mysqli_fetch_array($sel)) {?>	
	        <button type="button" id="<?php echo $rws['id']; ?> "  data-toggle="modal" data-target="#servedModal" class="btn btn-secondary uncashout"> Order #<?php echo $rws['id']; ?>	        		
	        	</button>

		 		
<?php		 	}	
		 }
}
?>