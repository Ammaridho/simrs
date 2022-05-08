<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_nic   = $_REQUEST['kd_nic'];
$nic   = $_REQUEST['nic'];
 
	$sql  = " UPDATE nicdb SET
                  nic='$nic'
                  WHERE kd_nic='$kd_nic' ";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/nic_view.php");

?>
