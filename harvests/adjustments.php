
<?php 
session_start();
   require '../classes/dbase.class.php';
 $data = new dbase();

$id = $_SESSION['id'];
$request = $_POST;
        $col =array(
            0   =>  'id',
            1   =>  'specified',
            2   =>  'category',
            3   =>  'reason',
            4   =>  'amount' , 
            5   =>  'duedate',
            6   =>  'recdate'

        );  //create column like table in database

$sql ="SELECT * FROM adjustments WHERE active = '1' AND user = '$id' ";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT * FROM adjustments WHERE active = '1' AND user = '$id' ";


if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR specified Like '".$request['search']['value']."%' "; 
    $sql.=" OR category Like '".$request['search']['value']."%' "; 
    $sql.=" OR reason Like '".$request['search']['value']."%' "; 
    $sql.=" OR amount Like '".$request['search']['value']."%' "; 
    $sql.=" OR duedate Like '".$request['search']['value']."%' "; 
    $sql.=" OR recdate Like '".$request['search']['value']."%' )";   
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
            $subdata[]= ucfirst($row['specified']);
            $subdata[]= ucfirst($row['category']);
            $subdata[]= $row['duedate'];
            $subdata[]= $row['amount'];
     $subdata[]='<a href="#"id="'.$row['id'].'" class="btn btn-danger btn-xs deleteadjustment"><i class="fa fa-trash fa-fw"></i> Delete</a> ';
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

