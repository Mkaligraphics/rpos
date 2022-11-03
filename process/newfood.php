<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$path = '../photos/'; 


if($_POST){

	

	$img = $_FILES['photo']['name']; 
	$tmp = $_FILES['photo']['tmp_name'];
	

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	
	// can upload same image using rand function
	$final_image = $img;
	$final_image = str_replace(' ', '_', $final_image);
	

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	

		$select = $data->con->query("SELECT id FROM food WHERE foodname = '".$_POST['foodname']."'");
		if (mysqli_num_rows($select) == true){
			echo '<span class="text-danger">Food name already exists!</span>';
			exit(0);
		}
			

		if(move_uploaded_file($tmp,$path)) 
		{
			
		$foodname = $_POST['foodname'];
    	$unit = $_POST['unit'];
    	$unitprice = $_POST['unitprice'];
    	$category = $_POST['category'];
    	$stockstatus = $_POST['stockstatus'];

    	if (empty($_POST['foodname']) && empty($_POST['unit']) && empty($_POST['unitprice']) && empty($_POST['category'])) {
		echo '<span class="text-danger">Mandatory fields are empty!</span>';
		exit(0);
	}
    	
    	/*$data->con->query("INSERT INTO food (foodname, category, units, price, photo,stockstatus) VALUES ('$foodname','$category','$unit','$unitprice','$final_image','$stockstatus')") || die(mysqli_error($data->con)); die();
echo $_POST['foodname']; die();*/
	
   if ($data->con->query("INSERT INTO food (foodname, category, units, price, photo,stockstatus) VALUES ('$foodname','$category','$unit','$unitprice','$final_image','$stockstatus')")){

echo '<span class="text-success">New food added succesful <i class="fa fa-check"></i></span>';

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