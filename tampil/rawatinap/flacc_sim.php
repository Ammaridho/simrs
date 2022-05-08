<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$jam	= $_REQUEST['jam'];
$shift	= $_REQUEST['shift'];
$nik	= $_REQUEST['nik'];
$jenis	= $_REQUEST['jenis'];
$flacc01= $_REQUEST['flacc01'];
$flacc02= $_REQUEST['flacc02'];
$flacc03= $_REQUEST['flacc03'];
$flacc04= $_REQUEST['flacc04'];
$flacc05= $_REQUEST['flacc05'];
$flacctotal= $_REQUEST['flacctotal'];
$Probability= $_REQUEST['Probability'];
 
	$sql  = " INSERT INTO skala_nyeri (kd_kunjungan,tanggal,jam,shift,nik,jenis,nyeri01,nyeri02,nyeri03,nyeri04,nyeri05,nyeri06,nyeri07,nyeri08,nyeri09,nyeri10,nyeri11,nyeri12,nyeri13,nyeri14,nyeri15,total_skor,kategori)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$jam','$shift','$nik','FLACC','$flacc01','$flacc02','$flacc03','$flacc04','$flacc05','','','','','','$flacc11','$flacc12','$flacc13','$flacc14','$flacc15','$flacctotal','$Probability')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! NIPS hari ini sudah dihitung!");
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();

?>
