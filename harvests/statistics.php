<?php
require '../classes/dbase.class.php';
 $data = new dbase();

if(isset($_POST["year"])){
	$year = date('Y');
 $query = " SELECT sum(payable) AS total, recdate FROM incomes  WHERE  YEAR(recdate) = '$year'  ORDER BY MONTH(recdate) DESC ";
 $result = mysqli_query($data->con,$query);
			 foreach($result as $row)
			 {
			  $output[] = array(
			   'month'   => date('M',strtotime($row["recdate"])),
			   'profit'  => floatval($row["total"])
			  );
			 }

 echo json_encode($output);
}

?>