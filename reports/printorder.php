<?php
require('../pdf/pdf_barcode.php');
require '../classes/dbase.class.php';
require '../classes/modules.class.php';
$data =  new modules();

$orderby = ucfirst($data->getfield('name'));
$pdf=new PDF_Code39('p','mm',array(400,80));
$pdf->AddPage();


//$pdf->Code39(20,20,'Aw',1,10);
$pdf->AliasNbPages();
$pdf->SetMargins(2,15,20);
$pdf->SetTitle('RECEIPT',false);
$pdf->SetCreator('WAQANDA RESTAURANT POS', false);
$pdf->SetAuthor('Nicktech solutions',false);
/*#page setup*/

/*page header*/
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(0, 0, 0);


$sel  = $data->con->query("SELECT timestamp FROM sales_table  WHERE id = '".$_GET['orderid']."' ");
              while ($rows = mysqli_fetch_array($sel)){              
                $recdate =   $rows['timestamp'];
                global $recdate;
}
/*#page header*/
$pdf->Ln(4);

/*summery*/
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,3,'Date:  ',0,1,'L',false);
/*#summery*/
$pdf->Ln(2);

/*TH*/
$pdf->SetFont('Arial','',14);
$pdf->Cell(30,12,'Items',0,1,'L',false);
/*#TH*/

/*ROWS*/
$pdf->SetFont('Arial','',12);
$total = 0;
$select  = $data->con->query("SELECT products_table.product_name, sales_details.unit_price,sales_details.qty,sales_details.unit_total FROM sales_details, products_table, sales_table WHERE sales_table.id = '".$_GET['orderid']."' AND sales_details.product_id = products_table.id AND sales_table.details = sales_details.details");
    while ($row = mysqli_fetch_array($select)){ $total = $total + $row['unit_total'];
     $strln = strlen($row['product_name']);
     $pdf->Cell(50,8, $row['qty'].' X -- '.$row['product_name'],4,0,'L',false);
     $pdf->Cell(30,8,$row['unit_total'],4,1,'L',false);                 

}
/*#ROWS*/

/*#TOTALS*/
$pdf->Ln(8);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,4,"",0,0,'C',false);
$pdf->Cell(14,4,"Total:",0,0,'R',false);
$pdf->Cell(10,4,number_format($total,2),0,1,'L',false);
/*#TOTALS*/

$pdf->SetFont('Arial','I',12);
$pdf->Cell(30,12,'Order by: '.$orderby,0,1,'L',false);

$pdf->SetTextColor(0, 0, 0);
//$gbs->Cell(40,8,'Once printed, no refurnd!');


class PDF_BARCODE extends FPDF
{

function Header()
{
       
    $this->SetFont('Arial','B',14);
    $this->Cell(20,12,'WAQANDA RESTAURANT POS',0,1,'L');    
    $this->Cell(20,3,'RECEIPT :  '.$_GET['orderid'],0,1,'L');
    $this->Cell(2);
    $this->SetTextColor(0, 0, 0);
    if ($this->page == 1){        
        $this->Ln(5);
    }else{
        $this->Ln(5);
    }

    $this->Ln(2);    
    
    }




function EAN13($x, $y, $barcode, $h=16, $w=.35, $fSize=9)
{
    $this->Barcode($x,$y,$barcode,$h,$w,$fSize,13);
}

function UPC_A($x, $y, $barcode, $h=16, $w=.35, $fSize=9)
{
    $this->Barcode($x,$y,$barcode,$h,$w,$fSize,12);
}

function GetCheckDigit($barcode)
{
    //Compute the check digit
    $sum=0;
    for($i=1;$i<=11;$i+=2)
        $sum+=3*$barcode[$i];
    for($i=0;$i<=10;$i+=2)
        $sum+=$barcode[$i];
    $r=$sum%10;
    if($r>0)
        $r=10-$r;
    return $r;
}

function TestCheckDigit($barcode)
{
    //Test validity of check digit
    $sum=0;
    for($i=1;$i<=11;$i+=2)
        $sum+=3*$barcode[$i];
    for($i=0;$i<=10;$i+=2)
        $sum+=$barcode[$i];
    return ($sum+$barcode[12])%10==0;
}

function Barcode($x, $y, $barcode, $h, $w, $fSize, $len)
{
    //Padding
    $barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
    if($len==12)
        $barcode='0'.$barcode;
    //Add or control the check digit
    if(strlen($barcode)==12)
        $barcode.=$this->GetCheckDigit($barcode);
    elseif(!$this->TestCheckDigit($barcode))
        $this->Error('Incorrect check digit');
    //Convert digits to bars
    $codes=array(
        'A'=>array(
            '0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
            '5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
        'B'=>array(
            '0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
            '5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
        'C'=>array(
            '0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
            '5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
        );
    $parities=array(
        '0'=>array('A','A','A','A','A','A'),
        '1'=>array('A','A','B','A','B','B'),
        '2'=>array('A','A','B','B','A','B'),
        '3'=>array('A','A','B','B','B','A'),
        '4'=>array('A','B','A','A','B','B'),
        '5'=>array('A','B','B','A','A','B'),
        '6'=>array('A','B','B','B','A','A'),
        '7'=>array('A','B','A','B','A','B'),
        '8'=>array('A','B','A','B','B','A'),
        '9'=>array('A','B','B','A','B','A')
        );
    $code='101';
    $p=$parities[$barcode[0]];
    for($i=1;$i<=6;$i++)
        $code.=$codes[$p[$i-1]][$barcode[$i]];
    $code.='01010';
    for($i=7;$i<=12;$i++)
        $code.=$codes['C'][$barcode[$i]];
    $code.='101';
    //Draw bars
    for($i=0;$i<strlen($code);$i++)
    {
        if($code[$i]=='1')
            $this->Rect($x+$i*$w,$y,$w,$h,'F');
    }
    //Print text uder barcode
    $this->SetFont('Arial','',$fSize);
    $this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));
}
}

$pdf->Output("I","OFFICIAL RECEIPT");
exit(0);
?>  

