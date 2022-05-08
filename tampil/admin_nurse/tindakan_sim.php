<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_tindakan		= $_REQUEST['kd_tindakan'];
$nama_tindakan		= $_REQUEST['nama_tindakan'];

$sql  = " INSERT INTO tindakandb (kd_tindakan,nama_tindakan)";
$sql .= "VALUES ('$kd_tindakan','$nama_tindakan')";
	query($sql, $koneksi) 
		  or die ("SQL Error".error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=tindakan_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>tindakan berhasil ditambahkan !</h2>
</div>
</body>
</html>
