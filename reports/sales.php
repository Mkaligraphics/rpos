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
    $this->Cell(80,4,'Sales reports',0,0,'C');
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
    $this->Cell(25,7,'Date',1,0,'C',true);  
    $this->Cell(38,7,'Attendant',1,0,'C',true);
    $this->Cell(30,7,'Customer',1,0,'C',true);
    $this->Cell(18,7,'Total items',1,0,'C',true);  
    $this->Cell(20,7,'Payable',1,0,'C',true);
    $this->Cell(20,7,'Paid',1,0,'C',true);
    $this->Cell(18,7,'Discount',1,0,'C',true);
    $this->Cell(18,7,'Change',1,1,'C',true);
    
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
$gbs->SetTitle('Staffs report',false);
$gbs->SetCreator('SweetJoint Restaurant POS', false);
$gbs->SetAuthor('Nickson Kalama',false);

$gbs->SetFont('Arial','',8);
$gbs->SetTextColor(0, 0, 0);
$gbs->SetFillColor(255,255,255);
$gbs->SetDrawColor(0, 0, 0);

              $total_items = 0;
              $total_payable = 0;
              $total_paid = 0;
              $total_discount = 0;
              $total_returned = 0; 
              $select  = $data->con->query("SELECT incomes.recdate, users.fname,users.lname,customer.fullname, incomes.total_items, incomes.payable,incomes.paid,incomes.discount,incomes.returned FROM incomes,customer,users WHERE incomes.active ='1' AND incomes.cashout = '1' AND incomes.status = 'debit' AND users.id = incomes.userid AND customer.id = incomes.customer");
              while ($rows = mysqli_fetch_array($select)){

                  $total_items = $total_items + $rows['total_items'];
                  $total_payable = $total_payable + $rows['payable'];
                  $total_paid = $total_paid + $rows['paid'];
                  $total_discount = $total_discount + $rows['discount'];
                  $total_returned = $total_returned + $rows['returned'];

                  $gbs->Cell(25,7,date('d/m/Y',strtotime($rows['recdate'])),1,0,'C',true);
                  $gbs->Cell(38,7,$rows['fname'].' '.$rows['lname'],1,0,'C',true);
                  $gbs->Cell(30,7,$rows['fullname'],1,0,'C',true);
                  $gbs->Cell(18,7,$rows['total_items'],1,0,'C',true);  
                  $gbs->Cell(20,7,number_format($rows['payable'],2),1,0,'C',true);
                  $gbs->Cell(20,7,number_format($rows['paid'],2),1,0,'C',true);
                  $gbs->Cell(18,7,number_format($rows['discount'],2),1,0,'C',true);
                  $gbs->Cell(18,7,number_format($rows['returned'],2),1,1,'C',true);                    

}                 

$gbs->SetFont('Arial','B',9);
$gbs->Cell(75,0,'',0,0,'C',true);


$gbs->SetTextColor(123, 20, 10); 

$gbs->Cell(18,6,'Totals',0,0,'C',true);                    
$gbs->Cell(18,6,$total_items,1,0,'C',true); 
$gbs->Cell(20,6,number_format($total_payable,2),1,0,'C',true);
$gbs->Cell(20,6,number_format($total_paid,2),1,0,'C',true);
$gbs->Cell(18,6,number_format($total_discount,2),1,0,'C',true); 
$gbs->Cell(18,6,number_format($total_returned,2),1,1,'C',true); 

            
$gbs->Ln(20);
$gbs->SetFont('Arial','B',10);
$gbs->SetTextColor(0, 0, 0);
$gbs->Cell(188,8,'Verified by',1,1,'C',true);
$gbs->Cell(48,8,'Accounts/Manager',1,0,'L',true);
$gbs->Cell(50,8,'Name ..............................',1,0,'L',true);
$gbs->Cell(48,8,'Sign ..............................',1,0,'L',true);
$gbs->Cell(42,8,'Date ..........................',1,1,'L',true);
$gbs->Output("I","Sales");
exit(0);
?>  
