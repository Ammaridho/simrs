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

		  $sql  = " UPDATE monitoring_plebitis SET 		
		ipcln='$ipcln',
		skor='$skor',
		kesimpulan='$kesimpulan',
		no_alat='$no_alat'
		WHERE no='$no' ";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf, data belum berhasil di-update !");


echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
