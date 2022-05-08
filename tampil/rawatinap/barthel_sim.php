<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$nik	= $_REQUEST['nik'];
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
$bartheltotal= $_REQUEST['bartheltotal'];
$Probability= $_REQUEST['Probability'];
 
	$sql  = " INSERT INTO barthel (kd_kunjungan,tanggal,nik,barthel01,barthel02,barthel03,barthel04,barthel05,barthel06,barthel07,barthel08,barthel09,barthel10,barthel_pasien,keterangan)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$nik','$barthel01','$barthel02','$barthel03','$barthel04','$barthel05','$barthel06','$barthel07','$barthel08','$barthel09','$barthel10','$bartheltotal','$Probability')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Tingkat Barthel Index hari ini sudah dihitung!");

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
