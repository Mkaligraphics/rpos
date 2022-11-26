<?php
require('../pdf/pdf_barcode.php');
require '../classes/dbase.class.php';
require '../classes/modules.class.php';
$data =  new modules();


$orderid = $_GET['orderid'];
//variables
$orderby = ucfirst($data->getfield('name'));
//page setup
$pdf = new PDF_Code128('p','mm',array(297,80));
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//RECEIPT HEADER
$pdf->Cell(80 ,5,'WAQANDA RESTAURANT',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60 ,5,'TEL: 0726333720',0,1,'C');
$pdf->Cell(60 ,5,'EMAIL: accounts@waqanda.co.ke',0,1,'C');
$pdf->Cell(60 ,5,'LOCATION: Changamwe',0, 1,'C');
$pdf->Cell(60 ,5,'CITY: Mombasa',0, 1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(65 ,5,'RECEIPT',0, 1,'R');
$pdf->Line(0,45,150,45);

$select = $data->con->query("SELECT sales_table.timestamp, sales_table.details, clients_table.name AS client, clients_table.phone, users_table.name  FROM users_table, sales_table ,clients_table WHERE sales_table.user_id = users_table.id AND sales_table.customer_id = clients_table.id AND sales_table.id = '".$_GET['orderid']."'  ");
while($rw = mysqli_fetch_array($select)){
    $detail = $rw['details'];
    $client = $rw['client'];
    $mobile = $rw['phone'];
    $served_by = $rw['name'];
    $date = date('d-m-Y',strtotime($rw['timestamp']));
    global $detail, $date;
    $pdf->SetFont('Arial','B',10);
    $pdf->SetXY(24,48);
    $pdf->Write(5,$detail);  
    $pdf->Code128(5,55,$detail,72,10);  
}

$pdf->Ln(20);

$pdf->Cell(30,10,'Date:'.$date,0, 0, 'L');
$pdf->Cell(40,10,'#:'.$detail,0,0,'R');

$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->Cell(30 ,5,'CLIENT: '.$client,0,1,'L');
$pdf->Cell(48 ,5,'PHONE: '.$mobile,0,0,'L');
$pdf->Cell(20 ,5,'Served by: '.$served_by,0,1,'R');


$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetDrawColor(120,255,255);
$pdf->Cell(22, 10, 'PARTICULARS', 1, 0, 'C');
$pdf->Cell(14, 10, 'QTY', 1, 0, 'C');
$pdf->Cell(18, 10, 'PRICE', 1, 0, 'C');
$pdf->Cell(16, 10, 'TOTAL', 1, 1, 'C');

$sql = $data->con->query("SELECT  products_table.product_name, sales_details.qty, sales_details.unit_price, sales_details.unit_total FROM sales_details, sales_table, products_table WHERE sales_table.details = sales_details.details AND sales_details.product_id = products_table.id AND sales_table.id = '".$_GET['orderid']."'  ");
while($rws = mysqli_fetch_array($sql)){
    $pdf->Cell(22, 10, $rws['product_name'], 0, 0, 'C');
    $pdf->Cell(14, 10, $rws['qty'], 0, 0, 'C');
    $pdf->Cell(18, 10, $rws['unit_price'], 0, 0, 'C');
    $pdf->Cell(16, 10, $rws['unit_total'], 0, 1, 'C');  

}
$today = date('d M, Y').' ('.date('H:m:s').')';
$pdf->Cell(60, 10, 'Till number No: 277777', 0, 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(60, 10, 'Receipt printed on '.$today , 0, 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(60, 10, 'Karibu Tena! ' , 0, 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(60, 10, 'Developed by NICKTECH SOLUTIONS ' , 0, 0, 'C');




$pdf->Output("I","OFFICIAL RECEIPT");
exit(0);
?>  

