<?php 
require_once('header.php'); 
if($_SESSION['Auth'] != 1)
	header('location:login.php');
else
{
require_once('Connections/tvs.php'); 
?>
<?php
// *** Logout the current user.
$logoutGoTo = "login.php";

$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
unset($_SESSION['PrevUrl']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
  }
}
session_destroy();
?>
