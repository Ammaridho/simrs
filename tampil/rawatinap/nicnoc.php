<?php 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>DIAGNOSA KEPERAWATAN</title>
</head>
<body id="tab2">
  <table>
    <tr>
    <td align="center" width="350"><b>Kriteria</b></td>
    <td align="center"><b>Intervensi</b></td>
    </tr>
    <tr>
    <td width="350" valign=TOP>
        <?php
	$sql3 = "SELECT * FROM noc WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      	$qry3 = @mysqli_query($sql3, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry3)) {
	if ($data[nama_diagnosa]==$nama_diagnosa) {
	echo "<ul><li>".$data['outcome'].", target (".$data['target'].")</li></ul>";
	}
	}
	?>
      </td>
      <td>
<?php
	$sql4 = "SELECT * FROM nic WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      	$qry4 = @mysqli_query($sql4, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry4)) {
	if ($data[nama_diagnosa]==$nama_diagnosa) {
	echo "<ul><li>".$data['intervensi']."</li></ul>";
	}
	}
	?>
	</td>
    </tr>
</table>
</body>
</html>
