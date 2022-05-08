<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$jam	= $_REQUEST['jam'];
$shift	= $_REQUEST['shift'];
$nik	= $_REQUEST['nik'];
$jenis	= $_REQUEST['jenis'];
$nips01= $_REQUEST['nips01'];
$nips02= $_REQUEST['nips02'];
$nips03= $_REQUEST['nips03'];
$nips04= $_REQUEST['nips04'];
$nips05= $_REQUEST['nips05'];
$nips06= $_REQUEST['nips06'];
$nips07= $_REQUEST['nips07'];
$nips08= $_REQUEST['nips08'];
$nipstotal= $_REQUEST['nipstotal'];
$Probability= $_REQUEST['Probability'];
 
	$sql  = " INSERT INTO skala_nyeri (kd_kunjungan,tanggal,jam,shift,nik,jenis,nyeri01,nyeri02,nyeri03,nyeri04,nyeri05,nyeri06,nyeri07,nyeri08,nyeri09,nyeri10,nyeri11,nyeri12,nyeri13,nyeri14,nyeri15,total_skor,kategori)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$jam','$shift','$nik','NIPS','$nips01','$nips02','$nips03','$nips04','$nips05','$nips06','$nips07','$nips08','$nips09','$nips10','$nips11','$nips12','$nips13','$nips14','$nips15','$nipstotal','$Probability')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! NIPS hari ini sudah dihitung!");
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();

?>
