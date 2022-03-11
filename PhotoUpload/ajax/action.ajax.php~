<?php
  if (!isset($_SESSION)) {
  ob_start();
  session_start();
  $_SESSION['Login'] = 0;
  date_default_timezone_set('Asia/Kolkata');
  $Today = date('Y-m-d h:i:s');
}
//include_once('config.php');
require_once('../../Connections/tvs.php'); 

$file			=	$_FILES['file']['name'];
$SLN 		=  $_SESSION['ImageNO'];
$file_image		=	'';
if($_FILES['file']['name']!=""){
    extract($_REQUEST);
	 $infoExt        =   getimagesize($_FILES['file']['tmp_name']);
	 $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
	 if(strtolower($infoExt['mime']) == 'image/gif' || strtolower($infoExt['mime']) == 'image/jpeg' || strtolower($infoExt['mime']) == 'image/jpg' || strtolower($infoExt['mime']) == 'image/png'){
		$file	=	preg_replace('/\\s+/', '-', time().$file);
		$path   =   '../uploads/'.$SLN.'.'.$imageFileType;
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$data   =   array(
			'img_name'=>$file,
			'img_order'=>1
		);
		echo 1;
		//$insert     =   $db->insert('images',$data);
		//if($insert){ echo 1; } else { echo 0; }
		mysqli_select_db($tvs,$database_tvs);
		$ModiPath = "PhotoUpload/uploads/".$SLN.'.'.$imageFileType;
		$sql = "INSERT INTO images (img_name, img_order, created, modified, status) VALUES ('{$ModiPath}', '{$SLN}', '{$Today}', '{$Today}', '{$_SESSION['Type']}')";
		$Runsql = mysqli_query($tvs, $sql);
	   }else{
		  echo 2;
	   }
    }
?>
