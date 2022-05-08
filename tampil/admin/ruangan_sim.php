<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_ruang   = $_REQUEST['kd_ruang'];
$kd_lantai   = $_REQUEST['kd_lantai'];
$ruang   = $_REQUEST['ruang'];
$kamar   = $_REQUEST['kamar'];
$kelas   = $_REQUEST['kelas'];
$bed   = $_REQUEST['bed'];
$harga   = $_REQUEST['harga'];
$keterangan   = $_REQUEST['keterangan'];

$sql  = " INSERT INTO ruang (kd_lantai,ruang,kamar,kelas,bed,harga,keterangan)";
$sql .= "VALUES ('$kd_lantai','$ruang','$kamar','$kelas','$bed','$harga','$keterangan')";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1;url=ruangan_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Database ruangan berhasil ditambahkan !</h2>
</div>
</body>
</html>
