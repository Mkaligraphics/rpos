<?php  
require '../classes/dbase.class.php';
 $data = new dbase();

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$path = '../profile/'; 


if(isset($_POST)){

		
	$userid = $_POST['userid']; 
	$img = $_FILES['profilepic']['name']; 
	$tmp = $_FILES['profilepic']['tmp_name'];
	

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));	
	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;
	$final_image = str_replace(' ', '_', $final_image);	

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	

		
			
		if(move_uploaded_file($tmp,$path)) 
		{
		    	

    
   if ($data->con->query("UPDATE users SET profile = '$final_image' WHERE id = '$userid'")){

echo '<span class="text-success">Photo updated successful <i class="fa fa-check"></i></span>';

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