<?php 
include "../librari/inc.koneksidb.php";include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

# Baca variabel Form (If Register Global ON)
$kd_diagnosa	= $_REQUEST['kd_diagnosa'];
$nama_diagnosa	= $_REQUEST['nama_diagnosa'];
$kd_faktor		= kdauto("faktordb","kd_faktor","4","Fx");
$nama_faktor	= $_REQUEST['nama_faktor'];

$sql  = " INSERT INTO faktordb (kd_faktor,kd_diagnosa,nama_faktor)";
$sql .= "VALUES ('$kd_faktor','$kd_diagnosa','$nama_faktor')";
			mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error($koneksi));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="0;url=tambah_etiologi.php?kdubah=<?php echo $kd_diagnosa; ?>" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Faktor etiologi berhasil ditambahkan !</h2>
</div>
</body>
</html>
