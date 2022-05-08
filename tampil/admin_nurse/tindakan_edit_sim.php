<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_tindakan   = $_REQUEST['kd_tindakan'];
$nama_tindakan   = $_REQUEST['nama_tindakan'];
 
	$sql  = " UPDATE tindakandb SET
                  nama_tindakan='$nama_tindakan'
                  WHERE kd_tindakan='$kd_tindakan' ";
	query($sql, $koneksi) 
		  or die ("SQL Error".error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/tindakan_view.php");

?>
