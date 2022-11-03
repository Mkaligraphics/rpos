
<?php 
   require '../classes/dbase.class.php';
 $data = new dbase();

if($_REQUEST['action'] == 'fetch_receipts'){

    $requestData = $_REQUEST;
    $start = $_REQUEST['start'];

    $initial_date = $_REQUEST['initial_date'];
    $final_date = $_REQUEST['final_date'];
    $transaction = $_REQUEST['transaction'];

    if(!empty($initial_date) && !empty($final_date)){
        $date_range = " AND income.received_at BETWEEN '".date('Y-m-d',strtotime($initial_date))."' AND '".date('Y-m-d',strtotime($final_date))."' ";
    }else{
        $date_range = "";
    }

    if($transaction != ''){
        $transaction = " AND income.status = '$transaction' ";
    }

    $columns = '*';
    $table = 'income';
    $where = " WHERE income.active = '1' ".$date_range.$transaction;

    $columns_order = array(
        0 => 'amount',
        1 => 'received_at',
        2 => 'receipt',
        3 => 'status',
        4 => 'payment_mode'
        
    );

    $sql = "SELECT ".$columns." FROM ".$table." ".$where;

    $result = mysqli_query($data->con, $sql) ;
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    if( !empty($requestData['search']['value']) ) {
        $sql.=" AND ( amount LIKE '%".$requestData['search']['value']."%' ";
        $sql.=" OR status LIKE '".$requestData['search']['value']."'";
        $sql.=" OR payment_mode LIKE '".$requestData['search']['value']."'";
        $sql.=" OR receipt LIKE '%".$requestData['search']['value']."%' )";
    }

    $result = mysqli_query($data->con, $sql);
    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;

    $sql .= " ORDER BY ". $columns_order[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir'];

    if($requestData['length'] != "-1"){
        $sql .= " LIMIT ".$requestData['start']." ,".$requestData['length'];
    }

    $result = mysqli_query($data->con, $sql);
    $data = array();
    $counter = $start;

    $count = $start;
    while($row = mysqli_fetch_array($result)){
        $count++;
if ($row["status"] == 'debit'){

            $status = '<a class="text-info font-weight-bold" href="#">'. strtoupper($row["status"]).'</a>';

} else {
                $status = '<a class="text-danger font-weight-bold" href="#">'. strtoupper($row["status"]).'</a>';

}

        $nestedData = array();       

        $nestedData['date'] = date('d-m-Y',strtotime($row["received_at"]));
        $nestedData['mode'] = strtoupper($row["payment_mode"]);
        $nestedData['amount'] = $row["amount"];
        $nestedData['status'] = $status;
        $nestedData['receipt'] =  $row["receipt"];
        $nestedData['receipt'] = '<a class="btn btn-secondary" onClick=printJS("sweetjoint/reports/printreceipt?incomeid='.$row["id"].'")><i class="fa fa-print"></i> '.$row["receipt"].'</a>';
       

        $time = strtotime($row["received_at"]);
        $nestedData['received_at'] = date('h:i:s A - d M, Y', $time);

        $data[] = $nestedData;
    }

    $json_data = array(
        "draw"            => intval( $requestData['draw'] ),
        "recordsTotal"    => intval( $totalData),
        "recordsFiltered" => intval( $totalFiltered ),
        "records"         => $data
    );

    echo json_encode($json_data);
}




 ?> 

