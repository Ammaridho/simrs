<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$morse01= $_REQUEST['morse01'];
$morse02= $_REQUEST['morse02'];
$morse03= $_REQUEST['morse03'];
$morse04= $_REQUEST['morse04'];
$morse05= $_REQUEST['morse05'];
$morse06= $_REQUEST['morse06'];
$morse_pasien= $_REQUEST['morse_pasien'];
 
$sql  = " UPDATE morse SET 
morse01='$morse01',
morse02='$morse02',
morse03='$morse03',
morse04='$morse04',
morse05='$morse05',
morse06='$morse06',
morse_pasien='$morse_pasien'
WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

include "morse_form.php";
?>
