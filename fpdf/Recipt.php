<?php if (!isset($_SESSION)) {
  session_start();
}?>
<?php require_once('../Connections/tvs.php'); 
include('../MonytoWord.php');
date_default_timezone_set('Asia/Kolkata');
$Date = date('d-m-Y');
$SLN = $_GET['SLN'];
mysqli_select_db($tvs,$database_tvs); 
?>
<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

//Connect to your database
//Create new pdf file
$pdf=new FPDF();

//Open file
//$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//-------------READ FROM SESSION VARIABLES-----------

//---------------------------------------------------
//Add first page
//$pdf->AddPage('P', 'A5');
$pdf = new FPDF('P','mm',array(105,150));
$pdf->AddPage();
//set initial y axis position per page
//set initial y axis position per page
$y_axis_initial = 1;
$x_axis_initial = 1;

//print column titles for the actual page
//$pdf->SetFillColor(232, 232, 232);

//$pdf->SetY($y_axis_initial);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(232, 232, 232);
$pdf->SetTextColor(255,0,0);
$pdf->SetMargins(5,6);
//$pdf->Cell(95, 15, ''  ,1, 0, 'C', 0);
$pdf->Image('7.jpeg',5,8, 95, 15);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95, 7, 'FEE RECEIPT',1,1,'C',1);
$pdf->Ln(5);
//$pdf->Cell(15, 15, ''  ,1, 0, 'C', 1);
//$pdf->Image('../images/logo1.png',225,15,22,16);
//$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0,0,0);

$sql = "SELECT * FROM PaymentActivity WHERE (SLN = '{$SLN}')";
$Runsql = mysqli_query($tvs, $sql);
$FetchRecipt = mysqli_fetch_assoc($Runsql);


$pdf->Ln(2);
$pdf->Cell(48, 8, 'Receipt NO: '.$FetchRecipt['Receipt'], 0, 0, 'L', 0);
$pdf->Cell(48, 8, 'Date: '.$Date, 0, 1, 'R', 0);
$pdf->Ln(2);
$pdf->Cell(48, 8, 'Name: '.$FetchRecipt['Name'], 0, 0, 'L', 0);
$pdf->Cell(48, 8, 'Standard: '.$FetchRecipt['Class'], 0, 1, 'R', 0);

//$pdf->SetFillColor(0,0,0);
//$pdf->Cell(96, 1, '', 1, 1, 'C', 1);
$pdf->Ln(4);
$height = 9;
switch($FetchRecipt['FeeHead']) 
{
	Case "Term1":
		$pdf->Cell(58, $height, 'School Fees:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, $FetchRecipt['Amount'], 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Transportation Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Book Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, '', 0);
		$pdf->Cell(58, $height, 'Miscellaneous Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height,  '', 1, 1, 'L', 0);
		break;
	Case "Term2":
		$pdf->Cell(58, $height, 'School Fees:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Transportation Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, $FetchRecipt['Amount'], 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Book Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, '', 0);
		$pdf->Cell(58, $height, 'Miscellaneous Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height,  '', 1, 1, 'L', 0);
		break;
	Case "Term3":
		$pdf->Cell(58, $height, 'School Fees:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Transportation Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Book Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, $FetchRecipt['Amount'], 1, 1, '', 0);
		$pdf->Cell(58, $height, 'Miscellaneous Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height,  '', 1, 1, 'L', 0);
		break;
	Case "Term4":
		$pdf->Cell(58, $height, 'School Fees:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Transportation Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, 'L', 0);
		$pdf->Cell(58, $height, 'Book Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height, '', 1, 1, '', 0);
		$pdf->Cell(58, $height, 'Miscellaneous Fee:', 1, 0, 'L', 0);
		$pdf->Cell(38, $height,  $FetchRecipt['Amount'], 1, 1, 'L', 0);
		break;
}
$pdf->Ln(1);
//$pdf->Cell(96, 5, '---------------------------------------------------------------------------------', 0, 1, 'C', 0);

$pdf->SetFillColor(230,230,230);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(58, 9, 'Total Fee Paid:', 1, 0, 'R', 1);
$pdf->Cell(38, 9,  $FetchRecipt['Amount'], 1, 1, 'L', 1);
$Money = no_to_words($FetchRecipt['Amount']); 
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(96, 9, strtoupper('Rupees '.$Money.'only'), 0, 0, 'L', 0);

$pdf->SetMargins(5,4);
$pdf->Ln(13);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 4, 'Signature', 0, 1, 'R', 0);


//}   //switch is closed here
//$pdf->Output();
$pdf->Output('Fee-recipt.pdf','D');
?>
