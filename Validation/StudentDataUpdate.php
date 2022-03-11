<?php 
if (!isset($_SESSION)) {
  session_start();
  ob_start();
}
require_once('../Connections/tvs.php'); 
date_default_timezone_set('Asia/Kolkata');
mysqli_select_db($tvs,$database_tvs);

$SLN = mysqli_real_escape_string($tvs, $_POST["SLN"]);
$AdmNO = mysqli_real_escape_string($tvs, $_POST["AdmNO"]);
$Type = mysqli_real_escape_string($tvs, $_POST["Type"]);
$FirstName = mysqli_real_escape_string($tvs, $_POST["FirstName"]);
$LastName = mysqli_real_escape_string($tvs, $_POST["LastName"]);
$Gender = mysqli_real_escape_string($tvs, $_POST["Gender"]);
$DOA = mysqli_real_escape_string($tvs, $_POST["DOA"]);
$Class = mysqli_real_escape_string($tvs, $_POST["Class"]);
$Phone = mysqli_real_escape_string($tvs, $_POST["Phone"]);
$Email = mysqli_real_escape_string($tvs, $_POST["Email"]);
$DOB = mysqli_real_escape_string($tvs, $_POST["DOB"]);
$ParentName = mysqli_real_escape_string($tvs, $_POST["ParentName"]);
$ParentAddress = mysqli_real_escape_string($tvs, $_POST["ParentAddress"]);


  $sqlUpdate = "UPDATE Registration SET  					 
  					 Type = '{$Type}',
  					 Firstname = '{$FirstName}',
  					 Lastname = '{$LastName}',
  					 Gender = '{$Gender}',
  					 Position = '{$Type}',
  					 AdmNO = '{$AdmNO}',
  					 DOA = '{$DOA}',
  					 Class = '{$Class}',
  					 Phone = '{$Phone}',
  					 Email = '{$Email}',
  					 DOB = '{$DOB}',
  					 ParentName = '{$ParentName}',
  					 ParentAddress = '{$ParentAddress}'
  					 WHERE ((SLN = '{$SLN}'))";
  $RunUpdate = mysqli_query($tvs, $sqlUpdate);
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
if (isset($SLN)) {
    $query  = "SELECT * FROM Registration WHERE SLN = '{$SLN}'";
    $result = mysqli_query($tvs, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}


/*
	
$output = '';   
$output .= '  <td>1</td>
              <td>'. strtoupper($FetchStudent['Firstname']." ".$FetchStudent['Lastname']).'</td>
              <td>'.$FetchStudent['Gender'].'</td>
              <td>'.$FetchStudent['DOA'].'</td>
              <td>'.$FetchStudent['Class'].'</td>
              <td>'.$FetchStudent['Phone'].'</td>
              <td><a class="btn btn-secondary btn-sm px-2 rounded-pill " type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModal" data-id="'.$FetchStudent['SLN'].'">Edit</a></td>
              <td>Delete</td>';     
echo $output; 
*/
 