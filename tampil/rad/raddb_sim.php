<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
# Baca variabel Form (If Register Global ON)
$kd_rad			= kdauto("rad_db","kd_rad","8","RD"); 
$inst		    = $_REQUEST['inst'];
$gol_rad		= $_REQUEST['gol_rad'];
$nama_rad		= $_REQUEST['nama_rad'];
$harga_rad		= $_REQUEST['harga_rad'];
$discount		= $_REQUEST['discount'];
$keterangan		= $_REQUEST['keterangan'];

$sql  = "INSERT INTO rad_db (inst,kd_rad,gol_rad,nama_rad,harga_rad,discount,keterangan)";
$sql .= "VALUES ('$inst','$kd_rad','$gol_rad','$nama_rad','$harga_rad','$discount','$keterangan')";
		mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_connect_error());

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>