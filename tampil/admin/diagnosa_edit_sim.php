<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$id_diagnosa   = $_REQUEST['id_diagnosa'];
$group_diagnosa   = $_REQUEST['group_diagnosa'];
 
	$sql  = " UPDATE group_diagnosa SET
                  group_diagnosa='$group_diagnosa'
                  WHERE id_diagnosa='$id_diagnosa' ";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/diagnosa_view.php");

?>
