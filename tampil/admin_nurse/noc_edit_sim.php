<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_noc   = $_REQUEST['kd_noc'];
$noc   = $_REQUEST['noc'];
 
	$sql  = " UPDATE nocdb SET
                  noc='$noc'
                  WHERE kd_noc='$kd_noc' ";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/noc_view.php");

?>