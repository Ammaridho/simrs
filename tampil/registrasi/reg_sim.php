<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
include "../librari/inc.kodeauto.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan	= kdauto("reg","kd_kunjungan","10",""); 
$prn			= $_REQUEST['prn'];
$tgl_reg		= $_REQUEST['tgl_reg'];
$jam_reg		= $_REQUEST['jam_reg'];
$kd_perujuk		= $_REQUEST['kd_perujuk'];
$kd_asuransi	= $_REQUEST['kd_asuransi'];
$klinik			= $_REQUEST['klinik'];
$spesialisasi	= $_REQUEST['spesialisasi'];
$dokter			= $_REQUEST['dokter'];
$batal			= $_REQUEST['batal'];
$selesai		= $_REQUEST['selesai'];

//cari data registrasi
$query_reg = "SELECT * FROM reg WHERE prn='$prn' AND selesai!='Selesai'";
$hasil_reg = mysqli_query($koneksi,$query_reg);
$data_reg = mysqli_fetch_array($hasil_reg);
$data_reg = mysqli_num_rows($hasil_reg);


if (trim($dokter)=="") {
	$pesan[] = "Nama dokter masih kosong!";
}
if (trim($klinik)=="") {
	$pesan[] = "Nama dokter masih kosong!";
}
if (! count($pesan)==0) {

echo "<b>ERROR :</b><br>";
foreach ($pesan as $indeks=>$pesan_tampil) {
$urut_pesan++;
echo "$urut_pesan . $pesan_tampil<br>";
}
echo "<a href=javascript:history.back()>Kembali</a>";
exit;
}

if ($data_reg >= 1) {
echo "PRN $prn sudah terdaftar atau masih aktif di rawat, silahkan hubungi Admin!";
}

else {
	$sql  = "INSERT INTO reg (kd_kunjungan,prn,tgl_reg,jam_reg,kd_perujuk,kd_asuransi,klinik,spesialisasi,dokter,batal,selesai)";
	$sql .=	"VALUES ('$kd_kunjungan','$prn','$tgl_reg','$jam_reg','$kd_perujuk','$kd_asuransi','$klinik','$spesialisasi','$dokter','Tidak','Aktif')";
	mysqli_query($koneksi,$sql) 
		  or die ("Pendaftaran GAGAL, pasien telah terdaftar ! <a href=\"javascript:history.back()\" align=\"center\">kembali</a>");
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=../antrian/" />
<title>Terima kasih !</title>
</head>
<body id="tab1">
<h3 align="center">Sedang menyimpan...</h3>
<h3 align="center"><img src="../../media/image/facebook.gif"/></h3>
</div>
</body>
</html>
