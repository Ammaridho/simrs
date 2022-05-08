<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$prn= $_REQUEST['prn'];
$a1= $_REQUEST['a1'];
$a2= $_REQUEST['a2'];
$a2a= $_REQUEST['a2a'];
$a3= $_REQUEST['a3'];
$a4= $_REQUEST['a4'];
$a5= $_REQUEST['a5'];
$a6= $_REQUEST['a6'];
$a6a= $_REQUEST['a6a'];
$a6b= $_REQUEST['a6b'];
$a6c= $_REQUEST['a6c'];
$a7= $_REQUEST['a7'];
 
	$sql  = " INSERT INTO asesmen_dewasa (kd_kunjungan,prn,a1,a2,a2a,a3,a4,a5,a6,a6a,a6b,a6c,a7)";
	$sql .=	" VALUES ('$kd_kunjungan','$prn','$a1','$a2','$a2a','$a3','$a4','$a5','$a6','$a6a','$a6b','$a6c','$a7')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Tingkat Barthel Index hari ini sudah dihitung!");

include "asesmen_dewasa_view.php";
?>
