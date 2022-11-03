<?php
 require '../classes/dbase.class.php';
 include '../classes/security.class.php';
 $data = new dbase();
 $security = new security();

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$path = '../profile/'; 


if(isset($_POST)){

	if ($_POST['gender'] =='0' || $_POST['mode'] =='0' || $_POST['department']=='0') {
		echo '<span class="text-danger">Gender, payment mode, department are mandatory!</span>';
		exit(0);
	}

	$img = $_FILES['photo']['name']; 
	$tmp = $_FILES['photo']['tmp_name'];
	

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));	
	// can upload same image using rand function
	$final_image = strtolower(rand(1000,1000000).$img);
	$final_image = str_replace(' ', '_', $final_image);	

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	

		$select = $data->con->query("SELECT id FROM users WHERE idno = '".$_POST['idnumber']."'");
		if (mysqli_num_rows($select) == true){
			echo '<span class="text-danger">User identity exists!</span>';
			exit(0);
		}
			
		if(move_uploaded_file($tmp,$path)) 
		{
			
		$fastName = $_POST['firstname'];
    	$lastName = $_POST['lastname'];
    	$phone1 = $_POST['phone1'];
    	$phone2 = $_POST['phone2'];
    	$gender = $_POST['gender'];
    	$krapin = $_POST['krapin'];
    	$nssf = $_POST['nssf'];
    	$nhif = $_POST['nhif'];
    	$designation = $_POST['designation'];
    	$engaged = $_POST['engaged'];
    	$salary = $_POST['salary'];
    	$mode = $_POST['mode'];
    	$department = $_POST['department'];
    	$idnumber = $_POST['idnumber'];
    	$email = $_POST['email'];
    	$engaged = date('Y-m-d',strtotime($_POST['engaged']));
    	$password = $security->aes('encrypt',$idnumber);
    	if ($designation == 'Waiter/Waitres'){
    		$level = 2;
    	} else if ($designation == 'Accounts'){
    			$level = 3;
    	}else {
    		$level = 4;
    	}

    
   if ($data->con->query("INSERT INTO users (fname, lname, idno, phone1, phone2, krapin ,email, pwd, department, designation, basicsalary, salarymode, gender, profile, level,engeged,nssf,nhif) VALUES ('$fastName','$lastName','$idnumber','$phone1','$phone2','$krapin','$email','$password','$department','$designation','$salary','$mode','$gender','$final_image','$level','$engaged','$nssf','$nhif')")){

echo '<span class="text-success">New staff added succesful <i class="fa fa-check"></i> <a href="managestaffs.php">View</a></span>';

   } else {

   	echo '<span class="text-danger">Error, please try again</span>';
   }
    
   
		}
	} 
	else 
	{
		echo '<span class="text-danger">Invalid image{<em>*</em>}</span>';
	}
} 




?>