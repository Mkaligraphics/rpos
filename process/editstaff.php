<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

	if($_POST)	{

	if (empty($_POST['idnumber']) && empty($_POST['mode']) && empty($_POST['fastname']) && empty($_POST['gender']) && empty($_POST['department']) && empty($_POST['engaged']) && empty($_POST['mode'])) {
		echo '<span class="text-danger">Mandatory fields are empty!</span>';
		exit(0);
	}

		$select = $data->con->query("SELECT id FROM users WHERE idno = '".$_POST['idnumber']."'");
		if (mysqli_num_rows($select) > 1){
			echo '<span class="text-danger">User identity exists!</span>';
			exit(0);
		}
				$id = $_POST['userid'];		
		$fastName = $_POST['firstname'];
    	$lastName = $_POST['lastname'];
    	$phone1 = $_POST['phone1'];
    	$phone2 = $_POST['phone2'];
    	$gender = $_POST['gender'];
    	$krapin = $_POST['krapin'];
    	$designation = $_POST['designation'];
    	$engaged = $_POST['engaged'];
    	$salary = $_POST['salary'];
        $nssf = $_POST['nssf'];
        $nhif = $_POST['nhif'];
    	$mode = $_POST['mode'];
    	$department = $_POST['department'];
    	$idnumber = $_POST['idnumber'];
    	$email = $_POST['email'];
    	$engaged = date('d/m/Y',strtotime($_POST['engaged']));
    	if ($designation == 'Waiter/Waistres'){
    		$level = 2;
    	} else if ($designation == 'Accounts'){
    			$level = 3;
    	}else {
    		$level = 4;
    	}

    	
   if ($data->con->query("UPDATE users SET fname = '$fastName', lname = '$lastName', idno = '$idnumber', phone1 = '$phone1', phone2 ='$phone2', krapin = '$krapin' ,email = '$email', department = '$department', designation = '$designation', basicsalary ='$salary', salarymode = '$mode', gender = '$gender', level = '$level',engeged = '$engaged', nssf = '$nssf',nhif = '$nhif' WHERE id = '$id' ")){

echo '<span class="text-success">Staff updated succesful <i class="fa fa-check"></i></span>';

   } else {

   	echo '<span class="text-danger">Error, please try again</span>';
   }
    	
	
} 




?>