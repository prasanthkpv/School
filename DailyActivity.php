<?php 
require_once('header.php'); 
if($_SESSION['Auth'] != 1)
	header('location:login.php');
else
{
require_once('Connections/tvs.php'); 
date_default_timezone_set('Asia/Kolkata'); 
$Today = date('Y-m-d');
?>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">TVS</a>
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
          <a class="navbar-brand ps-3" href="index.html"> <span style="font-size: 28px;font-weight: bold;color: white;"> SRI VENKATESWARA NURSERY & PRIMARY SCHOOL  </span></a>
            
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="DailyActivity.php">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
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
          <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard </a>
          
          <a class="nav-link active collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Fee Master
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="FeeManagement.php">Fee Entry</a>
                  <a class="nav-link active" href="DailyActivity.php">Activity Log</a>
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
      Start Bootstrap
  </div>
 </nav>
</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Activity Log</h1>
                        <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Activity Log</li>
                        </ol>
                        <!-- 
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                       <!--
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        -->
      <?php 
      $Date = '';
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
			$Date = $_POST['Date'];
			}
		?>	                
      <div class="row mb-3" >       
      <div class="col-md-4 d-flex justify-content-end"><span style="color: green;font-size: 15px; padding-top: 5px"> </span> </div>
      <div class="col-md-3">   
      <form method="post" action="DailyActivity.php" name="form" class="form-horizontal">                
      <input class="form-control" id="Date" name="Date" value="<?php if(!strcmp(strtotime($Date),'')) { echo $Today; } else { echo $Date; } ?>" type="date" required="required"  placeholder="Date of Activity" />
		</div> 
		<div class="col-md-2">
		  <button type="submit" class="btn btn-primary btn-block">Show Report</button>
        <input type="hidden" name="MM_insert" value="form">
		</form>
		</div>
		</div> 
		
<?php 
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
?>		
		                                 
     <div class="card mb-4" >
     <div class="col-xl-12">
     <div class="card-header">
           <i class="fas fa-table me-1" ></i>         
             <span style="color: green;font-size: 20px; font-weight: bold;"> Registered Students </span>        
            <span style="padding-left: 75%;"> 
           <a type="Submit" href="register.php" class="btn btn-outline-danger btn-sm px-3 rounded-pill" role="button" aria-pressed="true" tabindex="3"><i class="fas fa-file-pdf" style="font-size: 20px"></i> </a> </span>
         </div>
     </div>
     <div class="card-body" >
<?php 
$sql = "SELECT * FROM PaymentActivity ORDER BY SLN DESC";
$RunSQL = mysqli_query($tvs, $sql);
$Row = mysqli_num_rows($RunSQL);
$Date= $_POST['Date'];
$Date = date('d-m-Y', strtotime($Date));
$Date = strtotime($Date);
if($Row <= 0 ) 
{	
echo  "No activity recorded";
}
else {	
?>   
     <table id="datatablesSimple">
     <thead>
        <tr style="background-color: rgb(240, 240, 240);">
           <th width="2%">SLN</th>
           <th width="15%">Date & Time</th>
        <!--<th width="7%">Author</th>
           <th width="8%">IP</th>
           <th width="8%">Device</th>  -->        
           <th width="8%">Adm. NO</th>
           <th width="21%">Name</th>          
           <th width="8%">Amount</th>
           <th width="7%">Head</th>
           <th width="7%">Receipt</th>
        <!--<th width="7%">Payment Mode</th> -->
           <th width="7%">Payment Date</th>          
        <!--<th width="2%">Edit</th> -->
           <th width="2%">View</th>  
       </tr>
      </thead>
      <tfoot>
          <tr style="background-color: rgb(240, 240, 240);">
          <th width="2%">SLN</th>
           <th width="15%">Date & Time</th>
        <!--<th width="7%">Author</th>
           <th width="8%">IP</th>
           <th width="8%">Device</th>  -->        
           <th width="8%">Adm. NO</th>
           <th width="21%">Name</th>          
           <th width="8%">Amount</th>
           <th width="7%">Head</th>
           <th width="7%">Receipt</th>
        <!--<th width="7%">Payment Mode</th> -->
           <th width="7%">Payment Date</th>          
        <!--<th width="2%">Edit</th> -->
           <th width="2%">View</th>         
          </tr>
      </tfoot>
      <tbody>
<?php 
$i=0;
$flag = 0;
$FetchActivity = mysqli_fetch_assoc($RunSQL);
do {
	$Datetime = $FetchActivity['DateTime'];
	$DateLogged  = date('d-m-Y', strtotime($Datetime));
	$DateLogged = strtotime($DateLogged);
			
	if($Date == $DateLogged) {	
			$flag = 1;
			$i++;	

?>     
          <tr>
              <td><?php echo $i; ?></td>
              <td> <?php echo $FetchActivity['DateTime'] ; ?> </td>
           <!--   <td> <?php echo $FetchActivity['Author'] ; ?> </td>
              <td> <?php echo $FetchActivity['IPAddr'] ; ?> </td>
              <td> <?php echo $FetchActivity['Device'] ; ?> </td>  -->       
              <td> <?php echo $FetchActivity['AdmNO'] ; ?> </td>
              <td><?php echo strtoupper($FetchActivity['Name']); ?></td>
              <td><?php echo $FetchActivity['Amount'] ; ?> </td>
              <td><?php echo $FetchActivity['FeeHead'] ; ?> </td>
              <td><?php echo $FetchActivity['Receipt'] ; ?> </td>
        <!--      <td><?php echo $FetchActivity['PaymentMode'] ; ?> </td> -->
              <td> <?php echo date('d-m-Y', (strtotime($FetchActivity['Date']))); ?> </td>
              
             <td><a class="btn btn-outline-warning btn-sm px-1 rounded-pill " type="button" data-bs-role="View" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?php echo $FetchActivity['SLN']; ?>">View</a></td>  
             <!--  <td style="text-align: center;"><a class="btn btn-outline-danger btn-sm px-2 rounded-pill" type="button" onclick="return confirm('Do you want to Delete')" href="Delete/UserDelete.php?SLN=<?php echo $FetchStudent['SLN']; ?>" ><i class="fa fa-trash"></i> 
</a></td> -->
          </tr>
    <?php 
      }
    }while($FetchActivity = mysqli_fetch_assoc($RunSQL));
         ?>          
               </tbody>
           </table>
       </div> 
   </div>
 
 <?php }?>
 
  
<!-- ================================================================ -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="exampleModalScrollableTitle">Student Fee Details</h5>
       <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
      <div class="modal-body">                            
      <form method="post" id="insert_form" class="form-horizontal"> 
      <div class="col-xs-12">   
		
      <div class="row mb-3"><div class="col-md-4"><label for="TransDate" >Transaction Date</label></div><div class="col-md-8">
	   <input class="form-control" id="TransDate" name="TransDate" disabled="disabled" type="text" placeholder="Date of Transaction" />
	   <input class="form-control" id="SLN" name="SLN" type="hidden" />
		</div></div>				
		<div class="row mb-3"><div class="col-md-4"><label for="Name" >Name of Student</label></div><div class="col-md-8">
	   <input class="form-control" id="Name" name="Name" disabled="disabled" type="text" placeholder="Name of Students" />
		</div></div> 
		<div class="row mb-3"><div class="col-md-4"><label for="FeeHead" >Fee Head</label></div><div class="col-md-8">
	   <input class="form-control" id="FeeHead" name="FeeHead" disabled="disabled" type="text" placeholder="Fee Head" />
		</div></div>
		<div class="row mb-3"><div class="col-md-4"><label for="Amount" >Amount</label></div><div class="col-md-8">
	   <input class="form-control" id="Amount" name="Amount" disabled="disabled" type="text" placeholder="Amount of Transaction" />
		</div></div>
		<div class="row mb-3"><div class="col-md-4"><label for="Receipt" >Receipt</label></div><div class="col-md-8">
	   <input class="form-control" id="Receipt" name="Receipt" disabled="disabled" type="text" placeholder="Receipt of Transaction" />
		</div></div>
		<div class="row mb-3"><div class="col-md-4"><label for="Receipt" >Payment Date</label></div><div class="col-md-8">
	   <input class="form-control" id="PaymentDate" name="PaymentDate" disabled="disabled" type="text" placeholder="Payment Date" />
		</div></div>
		<div class="row mb-3"><div class="col-md-4"><label for="Receipt" >Payment Mode</label></div><div class="col-md-8">
	   <input class="form-control" id="PaymentMode" name="PaymentMode" disabled="disabled" type="text" placeholder="Payment Mode" />
		</div></div>
		 <div class="row mb-3"><div class="col-md-4"><label for="Author" >Done By</label></div><div class="col-md-8">
	   <input class="form-control" id="Author" name="Author" disabled="disabled" type="text" placeholder="Author of Transaction" />
		</div></div>
		 <div class="row mb-3"><div class="col-md-4"><label for="IP" >IP Address</label></div><div class="col-md-8">
	   <input class="form-control" id="IP" name="IP" disabled="disabled" type="text" placeholder="IP Address" />
		</div></div>
		 <div class="row mb-3"><div class="col-md-4"><label for="Device" >Device Name</label></div><div class="col-md-8">
	   <input class="form-control" id="Device" name="Device" disabled="disabled" type="text" placeholder="Device Name" />
		</div></div>		
      <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
     </form>
      </div>
      </div>
    </div>
<!-- ================================================================ -->
</div>

<?php } ?>
 
</div>
</main>         
<?php
require_once('footer.php'); 
}
?>
<script src="js/StudentFee_View.js"></script> 