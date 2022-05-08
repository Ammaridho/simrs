<?php
$dbUser = "root";
$dbPass = "";
$dbName = "klinikdb";
$dbHost = "localhost";

mysql_connect($dbHost, $dbUser, $dbPass);
mysql_select_db($dbName);
?>