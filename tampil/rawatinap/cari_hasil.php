<?php 
include "../librari/inc.koneksidb.php";
include "cari.php";
?>
<html>
<head>
<title>Ketenagaan</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<?php 
$kd_unit=$_REQUEST['kd_unit'];
$query ="SELECT kd_unit, COUNT(kd_unit) FROM pasien_rawat WHERE kd_unit LIKE '%$kd_unit%' AND status='Aktif' GROUP BY kd_unit ORDER BY COUNT(kd_unit) DESC";
$result =mysqli_query($query) or die(mysql_error());
while($data=mysql_fetch_array($result)){
?>
<tr bgcolor="#CCCCCC">
<td colspan="7"><?php echo $data['kd_unit'];?></td>
</tr>  
<tr bgcolor="#FFFFFF">
<?php 
	$kd_unit = $data[kd_unit];
	$sql = "SELECT * FROM data_pasien,pasien_rawat WHERE pasien_rawat.kd_unit LIKE '%$kd_unit%' 
		AND data_pasien.prn=pasien_rawat.prn 
		AND pasien_rawat.status='Aktif'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
?>
<tr onmouseover="this.bgColor='lightyellow'" onmouseout="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
<td width="5%"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $no;?></a></td>
<td width="15%"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></td>
<td width="20%"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></td>
<td width="15%"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['tgl_lahir'];?></a></td>
<td width="15%"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></a></td>
<td width="20%"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kelas'];?></a></td>
<td width="10%">
<div align="center"><a href="pasien_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>">Edit</a></div>
</td>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
