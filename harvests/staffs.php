
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();

$request = $_POST;
        $col =array(
            0   =>  'users.id',
            1   =>  'users.fname',
            2   =>  'users.lname',
            3   =>  'users.idno',
            4   =>  'users.phone1',
            6   =>  'users.krapin',
            7   =>  'users.email',
            8   =>  'users.department',
            9   =>  'users.designation',
            10   =>  'users.salarymode',
            11   =>  'users.engeged',
            12   =>  'departments.description',
            13   =>  'users.profile'           
        );  //create column like table in database

$sql ="SELECT users.id, users.fname, users.lname,users.idno, users.phone1, users.designation,users.salarymode, users.engeged,users.profile, departments.description AS description  FROM users, departments WHERE users.active = '1' AND users.level != '1' AND users.department = departments.id";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT users.id, users.fname, users.lname,users.idno, users.phone1, users.designation,users.salarymode, users.engeged,users.profile, departments.description AS description  FROM users, departments WHERE users.active = '1' AND users.level != '1' AND users.department = departments.id";


if(!empty($request['search']['value'])){
    $sql.=" AND (users.id Like '".$request['search']['value']."%' ";
    $sql.=" OR users.fname Like '".$request['search']['value']."%' "; 
    $sql.=" OR users.lname Like '".$request['search']['value']."%' "; 
    $sql.=" OR users.idno Like '".$request['search']['value']."%' "; 
    $sql.=" OR users.phone1 Like '".$request['search']['value']."%' "; 
    $sql.=" OR users.designation Like '".$request['search']['value']."%' ";
    $sql.=" OR users.salarymode Like '".$request['search']['value']."%' "; 
    $sql.=" OR departments.description Like '".$request['search']['value']."%' ";  
    $sql.=" OR users.engeged Like '".$request['search']['value']."%' )";   
}

$query = mysqli_query($data->con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query =mysqli_query($data->con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
          
$subdata=array();
$subdata[]= '<img src="profile/'.$row['profile'].'" class="img-profile rounded-circle"  style="width:2.5em; height:2.5em" />';
$subdata[]= strtoupper($row['fname']).' '. strtoupper($row['lname']);
$subdata[]= $row['idno'];
$subdata[]= $row['phone1'];
$subdata[]=  strtoupper($row['description']);
$subdata[]=  strtoupper($row['designation']);
$subdata[]=  strtoupper($row['salarymode']);
$subdata[]= $row['engeged'];


     $subdata[]='<a href="#" data-toggle="modal" data-target="#editstaff" id="'.$row['id'].'" class="btn btn-success btn-xs editstaff"><i class="fa fa-edit"></i> Edit</a> <a data-toggle="modal" data-target="#morestaffdetails" href="#"id="'.$row['id'].'" class="btn btn-info btn-xs moredetails"><i class="fa fa-info"></i> More</a> <a href="#"id="'.$row['id'].'" data-toggle="modal" data-target="#profilepicture" class="btn btn-dark btn-xs profilepicture"><i class="fa fa-photo"></i> Profile</a>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);





 ?> 

