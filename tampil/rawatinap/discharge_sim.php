<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan	= $_REQUEST['kd_kunjungan'];
$status		= $_REQUEST['status'];
$tgl_keluar	= $_REQUEST['tgl_keluar'];
$jam_keluar	= $_REQUEST['jam_keluar'];
$diagnosa_keluar= $_REQUEST['diagnosa_keluar'];
$template	= $_REQUEST['template'];



	$sql  = " UPDATE pasien_rawat SET
		  diagnosa_keluar = '$diagnosa_keluar',
                  status='$status',
		  tgl_keluar='$tgl_keluar',
		  jam_keluar='$jam_keluar',
		  keterangan='$template'
                  WHERE  kd_kunjungan='$kd_kunjungan'";
	mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: pasien_terdaftar.php");

?>
