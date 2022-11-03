<?php  
require '../classes/dbase.class.php';
 $data = new dbase();

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$path = '../profile/'; 


if(isset($_POST)){

		
	$userid = $_POST['foodpicture']; 
	$img = $_FILES['profilepic']['name']; 
	$tmp = $_FILES['profilepic']['tmp_name'];
	

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));	
	// can upload same image using rand function
	
	$final_image = str_replace(' ', '_', $img);	

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	

		
			
		if(move_uploaded_file($tmp,$path)) 
		{
		    	

    
   if ($data->con->query("UPDATE food SET photo = '$path' WHERE id = '$userid'")){

echo '<span class="text-success">Photo updated successfully <i class="fa fa-check"></i></span>';

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