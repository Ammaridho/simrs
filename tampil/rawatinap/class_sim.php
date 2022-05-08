<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$class01= $_REQUEST['class01'];
$class02= $_REQUEST['class02'];
$class03= $_REQUEST['class03'];
$class04= $_REQUEST['class04'];
$class05= $_REQUEST['class05'];
$class06= $_REQUEST['class06'];
$class07= $_REQUEST['class07'];
$class08= $_REQUEST['class08'];
$class09= $_REQUEST['class09'];
$class10= $_REQUEST['class10'];
$class_pasien= $_REQUEST['class_pasien'];
 
	$sql  = " INSERT INTO class (kd_kunjungan,tanggal,class01,class02,class03,class04,class05,class06,class07,class08,class09,class10,class_pasien)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$class01','$class02','$class03','$class04','$class05','$class06','$class07','$class08','$class09','$class10','$class_pasien')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Tingkat ketergantungan pasien hari ini sudah dihitung!");

include "class_form_edit.php";

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
