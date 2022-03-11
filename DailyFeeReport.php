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
            <a class="navbar-brand ps-3" href="index.php">TVS</a>
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
          
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Fee Master
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="FeeManagement.php">Fee Entry</a>
                  <a class="nav-link" href="DailyFeeReport.php">Activity Log</a>
              </nav>
          </div>
         <a class="nav-link active collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Reports
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link active" href="DailyFeeReport.php">Payment Report</a> 
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
               <h1 class="mt-4">Fee Payment Report</h1>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                   <li class="breadcrumb-item active">Fee Report </li>
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
      
      $Class = '';
      $ReportType = '';
      $Date = '';
      $Month = '';
      $Year = '';
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {			
			$Class = $_POST['Class'];
			$ReportType = $_POST['Report'];
			if(!strcmp($ReportType, 'Daily')) { $Date = $_POST['Date']; }
			if(!strcmp($ReportType, 'Monthly')) { $Month = $_POST['Month']; }
			if(!strcmp($ReportType, 'Yearly')) { $Year = $_POST['Year']; }
			}
?>	
<br>
	<div class="container fluid px-4 d-flex flex-column mb-3">
 	 <!-- Content here -->	     
	   <form method="post" action="DailyFeeReport.php" name="form" class="form-horizontal">     
      <div class="row mb-3" >   
      <div class="col-md-3 d-flex justify-content-end multiple">
      <Select class="form-select " id="Report" name="Report" required="required" />
             	   <option value="" <?php if(!strcmp($ReportType,'')){echo 'selected'; } ?> >Select the Report Type</option>
						<option value="Daily" <?php if(!strcmp($ReportType,'Daily')){echo 'selected'; } ?> >Daily Report</option>
						<option value="Monthly" <?php if(!strcmp($ReportType,'Monthly')){echo 'selected'; } ?>>Monthly Report</option>						
						<option value="Yearly" <?php if(!strcmp($ReportType,'Yearly')){echo 'selected'; } ?>>Yearly Report</option>						
		</select> 
		</div>         
      <div class="col-md-3 d-flex justify-content-end multiple">
      <Select class="form-select " id="Class" name="Class" required="required" />
             	   <option value="" <?php if(!strcmp($Class,'')){echo 'selected'; } ?> >Class of Admission</option>
						<option value="LKG" <?php if(!strcmp($Class,'LKG')){echo 'selected'; } ?> >LKG</option>
						<option value="UKG" <?php if(!strcmp($Class,'UKG')){echo 'selected'; } ?>>UKG</option>
						<option value="First" <?php if(!strcmp($Class,'First')){echo 'selected'; } ?>>First Standard</option>
						<option value="Second" <?php if(!strcmp($Class,'Second')){echo 'selected'; } ?>>Second Standard</option>
						<option value="Third" <?php if(!strcmp($Class,'Third')){echo 'selected'; } ?>>Third Standard</option>
						<option value="Fourth" <?php if(!strcmp($Class,'Fourth')){echo 'selected'; } ?>>Fourth Standard</option>
						<option value="Fifth" <?php if(!strcmp($Class,'Fifth')){echo 'selected'; } ?>>Fifth Standard</option>
						<option value="All" <?php if(!strcmp($Class,'All')){echo 'selected'; } ?>>All Class</option>
		</select> 
		</div>
      <div class="col-md-2">    
      <input class="form-control" id="Date" name="Date" value="<?php if(!strcmp(strtotime($Date),'')) { echo "" ; } else { echo $Date; } ?>" type="text" placeholder="Date of Activity" onfocus="(this.type='date')" />
		</div> 
		<div class="col-md-2">    
      <Select class="form-select " id="Month" name="Month" required="required" />
             	   <option value="" <?php if(!strcmp($Month,'')){echo 'selected'; } ?> >Select the Month</option>
						<option value="1" <?php if(!strcmp($Month,'1')){echo 'selected'; } ?> >January</option>
						<option value="2" <?php if(!strcmp($Month,'2')){echo 'selected'; } ?> >February</option>
						<option value="3" <?php if(!strcmp($Month,'3')){echo 'selected'; } ?> >March</option>
						<option value="4" <?php if(!strcmp($Month,'4')){echo 'selected'; } ?> >April</option>
						<option value="5" <?php if(!strcmp($Month,'5')){echo 'selected'; } ?> >May</option>
						<option value="6" <?php if(!strcmp($Month,'6')){echo 'selected'; } ?> >June</option>
						<option value="7" <?php if(!strcmp($Month,'7')){echo 'selected'; } ?> >July</option>
						<option value="8" <?php if(!strcmp($Month,'8')){echo 'selected'; } ?> >August</option>
						<option value="9" <?php if(!strcmp($Month,'9')){echo 'selected'; } ?> >September</option>
						<option value="10" <?php if(!strcmp($Month,'10')){echo 'selected'; } ?> >October</option>
						<option value="11" <?php if(!strcmp($Month,'11')){echo 'selected'; } ?> >November</option>
						<option value="12" <?php if(!strcmp($Month,'12')){echo 'selected'; } ?> >December</option>
		</select>
		</div>
		<div class="col-md-2">    
      <Select class="form-select " id="Year" name="Year" required="required" />
             	   <option value="" <?php if(!strcmp($Class,'')){echo 'selected'; } ?> >Select the Year</option>
						<option value="2020" <?php if(!strcmp($Year,'2020')){echo 'selected'; } ?> >2020</option>
						<option value="2021" <?php if(!strcmp($Year,'2021')){echo 'selected'; } ?> >2021</option>
						<option value="2022" <?php if(!strcmp($Year,'2022')){echo 'selected'; } ?> >2022</option>
						<option value="2023" <?php if(!strcmp($Year,'2023')){echo 'selected'; } ?> >2023</option>
						<option value="2024" <?php if(!strcmp($Year,'2024')){echo 'selected'; } ?> >2024</option>
						<option value="2025" <?php if(!strcmp($Year,'2025')){echo 'selected'; } ?> >2025</option>
						<option value="2026" <?php if(!strcmp($Year,'2026')){echo 'selected'; } ?> >2026</option>
						
		</select>
		</div>
		</div>
		<div class="col-md-12">
		<div class="d-grid">
		  <button type="submit" class="btn btn-success btn-block">Show Report</button>
        <input type="hidden" name="MM_insert" value="form">		
		</div>
		</div>
		 
		</form>
</div>
<hr style="border: 10px;color: orange;border-width:5px" />
<br>		
<?php 
//=========================================================================
//=========================================================================
//=========================================================================
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
	$Class = $_POST['Class'];
	$ReportType = $_POST['Report'];
	if(!strcmp($ReportType, 'Daily')) { $Date = $_POST['Date']; $DateCheck = date('Y-m-d', strtotime($Date));}
	if(!strcmp($ReportType, 'Monthly')) { $Month = $_POST['Month']; }
	if(!strcmp($ReportType, 'Yearly')) { $Year = $_POST['Year']; }	
	
	if(!strcmp($Class, 'All')) {
		if(!strcmp($ReportType, "Daily")) {	
	 		$sql = "SELECT * FROM PaymentActivity WHERE ((DATE(DateTime) = '{$DateCheck}') and ((FeeHead = 'Term1') or (FeeHead = 'Term2') or (FeeHead = 'Term3') or (FeeHead = 'Term4'))) ORDER BY SLN DESC";
	 		}
		else if(!strcmp($ReportType, "Monthly")) { 
			$sql = "SELECT * FROM PaymentActivity WHERE ((MONTH(DateTime) = '{$Month}') and ((FeeHead = 'Term1') or (FeeHead = 'Term2') or (FeeHead = 'Term3') or (FeeHead = 'Term4'))) ORDER BY SLN DESC";		
	  		}
		else if(!strcmp($ReportType, "Yearly")) {
	 		$sql = "SELECT * FROM PaymentActivity WHERE ((YEAR(DateTime) = '{$Year}') and ((FeeHead = 'Term1') or (FeeHead = 'Term2') or (FeeHead = 'Term3') or (FeeHead = 'Term4'))) ORDER BY SLN DESC";			
	 		}
	 	}
	else {
		if(!strcmp($ReportType, "Daily")) {	
	 	$sql = "SELECT * FROM PaymentActivity WHERE ((Class = '{$Class}') and (DATE(DateTime) = '{$DateCheck}') and ((FeeHead = 'Term1') or (FeeHead = 'Term2') or (FeeHead = 'Term3') or (FeeHead = 'Term4'))) ORDER BY SLN DESC";		
	 		}
	else if(!strcmp($ReportType, "Monthly")) {
		$sql = "SELECT * FROM PaymentActivity WHERE ((Class = '{$Class}') and (MONTH(DateTime) = '{$Month}') and ((FeeHead = 'Term1') or (FeeHead = 'Term2') or (FeeHead = 'Term3') or (FeeHead = 'Term4'))) ORDER BY SLN DESC";		
	  		}
	else if(!strcmp($ReportType, "Yearly")) {
	 	$sql = "SELECT * FROM PaymentActivity WHERE ((Class = '{$Class}') and (YEAR(DateTime) = '{$Year}') and ((FeeHead = 'Term1') or (FeeHead = 'Term2') or (FeeHead = 'Term3') or (FeeHead = 'Term4'))) ORDER BY SLN DESC";
		}
	}
	$RunSQL = mysqli_query($tvs, $sql);
	$Row = mysqli_num_rows($RunSQL);

?>		                       
     <div class="card mb-4" >
     <div class="col-xl-12">
     <div class="card-header">
           <i class="fas fa-table me-1" ></i>         
            <?php echo strtoupper($ReportType); ?> FEE REPORT OF <?php echo strtoupper($Class); ?> CLASS     
            <span style="padding-left: 70%;"> 
           <a type="Submit" href="register.php" class="btn btn-outline-danger btn-sm px-3 rounded-pill" role="button" aria-pressed="true" tabindex="3"><i class="fas fa-file-pdf" style="font-size: 20px"></i> </a> </span>
         </div>
     </div>
     <div class="card-body" >
<?php 

//$Date = date('d-m-Y', strtotime($Date));
//$Date = strtotime($Date);
if($Row <= 0 ) 
{	
echo  "<span style=\"color: orange; font-size: 16px; font-weight: bold;\" >No activity recorded </span>";
}
else {	
?>   
     <table id="datatablesSimple">
     <thead>
        <tr class="table-info">
           <th width="2%">SLN</th>
           <th width="10%">Date & Time</th>       
           <th width="7%">Class</th>
           <th width="8%">Adm. NO</th>
           <th width="20%">Name</th>  
           <th width="7%">Fee Head</th>        
           <th width="9%">Amount</th>
           <th width="9%">Receipt</th>
           <th width="10%">Payment Date</th>          
           <th width="5%">View</th>  
           <th width="5%"><i class="fa fa-download" aria-hidden="true"></i>
</th>  
       </tr>
      </thead>
      <tfoot>
          <tr class="table-info">
           <th width="2%">SLN</th>
           <th width="10%">Date & Time</th>       
           <th width="7%">Class</th>
           <th width="8%">Adm. NO</th>
           <th width="20%">Name</th>  
           <th width="7%">Fee Head</th>        
           <th width="9%">Amount</th>
           <th width="9%">Receipt</th>
           <th width="10%">Payment Date</th>          
           <th width="5%">View</th>  
           <th width="5%"><i class="fa fa-download" aria-hidden="true"></i>
</th>           
          </tr>
      </tfoot>
      <tbody>
<?php 
$i=0;
$flag = 0;
$TotalPaid = 0;
$FetchActivity = mysqli_fetch_assoc($RunSQL);
do {		
			$flag = 1;
			$TotalPaid = $TotalPaid + $FetchActivity['Amount'];
			$i++;	
?>     
          <tr <?php if(($i%2)==0) { echo "class=\"table-light\"";} else { echo "class=\"table-warning\""; } ?>>
              <td><?php echo $i; ?></td>
              <td> <?php echo $FetchActivity['DateTime'] ; ?> </td>                           
              <td><?php echo $FetchActivity['Class']; ?></td>
              <td> <?php echo $FetchActivity['AdmNO'] ; ?> </td>
              <td><?php echo strtoupper($FetchActivity['Name']); ?></td> 
              <td><?php echo strtoupper($FetchActivity['FeeHead']); ?></td>              
              <td style="text-align: right;"><span style="color: black; font-size: 13px; font-weight: bold;">&#8377; <?php echo $FetchActivity['Amount'] ; ?> </span> </td>            
              <td><?php echo $FetchActivity['Receipt'] ; ?> </td>
              <td> <?php echo date('d-m-Y', (strtotime($FetchActivity['Date']))); ?> </td>             
             <td><a class="btn btn-outline-warning btn-sm px-1 rounded-pill " type="button" data-bs-role="View" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?php echo $FetchActivity['SLN']; ?>">View</a></td> 
             <td><a class="btn btn-outline-success btn-sm px-3 rounded-pill " type="button" href="fpdf/Recipt.php?SLN=<?php echo $FetchActivity['SLN']; ?>"><i class="fa fa-download" aria-hidden="true"></i>
</a></td>              
          </tr>         
    <?php 
    }while($FetchActivity = mysqli_fetch_assoc($RunSQL));
         ?> 
     <tfoot> 
      <tr class="table-success" > 
           <td colspan="6" class="text-center"> <span style="color: black; font-size: 15px; font-weight: bold;" > TOTAL FEE PAID</span></td>
           <td style="text-align: right;"><span style="color: black; font-size: 16px; font-weight: bold;">&#8377; <?php echo $TotalPaid; ?> </span></td>
           <td colspan="4"></td>
      </tr>
      </tfoot>    
                 
               </tbody>
           </table>
       </div> 
   </div>
 <?php 
//===========================================================================
//===========================================================================
//===========================================================================
}?>
 
  
<!-- ================================================================ -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="exampleModalScrollableTitle">Fee Details</h5>
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
		<div class="row mb-3"><div class="col-md-4"><label for="Amount" >Amount</label></div><div class="col-md-8"><div class="input-group"> 			<div class="input-group-text">&#8377;</div>
	   <input class="form-control" id="Amount" name="Amount" disabled="disabled" type="text" placeholder="Amount of Transaction" />
		</div></div></div>
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
<script src="js/FeeReportField.js"></script> 