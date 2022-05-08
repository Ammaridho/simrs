<?php
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>
</title>
</head>
<body>
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
 <tr bgcolor="#DBEAF5">
<td>
<?php
    $kd_kunjungan = $_GET['kd_kunjungan'];
	$sql1 = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan'";
    $result1 = mysqli_query($koneksi, $sql1);
	$data1 = mysqli_num_rows($result1);
	$hasil1 = mysqli_fetch_array($result1);
	if ($data1>=1) {
	include "diagnosaview.php";
	}
	else
	{
      	echo "Tidak ada diagnosa keperawatan";
	}
	?>
</td>
</tr>
</table>
</body>
</html>
