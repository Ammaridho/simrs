<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_adl 	= $_REQUEST['kd_adl'];
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$adl		= $_REQUEST['adl'];
$tanggal	= $_REQUEST['tanggal'];
$jam		= $_REQUEST['jam'];
$perawat	= $_REQUEST['perawat'];
$nohp		= $_REQUEST['nohp'];
$sms		= $_REQUEST['sms'];
$status		= $_REQUEST['status'];

 
	$sql  = " INSERT INTO adl (kd_adl,kd_kunjungan,adl,tanggal,jam,perawat,nohp,sms,status)";
	$sql .=	" VALUES ('$kd_adl','$kd_kunjungan','$adl','$tanggal','$jam','$perawat','$nohp','$sms','Inprogress')";
	mysqli_query($koneksi, $sql) 
		  or die ("Error");

include "adl.php";
?>
