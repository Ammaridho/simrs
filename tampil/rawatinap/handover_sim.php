<?php 
include "../librari/inc.koneksidb.php";
	
$template   = $_REQUEST['template'];

if (trim($template)=="") {

	include "handover_form.php"; exit;
}

# Baca variabel Form (If Register Global ON)
$kd_ho		= $_REQUEST['kd_ho'];
$kd_kunjungan	= $_REQUEST['kd_kunjungan'];
$tgl_ho		= $_REQUEST['tgl_ho'];
$jam_ho		= $_REQUEST['jam_ho'];
$shift		= $_REQUEST['shift'];
$template	= $_REQUEST['template'];
$keterangan	= $_REQUEST['keterangan'];

$sql  = " INSERT INTO handover (kd_kunjungan,tgl_ho,jam_ho,shift,handover,keterangan)";
	$sql .=	" VALUES ('$kd_kunjungan','$tgl_ho','$jam_ho','$shift','$template','$keterangan')";
	mysqli_query($koneksi, $sql) 
		  or die ("Laporan Shift sudah dibuat ! Silahkan tekan tombol 'BACK'");

include "handover_form.php";
?>
