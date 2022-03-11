<?php
  if (!isset($_SESSION)) {
  ob_start();
  session_start();
  $_SESSION['Login'] = 0;
  date_default_timezone_set('Asia/Kolkata');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="root" />
        <title>TVSchool</title>
        <link href="css/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/js/all.min.js"></script>
    </head>
