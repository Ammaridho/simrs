<?php
include "../../config/config.php";
include "../librari/inc.koneksidb.php";

$query1 = "SELECT * FROM data_pasien,reg WHERE data_pasien.prn=reg.prn AND reg.rawat='Ya'";
$hasil1 = mysqli_query($query1);
$juml1 = mysql_num_rows($hasil1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/hendi/media/css/tab.css" />
</head>
<body>
<ul id="tabnav">
	<li class="tab1"><a href="diagnosascr.php" title="Pasien Rawat Inap">Diagnosa</a></li>
	<li class="tab2"><a href="pasien_ranap.php" title="<?php echo $juml2;?> pasien masih ditangani di UGD ">Pasien Rawat</a></li>
</ul>
</body>
</html>
