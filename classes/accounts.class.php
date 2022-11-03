<?php

	class accounts extends dbase{	
		//Totalizer
	function ordertotals($table,$status){
		$result = $this->con->query ("select count(id) from $table where active = '1' and prepared = $status ") ;
			while ($rw = mysqli_fetch_array($result)){
			return $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
		} }
		//end

function myCash($prepared, $status){
$result = $this->con->query ("SELECT sum(grandtotal) FROM foodorder WHERE active = '$status' AND prepared = '$prepared' ") ;
	while ($rw = mysqli_fetch_array($result)){
	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
	} 
}
		


	}


?>