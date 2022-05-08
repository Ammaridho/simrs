<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$tanggal		= $_REQUEST['tanggal'];
$jam			= $_REQUEST['jam'];
$shift			= $_REQUEST['shift'];
$nik			= $_REQUEST['nik'];
$jenis			= $_REQUEST['jenis'];
$humpty01		= $_REQUEST['humpty01'];
$humpty02		= $_REQUEST['humpty02'];
$humpty03		= $_REQUEST['humpty03'];
$humpty04		= $_REQUEST['humpty04'];
$humpty05		= $_REQUEST['humpty05'];
$humpty06		= $_REQUEST['humpty06'];
$humpty07		= $_REQUEST['humpty07'];
$humptytotal	= $_REQUEST['humptytotal'];
$Probability	= $_REQUEST['Probability'];
 
	$sql  = " INSERT INTO skala_jatuh (kd_kunjungan,tanggal,jam,shift,nik,jenis,jatuh01,jatuh02,jatuh03,jatuh04,jatuh05,jatuh06,jatuh07,total_skor,kategori)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$jam','$shift','$nik','HUMPTY DUMPTY','$humpty01','$humpty02','$humpty03','$humpty04','$humpty05','$humpty06','$humpty07','$humptytotal','$Probability')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Tingkat morse Index hari ini sudah dihitung!".mysqli_error($koneksi));
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();

?>
