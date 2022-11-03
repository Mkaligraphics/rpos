<?php
 require '../classes/dbase.class.php';
 $data = new dbase();

     if (isset($_POST)){
     	if (empty($_POST['utensil_id'])){
      	echo  '<span class="text-danger"> You have to select atlis one item</span>';
      	exit(0);
      }

if (empty($_POST['userid'])){
    echo '<span class="text-danger">Select a staff <i class="fa fa-warning"></i></span>';
} else {
	  $userid = $_POST['userid'];
      $utensil_id = $_POST['utensil_id'];
      $quantity=$_POST['quantity'];

      for ($i=0; $i < count($utensil_id); $i++ ){	
$sql=mysqli_query($data->con,"SELECT id FROM utensils WHERE `quantity` >= '$quantity[$i]' AND id = '$utensil_id[$i]'");
		if(mysqli_num_rows($sql)<1){
			echo '<span class="text-danger"> Kindly check your Entries. Less items in store </span>';
			exit(0);
		}
	}	

	if ($data->con->query("INSERT INTO handeditems (userid) VALUES ('$userid')")){
      for ($i = 0; $i < count($utensil_id); $i++){      
        $data->con->query("INSERT INTO handeditemsinfo (utensilid,quantity,userid)
				 VALUES ('".$utensil_id[$i]."','".$quantity[$i]."','".$userid."') ") ;
      }
  }

  	for ($i=0; $i < count($utensil_id); $i++ ){
		$data->con->query("UPDATE utensils SET quantity = (quantity-'$quantity[$i]') WHERE id = '$utensil_id[$i]' ");
	}		

     echo  '<span class="text-success"> Items handed over successful, <a href="borroweditems">View</a></span>';
     exit(0);
}
          

     }
?>