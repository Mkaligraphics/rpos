<?php
 require '../classes/dbase.class.php';
  $data = new dbase();

if (isset($_POST['that']) && ($_POST['utensil']) && ($_POST['quantity'])){
				$tableid = $_POST['tableid'];
				$quantity  = $_POST['quantity'];
				$utensil  = $_POST['utensil'];
		$sel = $data->con->query("SELECT id FROM handeditemsinfo WHERE id = '$tableid' AND status = '1'");
			if (mysqli_num_rows($sel) == true){
				echo '<span class="text-danger">This item already returned</span>';
				exit(0);
			}

		if ($data->con->query("UPDATE handeditemsinfo SET status = '1' WHERE id = '$tableid' ")){

			$data->con->query("UPDATE utensils SET quantity = quantity + '$quantity' WHERE id = '$utensil' ");

			echo '<span class="text-success">Items returned successful <i class="fa fa-check fa-fw"></i></span>';
		}
}