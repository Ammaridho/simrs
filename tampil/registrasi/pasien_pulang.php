<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_GET['kd_kunjungan'];

	$sql  = " UPDATE reg SET selesai='Selesai'
                  WHERE kd_kunjungan='$kd_kunjungan' ";
			mysqli_query($koneksi,$sql) 
		  	or die ("SQL Error".mysqli_connect_error()); 

include "pasien_rj.php";
?>

