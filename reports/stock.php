<?php
require '../classes/dbase.class.php';
require '../classes/modules.class.php'; 
$data =  new modules();

$leftpadding=3;
require('../pdf/fpdf.php');
class gbs extends FPDF
{
// Page header
function Header()
{
   $image = '../img/';
    global $leftpadding;    
    $this->Image($image.'logo.gif', 20, $this->GetY(), 23.78);    
    $this->SetFont('Arial','B',14);
    $this->SetTextColor(32, 180, 42); 
    $this->Cell(55);
    $this->Cell(80,4,'SweetJoint Restaurant ',0,0,'C');
    $this->Ln(8);
    $this->Cell(55);
    $this->Cell(80,4,'Call:+254715802806',0,0,'C');
    $this->Ln(8);
    $this->Cell(55);
    $this->SetTextColor(20, 20, 10);
    $this->Cell(80,4,'Menu reports',0,0,'C');
    $this->SetTextColor(0, 0, 0);
    if ($this->page == 1){        
        $this->Ln(15);
    }else{
        $this->Ln(10);
    }
$this->Line(20, 45, 210-20, 45); // 20mm from each edge

    $this->Ln(10);
    $this->SetFont('Arial','B',8);
    $this->SetTextColor(0, 0, 0);
    $this->SetFillColor(230,230,255);
    $this->SetDrawColor(0, 0, 0);   
    $this->Cell(53,7,'Description',1,0,'C',true);
    $this->Cell(35,7,'Quantity',1,0,'C',true);
    $this->Cell(35,7,'Unit',1,0,'C',true);  
    $this->Cell(35,7,'Cost',1,0,'C',true);
    $this->Cell(30,7,'Reaorder',1,1,'C',true);
    
}


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$gbs = new gbs('p','mm','A4');
$gbs->AliasNbPages();
$gbs->SetMargins(10,15,20);
$gbs->AddPage();
$gbs->SetTitle('Stock report',false);
$gbs->SetCreator('SweetJoint Restaurant POS', false);
$gbs->SetAuthor('Nickson Kalama',false);

$gbs->SetFont('Arial','',8);
$gbs->SetTextColor(0, 0, 0);
$gbs->SetFillColor(255,255,255);
$gbs->SetDrawColor(0, 0, 0);


            $select  = $data->con->query("SELECT * FROM products WHERE active = '1' ");
              while ($rows = mysqli_fetch_array($select)){

              
                  $gbs->Cell(53,7,$rows['description'],1,0,'C',true);
                  $gbs->Cell(35,7,$rows['quantity'],1,0,'C',true);
                  $gbs->Cell(35,7,$rows['unitquantity'].' '.$rows['unit'],1,0,'C',true);
                  $gbs->Cell(35,7,$rows['costperunit'],1,0,'C',true);
                  $gbs->Cell(30,7,$rows['reorder'],1,1,'C',true);                    

}                 


            
$gbs->Ln(20);
$gbs->SetFont('Arial','B',10);
$gbs->SetTextColor(0, 0, 0);
$gbs->Cell(188,8,'Verified by',1,1,'C',true);
$gbs->Cell(48,8,'Accounts/Manager',1,0,'L',true);
$gbs->Cell(50,8,'Name ..............................',1,0,'L',true);
$gbs->Cell(48,8,'Sign ..............................',1,0,'L',true);
$gbs->Cell(42,8,'Date ..........................',1,1,'L',true);
$gbs->Output("I","Menu");
exit(0);
?>  
