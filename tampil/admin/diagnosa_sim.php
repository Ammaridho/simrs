<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_diagnosa		= $_REQUEST['kd_diagnosa'];
$nama_diagnosa		= $_REQUEST['nama_diagnosa'];

$sql  = " INSERT INTO group_diagnosa (id_diagnosa,group_diagnosa)";
$sql .= "VALUES ('$kd_diagnosa','$nama_diagnosa')";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=diagnosa_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Diagnosa berhasil ditambahkan !</h2>
</div>
</body>
</html>