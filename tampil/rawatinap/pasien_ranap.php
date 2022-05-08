<?php 
include "../librari/inc.koneksidb.php"; 
include "tab_ranap.php";
?>
<html>
<head>
<title>Daftar pasien per tanggal <?php echo date("d-m-Y");?></title>
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
<body id="tab2">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr onMouseOver="this.bgColor='lightblue'"
onmouseout="this.bgColor='#efefef'" bgcolor="#efefef"
>
      <td colspan="7" bgcolor="#CCCCCC"><div align="left"><strong>Daftar pasien per tanggal <?php echo date("d-m-Y");?></strong></div> </td>
    </tr>
<?php 
$query ="SELECT kd_unit, COUNT(kd_unit) FROM pasien_rawat WHERE status='Aktif' GROUP BY kd_unit ORDER BY kd_unit ASC";
$result =mysqli_query($query) or die(mysql_error());
while($data=mysql_fetch_array($result)){
	$no++;
  ?>
    <tr bgcolor="#D9E8F3">
      <td colspan="6"><?php echo $data['kd_unit'];?></td>
    </tr>  
<?php 
	$tanggal = date("Y:m:d");
	$kd_unit = $data[kd_unit];
	$sql = "SELECT * FROM data_pasien,pasien_rawat WHERE pasien_rawat.kd_unit='$kd_unit' AND data_pasien.prn=pasien_rawat.prn AND pasien_rawat.status='Aktif'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
  ?>
    <tr onmouseover="this.bgColor='lightyellow'" onmouseout="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
      <td><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></td>
      <td><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></td>
      <td><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['tgl_lahir'];?></a></td>
      <td><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></a></td>
      <td><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kelas'];?></a></td>
<td width="10%" bgcolor="#FFFFFF">
<div align="center"><a href="pasien_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>">Edit</a></div>
</td>
<?php
}
}
?>
  </table>
</body>
</html>
