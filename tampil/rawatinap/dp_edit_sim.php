<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$dp01= $_REQUEST['dp01'];
$dp02= $_REQUEST['dp02'];
$dp03= $_REQUEST['dp03'];
$dp04= $_REQUEST['dp04'];
$dp05= $_REQUEST['dp05'];
$dp06= $_REQUEST['dp06'];
$dp07= $_REQUEST['dp07'];
$dp08= $_REQUEST['dp08'];
$dp09= $_REQUEST['dp09'];
$dp10= $_REQUEST['dp10'];
$dp11= $_REQUEST['dp11'];
$dp12= $_REQUEST['dp12'];
$dp13= $_REQUEST['dp13'];
$dp14= $_REQUEST['dp14'];
 
$sql  = " UPDATE dp SET 
dp01='$dp01',
dp02='$dp02',
dp03='$dp03',
dp04='$dp04',
dp05='$dp05',
dp06='$dp06',
dp07='$dp07',
dp08='$dp08',
dp09='$dp09',
dp10='$dp10', 
dp11='$dp11',
dp12='$dp12',
dp13='$dp13',
dp14='$dp14'
WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

include "dp_form_edit.php";
?>
