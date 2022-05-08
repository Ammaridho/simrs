<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "data_pasien.php";
$prn = $_GET['prn'];
$kd_kunjungan = $_GET['kd_kunjungan'];
// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);


$sql1 = "SELECT * FROM reg WHERE reg.tindak_lanjut!='Rawat' AND selesai!='Selesai'";
$qry1 = mysqli_query($koneksi,$sql1) 
		 or die ("Query error :" . mysqli_error($koneksi));
$juml1 = mysqli_num_rows($qry1);

$sql2 = "SELECT * FROM data_pasien,reg,pasien_rawat WHERE data_pasien.prn=reg.prn AND reg.kd_kunjungan=pasien_rawat.kd_kunjungan AND reg.selesai!='Selesai'";
$qry2 = mysqli_query($koneksi,$sql2) 
		 or die ("Query error :" . mysqli_error($koneksi));
$juml2 = mysqli_num_rows($qry2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/css/tab.css" />
<style type="text/css">
<!--
.style3 {color: #FF0000}
-->
</style>
</head>
<body>
<ul id="tabnav">
<li class="tab1"><a href="transaksi_list_rj.php" title="Catatan" target="mainFrame">Rawat Jalan <span class="style3"><?php if($juml1==0) { echo "";} else{ echo $juml1;}?></span></a></li>
</ul>
</body>
</html>
