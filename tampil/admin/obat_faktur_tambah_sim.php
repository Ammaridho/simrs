<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

# Baca variabel Form (If Register Global ON)
$no_faktur	= kdauto("obat_faktur","F");
$faktur	= $_REQUEST['faktur'];
$tanggal	= $_REQUEST['tanggal'];
$user		= $_REQUEST['user'];

 
	$sql  = " INSERT INTO obat_faktur (no_faktur,faktur,tanggal,user,keterangan)";
	$sql .=	" VALUES ('$no_faktur','$faktur','$tanggal','$user','Inprogress')";
	mysqli_query($koneksi,$sql) 
		  or die ("Error, data tidak dapat disimpan !".mysqli_connect_error());
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>