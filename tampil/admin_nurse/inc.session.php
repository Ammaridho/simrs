<?php
session_start();
if(!isset ($_SESSION['username'])) {

	echo "<div align=center><h1><b></b></h1></br></div>";
	echo "<p align=center> </p>";
	include "../Login.php";
	exit;
}
?>
