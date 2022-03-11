<?php 
require_once('../header.php'); 
if($_SESSION['Auth'] != 1)
	header('location:login.php');
else
{
	require_once('../Connections/tvs.php'); 
	mysqli_select_db($tvs,$database_tvs);
	$AdmNO=$_REQUEST['AdmNO'];
	if(preg_match("/[^A-Za-z0-9]/",$AdmNO))
		{
		print "<span style=\"color:red;\">Username contains illegal charaters.</span>";
		exit;
		}		
		$data=mysqli_query($tvs, "SELECT * FROM Registration WHERE AdmNO='$AdmNO'");
		if(mysqli_num_rows($data)>0)
		{
			print "<span style=\"color:red;\"><strong>This Admission Number is already in use :)</strong></span>";
		}
	else
	{
		print "";
	}
}
?>