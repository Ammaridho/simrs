<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_gol_tm   = $_REQUEST['kd_gol_tm'];
$gol_tm   = $_REQUEST['gol_tm'];
 
	$sql  = " UPDATE gol_tm SET
                  gol_tm='$gol_tm'
                  WHERE kd_gol_tm='$kd_gol_tm' ";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/kategori_view.php");

?>
