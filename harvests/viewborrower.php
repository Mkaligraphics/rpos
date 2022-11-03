<?php 
 require '../classes/dbase.class.php';
 $data = new dbase();

if ($_POST){
    $userid = $_POST['targetvalue'];
    $fetch =  $data->con->query("SELECT * FROM users WHERE active = '1' AND id = '$userid' ");
    while ($rows = mysqli_fetch_array($fetch)){

 ?>

<div class="modal-body">
                    <center>
        <img src="profile/<?php echo $rows['profile']; ?>" class="rounded-circle" style="width: 8.5em; height: 8.5em;"></a>
    <h3 class="media-heading"><?php echo ucfirst($rows['fname']).' '.ucfirst($rows['lname']); ?> <small class="text-success"><?php echo$rows['designation']; ?></small></h3>
           
           <span><strong>Email: </strong><?php echo $rows['email']; ?></span>
            <span class="label label-warning" id="emailaddress"></span>
            
        </center>
        <hr>
        <center>
            <strong>Designation:</strong> <?php echo ucfirst($rows['designation']); ?><br>
            <strong>Gender:</strong>  <?php echo  ucfirst($rows['gender']); ?><br>
            <strong>Salary mode:</strong>  <?php echo  ucfirst($rows['salarymode']); ?><br>
            <strong>Engaged date:</strong>  <?php echo  ucfirst($rows['engeged']); ?><br>
        </center>
                </div>
               
            </div>
        </div>

        <?php }} ?>