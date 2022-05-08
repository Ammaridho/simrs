<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_gol_obat   = $_REQUEST['kd_gol_obat'];
$gol_obat   = $_REQUEST['gol_obat'];

 
	$sql  = " UPDATE gol_obat SET gol_obat='$gol_obat' WHERE kd_gol_obat='$kd_gol_obat' ";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil disimpan";
	header("Location: obat_gol_view.php");

?>
