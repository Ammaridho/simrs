<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$barthel01= $_REQUEST['barthel01'];
$barthel02= $_REQUEST['barthel02'];
$barthel03= $_REQUEST['barthel03'];
$barthel04= $_REQUEST['barthel04'];
$barthel05= $_REQUEST['barthel05'];
$barthel06= $_REQUEST['barthel06'];
$barthel07= $_REQUEST['barthel07'];
$barthel08= $_REQUEST['barthel08'];
$barthel09= $_REQUEST['barthel09'];
$barthel10= $_REQUEST['barthel10'];
 
$sql  = " UPDATE barthel SET 
barthel01='$barthel01',
barthel02='$barthel02',
barthel03='$barthel03',
barthel04='$barthel04',
barthel05='$barthel05',
barthel06='$barthel06',
barthel07='$barthel07',
barthel08='$barthel08',
barthel09='$barthel09', 
barthel10='$barthel10'
WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

include "barthel_form_edit.php";
?>
