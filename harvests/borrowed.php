
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();
 
 

$request = $_POST;
        $col =array(
            0   =>  'handeditemsinfo.id',
            1   =>  'handeditemsinfo.utensilid',
            2   =>  'handeditemsinfo.quantity',
            3   =>  'users.fname',
            4   =>  'users.lname', 
            5   =>  'utensils.description'          
        );  //create column like table in database

$sql ="SELECT handeditemsinfo.status, handeditemsinfo.quantity AS quantity, users.fname, users.lname, handeditemsinfo.id, utensils.description  FROM handeditemsinfo, users, utensils WHERE users.id = handeditemsinfo.userid AND utensils.id = handeditemsinfo.utensilid ";

$query=mysqli_query($data->con,$sql);
$totalData = mysqli_num_rows($query);
$totalFilter= $totalData;

//Search
$sql ="SELECT  handeditemsinfo.status, handeditemsinfo.quantity AS quantity, users.fname, users.lname, handeditemsinfo.id, utensils.description FROM handeditemsinfo, users, utensils WHERE  users.id = handeditemsinfo.userid AND utensils.id = handeditemsinfo.utensilid ";

        if(!empty($request['search']['value'])){
            $sql.=" AND (handeditemsinfo.id Like '".$request['search']['value']."%' ";
            $sql.=" OR users.fname Like '".$request['search']['value']."%' "; 
            $sql.=" OR users.lname Like '".$request['search']['value']."%' "; 
            $sql.=" OR utensils.description Like '".$request['search']['value']."%' ";             
            $sql.=" OR handeditemsinfo.quantity Like '".$request['search']['value']."%' )"; 
        }

$query = mysqli_query($data->con,$sql) ;
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query =mysqli_query($data->con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    if ($row['status'] == '1'){
       $row['status'] =  '<button class="btn btn-success"><i class="fa fa-check fa-fw"></i> </button>';
    } else {
       $row['status'] =  '<button class="btn btn-danger"><i class="fa fa-close fa-fw"></i> </button>';
    }
          
            $subdata=array();
            $subdata[]= strtoupper($row['fname']).' '.strtoupper($row['lname']);
            $subdata[]= strtoupper($row['description']);
            $subdata[]= $row['quantity'];
            $subdata[]= $row['status'];


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

