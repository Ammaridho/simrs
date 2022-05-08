<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$tanggal   		= $_REQUEST['tanggal'];
$jam   		= $_REQUEST['jam'];
$shift		= $_REQUEST['shift'];
$nik 			= $_REQUEST['nik'];
$asm_db1	= $_REQUEST['asm_db1'];
$asm_db2	= $_REQUEST['asm_db2'];
$asm_db3	= $_REQUEST['asm_db3'];
$asm_db4	= $_REQUEST['asm_db4'];
$tgl_update	= "0000-00-00";
$jam_update	= "00:00:00";
$jumMK 			= $_REQUEST['jumMK'];

if (isset($_GET['action'])) {
if ($_GET['action'] == "input")
{
for($i = 1; $i <= $jumMK; $i++)
{
    $asm_db1	= $_REQUEST['asm_db1'.$i];
	$asm_db2	= $_REQUEST['asm_db2'.$i];
	$asm_db3	= $_REQUEST['asm_db3'.$i];
	$asm_db4	= $_REQUEST['asm_db4'.$i];
	$status		= $_REQUEST['status'];
      $query = "INSERT INTO pengkajian VALUES('$kd_kunjungan','$tanggal','$jam','$shift','$nik','$asm_db1','$asm_db2','$asm_db3','$asm_db4','$tgl_update','$jam_update','','Draft')";
      mysqli_query($koneksi, $query) or die ("Error".mysqli_error($koneksi));	  
}
}
elseif ($_GET['action'] == "update")
{
for($i = 1; $i <= $jumMK; $i++)
{
    $asm_db1	= $_REQUEST['asm_db1'.$i];
	$asm_db2	= $_REQUEST['asm_db2'.$i];
	$asm_db3	= $_REQUEST['asm_db3'.$i];
	$asm_db4	= $_REQUEST['asm_db4'.$i];
	$tgl_update	= date("Y-m-d");
	$jam_update	= date("H:i:s");
	$update_user= $_REQUEST['nik'];
      $query = "UPDATE pengkajian SET asm_db4='$asm_db4',update_date='$tgl_update',update_time='$jam_update', update_user='$nik', status='Selesai'
	  			WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal' AND asm_db1='$asm_db1' AND asm_db3='$asm_db3'";
      mysqli_query($koneksi, $query) or die ("Error".mysqli_error($koneksi));
}
}
}
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>