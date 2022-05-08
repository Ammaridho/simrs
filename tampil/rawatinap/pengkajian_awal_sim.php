<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$nik 	 		= $_REQUEST['nik'];
$tanggal_masuk 	= $_REQUEST['tanggal_masuk'];
$tanggal_kaji	= $_REQUEST['tanggal_kaji'];
$lengkap		= $_REQUEST['lengkap'];
$username		= $_REQUEST['username'];

 
	$sql  = " INSERT INTO pengkajian_awal (kd_kunjungan,nik,tanggal_masuk,tanggal_kaji,lengkap,tracer)";
	$sql .=	" VALUES ('$kd_kunjungan','$nik','$tanggal_masuk','$tanggal_kaji','$lengkap','$username')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Pengkajian awal sudah ada yang mengecek !");

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
