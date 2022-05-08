<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$nik 	 = $_REQUEST['nik'];
$braden01= $_REQUEST['braden01'];
$braden02= $_REQUEST['braden02'];
$braden03= $_REQUEST['braden03'];
$braden04= $_REQUEST['braden04'];
$braden05= $_REQUEST['braden05'];
$braden06= $_REQUEST['braden06'];
$bradentotal= $_REQUEST['bradentotal'];
$Probability= $_REQUEST['Probability'];
 
	$sql  = " INSERT INTO braden (kd_kunjungan,tanggal,nik,braden01,braden02,braden03,braden04,braden05,braden06,braden_pasien,keterangan)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$nik','$braden01','$braden02','$braden03','$braden04','$braden05','$braden06','$bradentotal','$Probability')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Tingkat braden Index hari ini sudah dihitung!");

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
