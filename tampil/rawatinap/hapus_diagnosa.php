<?php 
include "../librari/inc.koneksidb.php";
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {
$sql = "DELETE FROM dx_keperawatan WHERE kd_kunjungan='$kdhapus' AND nama_diagnosa='$nama_diagnosa'";
mysqli_query($koneksi, $sql) 
or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=diagnosaview.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>WEW !!</h1>
<h2>Diagnosa berhasil dihapus, Bro !</h2>
</div>
</body>
</html>
