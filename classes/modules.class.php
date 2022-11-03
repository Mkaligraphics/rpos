<?php
session_start();


class modules extends dbase

{
	private $result;
	private $numRows;
	//inserting data to db
	public function insert($tablename,$data){
		$string = "insert into ".$tablename."(";
		$string .= implode(",",array_keys ($data)).') values(';
		$string .= "'" .implode("','",array_values($data))."')";	
		if (mysqli_query($this->con, $string)){
			return true;
		} else{
			mysqli_error($this->con);
		}
	}

//Keeep the user logged in;
function loggedin(){
if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
	return true ;
		} else {
			return false ;
		}
}

//end

	//getting users fields
function getfield($fields){
	$result = $this->con->query ("SELECT $fields FROM users_table WHERE id = '".$_SESSION['id']."' ") ;
	   $counts =  $result ->num_rows;
	   if ($counts > 0){
	   	while ($rw = mysqli_fetch_assoc($result)){
	  return $rw[$fields];
	   	}
   }
}

//getting the results
	public function resultqry($sql){
		$this->result = mysqli_query($this->con, $sql);
		 $this->numRows = $this->result->num_rows;
		 	return $this->numRows;
	}


// Select alldata
	public function select($tablename){
		$array = array();
		$qry = "Select * from ".$tablename." where active = 1";
		$rst = mysqli_query($this->con,$qry);		
		while ($rw = mysqli_fetch_assoc($rst)){
			$array[] = $rw;
		}
		return $array;
	}
	
//Totalizer
 function totals($table){
	$result = $this->con->query ("select count(id) from $table where active = '1' ") ;
	  	while ($rw = mysqli_fetch_array($result)){
	   	return $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
	} }
 //end

	//Totalizer
 function totalTransfered($table,$col){
	$result = $this->con->query ("select sum($col) from $table where active = '1' ") ;
	  	while ($rw = mysqli_fetch_array($result)){
	   	return $rw[0] > 0 || $rw[0] !== null ? $rw[0]:0;	 
	} }
 //end

//Return the result on an id				
 function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

}//end of class




?>