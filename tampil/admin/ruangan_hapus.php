<?php 
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {
$sql = "DELETE FROM ruang WHERE kode_bed='$kdhapus'";
mysqli_query($koneksi,$sql) 
or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil dihapus";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1;url=ruangan_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h2>Database ruangan berhasil dihapus!</h2>
</div>
</body>
</html>
