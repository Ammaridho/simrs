<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

# Baca variabel Form (If Register Global ON)

$kd_noc		= kdauto("nocdb","kd_noc","4","Noc");
$kd_diagnosa	= $_REQUEST['kd_diagnosa'];
$noc			= $_REQUEST['noc'];

$sql  = " INSERT INTO nocdb (kd_noc,kd_diagnosa,noc)";
$sql .= "VALUES ('$kd_noc','$kd_diagnosa','$noc')";
		mysqli_query($koneksi,$sql)
		or die ("Simpan NOC Error".mysqli_error($koneksi));

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
