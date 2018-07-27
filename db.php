<?php

error_reporting(0);
require_once('local.php');

if($_SERVER['HTTP_HOST'] == "localhost"){
  define("USERNAME",    L_USERNAME);
  define("PASSWORD",    L_PASSWORD);
  define("HOST",        L_HOST);
  define("DATABASENAME",L_DATABASENAME);
  define("SITEURL",     "");
  define("SITEURL_URI", $_SERVER['HTTP_HOST']);
}else{
  define("USERNAME",    P_USERNAME);
  define("PASSWORD",    P_PASSWORD);
  define("HOST",        P_HOST);
  define("DATABASENAME",P_DATABASENAME);
  define("SITEURL",     "");
  define("SITEURL_URI", $_SERVER['HTTP_HOST']);
}
require_once("Email.class.php");
date_default_timezone_set('America/Chicago');
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASENAME);
if (mysqli_connect_errno($link)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$action = isset($_REQUEST['action']) ? filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) : '';
?>
