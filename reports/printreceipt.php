<?php
require '../classes/dbase.class.php';
require '../classes/modules.class.php';

$data =  new modules();

require('../pdf/fpdf.php');
class sweetjoint extends FPDF
{

        function Header()
            {
    $this->Image('../img/logo.gif',25,6,30); 
    $this->SetFont('Courier','B',14);
    $this->setXY(30,35);
    $this->SetDash(1,1);
    $this->line(1,30,200,30); 
    $this->Cell(22,0,'SALES RECEIPT', 0, '0', 'C');    
    $this->SetDash(1,1);
    $this->line(1,40,200,40); 
    $this->Ln(20);
                   
            }

  function SetDash($black=null, $white=null)
      {
        if($black!==null)
          $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
          $s='[] 0 d';
        $this->_out($s);
  }



function header_note()
      {
        $this->SetFont('Courier','',12);
        $this->setXY(5,50);
        $this->Cell(8,0,'QTY', 0, '0', 'L');
        $this->Cell(50,0,'DESCRIPTION', 0, '0', 'C');
        $this->Cell(15,0,'PRICE', 0, '0', 'L');
        $this->SetDash(1,1);
        $this->line(1,55,80,55); 
      }
}

$sweetjoint = new sweetjoint('p','mm',array(200,80));
$sweetjoint->AliasNbPages();
$sweetjoint->SetMargins(4,15,20);
$sweetjoint->AddPage();
$sweetjoint->SetTitle('SALES RECEIPT',false);
$sweetjoint->SetCreator('SweetJoint Restaurant POS', false);
$sweetjoint->SetAuthor('Nickson Kalama',false);
$sweetjoint->header_note();
$default_y = 60;
$y = $default_y;
$baris = 1;

$sweetjoint->Ln(40);
$sweetjoint->SetFont('Courier','',12);
$incomeid = $_GET['incomeid'];
$total = 0;
$totalqty = 0;
$select  = $data->con->query("SELECT users.fname,users.lname, food.foodname,income.received_at, income.paid, foodorder_details.qty,foodorder_details.subtotal, income.paid,income.returned,income.receipt,income.discount, foodorder.userid FROM income, foodorder,foodorder_details,food, users WHERE users.id = income.servedby AND food.id = foodorder_details.food_id AND foodorder.billno = foodorder_details.billno AND foodorder.id = income.foodorder_id AND  income.id='$incomeid' ");
    while ($row = mysqli_fetch_array($select))
      { 
  $total = $total + $row['subtotal'];   
  $totalqty = $totalqty + $row['qty'];    
  global  $returned, $discount,$grandtotal, $paid, $receipt,$received_at, $fname, $lname;
  $fname = $row['fname'];
  $lname = $row['lname'];
  $returned = $row['returned'];
  $discount = $row['discount'];
  $received_at = $row['received_at'];
  $paid = $row['paid'];
  $receipt = $row['receipt'];
  $grandtotal = $total - $discount;

   $sweetjoint->setXY(5,$y);   
   $sweetjoint->Cell(7,0,$row['qty'].'X', 0, '0', 'L');
   $sweetjoint->Cell(50,0,$row['foodname'], 0, '0', 'C');
   $sweetjoint->Cell(15,0,$row['subtotal'], 0, '1', 'R');

  $y+=5;
  $baris++;

}
$sweetjoint->Ln(8);
$sweetjoint->SetFont('Courier','B',12);
$sweetjoint->Cell(70,0,$totalqty.'X ITEMS SOLD', 0, '0', 'C');
$y+=8;
$sweetjoint->SetDash(1,1);    
$sweetjoint->line(0,$y,200,$y); 
$sweetjoint->Ln(12);
$sweetjoint->Cell(28,0,'Subtotal :', 0, '0', 'R');
$sweetjoint->Cell(46,0,number_format($total,2), 0, '1', 'R');
$y+=12;
$sweetjoint->SetDash(1,1);    
$sweetjoint->line(0,$y,200,$y);
$sweetjoint->SetFont('Courier','',12);
$sweetjoint->Ln(10);
$sweetjoint->Cell(28,0,'Discount :', 0, '0', 'R');
$sweetjoint->Cell(46,0,number_format($discount,2), 0, '1', 'R');

$y+=10;
$sweetjoint->SetDash(1,1);    
$sweetjoint->line(0,$y,200,$y);
$sweetjoint->SetFont('Courier','B',12);
$sweetjoint->Ln(8);
$sweetjoint->Cell(28,0,'Total :', 0, '0', 'R');
$sweetjoint->Cell(46,0,number_format($grandtotal,2), 0, '1', 'R');
$sweetjoint->SetFont('Courier','',12);
$sweetjoint->Ln(8);
$sweetjoint->Cell(28,0,'Paid cash :', 0, '0', 'R');
$sweetjoint->Cell(46,0,number_format($paid,2), 0, '1', 'R');

$y+=16;
$sweetjoint->SetDash(1,1);    
$sweetjoint->line(0,$y,200,$y);
$sweetjoint->SetFont('Courier','',12);
$sweetjoint->ln(10);
$sweetjoint->Cell(28,0,'Change :', 0, '0', 'R');
$sweetjoint->Cell(46,0,number_format($returned,2), 0, '1', 'R');
$y+=20;
$sweetjoint->SetDash(1,1);    
$sweetjoint->line(0,$y,200,$y);
$sweetjoint->ln(10);
$sweetjoint->Cell(72,0,'Thank you!', 0, '1', 'C');

$sweetjoint->ln(5);
$sweetjoint->SetFont('Arial','I',8);
$sweetjoint->Cell(20,12,$receipt,0,0,'L',false);
$sweetjoint->Cell(25,12,date('d-m-Y',strtotime($received_at)),0,0,'L',false);
$sweetjoint->Cell(30,12,strtoupper($fname),0,1,'L',false);



$sweetjoint->Output("I","SALES RECEIPT");
exit(0);
?>  

