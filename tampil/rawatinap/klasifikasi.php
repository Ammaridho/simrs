<?php 
include "../librari/inc.koneksidb.php"; 
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
    <tr>
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>Klasifikasi Pasien <?php echo date("d-m-Y");?></strong></div></td>
<tr bgcolor="#FFFFFF">
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>PRN</strong></div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>Nama </strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Kamar</strong></div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>DPJP</strong></div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Ka Modul</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Klasifikasi</strong></div></td>
    </tr>
<?php 
$query ="SELECT kd_unit, COUNT(kd_unit) FROM data_pasien WHERE status='Aktif' GROUP BY kd_unit ORDER BY COUNT(kd_unit) DESC";
$result =mysqli_query($query) or die(mysql_error());
while($data=mysql_fetch_array($result)){
	$no++;
  ?>
    <tr bgcolor="#D9E8F3">
      <td colspan="6"><?php echo $data['kd_unit'];?></td>
    </tr>  
    <tr bgcolor="#FFFFFF">
<?php 
$kd_unit = $data[kd_unit];
	$sql = "SELECT kd_kunjungan,prn,nama,DATE_FORMAT(tgl_lahir,'%d-%m-%Y') AS tgl_lahir,kd_unit,kamar,dpjp,modul FROM data_pasien WHERE status='Aktif' AND kd_unit='$kd_unit'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
  ?>
    <tr onmouseover="this.bgColor='lightyellow'" onmouseout="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['dpjp'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['modul'];?></a></td>
<td width="16%" bgcolor="#FFFFFF">
<?php
	$tanggal=date("Y-m-d");
	$kd_kunjungan = $data[kd_kunjungan];
	$sql2 = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
      	$qry2 = @mysqli_query($sql2, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry2)) {

echo "".$data['class_pasien']."";
?>
</td>
</tr>
<?php
}
}
}
?>
     </tr>
  </table>
</body>
</html>
