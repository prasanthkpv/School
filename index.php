<?php 
require_once('header.php'); 
if($_SESSION['Auth'] != 1)
	header('location:login.php');
else
{
require_once('Connections/tvs.php'); 
?>
<body class="sb-nav-fixed">
<script language="javascript">
function AdmissionNumber(){
	var xmlhttp;
	var AdmNO=document.getElementById('AdmNO');
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


<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SVNPS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm me-0 me-md-3 my-2 my-md-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="font-size:24px; color: white;"></i></button>
            <!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <div class="col-xl-9">
          <a class="navbar-brand ps-3" href="index.html"> <span style="font-size: 28px;font-weight: bold;color: white;"> SRI VENKATESWARA NURSERY & PRIMARY SCHOOL </span></a>         
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li><a class="dropdown-item" href="DailyActivity.php">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
 </nav>
<div id="layoutSidenav">
<div id="layoutSidenav_nav">
 <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
      <div class="nav">
          <div class="sb-sidenav-menu-heading"></div>
          <a class="nav-link active" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard </a>
          
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Fee Master
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="FeeManagement.php">Fee Entry</a>
                  <a class="nav-link" href="DailyActivity.php">Activity Log</a>
              </nav>
          </div>                           
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Reports
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link" href="DailyFeeReport.php">Payment Report</a>
                  <a class="nav-link" href="ConsolidateFeeReport.php">Consolidate Report </a>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                      Error
                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                      <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="401.html">401 Page</a>
                          <a class="nav-link" href="404.html">404 Page</a>
                          <a class="nav-link" href="500.html">500 Page</a>
                      </nav>
                  </div>
              </nav>
          </div>
        <!--  
         <a class="nav-link" href="DeletedUsers.php">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
              Deleted Users
          </a> 
          
          <div class="sb-sidenav-menu-heading">Addons</div>
          <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Charts
          </a> -->
          <a class="nav-link" href="DeletedUsers.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Deleted Users
          </a> 
          <a class="nav-link" href="logout.php">
              <div class="sb-nav-link-icon"><i class="fas fa-sign"></i></div>
              Logout
          </a>
 
      </div>
  </div>
  <div class="sb-sidenav-footer">
      <div class="small">Logged in as: <?php echo $_SESSION['Username']; ?></div>
  </div>
 </nav>
</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
<?php 
$sql = "SELECT * FROM Registration WHERE (Type = 'Student') ORDER BY SLN DESC";
$RunSQL = mysqli_query($tvs, $sql);
$Row = mysqli_num_rows($RunSQL);
if($Row > 0 ) {
 	$FetchStudent = mysqli_fetch_assoc($RunSQL);
	
?>                        
                                        
     <div class="card mb-4" >
     <div class="col-xl-12">
     <div class="card-header">
           <i class="fas fa-table me-1" ></i>
           <span style="color: green;font-size: 20px; font-weight: bold;"> Registered Students </span>
           <span style="padding-left: 70%;"> 
           <a type="Submit" href="register.php" class="btn btn-success btn-sm active" role="button" aria-pressed="true" tabindex="3"><span style="padding:10px"> ADD </span></a> </span>
          </div>
     </div>
     <div class="card-body" >
     <table id="datatablesSimple">
     <thead>
        <tr class="table-info">
           <th width="5%">SLN</th>
           <th width="5%">Photo</th>
           <th width="10%">Adm. NO</th>
           <th width="30%">Name</th>
           <th width="9%">Gender</th>
           <th width="9%">DOA</th>
           <th width="9%">Class</th>
           <th width="11%">Phone</th>           
           <th width="7%">Edit</th>
        <!--   <th width="7%">Photo Upload</th> -->
           <th width="7%">Delete</th>
       </tr>
      </thead>
      <tfoot>
          <tr>
           <th width="5%">SLN</th>
           <th width="10%">Adm. NO</th>
           <th width="30%">Name</th>
           <th width="9%">Gender</th>
           <th width="9%">DOA</th>
           <th width="9%">Class</th>
           <th width="11%">Phone</th>
           <th width="7%">Edit</th>
         <!--  <th width="7%">Photo Upload</th> -->
           <th width="7%">Delete</th>
          </tr>
      </tfoot>
      <tbody>
      <?php 
      $i = 0;
		do {
			++$i;
			//echo "PhotoUpload/uploads/".$FetchStudent['SLN'].".*";s
			?>     
          <tr <?php if(($i%2)==0) { echo "class=\"table-light\"";} else { echo "class=\"table-warning\""; } ?> >
              <td style="vertical-align: middle;"><?php echo $i; ?></td>
              <td style="text-align: center;"><a href="PhotoUpload/photo.php?SLN=<?php echo $FetchStudent['SLN'] ; ?>" class="rounded-pill "><img class="img-profile rounded-circle rounded-pill" width="40px", height="40px" 
              <?php if(count($files = glob('PhotoUpload/uploads/'.$FetchStudent['SLN'].'.*')) == 0) { ?> src="assets/img/user.png" <?php } 
              else { $Run = mysqli_query($tvs, "SELECT * FROM images WHERE (img_order = '{$FetchStudent['SLN']}')"); 
              			$Fetch = mysqli_fetch_assoc($Run);		
               ?> src="<?php echo $Fetch['img_name'];?>" <?php } ?>
               > </a></td>
              <td style="vertical-align: middle;" id="EditDisplayAdmNO<?php echo $FetchStudent['SLN'];?>"><?php echo $FetchStudent['AdmNO'] ; ?> </td>
              <td style="vertical-align: middle;" id="EditDisplayName<?php echo $FetchStudent['SLN'];?>"><?php echo strtoupper($FetchStudent['Firstname']." ".$FetchStudent['Lastname']); ?></td>
              <td style="vertical-align: middle;" id="EditDisplayGender<?php echo $FetchStudent['SLN'];?>"><?php echo $FetchStudent['Gender'] ; ?> </td>
              <td style="vertical-align: middle;" id="EditDisplayDOA<?php echo $FetchStudent['SLN'];?>"><?php echo date('d-m-Y', strtotime($FetchStudent['DOA'])); ?> </td>
              <td style="vertical-align: middle;" id="EditDisplayClass<?php echo $FetchStudent['SLN'];?>"><?php echo $FetchStudent['Class'] ; ?> </td>
              <td style="vertical-align: middle;" id="EditDisplayPhone<?php echo $FetchStudent['SLN'];?>"><?php echo $FetchStudent['Phone'] ; ?> </td>            
              <td style="vertical-align: middle;" style="text-align: center;"><a class="btn btn-outline-primary btn-sm px-2 rounded-pill " type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?php echo $FetchStudent['SLN']; ?>">Edit</a></td>
          <!--    <td style="text-align: center;"><a href="PhotoUpload/photo.php?AdmNO=<?php echo $FetchStudent['AdmNO'] ; ?>" class="btn btn-outline-success btn-sm rounded-pill ">Upload</a></td> -->
              <td style="text-align: center;vertical-align: middle;"><a class="btn btn-outline-danger btn-sm px-3 rounded-pill" type="button" onclick="return confirm('Do you want to Delete')" href="Delete/UserDelete.php?SLN=<?php echo $FetchStudent['SLN']; ?>" ><i class="fa fa-trash"></i>
</a></td>
          </tr>
    <?php }while($FetchStudent = mysqli_fetch_assoc($RunSQL));
         ?>          
               </tbody>
           </table>
       </div> 
   </div>
   
   
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Student Details</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
      <div class="modal-body">                            
      <form method="post" id="insert_form" class="form-horizontal"> 
      <div class="col-xs-12">  
      <div class="form-floating mb-3">
	   <input class="form-control" id="AdmNO" name="AdmNO" onkeyup="AdmissionNumber()" type="text" required="required" placeholder="Admission Number" />
	   <label for="AdmNO">Admission Number</label>
	   <div id="AdmNumber"></div>
		</div>
		 
		<div class="form-floating mb-3">
	   <Select class="form-select" id="Type" name="Type" required="required" />
		<option value="" selected>Type of User</option>
		<option value="Student" >Student</option>
		<option value="Admin">Admin</option>
		<option value="Teacher">Teacher</option>
		<option value="Office">Office</option>
	   </select>
	<label for="Type">Type of User</label>

		</div> 
      <div class="form-floating mb-3">
	   <input class="form-control" id="FirstName" name="FirstName" type="text" required="required" placeholder="First Name" />
	   <label for="FirstName">First Name</label>
		</div>	

       <div class="form-floating mb-3">
	<input class="form-control" id="LastName" name="LastName" type="text" placeholder="Last Name" />
	<label for="LastName">Last Name</label>
		</div>	
		
	  <div class="form-floating mb-3">
		<Select class="form-select" id="Gender" name="Gender" required="required" />
 	   <option value="" selected="Selected"> Select the Gender</option>
		<option value="Male" >Male</option>
		<option value="Female">Female</option>
	</select>
	<label for="Gender">Select the Gender</label>
		</div>	
			
		 <div class="form-floating mb-3">
	<input class="form-control" id="DOA" name="DOA" type="date" required="required"  placeholder="Date of Admission" />
	<label for="DOA">Date of Admission</label>
		</div>		
      </div>
               
      <div class="form-floating mb-3">
	<Select class="form-select" id="Class" name="Class" required="required" />
		<option value="" selected>Class of Admission</option>
		<option value="LKG" >LKG</option>
		<option value="UKG">UKG</option>
		<option value="First">First Standard</option>
		<option value="Second">Second Standard</option>
		<option value="Third">Third Standard</option>
		<option value="Fourth">Fourth Standard</option>
	</select>
	<label for="ClassAdmission">Class of Admission</label>
		</div>
		
      <div class="form-floating mb-3">
	<input class="form-control" id="Phone" name="Phone" type="text" required="required" placeholder="Phone number" />
	<label for="Phone">Phone Number</label>
		</div>
		
      <div class="form-floating mb-3">
	<input class="form-control" id="Email" name="Email" type="text" required="required" placeholder="Email ID" />
	<label for="Email">Email ID</label>
		</div>
     
     <div class="form-floating mb-3">
	<input class="form-control" id="DOB" name="DOB" type="date" required="required" placeholder="Date of Birth" />
	<label for="DOB">Date of Birth</label>
		</div> 
		
		<div class="form-floating mb-3">
	<input class="form-control" id="ParentName" name="ParentName" required="required" type="text" placeholder="Parent Name" />
	<label for="ParentName">Parent Name</label>
		</div>
		<div class="form-floating mb-3">
	<input class="form-control" id="ParentAddress" name="ParentAddress" type="text" placeholder="Parent Address" />
	<label for="ParentAddress">Parent Address</label>
		</div>
         
  
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="insert" id="insert" value="Update" class="btn btn-primary pull-right" />
            <input type="hidden" name="SLN" id="SLN" class="form-control" />
            </form>
            </div>
        </div>
    </div>
</div>

<?php } 

else {
	?>
<span style="padding-left: 1%;"> 
 <a type="Submit" href="register.php" class="btn btn-success btn-sm active" role="button" aria-pressed="true" tabindex="3"><span style="padding:10px"> REGISTER A STUDENT </span></a> </span>

<?php
}
?>
 
</div>
</main>



          
<?php
require_once('footer.php'); 
}
?>
<script src="js/StudentDetails_Edit.js"></script>  
