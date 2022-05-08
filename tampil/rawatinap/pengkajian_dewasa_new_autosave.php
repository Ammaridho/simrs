<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$tanggal   		= $_REQUEST['tanggal'];
$jam   			= $_REQUEST['jam'];
$shift			= $_REQUEST['shift'];
$nik 			= $_REQUEST['nik'];
$asm_db1	= $_REQUEST['asm_db1'];
$asm_db2	= $_REQUEST['asm_db2'];
$asm_db3	= $_REQUEST['asm_db3'];
$asm_db4	= $_REQUEST['asm_db4'];
$jumMK 			= $_REQUEST['jumMK'];

for($i = 1; $i <= $jumMK; $i++)
{
    $asm_db1	= $_REQUEST['asm_db1'.$i];
	$asm_db2	= $_REQUEST['asm_db2'.$i];
	$asm_db3	= $_REQUEST['asm_db3'.$i];
	$asm_db4	= $_REQUEST['asm_db4'.$i];
      $query = "UPDATE pengkajian SET asm_db4='$asm_db4' WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal' AND asm_db3='$asm_db3'";
      mysqli_query($koneksi,$query);	  
}
?>