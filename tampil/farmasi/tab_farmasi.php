<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";

$prn = $_GET['prn'];
$kd_kunjungan = $_GET['kd_kunjungan'];
// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);


$sql1 = "SELECT * FROM resep WHERE unit='Rajal' AND status='Order' GROUP BY kd_kunjungan";
$qry1 = mysqli_query($koneksi,$sql1) 
		 or die ("SQL Error".mysqli_connect_error());
$juml1 = mysqli_num_rows($qry1);

$sql2 = "SELECT * FROM resep WHERE unit='Ranap' AND status='Order' GROUP BY kd_kunjungan";
$qry2 = mysqli_query($koneksi,$sql2) 
		 or die ("SQL Error".mysqli_connect_error());
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
<li class="tab1"><a href="resep_antrian_rj.php" title="Catatan" target="mainFrame">Rawat Jalan <span class="style3"><?php echo $juml1;?></span></a></li>
<li class="tab2"><a href="resep_antrian_ri.php" title="Resep" target="mainFrame">Rawat Inap <span class="style3"><?php echo $juml2;?></span></a></li>
</ul>
</body>
</html>
