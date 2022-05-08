<?php 
include "../librari/inc.session.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

# Baca variabel Form (If Register Global ON)
$kd_diagnosa		= kdauto("diagnosadb","kd_diagnosa","4","Dx");
$nama_diagnosa		= $_REQUEST['nama_diagnosa'];

$sql  = " INSERT INTO diagnosadb (kd_diagnosa,nama_diagnosa)";
$sql .= "VALUES ('$kd_diagnosa','$nama_diagnosa')";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_error($koneksi));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=diagnosa_prwt_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<div align="center"><h1>Okay !!</h1></div>
<div align="center"><h2>Diagnosa berhasil ditambahkan !</h2></div>
</div>
</body>
</html>
<?php
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
