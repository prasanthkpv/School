<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tvs = "localhost";
$database_tvs = "TVSchool";
$username_tvs = "phpmyadmin";
$password_tvs = "root";
$tvs = mysqli_connect($hostname_tvs, $username_tvs, $password_tvs) or trigger_error(mysql_error(),E_USER_ERROR); 
mysqli_select_db($tvs, $database_tvs);
?>
