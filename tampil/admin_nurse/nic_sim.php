<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
# Baca variabel Form (If Register Global ON)
$kd_nic		= kdauto("nicdb","kd_nic","4","Nic");
$kd_diagnosa	= $_REQUEST['kd_diagnosa'];
$nic			= $_REQUEST['nic'];

$sql  = " INSERT INTO nicdb (kd_nic,kd_diagnosa,nic)";
$sql .= "VALUES ('$kd_nic','$kd_diagnosa','$nic')";
			mysqli_query($koneksi,$sql)
				or die ("Simpan NOC Error".mysqli_error($koneksi));

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
