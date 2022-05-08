<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_klinik   = $_REQUEST['kd_klinik'];
$kategori   = $_REQUEST['kategori'];
$nama_klinik   = $_REQUEST['nama_klinik'];
 
	$sql  = " UPDATE klinikdb SET
                  nama_klinik='$nama_klinik',
				  kd_gol_tm='$kategori'
                  WHERE kd_klinik='$kd_klinik' ";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/spesialis_view.php");

?>
