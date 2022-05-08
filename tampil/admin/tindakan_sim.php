<?php 
include "../librari/config.php";
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";


# Baca variabel Form (If Register Global ON)
$kd_tm		= kdauto("tm_db","kd_tm","8","TM");
$gol_tm		= $_REQUEST['gol_tm'];
$nama_tm		= $_REQUEST['nama_tm'];
$harga_tm		= $_REQUEST['harga_tm'];
$jasa_tm		= $_REQUEST['jasa_tm'];

$sql  = " INSERT INTO tm_db (kd_tm,gol_tm,nama_tm,harga_tm,jasa_tm)";
$sql .= "VALUES ('$kd_tm','$gol_tm','$nama_tm','$harga_tm','$jasa_tm')";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="0;url=tindakan_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Database Tindakan berhasil ditambahkan !</h2>
</div>
</body>
</html>
