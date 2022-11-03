<?php
 session_start();
require '../classes/dbase.class.php';
include '../classes/security.class.php';
$data = new dbase();
$security = new security();
$id = $_SESSION['id'];

if ($_POST){
		$oldPassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
		$repeatpassword = $_POST['repeatpassword'];
		//ENCRYPTED PASSWORD
		$encold =$security->aes('encrypt',$oldPassword); 
		$encnew =$security->aes('encrypt',$newpassword); 

		if (empty($oldPassword) || empty($newpassword) || empty($repeatpassword)){
			echo  '<span class="text-danger">All fields are required</span>';
			exit(0);
		}

		if ($newpassword != $repeatpassword){
			echo  '<span class="text-danger">New password do not match</span>';
			exit(0);
		}

		$qry = $data->con->query("SELECT id FROM users WHERE pwd = '$encold' AND id = '$id'");
		if (mysqli_num_rows($qry) == false){
			echo  '<span class="text-danger">Old password is incorrect!</span>';
			exit(0);
		}
		
		if ($data->con->query("UPDATE users SET pwd ='$encnew' WHERE id = '$id' ")){

			echo  '<span class="text-success">New password updated successfully</span>';
		}



}


?>