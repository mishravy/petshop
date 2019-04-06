<?php @session_start();
//ob_start('ob_gzhandler');
$_SESSION["PrintTheJavaScript"] = true;
$SERV_NAME = "localhost";
$SERV_DB = "petshop";
$SERV_USER = "root";
$SERV_PASSWORD = "";
$dbconnect = new PDO("mysql:host=".$SERV_NAME.";dbname=".$SERV_DB."", "".$SERV_USER."", "".$SERV_PASSWORD.""); //Localhost
$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//date_default_timezone_set("Asia/Kolkata");
include("class/class-social.php");
$SocialRootCl = new clRootSocial;
?>