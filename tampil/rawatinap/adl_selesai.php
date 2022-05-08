<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_adl		= $_REQUEST['kd_adl']; 
$kd_kunjungan	= $_REQUEST['kd_kunjungan'];
$adl   		= $_REQUEST['adl'];	
$tanggal   	= $_REQUEST['tanggal'];	
$jam 	  	= $_REQUEST['jam'];
$perawat   	= $_REQUEST['perawat'];	
$nohp 	  	= $_REQUEST['nohp'];
$sms 	  	= $_REQUEST['sms'];
$status  	= $_REQUEST['status'];

$sql  = " UPDATE adl SET 
kd_kunjungan 	='$kd_kunjungan',
adl		='$adl',
tanggal  	='$tanggal',	
jam 	 	='$jam ',
perawat  	='$perawat',	
nohp 	 	='$nohp',
sms 	 	='$sms',
status 		='Selesai'
WHERE kd_adl='$kd_adl'";
mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

include "adl.php";
?>
