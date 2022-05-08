<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_faktor   = $_REQUEST['kd_faktor'];
$faktor   = $_REQUEST['faktor'];
 
	$sql  = " UPDATE faktordb SET
                  nama_faktor='$nama_faktor'
                  WHERE kd_faktor='$kd_faktor' ";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/etiologi_view.php");

?>