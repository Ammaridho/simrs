<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$kd_alat		= $_REQUEST['kd_alat'];
$tanggal_pasang = $_REQUEST['tanggal_pasang'];
$jam_pasang 	= $_REQUEST['jam_pasang'];
$frekwensi	 	= $_REQUEST['frekwensi'];
$tanggal_lepas  = $_REQUEST['tanggal_lepas'];
$jam_lepas 		= $_REQUEST['jam_lepas'];
$nik 			= $_REQUEST['nik'];
$pelepas 		= $_REQUEST['pelepas'];
$alasan_lepas 	= $_REQUEST['alasan_lepas'];

	$sql  = " INSERT INTO monitoring (kd_kunjungan,kd_alat,tanggal_pasang,jam_pasang,frekwensi,tanggal_lepas,jam_lepas,pemasang,pelepas,alasan_lepas)";
	$sql .=	" VALUES('$kd_kunjungan','$kd_alat','$tanggal_pasang','$jam_pasang','$frekwensi', '$tanggal_lepas','$jam_lepas','$nik','$pelepas','$alasan_lepas')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! data tidak dapat disimpan !".mysqli_error($koneksi));

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>

