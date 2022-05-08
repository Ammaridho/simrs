<?php 
include "../librari/inc.koneksidb.php";
include "inc.session.php";
$blokir = $_REQUEST['blokir'];

if ($blokir !="") {
$sql = "UPDATE staffdb SET status='No' WHERE nik='$blokir'";
query($sql, $koneksi) 
or die ("SQL Error".error());

	$pesan= "Data berhasil disimpan";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=staff_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Ops !!</h1>
<h2>Staff berhasil diblokir!</h2>
</div>
</body>
</html>
