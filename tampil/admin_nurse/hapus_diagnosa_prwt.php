<?php 
include "../librari/inc.koneksidb.php";
include "inc.session.php";
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {
$sql = "DELETE FROM diagnosadb WHERE kd_diagnosa='$kdhapus'";
mysql_query($sql, $koneksi) 
or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=diagnosa_prwt_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Ops !!</h1>
<h2>Diagnosa berhasil dihapus!</h2>
</div>
</body>
</html>
