<?php

function ConsolidateFeeFunction($ClassName, $FieldName) {
	include('Connections/tvs.php');
	mysqli_select_db($tvs,$database_tvs);
	$ConsolidateField = 0;
	$AmountAdd = 0;
	$sql = "SELECT * FROM Registration WHERE (Class = '{$ClassName}') ORDER BY AdmNO ASC";
	$Run = mysqli_query($tvs, $sql);
	$row = mysqli_num_rows($Run);
	if($row > 0) {
		
		 $Fetch = mysqli_fetch_assoc($Run);
		 do {		 
		 		$sqlFee = "SELECT * FROM FeeMaster WHERE (AdmNO = '{$Fetch['AdmNO']}')";
		 		$runFee = mysqli_query($tvs, $sqlFee);
		 		$RowFee = mysqli_num_rows($runFee);
		 		if($RowFee > 0) {
		 			$FetchFee = mysqli_fetch_assoc($runFee);
		 			$AmountAdd = $FetchFee[$FieldName];
		 			}		 			
		 		$ConsolidateField = $ConsolidateField + $AmountAdd;
		 	}while($Fetch = mysqli_fetch_assoc($Run));
		}
	return $ConsolidateField;	
}

function StudentCountFunction($ClassName) {
	include('Connections/tvs.php');
	mysqli_select_db($tvs,$database_tvs);
	$sql = "SELECT * FROM Registration WHERE (Class = '{$ClassName}')";
	$Run = mysqli_query($tvs, $sql);
	$row = mysqli_num_rows($Run);
	if($row > 0) {
		return $row; }
	else {
		return 0;	}
}
?>
 