<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$nik 	 		= $_REQUEST['nik'];
$tanggal_masuk 	= $_REQUEST['tanggal_masuk'];
$skrining		= $_REQUEST['skrining'];
$hasil			= $_REQUEST['hasil'];
$tracer			= $_REQUEST['tracer'];

 
	$sql  = " INSERT INTO skrining_nyeri (kd_kunjungan,nik,tanggal_masuk,skrining,hasil,tracer)";
	$sql .=	" VALUES ('$kd_kunjungan','$nik','$tanggal_masuk','$skrining','$hasil','$tracer')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Skrining nyeri sudah ada yang mengecek !");

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
