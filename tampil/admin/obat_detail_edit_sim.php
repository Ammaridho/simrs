<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$no	= $_REQUEST['no'];
$no_faktur	= $_REQUEST['no_faktur'];
$kd_obat	= $_REQUEST['kd_obat'];
$jumlah		= $_REQUEST['jumlah'];
$keterangan	= $_REQUEST['keterangan'];
 
	$sql  = " UPDATE obat_stock SET
				kd_obat='$kd_obat',
				jumlah='$jumlah',
				keterangan='Inprogress'
                WHERE no='$no'";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();  
?>