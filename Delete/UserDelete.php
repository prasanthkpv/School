<?php if (!isset($_SESSION)) {
  session_start();
  ob_start();
}?>
<?php require_once('../Connections/tvs.php'); 
mysqli_select_db($tvs,$database_tvs);
$SLN = $_GET['SLN'];

//=============================Backup of User in Delete User Table=======================
$sql = "SELECT * FROM Registration WHERE (SLN = '{$SLN}')";
$Runsql = mysqli_query($tvs, $sql);
$FetchStudent = mysqli_fetch_assoc($Runsql);
$AdmNO = $FetchStudent['AdmNO'];

$sqlFee = "SELECT * FROM FeeMaster WHERE (AdmNO = '{$FetchStudent['AdmNO']}')";
$RunsqlFee = mysqli_query($tvs, $sqlFee);
$FetchStudentFee = mysqli_fetch_assoc($RunsqlFee);

$sqlInsert = "INSERT INTO DeletedUsers (Username, Password, Type, Firstname, Lastname, Gender, Position, DOB, Phone, Email, AdmNO, DOA, Class, ParentName, ParentAddress, Logincount, FileName, Status, PrevDue, TotalFee, Term1, Term2, Term3, Term4, TotalPaid, Balance) VALUES ('{$FetchStudent['Username']}', '{$FetchStudent['Password']}', '{$FetchStudent['Type']}', '{$FetchStudent['Firstname']}', '{$FetchStudent['Lastname']}', '{$FetchStudent['Gender']}', '{$FetchStudent['Position']}', '{$FetchStudent['DOB']}', '{$FetchStudent['Phone']}', '{$FetchStudent['Email']}', '{$FetchStudent['AdmNO']}', '{$FetchStudent['DOA']}', '{$FetchStudent['Class']}', '{$FetchStudent['ParentName']}', '{$FetchStudent['ParentAddress']}', '{$FetchStudent['Logincount']}', '{$FetchStudent['FileName']}', '{$FetchStudent['Status']}', '{$FetchStudentFee['PrevDue']}', '{$FetchStudentFee['TotalFee']}', '{$FetchStudentFee['Term1']}', '{$FetchStudentFee['Term2']}', '{$FetchStudentFee['Term3']}', '{$FetchStudentFee['Term4']}', '{$FetchStudentFee['TotalPaid']}', '{$FetchStudentFee['Balance']}')";
$RunInsert = mysqli_query($tvs, $sqlInsert);
//=======================================================================================


//====================USER DELETE FROM Registration Table==================
$sqldelete = "DELETE FROM  Registration
			  WHERE Registration.SLN = '{$SLN}'";
$Result = mysqli_query($tvs, $sqldelete) or die(mysqli_error($tvs));
//=========================================================================


//====================USER DELETE FROM FeeMaster Table=====================
$sqlDeleteFee = "DELETE FROM  FeeMaster
			  WHERE FeeMaster.AdmNO = '{$AdmNO}'";
$Result = mysqli_query($tvs, $sqlDeleteFee) or die(mysqli_error($tvs));
//=========================================================================


$targetPage = "../index.php";
header("Location: ".$targetPage);
?>