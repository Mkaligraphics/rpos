
<?php 
   require '../classes/dbase.class.php';
   require '../classes/security.class.php';
 $data = new dbase();
$security = new security();

$request = $_POST;
        $col =array(
            0   =>  'bom.id',
            1   =>  'food.foodname',
            2   =>  'bom.unitsnumber',
            3   =>  'bom.subtotal',
            4   =>  'bom.foodid'
        );  //create column like table in database

$sql ="SELECT bom.id,food.foodname, bom.subtotal, bom.unitsnumber, bom.foodid  FROM bom,food WHERE bom.active = '1' AND food.id = bom.foodid ";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT bom.id, food.foodname ,bom.subtotal, bom.unitsnumber, bom.foodid FROM bom,food WHERE bom.active = '1' AND food.id = bom.foodid";


if(!empty($request['search']['value'])){
    $sql.=" AND (bom.id Like '".$request['search']['value']."%' ";
    $sql.=" OR food.foodname Like '".$request['search']['value']."%' "; 
    $sql.=" OR bom.subtotal Like '".$request['search']['value']."%' "; 
      $sql.=" OR bom.foodid Like '".$request['search']['value']."%' "; 
    $sql.=" OR bom.unitsnumber Like '".$request['search']['value']."%' )";   
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
            $subdata[]= strtoupper($row['foodname']);
            $subdata[]= ucfirst($row['subtotal']);

     $subdata[]='<a href="editbom?ref='.$security->aes("encrypt",$row['foodid']).'" class="btn btn-success btn-xs"><i class="fa fa-edit fa-fw"></i>Edit</a>&nbsp<a href="#" id="'.$row['foodid'].'" class="btn btn-danger btn-xs deleteBom"><i class="fa fa-trash fa-fw"></i>Delete</a>  ';
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

