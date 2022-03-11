<?php if (!isset($_SESSION)) {
  session_start();
}?>
<?php require_once('../Connections/tvs.php'); 
date_default_timezone_set('Asia/Kolkata');
$Date = date('d-m-Y');
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
$pdf->AddPage('L', 'A4');

//set initial y axis position per page
//set initial y axis position per page
$y_axis_initial = 5;
$row_height=5;
$x_axis_initial=14;

//print column titles for the actual page
//$pdf->SetFillColor(232, 232, 232);

$pdf->SetY($y_axis_initial);
$pdf->SetX(2);
$pdf->SetFillColor(232, 232, 232);
$pdf->SetTextColor(255,0,0);
$pdf->SetY(10);
$pdf->Cell(17, 18, ''  ,1, 0, 'C', 0);
$pdf->Image('../assets/img/logo.png',11,11,17,16);
//$pdf->SetX(28);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial', 'B', 14);
//$pdf->Cell(15, 15, ''  ,1, 0, 'C', 1);
//$pdf->Image('../images/logo1.png',225,15,22,16);
//$pdf->Ln(5);
$pdf->SetY(7);
$pdf->SetX(28);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetX(10);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Ln(3);
$pdf->SetX(27);
$pdf->Cell(195, 7, 'SCHOOL NAME',1,0, 'C', 0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(63, 7, 'Form No.: ../ ....../--/--',1,1, 'C', 0);
$pdf->SetX(27);
$pdf->Cell(195, 5, '(Affiliated to ...............)',1, 0, 'C', 0);
$pdf->Cell(63, 5, '',1, 1, 'L', 0);
$pdf->SetX(27);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(27);
$pdf->Cell(195, 6, 'Title: Consolidate Fee Report',1,0, 'C', 0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(63, 6, 'DATE: '.$Date, 1, 1, 'C', 0);
$pdf->SetX(10);
$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);

include('../FuntionConsolidate.php');
$ClassArray = array("LKG", "UKG", "First", "Second", "Third", "Fourth", "Fifth");
$TotalDue = 0;
$GrantTotalFee = 0;
$TotalTerm1 = 0;
$TotalTerm2 = 0;
$TotalTerm3 = 0;
$TotalTerm4 = 0;
$TotalFeePaid = 0;
$TotalBalanace = 0; 

  $pdf->Ln(10); 
  $height = 10; 
  $Width = (243/10); 
  $pdf->SetFont('Arial','', 11);
  $pdf->Cell(13, $height, 'SLN',1, 0, 'C', 1);
  $pdf->Cell(22, $height, 'CLASS',1, 0, 'L', 1); 
  $pdf->Cell(25, $height, '# STUDENTS',1, 0, 'C', 1); 
  $pdf->Cell($Width, $height, 'PRE. DUES',1, 0, 'C', 1); 
  $pdf->Cell($Width, $height, 'TOTAL FEE',1, 0, 'C', 1);
  $pdf->Cell($Width, $height, 'TERM 1',1, 0, 'C', 1);
  $pdf->Cell($Width, $height, 'TERM 2',1, 0, 'C', 1);
  $pdf->Cell($Width, $height, 'TERM 3',1, 0, 'C', 1);
  $pdf->Cell($Width, $height, 'TERM 4',1, 0, 'C', 1);
  $pdf->Cell($Width, $height, 'TOTAL PAID',1, 0, 'C', 1);
  $pdf->Cell($Width, $height, 'BALANCE',1, 0, 'C', 1);
  $pdf->Cell($Width-2, $height, 'REMARKS',1, 0, 'C', 1);
  	
  $pdf->Ln($height); 
  for($i = 0;$i< count($ClassArray);$i++) {
  		$pdf->SetFont('Arial','', 12);
  	 	$pdf->Cell(13, $height, $i+1,1, 0, 'C', 0);
 		$pdf->Cell(22, $height,$ClassArray[$i],1, 0, 'L', 0);
 		$pdf->Cell(25, $height, StudentCountFunction($ClassArray[$i]),1, 0, 'C', 0);
 		
 		$PrevDue 	= ConsolidateFeeFunction($ClassArray[$i],"PrevDue");
		$TotalDue 	= ($TotalDue + $PrevDue); 
 		$pdf->Cell($Width, $height, $PrevDue,1, 0, 'R', 0);
 		
 		$TotalFee	= ConsolidateFeeFunction($ClassArray[$i],"TotalFee");
      $GrantTotalFee = ($GrantTotalFee + $TotalFee);      
 		$pdf->Cell($Width, $height, $TotalFee,1, 0, 'R', 0);
 		
 		$Term1	= ConsolidateFeeFunction($ClassArray[$i],"Term1");
      $TotalTerm1 = ($TotalTerm1 + $Term1);
		$pdf->Cell($Width, $height, $Term1,1, 0, 'R', 0);
		
		$Term2	= ConsolidateFeeFunction($ClassArray[$i],"Term2");
      $TotalTerm2 = ($TotalTerm2 + $Term2);
		$pdf->Cell($Width, $height, $Term2,1, 0, 'R', 0);
		
		$Term3	= ConsolidateFeeFunction($ClassArray[$i],"Term3");
		$TotalTerm3 = ($TotalTerm3 + $Term3);
		$pdf->Cell($Width, $height, $Term3,1, 0, 'R', 0);
		
		$Term4	= ConsolidateFeeFunction($ClassArray[$i],"Term4");
      $TotalTerm4 = ($TotalTerm4 + $Term4);
		$pdf->Cell($Width, $height, $Term4,1, 0, 'R', 0);
		
		$TotalPaid	= ConsolidateFeeFunction($ClassArray[$i],"TotalPaid");
      $TotalFeePaid = ($TotalFeePaid + $TotalPaid);
		$pdf->Cell($Width, $height, $TotalPaid,1, 0, 'R', 1);
		
		$Balance	= ConsolidateFeeFunction($ClassArray[$i],"Balance");
      $TotalBalanace = ($TotalBalanace + $Balance);
      $pdf->Cell($Width, $height, $Balance,1, 0, 'R', 1);
      
		$pdf->Cell($Width-2, $height, "",1, 0, 'R', 0);
		$pdf->Ln($height);
	}
	$pdf->Cell(60, $height, "GRANT TOTAL OF 1 TO ".$i ,1, 0, 'C', 0);
	$pdf->Cell($Width, $height, $TotalDue,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $GrantTotalFee,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $TotalTerm1,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $TotalTerm2,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $TotalTerm3,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $TotalTerm4,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $TotalFeePaid,1, 0, 'R', 1);
	$pdf->Cell($Width, $height, $TotalBalanace,1, 0, 'R', 1);
	$pdf->Cell($Width-2, $height, "",1, 0, 'R', 1);
	$pdf->Ln($height);
	
   $pdf->Ln(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(130, 6, 'Signature:' ,0, 0, 'L', 0);
	$pdf->Cell(130, 6, 'Signature:' ,0, 1, 'R', 0);
	$pdf->Cell(130,6,'Office Accountant:',0,0,'L',0);
	$pdf->Cell(130,6,'Principal',0,0,'R',0);	

//}   //switch is closed here
//$pdf->Output();
$pdf->Output('ConsolidateFeeReport.pdf','D');
?>
