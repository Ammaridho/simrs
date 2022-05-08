<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$no		= $_REQUEST['no'];
$no_alat	= $_REQUEST['no_alat'];
$tanggal	= $_REQUEST['tanggal'];
$jam		= $_REQUEST['jam'];
$ipcln	= $_REQUEST['ipcln'];
$cc1		= $_REQUEST['cc1'];
$cc2		= $_REQUEST['cc2'];
$cc3		= $_REQUEST['cc3'];
$cc4		= $_REQUEST['cc4'];
$cc5		= $_REQUEST['cc5'];
$cc6		= $_REQUEST['cc6'];
$cctotal	= $_REQUEST['cctotal'];
$Probability= $_REQUEST['Probability'];
$Kesimpulan	= $_REQUEST['Kesimpulan'];


	$sql  = " INSERT INTO monitoring_cpis (no_alat,tanggal,jam,ipcln,cc1,cc2,cc3,cc4,cc5,cc6,cctotal,probability,kesimpulan)";
	$sql .=	" VALUES ('$no_alat','$tanggal','$jam','$ipcln','$cc1','$cc2','$cc3','$cc4','$cc5','$cc6','$cctotal','$Probability','$Kesimpulan')";
	mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
