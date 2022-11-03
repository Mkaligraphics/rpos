<?php
require '../classes/dbase.class.php';
require '../classes/modules.class.php'; 
$data =  new modules();

require('../pdf/fpdf.php');
class gbs extends FPDF
{
// Page header
function Header()
{
   $image = '../img/';
    $this->Image($image.'icon.png', 2, $this->GetY(),18);    
    $this->SetFont('Arial','B',11);
    $this->SetTextColor(10, 180, 42); 
    $this->Cell(2);
    $this->Cell(90,4,'SweetJoint Restaurant ',0,0,'C');
    $this->Ln(6);
    $this->Cell(2);
    $this->Cell(90,4,'Call:+254715802806',0,0,'C');
    $this->Ln(6);
    $this->Cell(2);
    $this->SetTextColor(20, 20, 10);
    $this->Cell(90,4,'Cash bill',0,0,'C');
    $this->SetTextColor(0, 0, 0);
    if ($this->page == 1){        
        $this->Ln(5);
    }else{
        $this->Ln(5);
    }

    $this->Ln(2);
    
    
}


// Page footer
/*function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}*/
}
/*page setup*/
$gbs = new gbs('p','mm',array(200,80));
$gbs->AliasNbPages();
$gbs->SetMargins(2,15,20);
$gbs->AddPage();
$gbs->SetTitle('Cash bill',false);
$gbs->SetCreator('SweetJoint Restaurant POS', false);
$gbs->SetAuthor('Nickson Kalama',false);
/*#page setup*/

/*page header*/
$gbs->SetFont('Arial','B',12);
$gbs->SetTextColor(0, 0, 0);
$gbs->SetFillColor(255,255,255);
$gbs->SetDrawColor(0, 0, 0);
$gbs->Cell(50,5,'Billed to:',0,4,'L',true);

$select  = $data->con->query("SELECT incomes.customer, incomes.recdate,incomes.tablelabel,incomes.billno,customer.fullname FROM incomes, customer  WHERE incomes.billno = '".$_GET['billno']."' AND incomes.customer = customer.id AND incomes.cashout = '0' ") or die(mysqli_error());
              while ($rows = mysqli_fetch_array($select)){              
                  $gbs->Cell(50,6,'Client: '.$rows['fullname'],0,1,'L',false);
                  $gbs->Cell(50,6,'Table:'.$rows['tablelabel'],0,1,'L',false);
                  $gbs->Cell(50,6,'Billno: '.$rows['billno'],0,1,'L',false); 
                  $gbs->Cell(50,6,'Due date: '.$rows['recdate'],0,1,'L',false);  
}
/*#page header*/
$gbs->Ln(4);

/*summery*/
$gbs->SetFont('Arial','B',12);
$gbs->Cell(50,3,'Order summery ',0,1,'L',false);
/*#summery*/
$gbs->Ln(2);

/*TH*/
$gbs->SetFont('Arial','B',14);
$gbs->Cell(30,12,'ITEM',0,0,'C',false);
$gbs->Cell(12,12,'QTY',0,0,'C',false);
$gbs->Cell(30,12,'TOTALS',0,1,'C',false); 
/*#TH*/

/*ROWS*/
$gbs->SetFont('Arial','',12);
$total = 0;
$select  = $data->con->query("SELECT food.foodname,incomeinfo.price,incomeinfo.qty,incomeinfo.subtotal FROM incomeinfo, food WHERE incomeinfo.billno = '".$_GET['billno']."' AND food.id = incomeinfo.food_id");
              while ($row = mysqli_fetch_array($select)){ $total = $total + $row['subtotal'];

     $strln = strlen($row['foodname']);


     $gbs->Cell(30,8, $row['foodname'],4,0,'C',false);
     $gbs->Cell(12,8,$row['qty'],4,0,'C',false);
     $gbs->Cell(30,8,$row['subtotal'],4,1,'C',false);                    

}
/*#ROWS*/

/*#TOTALS*/
$gbs->Ln(8);
$gbs->SetFont('Arial','B',18);
$gbs->Cell(32,4,"",0,0,'C',false);
$gbs->Cell(12,4,"Total",0,0,'C',false);
$gbs->Cell(30,4,$total,0,1,'C',false);
/*#TOTALS*/

$gbs->SetTextColor(0, 0, 0);
//$gbs->Cell(40,8,'Once printed, no refurnd!');

$gbs->Output("I","Kitchen order");
exit(0);
?>  

