<?php
require '../classes/dbase.class.php';
require '../classes/modules.class.php';

$data =  new modules();
$orderby = ucfirst($data->getfield('fname')).' '.ucfirst($data->getfield('lname'));
require('../pdf/fpdf.php');
class gbs extends FPDF
{
// Page header
function Header()
{
       
    $this->SetFont('Arial','B',16);
    $this->Cell(20,12,'Sweetjoint Restaurant',0,1,'L');    
    $this->Cell(20,3,'Kitchen Order#:  '.$_GET['orderid'],0,1,'L');
    $this->Cell(2);
    $this->SetTextColor(0, 0, 0);
    if ($this->page == 1){        
        $this->Ln(5);
    }else{
        $this->Ln(5);
    }

    $this->Ln(2);    
    
    }

}

     
    
/*page setup*/
$gbs = new gbs('p','mm',array(400,80));
$gbs->AliasNbPages();
$gbs->SetMargins(2,15,20);
$gbs->AddPage();
$gbs->SetTitle('Order',false);
$gbs->SetCreator('SweetJoint Restaurant POS', false);
$gbs->SetAuthor('Nickson Kalama',false);
/*#page setup*/

/*page header*/
$gbs->SetFont('Arial','B',12);
$gbs->SetTextColor(0, 0, 0);
$gbs->SetFillColor(255,255,255);
$gbs->SetDrawColor(0, 0, 0);


$select  = $data->con->query("SELECT recdate FROM foodorder  WHERE id = '".$_GET['orderid']."' ") or die(mysqli_error());
              while ($rows = mysqli_fetch_array($select)){              
                $recdate =   $rows['recdate'];
                global $recdate;
}
/*#page header*/
$gbs->Ln(4);

/*summery*/
$gbs->SetFont('Arial','',12);
$gbs->Cell(40,3,'Date:  '.$recdate,0,1,'L',false);
/*#summery*/
$gbs->Ln(2);

/*TH*/
$gbs->SetFont('Arial','',14);
$gbs->Cell(30,12,'Items',0,1,'L',false);
/*#TH*/

/*ROWS*/
$gbs->SetFont('Arial','',12);
$total = 0;
$select  = $data->con->query("SELECT food.foodname, foodorder_details.price,foodorder_details.qty,foodorder_details.subtotal FROM foodorder_details, food, foodorder WHERE foodorder.id = '".$_GET['orderid']."' AND foodorder_details.food_id = food.id AND foodorder.billno = foodorder_details.billno");
    while ($row = mysqli_fetch_array($select)){ $total = $total + $row['subtotal'];
     $strln = strlen($row['foodname']);
     $gbs->Cell(50,8, $row['qty'].' X -- '.$row['foodname'],4,0,'L',false);
     $gbs->Cell(30,8,$row['subtotal'],4,1,'L',false);                 

}
/*#ROWS*/

/*#TOTALS*/
$gbs->Ln(8);
$gbs->SetFont('Arial','B',12);
$gbs->Cell(35,4,"",0,0,'C',false);
$gbs->Cell(14,4,"Total:",0,0,'R',false);
$gbs->Cell(10,4,number_format($total,2),0,1,'L',false);
/*#TOTALS*/

$gbs->SetFont('Arial','I',12);
$gbs->Cell(30,12,'Order by: '.$orderby,0,1,'L',false);

$gbs->SetTextColor(0, 0, 0);
//$gbs->Cell(40,8,'Once printed, no refurnd!');

$gbs->Output("I","Order");
exit(0);
?>  

