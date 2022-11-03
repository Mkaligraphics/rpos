<?php 
session_start();
 require '../classes/dbase.class.php';
 $data = new dbase();

 $id = $_SESSION['id'];
 	if (isset($_POST)){
 			$amount = $_POST['amount'];
 			$orderid = $_POST['orderid'];
 			$balance = $_POST['balance'];
 			$discount = $_POST['discount'];
 			$paying = $_POST['paying'];
 			$mode = $_POST['mode'];
 			$status = $_POST['status'];
 			$receipt = rand(1000,10000);
 			$time  =  date('Y-m-d H:i:s');

 		if ($balance < 0 && $status == 'debit' ){
	 			echo 'The amount paying is less than required!';
	 				exit(0);
 			}

 			$select = $data->con->query("SELECT receipt FROM income WHERE receipt = '$receipt'  ");
	 			if (mysqli_num_rows($select) == true){
	 				echo 'Receipt no Duplicates, try again';
	 				exit(0);
	 			}

 			$select = $data->con->query("SELECT id FROM income WHERE  foodorder_id = '$orderid'  ");
	 			if (mysqli_num_rows($select) == true){
	 				echo 'Payment already received';
	 				exit(0);
	 			}
				
 				if ($data->con->query("INSERT INTO income (foodorder_id,amount,paid,returned,discount,receipt,servedby,payment_mode,status) VALUES ('$orderid','$amount','$paying','$balance','$discount','$receipt','$id','$mode','$status') ")){

		               	$data->con->query("UPDATE foodorder SET ended = '$time', prepared = '2' WHERE id = '$orderid' ");   

					echo 1;
			}

 				
 			

 		}


?>