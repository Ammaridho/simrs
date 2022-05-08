<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$prn		= $_REQUEST['prn'];
$tgl_masuk	= $_REQUEST['tgl_masuk'];
$jam_masuk	= $_REQUEST['jam_masuk'];
$ruang		= $_REQUEST['ruang'];
$kamar		= $_REQUEST['kamar'];
$kelas		= $_REQUEST['kelas'];
$bed		= $_REQUEST['bed'];
$dpjp		= $_REQUEST['dpjp'];
$modul		= $_REQUEST['modul'];
$diagnosa_masuk	= $_REQUEST['diagnosa_masuk'];
$diagnosa_keluar= $_REQUEST['diagnosa_keluar'];
$status		= $_REQUEST['status'];
//$tgl_keluar	= $_REQUEST['tgl_keluar'];
//$jam_keluar	= $_REQUEST['jam_keluar'];



	$sql  = " INSERT INTO pasien_rawat (kd_kunjungan,prn,tgl_masuk,jam_masuk,ruang,kamar,kelas,bed,dpjp,modul,diagnosa_masuk,diagnosa_keluar,status)";
	$sql .=	" VALUES ('$kd_kunjungan','$prn','$tgl_masuk','$jam_masuk','$ruang','$kamar','$kelas','$bed','$dpjp','$modul','$diagnosa_masuk','$diagnosa_keluar','Aktif')";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_error($koneksi));

# Baca variabel Form (If Register Global ON)
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];

$sql  = " UPDATE reg SET
	selesai='Rawat'	
	WHERE kd_kunjungan='$kd_kunjungan' ";
	mysqli_query($koneksi,$sql) 
		  or die ("Maaf, pendaftaran rawat inap belum berhasil !".mysqli_error());

	header("Location: pasien_ri.php");
?>
