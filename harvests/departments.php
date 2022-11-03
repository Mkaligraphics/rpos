
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();

$request = $_POST;
        $col =array(
            0   =>  'id',
            1   =>  'description',
            2   =>  'recdate'           
        );  //create column like table in database

$sql ="SELECT * FROM departments WHERE active = '1'";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT * FROM departments WHERE active = '1'";


if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR description Like '".$request['search']['value']."%' "; 
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
            $subdata[]= strtoupper($row['description']);
            $subdata[]= date('d-m-Y',strtotime($row['recdate'])); 

     $subdata[]='<a href="#" data-toggle="modal" data-target="#editdepartment" id="'.$row['id'].'" class="btn btn-success btn-xs editdepartment"><i class="fa fa-edit fa-fw"></i> Edit</a> <a href="#"id="'.$row['id'].'" class="btn btn-danger btn-xs deletedepartment"><i class="fa fa-trash fa-fw"></i> Delete</a> ';
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

