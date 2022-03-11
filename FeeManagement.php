<?php 
require_once('header.php'); 
if($_SESSION['Auth'] != 1)
	header('location:login.php');
else
{
require_once('Connections/tvs.php'); 
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
          <a class="navbar-brand ps-3" href="index.html"> <span style="font-size: 28px;font-weight: bold;color: white;"> SRI VENKATESWARA NURSERY & PRIMARY SCHOOL </span></a>
            
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
                  <a class="nav-link  active" href="FeeManagement.php">Fee Entry</a>
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
                        <h1 class="mt-4">Fee Management</h1>
                        <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Fee Entry</li>
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
                       
                                        
     <div class="card mb-4" >
     <div class="col-xl-12">
     <div class="card-header">
           <i class="fas fa-table me-1" ></i>
          <span style="color: green;font-size: 20px; font-weight: bold;"> Registered Students </span>
           <span style="padding-left: 75%;"> 
           <a type="Submit" href="fpdf/Fee_Report_Management.php" class="btn btn-outline-danger btn-sm px-3 rounded-pill" role="button" aria-pressed="true" tabindex="3"><i class="fas fa-file-pdf" style="font-size: 20px"></i> </a> </span>
          </div>
     </div>
     <div class="card-body" >
<?php 
$sql = "SELECT * FROM Registration WHERE (Type = 'Student') ORDER BY AdmNO ASC";
$RunSQL = mysqli_query($tvs, $sql);
$Row = mysqli_num_rows($RunSQL);
if($Row > 0 ) 
{	
?>   
     <table id="datatablesSimple">
     <thead>
        <tr class="table-info border-warning">
           <th width="2%">SLN</th>
           <th width="7%">Adm. NO</th>
           <th width="18%">Name</th>          
           <th width="5%">Class</th>
           <th width="8%">Prev. Due</th>
           <th width="8%">Total Fee</th>
           <th width="9%">School Fee</th>
           <th width="8%">Trans. Fee</th>
           <th width="8%">Book Fee</th>
           <th width="8%">Misc. Fee</th>
           <th width="8%">Total Paid</th>
           <th width="8%">Balance</th>
       <!--    <th width="2%">Edit</th> 
           <th width="2%">DEL</th> -->
       </tr>
      </thead>
      <tfoot>
          <tr class="table-info border-warning">
            <th width="2%">SLN</th>
           <th width="7%">Adm. NO</th>
           <th width="18%">Name</th>          
           <th width="5%">Class</th>
           <th width="8%">Prev. Due</th>
           <th width="8%">Total Fee</th>
           <th width="9%">School Fee</th>
           <th width="8%">Trans. Fee</th>
           <th width="8%">Book Fee</th>
           <th width="8%">Misc. Fee</th>
           <th width="8%">Total Paid</th>
           <th width="8%">Balance</th>
         <!--  <th width="2%">Edit</th> -->          
          </tr>
      </tfoot>
      <tbody>
<?php 
$i = 0;
$FetchStudent = mysqli_fetch_assoc($RunSQL);
$TotalDue = 0;
$GrantTotalFee = 0;
$TotalTerm1 = 0;
$TotalTerm2 = 0;
$TotalTerm3 = 0;
$TotalTerm4 = 0;
$TotalFeePaid = 0;
$TotalBalanace = 0; 

do {
	++$i;	
 	$sqlFee = "SELECT * FROM FeeMaster WHERE (AdmNO = '{$FetchStudent['AdmNO']}')";
 	$RunsqlFee = mysqli_query($tvs, $sqlFee);
 	$rowFee = mysqli_num_rows($RunsqlFee);	
 		
	if($rowFee > 0) {
 		$FetchFee = mysqli_fetch_assoc($RunsqlFee);
 		
 		$PrevDue = $FetchFee['PrevDue'];
 		$TotalFee = $FetchFee['TotalFee'];
		$Term1 = $FetchFee['Term1'];
		$Term2 = $FetchFee['Term2'];
		$Term3 = $FetchFee['Term3'];
		$Term4 = $FetchFee['Term4'];
		$TotalPaid = $FetchFee['TotalPaid'];
		$Balance = $FetchFee['Balance'];
 	}
 	else {
 		$PrevDue = 0;
 		$TotalFee = 0;
		$Term1 = 0;
		$Term2 = 0;
		$Term3 = 0;
		$Term4 = 0;
		$TotalPaid = 0;
		$Balance = 0;
 		}
?>     
          <tr <?php if(($i%2)==0) { echo "class=\"table-light border-warning\"";} else { echo "class=\"table-warning border-warning\""; } ?>>
              <td><?php echo $i; ?></td>
              <td> <?php echo $FetchStudent['AdmNO'] ; ?> </td>
              <td><?php echo strtoupper($FetchStudent['Firstname']." ".$FetchStudent['Lastname']); ?></td>
              <td><?php echo $FetchStudent['Class'] ; ?> </td>
              
              <td style="text-align: right;"> <a class="btn btn-outline-success btn-sm px-2" type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModalFee" data-id="<?php echo $FetchStudent['SLN']; ?>" data-row-id="PrevDue" >
              <span id="EditDisplayPrevDue<?php echo $FetchStudent['AdmNO'];?>" ><?php echo $PrevDue; ?> </span></a></td>
              <?php $TotalDue = ($TotalDue + $PrevDue); ?>
              <td style="text-align: right;"><a class="btn btn-outline-success btn-sm px-2" type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModalFee" data-id="<?php echo $FetchStudent['SLN']; ?>" data-row-id="TotalFee">
            <span id="EditDisplayTotalFee<?php echo $FetchStudent['AdmNO'];?>" >  <?php echo $TotalFee; ?> </span></a></td>
            	 <?php $GrantTotalFee = ($GrantTotalFee + $TotalFee); ?>
              <td style="text-align: right;"><a class="btn btn-outline-success btn-sm px-2" type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModalFee" data-id="<?php echo $FetchStudent['SLN']; ?>" data-row-id="Term1">
        <span  id="EditDisplayTerm1<?php echo $FetchStudent['AdmNO'];?>" > <?php echo $Term1; ?> </span></a> </td>
                <?php $TotalTerm1 = ($TotalTerm1 + $Term1); ?>
              <td style="text-align: right;"><a class="btn btn-outline-success btn-sm px-2" type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModalFee" data-id="<?php echo $FetchStudent['SLN']; ?>" data-row-id="Term2">
               <span id="EditDisplayTerm2<?php echo $FetchStudent['AdmNO'];?>" ><?php echo $Term2; ?></span></a> </td>
                <?php $TotalTerm2 = ($TotalTerm2 + $Term2); ?>
              <td style="text-align: right;"><a class="btn btn-outline-success btn-sm px-2" type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModalFee" data-id="<?php echo $FetchStudent['SLN']; ?>" data-row-id="Term3">
              <span id="EditDisplayTerm3<?php echo $FetchStudent['AdmNO'];?>" > <?php echo $Term3; ?></span></a> </td>
               <?php $TotalTerm3 = ($TotalTerm3 + $Term3); ?>
              <td style="text-align: right;"><a class="btn btn-outline-success btn-sm px-2" type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModalFee" data-id="<?php echo $FetchStudent['SLN']; ?>" data-row-id="Term4">
              <span id="EditDisplayTerm4<?php echo $FetchStudent['AdmNO'];?>" > <?php echo $Term4; ?></span></a> </td>
               <?php $TotalTerm4 = ($TotalTerm4 + $Term4); ?>
              <td style="text-align: right;"><a class="btn btn-outline-primary btn-sm px-2" type="button"><span id="EditDisplayTotalPaid<?php echo $FetchStudent['AdmNO'];?>" ><?php echo $TotalPaid; ?></span></a> </td>
               <?php $TotalFeePaid = ($TotalFeePaid + $TotalPaid); ?>
              <td style="text-align: right;"><a class="btn btn-outline-primary btn-sm px-2" type="button"><span id="EditDisplayBalance<?php echo $FetchStudent['AdmNO'];?>"><?php echo $Balance; ?></span></a> </td>
               <?php $TotalBalanace = ($TotalBalanace + $Balance); ?>
              
             <!-- <td><a class="btn btn-outline-primary btn-sm px-1 rounded-pill " type="button" data-bs-role="Update" data-bs-toggle="modal" data-bs-target="#myModal" data-id="<?php echo $FetchStudent['SLN']; ?>">Edit</a></td> 
              <td style="text-align: center;"><a class="btn btn-outline-danger btn-sm px-2 rounded-pill" type="button" onclick="return confirm('Do you want to Delete')" href="Delete/UserDelete.php?SLN=<?php echo $FetchStudent['SLN']; ?>" ><i class="fa fa-trash"></i> 
</a></td> -->
          </tr>
    <?php }while($FetchStudent = mysqli_fetch_assoc($RunSQL));
         ?> 
      <tfoot>
       <tr class="table-warning border-warning">
        <th colspan="4"style="text-align: center;" >GRANT TOTAL OF 1 TO <?php echo $i; ?> STUDENTS</th>          
        <th width="8%"style="text-align: right;"><a class="btn btn-outline-primary btn-sm px-2"  type="button" ><span id="TotalDue"><?php echo $TotalDue; ?> </span></a></th>
        <th width="8%"style="text-align: right;" ><a class="btn btn-outline-primary btn-sm px-2" type="button" ><span id="GrantTotalFee"><?php echo $GrantTotalFee; ?></span> </a></th>
        <th width="8%"style="text-align: right;"><a class="btn btn-outline-primary btn-sm px-2" type="button"  ><span id="TotalTerm1"><?php echo $TotalTerm1; ?></span></a></th>
        <th width="8%"style="text-align: right;"><a class="btn btn-outline-primary btn-sm px-2" type="button"  ><span id="TotalTerm2"><?php echo $TotalTerm2; ?></span></a></th>
        <th width="8%"style="text-align: right;" ><a class="btn btn-outline-primary btn-sm px-2" type="button" ><span id="TotalTerm3"><?php echo $TotalTerm3; ?></span></a></th>
        <th width="8%"style="text-align: right;" ><a class="btn btn-outline-primary btn-sm px-2" type="button" ><span id="TotalTerm4"><?php echo $TotalTerm4; ?></span></a></th>
        <th width="8%"style="text-align: right;" ><a class="btn btn-outline-primary btn-sm px-2" type="button" ><span id="TotalFeePaid"><?php echo $TotalFeePaid; ?></span></a></th>
        <th width="8%"style="text-align: right;" ><a class="btn btn-outline-primary btn-sm px-2" type="button" ><span id="TotalBalanace"><?php echo $TotalBalanace; ?></span></a></th>
      <!--  <th width="2%">Edit</th> 
        <th width="2%"></th> -->
       </tr>
       </tfoot>        
               </tbody>
           </table>
       </div> 
   </div>
  
<!-- ================================================================ -->
<div class="modal fade" id="myModalFee" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
       <div class="modal-content">
       <div class="modal-header">
       <h5 class="modal-title" id="exampleModalScrollableTitle">Student Fee Details</h5>
       <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
      <div class="modal-body">                            
      <form method="post" id="insert_form" class="form-horizontal"> 
      <div class="col-xs-12">   
		
      <div class="row mb-3"><div class="col-md-3"><label for="Name" >Name</label></div><div class="col-md-9">
	   <input class="form-control" id="StudentName" name="StudentName" disabled="disabled" type="text" required="required" placeholder="Name" />
	   <input type="hidden" name="AdmNO" id="AdmNO" class="form-control" />
	   <input type="hidden" name="Name" id="Name" class="form-control" />
	   <input type="hidden" name="Field" id="Field" class="form-control" />
		</div></div>			
		<div class="row mb-3"><div class="col-md-3"><label for="Field" >Head/Tile</label>	</div><div class="col-md-9">
	   <input class="form-control" id="FieldName" name="FieldName" type="text" disabled="disabled" placeholder="Amount Paid" />
		</div></div>
		 
		<div class="row mb-3"><div class="col-md-3"><label for="Amount" >Amount</label>	</div><div class="col-md-9"> <div class="input-group"> <div class="input-group-text">&#8377;</div>
	   <input class="form-control" id="Amount" name="Amount" type="text" required="required" autocomplete="off"  placeholder="Amount Paid" />
		</div></div></div>
      
      <div class="row mb-3"><div class="col-md-3"><label for="Date" >Date</label>	</div><div class="col-md-9">
	   <input class="form-control" id="Date" name="Date" type="date" required="required"  placeholder="Date of Payment" />
		</div></div>
		
		<div class="row mb-3"><div class="col-md-3"><label for="Receipt" >Receipt</label>	</div><div class="col-md-9">
	   <input class="form-control" id="Receipt" name="Receipt" type="text" autocomplete="off" required="required"  placeholder="Receipt of Payment" />
		</div></div>
		<div class="row mb-3"><div class="col-md-3"><label for="PaymentMode" >Payment Mode</label></div>
		<div class="col-md-9">
		<Select class="form-select" id="PaymentMode" name="PaymentMode" required="required" />
             	   <option value="" selected="Selected">Mode of Payment</option>
						<option value="Cash" >Cash</option>
						<option value="DD">Demand Draft</option>
						<option value="Online">Bank Online Payment</option>
						<option value="UPI">UPI(Google Pay/PhonePe/Paytm/BHIM)</option>
						<option value="NA">Not Applicable</option>
		</select>
		</div></div>
      <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
      <input type="submit" name="insert" id="insert" value="Update" class="btn btn-primary pull-right" />           
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
<script src="js/StudentFee_Edit.js"></script> 