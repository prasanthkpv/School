<?php 
require_once('header.php'); 
if($_SESSION['Auth'] != 1)
	header('location:login.php');
else
{
require_once('Connections/tvs.php'); 
?>
<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
 // $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "registration")) {
	$Type = 'Student';
	$Password = md5($_POST['AdmissionNumber']);
   $insertSQL = sprintf("INSERT INTO Registration (Username, Password, Firstname, Lastname, Type, Gender, Position, DOB, Phone, Email, AdmNO, DOA, Class, ParentName, ParentAddress) VALUES (%s, '{$Password}', %s, %s, '{$Type}', %s, '{$Type}', %s, %s, %s, %s, %s, %s, %s, %s)",	
							  GetSQLValueString($_POST['AdmissionNumber'], "text"),			 
                       GetSQLValueString(strtoupper($_POST['FirstName']), "text"),
                       GetSQLValueString(strtoupper($_POST['LastName']), "text"),
                       GetSQLValueString($_POST['Gender'], "text"),
					  	     GetSQLValueString($_POST['DOB'], "date"),
					  	     GetSQLValueString($_POST['Phone'], "text"),	
					        GetSQLValueString($_POST['Email'], "text"),	 
                       GetSQLValueString($_POST['AdmissionNumber'], "text"),
					        GetSQLValueString($_POST['DOA'], "date"),
					        GetSQLValueString($_POST['Class'], "text"),	 
					        GetSQLValueString(strtoupper($_POST['ParentName']), "text"),  
                       GetSQLValueString($_POST['ParentAddress'], "text"));
mysqli_select_db($tvs,$database_tvs);
$Result1 = mysqli_query($tvs,$insertSQL) or die(mysqli_error($tvs));

//---------logging Activities------------------------------------------------------------------
/*
	$ActivityTime = date('d-m-Y h:i:s A');
	$Action = 'New User Registration';
	$TableNameLog = 'registration';
	$sqllog = "INSERT INTO ActivityLogs (Date, AuthorID, AuthorName, AuthorType, TableName, ActionsPerformed ) 
				VALUES('{$ActivityTime}', '{$_POST['USN']}', '{$_POST['Firstname']}', '{$_POST['Position']}', '{$TableNameLog}',
				'{$Action}')";
	$Runlog = mysqli_query($msec, $sqllog);
	//---------------------------------------------------------------------------------------------	
*/

$insertGoTo = "index.php";
if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
 }
header(sprintf("Location: %s", $insertGoTo)); 
} 
?>

<body class="bg-primary">
<script language="javascript">
function AdmNO(){
	var xmlhttp;
	var AdmNO=document.getElementById('AdmissionNumber');
	//alert("Hai");
	if (AdmNO.value!="")
	{
	if (window.XMLHttpRequest)
		{
		xmlhttp=new XMLHttpRequest();
		}
	else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{

		document.getElementById('AdmNumber').innerHTML=xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","Validation/AdmissionNO.php?AdmNO="+encodeURIComponent(AdmNO.value),true);
	xmlhttp.send();
	}
}   
  </script>

<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-0 rounded-lg mt-5">
<div class="card-header"><h3 class="text-center font-weight-light my-4">Student Registration </h3>  <div class="small justify-content-center"><a class="btn btn-warning btn-sm active" href="index.php"> Go Back</a> </div> </div>
<div class="card-body">
 <form method="POST" name="registration" class="form-horizontal ">
  <div class="row mb-3">
      <div class="col-md-6">
          <div class="form-floating mb-3 mb-md-0">
              <input class="form-control" id="inputFirstName" name="FirstName" type="text" placeholder="Enter your first name" required="required" />
              <label for="inputFirstName">Student First name</label>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-floating">
              <input class="form-control" id="inputLastName" name="LastName" type="text" placeholder="Enter your last name" />
              <label for="inputLastName">Student Last name</label>
          </div>
      </div>
  </div>
  <div class="row mb-3">
      <div class="col-md-6">
          <div class="form-floating mb-3 mb-md-0">         
              <Select class="form-control" id="Gender" name="Gender" required="required" />
             	   <option value="" selected="Selected"> Select the Gender</option>
						<option value="Male" >Male</option>
						<option value="Female">Female</option>
					</select>
					<label for="Gender">Select the Gender</label>	
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-floating mb-3 mb-md-0">
              <input class="form-control" id="DOB" name="DOB" type="date" required="required"  placeholder="Date of Birth" />
              <label for="DOB">Date of Birth</label>
          </div>
      </div>
  </div>
  <div class="form-floating mb-3">
	<input class="form-control" id="PhoneNumber" name="Phone" type="text" required="required" placeholder="Phone Number" />
	<label for="PhoneNumber">Phone Number</label>
</div> 
 <div class="form-floating mb-3">
	<input class="form-control" id="inputEmail" name="Email" type="email" placeholder="name@example.com" />
	<label for="inputEmail">Email address</label>
</div>
<div class="row mb-3">
      <div class="col-md-6">
          <div class="form-floating mb-3 mb-md-0">
              <input class="form-control" id="AdmissionNumber" name="AdmissionNumber" onkeyup="AdmNO()" required="required" type="text" placeholder="Admission Number" />
              <label for="AdmissionNumber">Admission Number</label>
          </div>
          <div id="AdmNumber"></div>
      </div>
      
      <div class="col-md-6">
          <div class="form-floating mb-3 mb-md-0">
              <input class="form-control" id="DOA" name="DOA" type="date"  required="required" placeholder="Date of Admission" />
              <label for="DateAdmission">Date of Admission</label>
          </div>
      </div>
  </div>
  
 <div class="form-floating mb-3">
	<Select class="form-control" id="Class" name="Class" required="required" />
		<option value="" selected>Class of Admission</option>
		<option value="LKG" >LKG</option>
		<option value="UKG">UKG</option>
		<option value="First">First Standard</option>
		<option value="Second">Second Standard</option>
		<option value="Third">Third Standard</option>
		<option value="Fourth">Fourth Standard</option>
		<option value="Fifth">Fifth Standard</option>
	</select>
	<label for="ClassAdmission">Class of Admission</label>	
</div>
 <div class="form-floating mb-3">
	<input class="form-control" id="ParentName" name="ParentName" required="required" type="text" placeholder="Parent/Guardian Name" />
	<label for="ParentName">Parent/Guardian Name</label>
</div>
 <div class="form-floating mb-3">
	<input class="form-control" id="ParentAddress" name="ParentAddress" type="textarea" placeholder="Parent/Guardian Address" />
	<label for="ParentName">Parent/Guardian Address</label>
</div>  
  <div class="mt-4 mb-0"> 
      <div class="d-grid">
      
      <button type="submit" class="btn btn-primary btn-block">Register Me!</button>
      <input type="hidden" name="MM_insert" value="registration">
      </div>
      
  </div>
 </form>
</div>
<div class="card-footer text-center py-3">
<div class="small"><a class="btn btn-warning btn-sm active" href="index.php"> Go Back</a></div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
            
<?php
require_once('footer.php'); 
}
?>