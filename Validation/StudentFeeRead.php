<?php if (!isset($_SESSION)) {
  session_start();
  ob_start();
}?>
<?php require_once('../Connections/tvs.php'); 
mysqli_select_db($tvs,$database_tvs);
if (isset($_POST["SLN"])) {
	 $FeeHead = $_POST["FeeHead"];
    $query  = "SELECT * FROM Registration WHERE SLN = '{$_POST['SLN']}'";
    $result = mysqli_query($tvs, $query);
    $row    = mysqli_fetch_assoc($result);
    
    
    
    $sqlRecipt = "SELECT max(Receipt) as Receipt FROM PaymentActivity";
    $RunReceipt = mysqli_query($tvs, $sqlRecipt);
    $RowRecipt = mysqli_num_rows($RunReceipt);
    if($RowRecipt > 0) 
    	{
    	$FetchReceipt = mysqli_fetch_assoc($RunReceipt);
      $Receipt = $FetchReceipt['Receipt'] + 1;
    }
    else {
    	$Receipt = 10000;
    }
    $sql = "SELECT AdmNO,Name,".$FeeHead." FROM FeeMaster WHERE (AdmNO = '{$row['AdmNO']}')";
    $querySql = mysqli_query($tvs, $sql);
    $RowStudent = mysqli_num_rows($querySql);
    if($RowStudent > 0 ) {
    		$FetchRow = mysqli_fetch_assoc($querySql);
    		$StudentDetails = array($FetchRow['AdmNO'], strtoupper($FetchRow['Name']), $FetchRow[$FeeHead], $Receipt);
    			
    }
    else {
    		 $StudentDetails = array($row['AdmNO'], strtoupper($row['Firstname']." ".$row['Lastname']), 0, $Receipt);     
       	}
    echo json_encode($StudentDetails);
}
?>