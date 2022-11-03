<?php
 require '../classes/dbase.class.php';
 $data = new dbase();
 if ($_POST['task']){
	 $sel = $data->con->query("SELECT id FROM foodorder WHERE alert = '0' ");
		 if (mysqli_num_rows($sel) > 0){
		 if ($data->con->query("UPDATE foodorder SET alert = '1' ")){		
		  			echo '1';
		 		}		 	
		 }
}
?>