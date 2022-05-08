<?php
session_start();
include "config.php";


if(!isset ($_SESSION['klinik'])) {

		echo "<div align=center><h1><b></b></h1></br></div>";
		echo "<p align=center> </p>";
		echo "<meta http-equiv='refresh' content='0; url=".$url."Login.php'>";
	exit;
}
?>