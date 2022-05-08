<?php
$dbUser = "root";
$dbPass = "12345678";
$dbName = "klinik";
$dbHost = "localhost";
 
mysql_connect($dbHost, $dbUser, $dbPass);
mysql_select_db($dbName);
?>
