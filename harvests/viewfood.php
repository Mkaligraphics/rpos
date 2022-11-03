
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();

$request = $_POST;
        $col =array(
            0   =>  'food.id',
            1   =>  'food.foodname',
            2   =>  'food.category',
            3   =>  'food.units',
            4   =>  'food.price',
            5   =>  'foodcategory.foodcategory',
            6   =>  'food.photo'
        );  //create column like table in database

$sql ="SELECT food.id, food.foodname,food.category,food.units,food.price,food.photo, foodcategory.foodcategory FROM food, foodcategory WHERE food.active = '1' AND food.category = foodcategory.id ";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT food.id, food.foodname,food.category,food.units,food.price,food.photo , foodcategory.foodcategory FROM food, foodcategory WHERE food.active = '1' AND food.category = foodcategory.id";


if(!empty($request['search']['value'])){
    $sql.=" AND (food.id Like '".$request['search']['value']."%' ";
    $sql.=" OR food.foodname Like '".$request['search']['value']."%' "; 
    $sql.=" OR foodcategory.foodcategory Like '".$request['search']['value']."%' "; 
    $sql.=" OR food.photo Like '".$request['search']['value']."%' "; 
    $sql.=" OR food.units Like '".$request['search']['value']."%' "; 
    $sql.=" OR food.price Like '".$request['search']['value']."%' )"; 
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
            $subdata[]= "<a href='#' data-toggle='modal' class='editphoto' data-target='#editphoto' id='".$row['id']."'><img src='photos/".$row['photo']."' style='width:2.5em'; heigh:2.5em; /></a>";
            $subdata[]= strtoupper($row['foodname']);
            $subdata[]= strtoupper($row['foodcategory']);
            $subdata[]= $row['price'];

     $subdata[]='<a href="#" data-toggle="modal" data-target="#editfood" id="'.$row['id'].'" class="btn btn-success btn-xs editfood"><i class="fa fa-edit"></i> Edit</a> <a href="#"id="'.$row['id'].'" class="btn btn-danger btn-xs deletefood"><i class="fa fa-trash"></i> Delete</a> ';
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

