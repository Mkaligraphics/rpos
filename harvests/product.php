
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();

$request = $_POST;
        $col =array(
            0   =>  'id',
            1   =>  'description',
            2   =>  'unit',
            3   =>  'quantity',
            5   =>  'reorder',
            6   =>  'unitquantity',
            7   =>  'costperunit'
        );  //create column like table in database

$sql ="SELECT products.id,products.description,products.quantity,products.reorder,products.unitquantity,products.costperunit,units.unitname FROM products, units WHERE products.active = '1' AND units.id = products.unit AND 1 = 1";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT products.id,products.description,products.quantity,products.reorder,products.unitquantity,products.costperunit,units.unitname FROM products, units WHERE products.active = '1' AND units.id = products.unit AND 1 = 1";


if(!empty($request['search']['value'])){
    $sql.=" AND (products.id Like '".$request['search']['value']."%' ";
    $sql.=" OR products.description Like '".$request['search']['value']."%' "; 
    $sql.=" OR products.unit Like '".$request['search']['value']."%' "; 
    $sql.=" OR products.quantity Like '".$request['search']['value']."%' "; 
    $sql.=" OR products.costperunit Like '".$request['search']['value']."%' "; 
    $sql.=" OR products.reorder Like '".$request['search']['value']."%' )"; 
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
            $subdata[]= $row['unitquantity'].' '.$row['unitname'];
            $subdata[]= $row['costperunit'];
            $subdata[]= $row['reorder'];


     $subdata[]='<a href="#" data-toggle="modal" data-target="#editproduct" id="'.$row['id'].'" class="btn btn-success btn-xs editproduct"><i class="fa fa-edit fa-fw"></i>Edit</a> <a href="#" id="'.$row['id'].'" class="btn btn-danger btn-xs deleteproduct"><i class="fa fa-trash fa-fw"></i>Delete</a>';
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

