<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$username		= $_REQUEST['username'];
//$status		= $_REQUEST['status'];
 
	$sql  = " UPDATE user SET status='Aktif' WHERE username='$username' ";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error".mysqli_connect_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1;url=user_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Akun user sudah aktif!</h2>
</div>
</body>
</html>
