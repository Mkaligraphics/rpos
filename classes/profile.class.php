<?php
class profile extends dbase{
	function mypicture(){
		$result = $this->con->query ("select profile from users where id = '".$_SESSION['id']."' ");
		$count = $result->num_rows;
		if ($count > 0){
			while($rw = mysqli_fetch_array($result)){
				return $rw['profile'];
			}			
		}

	}

}

?>