<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
	if ($data['kaji_awal02']=="") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	?>
	
	<?php echo $cek_1;?>
	<?php echo $cek_2;?>
	<?php echo $cek_3;?>
	<?php echo $cek_4;?>
	<?php echo $cek_5;?>
</body>
</html>
