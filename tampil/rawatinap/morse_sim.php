<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$jam	= $_REQUEST['jam'];
$shift	= $_REQUEST['shift'];
$nik	= $_REQUEST['nik'];
$morse01= $_REQUEST['morse01'];
$morse02= $_REQUEST['morse02'];
$morse03= $_REQUEST['morse03'];
$morse04= $_REQUEST['morse04'];
$morse05= $_REQUEST['morse05'];
$morse06= $_REQUEST['morse06'];
$morsetotal= $_REQUEST['morsetotal'];
$Probability= $_REQUEST['Probability'];
$ketergantungan_obat= $_REQUEST['ketergantungan_obat'];
$keterangan= $_REQUEST['keterangan'];
 
	$sql  = " INSERT INTO skala_jatuh (kd_kunjungan,tanggal,jam,shift,nik,jenis,jatuh01,jatuh02,jatuh03,jatuh04,jatuh05,jatuh06,total_skor,kategori,ketergantungan_obat,keterangan)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$jam','$shift','$nik','MORSE','$morse01','$morse02','$morse03','$morse04','$morse05','$morse06','$morsetotal','$Probability','$ketergantungan_obat','$keterangan')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Tingkat morse Index hari ini sudah dihitung!".mysqli_error($koneksi));
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();

?>
