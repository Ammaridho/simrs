<?php

// script untuk reset password admin dan perbaiki tabel

include "koneksi.php";

$query = "SHOW TABLES";
$hasil = mysqli_query($koneksi,$query);
while ($data = mysql_fetch_row($hasil))
{
	$query2 = "REPAIR TABLE `".$data[0]."`";
	$hasil2 = mysqli_query($koneksi,$query2);
	$data2  = mysqli_fetch_array($hasil2);
	echo $query2."<br>".$data2[3]."<br><br>";
}

$query = "INSERT INTO `sms_user` VALUES ('admin', 'e10adc3949ba59abbe56e057f20f883e')";
mysqli_query($koneksi,$query);
$query = "UPDATE `sms_user` SET `password` = 'e10adc3949ba59abbe56e057f20f883e' WHERE username = 'admin'";
mysqli_query($koneksi,$query);

?>