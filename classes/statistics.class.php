<?php

class statistics extends dbase{	
	//Totalizer
		function staffs(){
			$result = $this->con->query ("SELECT count(id) FROM users WHERE active = '1' AND level !='1' ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
		} }
	//end

		function dailyincome(){	
		 	$today=date("Y-m-d");			
			$result = $this->con->query ("SELECT COALESCE(sum(paid),0) AS amount FROM income WHERE active = '1' AND status = 'debit' AND received_at = '$today'") ;
				while ($rw = mysqli_fetch_array($result)){
					// return $rw[0] > 0 || $rw[0] !== null ? number_format($rw[0],2):0.00;	
					return $rw[0]; 
				} 
		}
 
		function monthlyincome(){	
			$month = date('m');
			$year = date('Y');							
			$result = $this->con->query ("SELECT COALESCE(sum(paid),0) AS amount FROM income WHERE active = '1' AND status = 'debit' AND MONTH(received_at) = '$month' AND YEAR(received_at) = '$year'") ;
				while ($rw = mysqli_fetch_array($result)){
					// return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;
					return $rw[0]; 	 
				} 
		}

		function stockexpenses(){	
			$month = date('m');
			$year = date('Y');							
				$result = $this->con->query ("SELECT sum(paid) FROM stocklogs WHERE MONTH(recdate) = '$month' AND YEAR(recdate) = '$year' ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
				} 
		}

		function dailystockexpenses(){	
			$today = date("Y/m/d");							
				$result = $this->con->query ("SELECT sum(paid) FROM stocklogs WHERE DATE_FORMAT(recdate, '%Y/%m/%d') = '$today' ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
				} 
		}


		function stockcredit(){	
											
				$result = $this->con->query ("SELECT sum(totalamount) - sum(paid) FROM stocklogs WHERE status = 'credit'") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
				} 
		}

		function reducedcredit(){	
			$month = date('m');
			$year = date('Y');							
				$result = $this->con->query ("SELECT sum(paid) FROM stocklogs WHERE status = 'credit' AND MONTH(recdate) = '$month' AND YEAR(recdate) = '$year' ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
				} 
		}

		function monthlyutensilspurchase(){	
			$month = date('m');
			$year = date('Y');							
				$result = $this->con->query ("SELECT sum(subtotal) FROM utensilspurchase WHERE MONTH(due) = '$month' AND YEAR(due) = '$year'  AND active = '1'") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
				} 
}
	function dailyutensilspurchase(){		
		 $today = date("Y/m/d");						
				$result = $this->con->query ("SELECT sum(subtotal) FROM utensilspurchase WHERE  active = '1' AND DATE_FORMAT(due, '%Y/%m/%d') = '$today'  ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
				} 
		}

		function daily_ingredients(){		
		 $today = date("Y-m-d");						
				$result = $this->con->query ("SELECT sum(subtotal) FROM ingredients WHERE  active = '1' AND DATE_FORMAT(recdate, '%Y-%m-%d') = '$today'  ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
				} 
		}

		function monthly_ingredients(){		
			$month = date('m');
			$year = date('Y');								
				$result = $this->con->query ("SELECT sum(subtotal) FROM ingredients WHERE  active = '1' AND MONTH(recdate) = '$month' AND YEAR(recdate) = '$year'  ") ;
				  	while ($rw = mysqli_fetch_array($result)){
				   	return number_format($rw[0],2) > 0.00 || number_format($rw[0],2) !== null ? number_format($rw[0],2):0.00;	 
				} 
		}


		




	}

?>