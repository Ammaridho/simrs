<?php 
include "../librari/config.php";
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

# Baca variabel Form (If Register Global ON)
$kd_klinik		= kdauto("klinikdb","kd_klinik","4","");
$kategori   = $_REQUEST['kategori'];
$nama_klinik		= $_REQUEST['nama_klinik'];

$sql  = " INSERT INTO klinikdb (kd_klinik,kd_gol_tm,nama_klinik)";
$sql .= "VALUES ('$kd_klinik','$kategori','$nama_klinik')";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=spesialis_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Spesialisasi berhasil ditambahkan !</h2>
</div>
</body>
</html>
