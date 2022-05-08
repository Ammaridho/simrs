<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_diagnosa   = $_REQUEST['kd_diagnosa'];
$nama_diagnosa   = $_REQUEST['nama_diagnosa'];
 
	$sql  = " UPDATE diagnosadb SET
                  nama_diagnosa='$nama_diagnosa'
                  WHERE kd_diagnosa='$kd_diagnosa' ";
	mysqli_query($sql, $koneksi) 
		  or die ("SQL Error".mysqli_error($koneksi));

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/diagnosa_prwt_view.php");

?>
