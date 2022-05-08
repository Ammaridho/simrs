<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$no			= $_REQUEST['no'];
$no_alat	= $_REQUEST['no_alat'];
$tanggal	= $_REQUEST['tanggal'];
$jam		= $_REQUEST['jam'];
$ipcln		= $_REQUEST['ipcln'];
$skor		= $_REQUEST['skor'];
$kesimpulan	= $_REQUEST['kesimpulan'];




	$sql  = " INSERT INTO monitoring_plebitis (no_alat,tanggal,jam,ipcln,skor,kesimpulan)";
	$sql .=	" VALUES ('$no_alat','$tanggal','$jam','$ipcln','$skor','$kesimpulan')";
	mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
