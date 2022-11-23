<?php
require('../pdf/pdf_barcode.php');
require '../classes/dbase.class.php';
require '../classes/modules.class.php';
$data =  new modules();


$orderid = $_GET['orderid'];
//variables
$orderby = ucfirst($data->getfield('name'));
//page setup
$pdf = new PDF_Code128('p','mm',array(400,80));
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

$select = $data->con->query("SELECT *  FROM sales_table WHERE sales_table.id = '".$_GET['orderid']."'  ");
while($rw = mysqli_fetch_array($select)){
    $detail = $rw['details'];
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
$pdf->Cell(30 ,5,'CLIENT:',0,1,'L');
$pdf->Cell(30 ,5,'PHONE',0,0,'L');
$pdf->Cell(20 ,5,'Served by:',0,1,'R');
$pdf->Ln(30);
$pdf->Line(0,45,30,45);



$pdf->Output("I","OFFICIAL RECEIPT");
exit(0);
?>  

