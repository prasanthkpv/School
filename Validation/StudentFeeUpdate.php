<?php 
if (!isset($_SESSION)) {
  session_start();
  ob_start();
}
require_once('../Connections/tvs.php'); 
date_default_timezone_set('Asia/Kolkata');
mysqli_select_db($tvs,$database_tvs);

$AdmNO = mysqli_real_escape_string($tvs, $_POST["AdmNO"]);
$Name = mysqli_real_escape_string($tvs, $_POST["Name"]);
$Field = mysqli_real_escape_string($tvs, $_POST["Field"]);
$Amount = mysqli_real_escape_string($tvs, $_POST["Amount"]);
$Date = mysqli_real_escape_string($tvs, $_POST["Date"]);
$Receipt = mysqli_real_escape_string($tvs, $_POST["Receipt"]);
$PaymentMode = mysqli_real_escape_string($tvs, $_POST["PaymentMode"]);

require_once('../DeviceDetection.php'); 
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
 		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
 		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		 $ip = $_SERVER['REMOTE_ADDR'];   //IP ADDRESS
	}			
	$detect = Detect::systemInfo();
	if($detect['device']=='MOBILE')
		{
		$Device  = 'Mobile Device';
		}
	else {
 			$Device  = 'Labtop/Desktop';  // DEVICE
 			}		
  $ActivityTime = date('Y-m-d h:i:s'); 
  $Author = $_SESSION['Username'];
  
  $sqlClass = "SELECT * FROM Registration WHERE (AdmNO = '{$AdmNO}')";
  $RunsqlClass = mysqli_query($tvs, $sqlClass);
  $FetchClass = mysqli_fetch_assoc($RunsqlClass);
  
  //=============Collecting Passt data stored in Fee Master Table==============
  $sqlPast = "SELECT * FROM FeeMaster WHERE (AdmNO = '{$AdmNO}')";
  $RunsqlPast = mysqli_query($tvs, $sqlPast);
  $RowPast = mysqli_num_rows($RunsqlPast);
  if($RowPast > 0 ) {
  	$FetchPast = mysqli_fetch_assoc($RunsqlPast);
  	$PastAmount = $FetchPast[$Field];
  	$ActualAmount = $Amount - $PastAmount;  	
  	}
  	else {
  		$ActualAmount = $Amount;
  	}
  //===========================================================================

$sqlInsert = "INSERT INTO PaymentActivity (DateTime, Author, IPAddr, Device, AdmNO, Class, FeeHead, Name, Amount, Date, Receipt, PaymentMode ) VALUES('{$ActivityTime}', '{$Author}', '{$ip}', '{$Device}', '{$AdmNO}', '{$FetchClass['Class']}', '{$Field}', '{$Name}', '{$ActualAmount}', '{$Date}', '{$Receipt}', '{$PaymentMode}')";
$sqlRun = mysqli_query($tvs, $sqlInsert);

$sql = "SELECT * FROM FeeMaster WHERE (AdmNO = '{$AdmNO}')";
$RunSql = mysqli_query($tvs, $sql);
$RowSql =mysqli_num_rows($RunSql);
if($RowSql > 0) 
{
	//===========UPDATE PAYMENT======================
	$FetchFee = mysqli_fetch_assoc($RunSql);
	
	//=============OLD DATA=================
	$Old_Due = $FetchFee['PrevDue'];
	$Old_TotalFee = $FetchFee['TotalFee'];
	$Old_Term1 = $FetchFee['Term1'];
	$Old_Term2 = $FetchFee['Term2'];
	$Old_Term3 = $FetchFee['Term3'];
	$Old_Term4 = $FetchFee['Term4'];
	$Old_TotalPaid = $FetchFee['TotalPaid'];
	$Old_Balance = $FetchFee['Balance'];	
	//======================================s
	if(!strcmp($Field, 'PrevDue')) {
		$New_Due = $Amount;
		$New_TotalFee = $Old_TotalFee;
		$New_Term1 = $Old_Term1;
		$New_Term2 = $Old_Term2;
		$New_Term3 = $Old_Term3;
		$New_Term4 = $Old_Term4;
		$New_TotalPaid = $Old_TotalPaid;
		$New_Ballance = $Old_Balance + ($Amount - $Old_Due);
		}
	else if(!strcmp($Field, 'TotalFee')){
		$New_Due = $Old_Due;
		$New_TotalFee = $Amount;
		$New_Term1 = $Old_Term1;
		$New_Term2 = $Old_Term2;
		$New_Term3 = $Old_Term3;
		$New_Term4 = $Old_Term4;
		$New_TotalPaid = $Old_TotalPaid;
		$New_Ballance = $Old_Balance + ($Amount - $Old_TotalFee);
		}
	else if(!strcmp($Field, 'Term1')){
		$New_Due = $Old_Due;
		$New_TotalFee = $Old_TotalFee;
		$New_Term1 = $Amount;
		$New_Term2 = $Old_Term2;
		$New_Term3 = $Old_Term3;
		$New_Term4 = $Old_Term4;
		$New_TotalPaid = $Old_TotalPaid + ($Amount - $Old_Term1);
		$New_Ballance = $Old_Balance - ($Amount - $Old_Term1);
		}
	else if(!strcmp($Field, 'Term2')){
		$New_Due = $Old_Due;
		$New_TotalFee = $Old_TotalFee;
		$New_Term1 = $Old_Term1;
		$New_Term2 = $Amount;
		$New_Term3 = $Old_Term3;
		$New_Term4 = $Old_Term4;
		$New_TotalPaid = $Old_TotalPaid + ($Amount - $Old_Term2);
		$New_Ballance = $Old_Balance - ($Amount - $Old_Term2);
		}
	else if(!strcmp($Field, 'Term3')){
		$New_Due = $Old_Due;
		$New_TotalFee = $Old_TotalFee;
		$New_Term1 = $Old_Term1;
		$New_Term2 = $Old_Term2;
		$New_Term3 = $Amount;
		$New_Term4 = $Old_Term4;
		$New_TotalPaid = $Old_TotalPaid + ($Amount - $Old_Term3);
		$New_Ballance = $Old_Balance - ($Amount - $Old_Term3);
		}
	else if(!strcmp($Field, 'Term4')){
		$New_Due = $Old_Due;
		$New_TotalFee = $Old_TotalFee;
		$New_Term1 = $Old_Term1;
		$New_Term2 = $Old_Term2;
		$New_Term3 = $Old_Term3;
		$New_Term4 = $Amount;
		$New_TotalPaid = $Old_TotalPaid + ($Amount - $Old_Term4); ;
		$New_Ballance = $Old_Balance - ($Amount - $Old_Term4);
		}
		
	$sqlUpdate = "UPDATE FeeMaster SET  					 
  					 PrevDue 	= '{$New_Due}',
  					 TotalFee	= '{$New_TotalFee}',
  					 Term1 		= '{$New_Term1}',
  					 Term2		= '{$New_Term2}',
  					 Term3 		= '{$New_Term3}',
  					 Term4 		= '{$New_Term4}',
  					 TotalPaid 	= '{$New_TotalPaid}',
  					 Balance 	= '{$New_Ballance}'
  					 WHERE (AdmNO = '{$AdmNO}')";
  	 $RunUpdate = mysqli_query($tvs, $sqlUpdate);
	//===============================================
	}
else {
	//=============INSERT PAYMENT====================
	if(!strcmp($Field, 'PrevDue')) {
		$TotalPaid = 0;
		$Balance = $Amount;		
		}
	else if(!strcmp($Field, 'TotalFee')) {
		$TotalPaid = 0;
		$Balance = $Amount;	
		}
	$sqlFeeInsert = "INSERT INTO FeeMaster (AdmNO, Name,".$Field.", TotalPaid, Balance) VALUES('{$AdmNO}', '{$Name}', '{$Amount}', '{$TotalPaid}', '{$Balance}')";
   $sqlRun = mysqli_query($tvs, $sqlFeeInsert);
	//===============================================
	}

 //if(!$RunUpdate) {
  		//return 'Data Updated';
  //	}
/* //---------logging Activities------------------------------------------------------------------
$Author = "SELECT * FROM registration WHERE (USN = '{$_SESSION['USN']}')";
$RunAuthor = mysqli_query($msec, $Author);
$FetchAuthor = mysqli_fetch_assoc($RunAuthor);
$AuthorName = $FetchAuthor['Firstname']." ".$FetchAuthor['Lastname'];
$ActivityTime = date('d-m-Y h:i:s');
$Action = 'Syllabus Coverage Updating';
$TableName = 'SyllabusCoverage';
$sqllog = "INSERT INTO ActivityLogs (Date, AuthorID, AuthorName, AuthorType, TableName, ActionsPerformed ) 
			VALUES('{$ActivityTime}', '{$_SESSION['USN']}', '{$AuthorName}', '{$FetchAuthor['Type']}', '{$TableName}',
			'{$Action}')";
$Runlog = mysqli_query($msec, $sqllog);
//---------------------------------------------------------------------------------------------	   */	
if (isset($AdmNO)) {
    $query  = "SELECT * FROM FeeMaster WHERE AdmNO = '{$AdmNO}'";
    $result = mysqli_query($tvs, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}


 