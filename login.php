<?php
if (!isset($_SESSION)) {
  ob_start();
  session_start();
  $_SESSION['Login'] = 0;
}
if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('Connections/tvs.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Username'])) {
  $loginUsername=$_POST['Username'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccessAdmin = "index.php";
  $MM_redirectLoginSuccessTeacher = "dashboard_Teacher.php";
  $MM_redirectLoginSuccessOffice = "dashboard_Office.php";
  $MM_redirectLoginSuccessStudent = "StudentHome.php";
  $MM_redirectLoginSuccess = "PasswordChange.php";
  $MM_redirectPassworChange = "PasswordChange.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysqli_select_db($tvs, $database_tvs);
  $md5password = MD5($password);
  if(!preg_match("/^[a-zA-Z0-9._!@#$%^&-?]*'/",$loginUsername)){
  $LoginRS__query=sprintf("SELECT SLN, Username, Password, Type, Firstname, Lastname, Class, AdmNO, Logincount FROM Registration WHERE Username=%s AND Password= %s",
 GetSQLValueString($loginUsername, "text"),
 GetSQLValueString($md5password, "text")); 
 
  $LoginRS = mysqli_query($tvs, $LoginRS__query) or die(mysqli_error($tvs));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  $loginuserDetails = mysqli_fetch_assoc($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	
    //declare two session variables and assign them
    $_SESSION['Username'] = $loginUsername;
    $_SESSION['SLN'] = $loginuserDetails['SLN'];
	  $_SESSION['USN']= $loginuserDetails['AdmNO'];
	  $_SESSION['Type']= $loginuserDetails['Type'];
	  $_SESSION['Firstname'] = $loginuserDetails['Firstname'];
	  $_SESSION['Lastname'] = $loginuserDetails['Lastname'];
	  $_SESSION['Branch'] = $loginuserDetails['Class'];
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	
    $_SESSION['loggedIn'] = true;
  // $_SESSION['SLN'] = $loginuserDetails['SLN'];      
	  $_SESSION['Page']=1;
   
   //---login fail-----------------------------------------------------------
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
   //---------------------------------------------------------------------------  
   //--First login Password change --------------------------------------------        
	   if($loginuserDetails['Logincount'] == 0){
		   $_SESSION['Auth'] = 1; 
		   print "<script> window.alert(\"Your Account was disabled temporally for Verification.Contact Admin, prasanthkpv@msec.ac.in/9446608476 for more information.\");</script>";
		       
		 //	header("Location: " . $MM_redirectLoginSuccess ); //Password change first time only
		 //-----------------------------------------------------------------------------
		  }
		 else if($loginuserDetails['Logincount'] == 1){ 
		 		
		 		 header("Location: " . $MM_redirectPassworChange ); //Password change first time only
		 }   		  
	  else{  
			if(!strcmp($loginuserDetails['Type'],"Principal"))
			   {
					 $_SESSION['Auth'] = 1;  
		    		 header("Location: " . $MM_redirectLoginSuccessPrincipal );
			   }
			if(!strcmp($loginuserDetails['Type'],"Admin"))
			   {
					 $_SESSION['Auth'] = 1;  
		    		 header("Location: " . $MM_redirectLoginSuccessAdmin );
			   }
			else if(!strcmp($loginuserDetails['Type'],"HOD")) 
			   {
					$_SESSION['Auth'] = 1; 
					header("Location: " . $MM_redirectLoginSuccessHOD );
			   }
			else if(!strcmp($loginuserDetails['Type'],"Teacher"))
			   {
					$_SESSION['Auth'] = 1; 
					header("Location: " . $MM_redirectLoginSuccessTeacher );
			   }
			else if(!strcmp($loginuserDetails['Type'],"Office"))
			   {
					$_SESSION['Auth'] = 1; 
					header("Location: " . $MM_redirectLoginSuccessOffice );
			   }
			else if(!strcmp($loginuserDetails['Type'],"Trust"))
			   {
					$_SESSION['Auth'] = 1; 
					header("Location: " . $MM_redirectLoginSuccessOffice );
			   }
			else if(!strcmp($loginuserDetails['Type'],"Placement"))
			   {
					$_SESSION['Auth'] = 1; 
					header("Location: " . $MM_redirectLoginSuccessPlacement );
			   }
			else if(!strcmp($loginuserDetails['Type'],"Student"))
			   {
					$_SESSION['Auth'] = 2; 
					$sql = "SELECT Scheme FROM registration WHERE (USN = '{$loginuserDetails['USN']}')";
					$Runsql = mysqli_query($msec, $sql);
					$FetchScheme = mysqli_fetch_assoc($Runsql);
					if(is_null($FetchScheme['Scheme']))
					{
						$MM_redirectLoginSuccessStudent = "Scheme.php";
					}
					header("Location: " . $MM_redirectLoginSuccessStudent); 
			   }
			
		   }
		}
	else {
	      header("Location: ". $MM_redirectLoginFailed );
	     } 
	  }
} 
?>
<!--
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="prasanth" />
        <title>Login - TV School</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/js/all.min.js"></script>
    </head>
-->
<?php 
require_once('header.php'); 
?>   
    <body class="bg-primary" style="background: url(assets/img/school.png) center fixed; background-size: 80%">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-5">
                            <br> <br> <br> <br> <br>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form METHOD="POST" action="#" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="Username" type="text" placeholder="Username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name = "Password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-secondary" href="../index.html">Back</a>
                                              
                                                <button type="Submit" value="#" class="btn btn-primary" tabindex="3"><span style="padding:10px"> Sign In </span></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                      <!--  <div class="small"><a href="register.html">Need an account? Sign up!</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
   </div>              
<?php
require_once('footer.php'); 
?>               
                
 <!--               
                
           
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html> -->
