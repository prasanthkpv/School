<?php if (!isset($_SESSION)) {
  session_start();
  ob_start();
}?>
<?php require_once('../Connections/tvs.php'); 
mysqli_select_db($tvs,$database_tvs);
if (isset($_POST["SLN"])) {
    $query  = "SELECT * FROM PaymentActivity WHERE SLN = '{$_POST['SLN']}'";
    $result = mysqli_query($tvs, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>