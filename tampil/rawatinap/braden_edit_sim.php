<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$braden01= $_REQUEST['braden01'];
$braden02= $_REQUEST['braden02'];
$braden03= $_REQUEST['braden03'];
$braden04= $_REQUEST['braden04'];
$braden05= $_REQUEST['braden05'];
$braden06= $_REQUEST['braden06'];

 
$sql  = " UPDATE braden SET 
braden01='$braden01',
braden02='$braden02',
braden03='$braden03',
braden04='$braden04',
braden05='$braden05',
braden06='$braden06'
WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
