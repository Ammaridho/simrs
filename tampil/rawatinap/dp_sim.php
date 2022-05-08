<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$nik= $_REQUEST['nik'];
$tanggal= $_REQUEST['tanggal'];
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
$dptotal= $_REQUEST['dptotal'];
$Probability= $_REQUEST['Probability'];
 
	$sql  = " INSERT INTO discharge_plan (kd_kunjungan,tanggal,nik,dp01,dp02,dp03,dp04,dp05,dp06,dp07,dp08,dp09,dp10,dp11,dp12,dp13,dp14,hasil,kriteria)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$nik','$dp01','$dp02','$dp03','$dp04','$dp05','$dp06','$dp07','$dp08','$dp09','$dp10','$dp11','$dp12','$dp13','$dp14','$dptotal','$Probability')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Discharge Plan sudah dibuat!");
		  
		  echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
