<?php
include '../classes/dbase.class.php';
include '../classes/modules.class.php';
include '../classes/security.class.php';
include '../classes/mobileDetect.class.php';
$data = new modules();
$security = new security();


//Device detection
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$os = ($detect->isiOS() ? ($detect->isAndroidOS() ? 'Andoid' : 'iOS') : 'NotMobile');
//ip address
function getip (){
		 		if (isset($_SERVER['HTTP_CLIENT_IP'])){
		 			return $_SERVER['HTTP_CLIENT_IP'];
		 		} elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		 				return $_SERVER['HTTP_X_FORWARDED_FOR'];
		 		}else{
		 			return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
		 		}
		 	}
$ip = getip ();

//Browserinfo
$brs = $_SERVER['HTTP_USER_AGENT'];  //type of client agent;


if (isset($_POST['password']) && !empty($_POST['password'])){		
	 	$password =$data->con->real_escape_string(trim($_POST['password']));
		//$pass = $data->con->real_escape_string(trim($security->aes('encrypt',$password))); 
		$rw = $data->con->query ("SELECT * FROM users_table WHERE password = '$password '  ") or die(mysqli_errno($data->con)) ;//if the user exists	
		$rst = mysqli_num_rows($rw);
       if ($rst == false){
        	echo '0';
      } else if ($rst  == true){

      		//output resulst
      		$rst = mysqli_num_rows($rw);
      	 	$id = $data->mysqli_result($rw,0,'id'); 
      	 	$userlevel = $data->mysqli_result($rw,0,'user_type'); 
		  	$_SESSION['id'] = $id; 
			$ip_addr = $_SERVER['REMOTE_ADDR']; //getting users ip address;		 
		 	$brs;//browserinfo
		 	$deviceType;
      		$os;//Os type
      		$ip;

			echo  $userlevel;

   	
		}			
}		

		
	?>