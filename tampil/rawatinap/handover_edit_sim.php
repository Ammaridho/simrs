<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_ho		= $_REQUEST['kd_ho'];
$kd_kunjungan	= $_REQUEST['kd_kunjungan'];
$tgl_ho	= $_REQUEST['tgl_ho'];
$jam_ho	= $_REQUEST['jam_ho'];
$shift	= $_REQUEST['shift'];
$template= $_REQUEST['template'];
$keterangan	= $_REQUEST['keterangan'];

	$sql  = " UPDATE handover SET
              	  kd_kunjungan='$kd_kunjungan',
		  tgl_ho='$tgl_ho',
		  jam_ho='$jam_ho',
		  shift='$shift',
		  handover='$template',
		  keterangan='$keterangan'
		  WHERE  kd_ho='$kd_ho'";
	mysqli_query($koneksi, $sql) 
		  or die ("SQL Error".mysql_error());

include "handover_form.php";
?>
