<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$nik		= $_REQUEST['nik'];
$status		= $_REQUEST['status'];

 
	$sql  = " UPDATE staffdb SET
		  status='No'
                  WHERE nik='$nik' ";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
