<?php
session_start();
require '../classes/dbase.class.php';
$data = new dbase();
$userid = $_SESSION['id'];
if ($_POST){   
   $table_id = $_POST['cart'];
    for ($i=0; $i  < count($table_id); $i++){
        $sql = $data->con->query("SELECT id FROM  customer_tables WHERE served_by != '-' AND id='$table_id[$i]'" ); 
        if(mysqli_num_rows($sql)== true){
			        echo 'Select tables are not available ';
			exit(0);
		}       

    }

    for ($i=0; $i  < count($table_id); $i++){
        $qry = $data->con->query("UPDATE customer_tables SET served_by = '$userid'WHERE id = ' $table_id[$i]' ") or die(mysqli_error($data->con));          
    }

       echo '1';
        
}else {
    echo 'Error, please try again';
}


?>