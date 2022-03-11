<?php 
  if (!isset($_SESSION)) {
  ob_start();
  session_start();
  $_SESSION['Login'] = 0;
  date_default_timezone_set('Asia/Kolkata');
  require_once('../Connections/tvs.php');
}
if($_SESSION['Auth'] != 1)
	header('location:../login.php');
else
{
$SLN = $_GET['SLN']; 
$_SESSION['ImageNO'] = $SLN;
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Photo Upload</title>
	
	<link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	 <?php 
							$sqls = "SELECT * FROM Registration WHERE (SLN = '{$SLN}')";
							$RunS = mysqli_query($tvs, $sqls);
							$FetchStudent = mysqli_fetch_assoc($RunS);
							$Name = $FetchStudent['Firstname']." ".$FetchStudent['Lastname'];
							$AdmNO = $FetchStudent['AdmNO'];
							//echo strtoupper($AdmNO."-".$Name);
							?>
						
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
				<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li itemscope="itemscope" class="active nav-item" style="padding-left: 140px"><a title="Home" href="#" class="nav-link" > </a></li>
							<li itemscope="itemscope" class="active nav-item" style="padding-left: 1px"><a title="Home" href="#" class="nav-link" > <span style="color: brown;font-size: 18px;font-weight: bold;"> UPLOAD IMAGE OF <?php echo strtoupper($AdmNO."-".$Name); ?> (Use jpg/jpeg/png/gif file format only),</span></a></li>
							
						 </ul>
					</div>
				</nav>
			</header>
		</div> <!--/.container-->
	</div>

	
	<div class="container">
		<div class="row justify-content-md-center">
		<div class="ml-2 col-sm-4">
			<div id="msg"></div>
			<form method="post" id="image-form" enctype="multipart/form-data" onSubmit="return false;">
				<div class="form-group">
					<input type="file" name="file" class="file">
					<div class="input-group my-3">
						<input type="text" class="form-control" disabled placeholder="Upload File" id="file">
						<input type="hidden" id="AdmNO" name="AdmNO" value="<?php echo $AdmNO;?>">
						<div class="input-group-append">
							<button type="button" class="browse btn btn-primary">Browse...</button>
						</div>
					</div>
				
				<div class="form-group">
					<img <?php if(count($files = glob('uploads/'.$SLN.'.*')) == 0) { ?> src="../assets/img/user.png"" <?php } 
              else { $Run = mysqli_query($tvs, "SELECT * FROM images WHERE (img_order = '{$SLN}')"); 
              			$Fetch = mysqli_fetch_assoc($Run);		
               ?> src="<?php echo substr($Fetch['img_name'], 12, (strlen($Fetch['img_name'])-12));?>" <?php } ?>
               id="preview" class="img-thumbnail">
				</div>
				<div class="form-group">			
					<a href="../index.php" class="btn btn-secondary pull-right"> Back </a>
					<input type="submit" name="submit" value="Upload" class="btn btn-danger">
				</div>
		    </div>
			</form>
		</div>
		</div>
	</div>

	<!--Only these JS files are necessary--> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
		$(document).on("click", ".browse", function() {
		  var file = $(this)
			.parent()
			.parent()
			.parent()
			.find(".file");
		 var AdmNO = $("#AdmNO").val();
		 file.trigger("click");
		});
		$('input[type="file"]').change(function(e) {
		  var fileName = e.target.files[0].name;
		  $("#file").val(fileName);
		  
		  var reader = new FileReader();
		  reader.onload = function(e) {
			// get loaded data and render thumbnail.
			document.getElementById("preview").src = e.target.result;
		  };
		  // read the image file as a data URL.
		  reader.readAsDataURL(this.files[0]);
		});
		
		
		$(document).ready(function(e) {
		  $("#image-form").on("submit", function() {
			$("#msg").html('<div class="alert alert-info"><i class="fa fa-spin fa-spinner"></i> Please wait...!</div>');
			$.ajax({
			  type: "POST",
			  url: "ajax/action.ajax.php",
			  data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			  contentType: false, // The content type used when sending data to the server.
			  cache: false, // To unable request pages to be cached
			  processData: false, // To send DOMDocument or non processed data file it is set to false
			  success: function(data) {
				if (data == 1 || parseInt(data) == 1) {
				  $("#msg").html(
					'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data updated successfully.</div>'
				  );
				} else {
				  $("#msg").html(
					'<div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> Extension not good only try with <strong>GIF, JPG, PNG, JPEG</strong>.</div>'
				  );
				}
			  },
			  error: function(data) {
				$("#msg").html(
				  '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong.</div>'
				);
			  }
			});
		  });
		});
	</script>   
</body>
</html>
<?php } ?>