<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$class01= $_REQUEST['class01'];
$class02= $_REQUEST['class02'];
$class03= $_REQUEST['class03'];
$class04= $_REQUEST['class04'];
$class05= $_REQUEST['class05'];
$class06= $_REQUEST['class06'];
$class07= $_REQUEST['class07'];
$class08= $_REQUEST['class08'];
$class09= $_REQUEST['class09'];
$class10= $_REQUEST['class10'];
 
$sql  = " UPDATE class SET 
class01='$class01',
class02='$class02',
class03='$class03',
class04='$class04',
class05='$class05',
class06='$class06',
class07='$class07',
class08='$class08',
class09='$class09', 
class10='$class10'
WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

include "class_form_edit.php";
?>
