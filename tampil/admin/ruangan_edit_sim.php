<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kode_bed   = $_REQUEST['kode_bed'];
$kd_lantai   = $_REQUEST['kd_lantai'];
$ruang   = $_REQUEST['ruang'];
$kamar   = $_REQUEST['kamar'];
$kelas   = $_REQUEST['kelas'];
$bed   = $_REQUEST['bed'];
$harga   = $_REQUEST['harga'];
$keterangan   = $_REQUEST['keterangan'];
	
	$sql  = "UPDATE ruang SET
             ruang='$ruang',
			 kamar='$kamar',
			 kelas='$kelas',
			 harga='$harga'
                  WHERE kode_bed='$kode_bed' ";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil disimpan";
	header("Location: ../admin/ruangan_view.php");

?>
