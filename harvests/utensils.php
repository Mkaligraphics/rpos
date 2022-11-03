
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();

$request = $_POST;
        $col =array(
            0   =>  'id',
            1   =>  'description',
            2   =>  'quantity'
        );  //create column like table in database

$sql ="SELECT * FROM utensils WHERE active = '1'";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT * FROM utensils WHERE active = '1'";


if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR description Like '".$request['search']['value']."%' "; 
    $sql.=" OR quantity Like '".$request['search']['value']."%' )"; 
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
            $subdata[]= strtoupper($row['description']);
            $subdata[]= $row['quantity'];

     $subdata[]='<a href="#" data-toggle="modal" data-target="#editutensil" id="'.$row['id'].'" class="btn btn-success btn-xs editutensil">Edit</a> <a href="#"id="'.$row['id'].'" class="btn btn-danger btn-xs deletedeutensil">Delete</a> ';
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

