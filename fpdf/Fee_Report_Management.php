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
$pdf->Cell(195, 6, 'Title: Fee Management',1,0, 'C', 0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(63, 6, 'DATE: '.$Date, 1, 1, 'C', 0);
$pdf->SetX(10);
$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);

$sql = "SELECT * FROM Registration WHERE (Type = 'Student') ORDER BY AdmNO ASC";
$RunSQL = mysqli_query($tvs, $sql);
$Row = mysqli_num_rows($RunSQL);
if($Row > 0 ) 
{
	$i = 0;
	$FetchStudent = mysqli_fetch_assoc($RunSQL);
	$TotalDue = 0;
	$GrantTotalFee = 0;
	$TotalTerm1 = 0;
	$TotalTerm2 = 0;
	$TotalTerm3 = 0;
	$TotalTerm4 = 0;
	$TotalFeePaid = 0;
	$TotalBalanace = 0;
	
	$pdf->Ln(10); 
  	$height = 9; 
  	$Width = (210/10); 
	$pdf->SetFont('Arial','B', 10);
	$pdf->Cell(10, $height, 'SLN',1, 0, 'C', 1);
	$pdf->Cell(25, $height, 'ADM. NO',1, 0, 'C', 1); 
	$pdf->Cell(63, $height, 'NAME',1, 0, 'C', 1); 
	$pdf->Cell(15, $height, 'CLASS',1, 0, 'C', 1); 
	$pdf->Cell($Width, $height, 'PREV. DUE',1, 0, 'C', 1);
	$pdf->Cell($Width, $height, 'TOTAL FEE',1, 0, 'C', 1);
	$pdf->Cell($Width-1, $height, 'TERM 1',1, 0, 'C', 1);
	$pdf->Cell($Width-1, $height, 'TERM 2',1, 0, 'C', 1);
	$pdf->Cell($Width-1, $height, 'TERM 3',1, 0, 'C', 1);
	$pdf->Cell($Width-1, $height, 'TERM 4',1, 0, 'C', 1);
	$pdf->Cell($Width+1, $height, 'TOTAL PAID',1, 0, 'C', 1);
	$pdf->Cell($Width+1, $height, 'BALANCE',1, 1, 'C', 1);

   do {
		++$i;	
	 	$sqlFee = "SELECT * FROM FeeMaster WHERE (AdmNO = '{$FetchStudent['AdmNO']}')";
	 	$RunsqlFee = mysqli_query($tvs, $sqlFee);
	 	$rowFee = mysqli_num_rows($RunsqlFee);	
	 		
		if($rowFee > 0) {
	 		$FetchFee = mysqli_fetch_assoc($RunsqlFee);
	 		
	 		$PrevDue = $FetchFee['PrevDue'];
	 		$TotalFee = $FetchFee['TotalFee'];
			$Term1 = $FetchFee['Term1'];
			$Term2 = $FetchFee['Term2'];
			$Term3 = $FetchFee['Term3'];
			$Term4 = $FetchFee['Term4'];
			$TotalPaid = $FetchFee['TotalPaid'];
			$Balance = $FetchFee['Balance'];
	 	}
	 	else {
	 		$PrevDue = 0;
	 		$TotalFee = 0;
			$Term1 = 0;
			$Term2 = 0;
			$Term3 = 0;
			$Term4 = 0;
			$TotalPaid = 0;
			$Balance = 0;
	 		}

  		$pdf->SetFont('Arial','', 10);
  	 	$pdf->Cell(10, $height, $i,1, 0, 'C', 0);
 		$pdf->Cell(25, $height,$FetchStudent['AdmNO'],1, 0, 'C', 0);
 		$pdf->Cell(63, $height, strtoupper($FetchStudent['Firstname']." ".$FetchStudent['Lastname']),1, 0, 'L', 0);
 		$pdf->Cell(15, $height,$FetchStudent['Class'],1, 0, 'C', 0);
 		
 		$pdf->Cell($Width, $height, $PrevDue,1, 0, 'R', 0);
      $TotalDue = ($TotalDue + $PrevDue);      
 		$pdf->Cell($Width, $height, $TotalFee,1, 0, 'R', 0);
		$GrantTotalFee = ($GrantTotalFee + $TotalFee);
		$pdf->Cell($Width-1, $height, $Term1,1, 0, 'R', 0);
		$TotalTerm1 = ($TotalTerm1 + $Term1);
		$pdf->Cell($Width-1, $height, $Term2,1, 0, 'R', 0);
		$TotalTerm2 = ($TotalTerm2 + $Term2);
		$pdf->Cell($Width-1, $height, $Term3,1, 0, 'R', 0);
		$TotalTerm3 = ($TotalTerm3 + $Term3);
		$pdf->Cell($Width-1, $height, $Term4,1, 0, 'R', 0);
		$TotalTerm4 = ($TotalTerm4 + $Term4);
		$pdf->Cell($Width+1, $height, $TotalPaid,1, 0, 'R', 1);
	   $TotalFeePaid = ($TotalFeePaid + $TotalPaid);
      $pdf->Cell($Width+1, $height, $Balance,1, 1, 'R', 1);
      $TotalBalanace = ($TotalBalanace + $Balance);
      
      if(($i % 17) == 0 )  {
      	$pdf->SetFont('Arial','B', 10);
      	$pdf->Cell(10, $height, 'SLN',1, 0, 'C', 1);
			$pdf->Cell(25, $height, 'ADM. NO',1, 0, 'C', 1); 
			$pdf->Cell(63, $height, 'NAME',1, 0, 'C', 1); 
			$pdf->Cell(15, $height, 'CLASS',1, 0, 'C', 1); 
			$pdf->Cell($Width, $height, 'PREV. DUE',1, 0, 'C', 1);
			$pdf->Cell($Width, $height, 'TOTAL FEE',1, 0, 'C', 1);
			$pdf->Cell($Width-1, $height, 'TERM 1',1, 0, 'C', 1);
			$pdf->Cell($Width-1, $height, 'TERM 2',1, 0, 'C', 1);
			$pdf->Cell($Width-1, $height, 'TERM 3',1, 0, 'C', 1);
			$pdf->Cell($Width-1, $height, 'TERM 4',1, 0, 'C', 1);
			$pdf->Cell($Width+1, $height, 'TOTAL PAID',1, 0, 'C', 1);
			$pdf->Cell($Width+1, $height, 'BALANCE',1, 1, 'C', 1);
       }
      
      }while($FetchStudent = mysqli_fetch_assoc($RunSQL));
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(113, $height, "GRANT TOTAL OF 1 TO ".$i ,1, 0, 'C', 1);
		$pdf->Cell($Width, $height, $TotalDue,1, 0, 'R', 1);
		$pdf->Cell($Width, $height, $GrantTotalFee,1, 0, 'R', 1);
		$pdf->Cell($Width-1, $height, $TotalTerm1,1, 0, 'R', 1);
		$pdf->Cell($Width-1, $height, $TotalTerm2,1, 0, 'R', 1);
		$pdf->Cell($Width-1, $height, $TotalTerm3,1, 0, 'R', 1);
		$pdf->Cell($Width-1, $height, $TotalTerm4,1, 0, 'R', 1);
		$pdf->Cell($Width+1, $height, $TotalFeePaid,1, 0, 'R', 1);
		$pdf->Cell($Width+1, $height, $TotalBalanace,1, 0, 'R', 1);
		$pdf->Ln($height);
 }
else {
	$pdf->Cell(280, $height, "None of Students' Fee Details Entered",1, 0, 'R', 1);
		
	}
   $pdf->Ln(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(130, 6, 'Signature:' ,0, 0, 'L', 0);
	$pdf->Cell(130, 6, 'Signature:' ,0, 1, 'R', 0);
	$pdf->Cell(130,6,'Office Accountant:',0,0,'L',0);
	$pdf->Cell(130,6,'Principal',0,0,'R',0);	

//}   //switch is closed here
//$pdf->Output();
$pdf->Output('FeeManagementReport.pdf','D');
?>
