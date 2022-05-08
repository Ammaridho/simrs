<?php 
include "../librari/inc.koneksidb.php";
include "laporan_search.php";
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
    <tr bgcolor="#FFFFFF">
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Identitas</strong></div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>Dokter / Perawat</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Klasifikasi</strong></div></td>
      <td width="20%" bgcolor="#D9E8F3"><div align="center"><strong>Kegiatan</strong></div></td>
      <td width="30%" bgcolor="#D9E8F3" colspan="2"><div align="center"><strong>Laporan Shift</strong></div></td>
    </tr>
<?php 
$query ="SELECT kd_unit, COUNT(kd_unit) FROM data_pasien WHERE kd_unit LIKE '%$kd_unit%' AND status='Aktif' GROUP BY kd_unit ORDER BY COUNT(kd_unit) DESC";
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
	$sql = "SELECT kd_kunjungan,prn,nama,DATE_FORMAT(tgl_lahir,'%d-%m-%Y') AS tgl_lahir,kd_unit,kamar,kelas,dpjp,modul,diagnosa_msk FROM data_pasien WHERE kd_unit LIKE '%$kd_unit%' AND status='Aktif' ";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
  ?>
    <tr onmouseover="this.bgColor='lightyellow'" onmouseout="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
      <td valign=top><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></br>
          <a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></br>
          <a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></br><?php echo $data['kelas'];?></a></td>
      <td valign=top><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['dpjp'];?></a></br>
           <a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['modul'];?></br><?php echo $data['diagnosa_msk'];?></a></td>
      <td valign=top>
<?php
       $tanggal=date("Y-m-d");
	$kd_kunjungan = $data[kd_kunjungan];
	$sql1 = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
      	$result1 = @mysqli_query($sql1);
	while ($row = mysql_fetch_array($result1)) {
	if ($row[kd_kunjungan]==$kd_kunjungan) {
	echo "<ul><li>".$row['class_pasien']."</li></ul>";
	}
	}
	?>
</td>
      <td valign=top>
<?php
	$sql2 = "SELECT * FROM adl WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
      	$result2 = @mysqli_query($sql2);
	while ($row = mysql_fetch_array($result2)) {
	if ($row[kd_kunjungan]==$kd_kunjungan) {
	echo "<ul><li>".$row['adl']."</li></ul>";
	}
	}
	?>
</td>
      <td colspan="2" valign=top>
<?php
	$sql3 = "SELECT * FROM handover WHERE kd_kunjungan='$kd_kunjungan' AND tgl_ho='$tanggal'";
      	$result3 = @mysqli_query($sql3);
	while ($row = mysql_fetch_array($result3)) {
	if ($row[kd_kunjungan]==$kd_kunjungan) {
	echo "<ul><li>".$row['shift']." :</br> ".$row['handover']."</li></ul>";
	}
	}
	?>
</td>
</tr>
<?php
}
}
?>
     </tr>
  </table>
</body>
</html>
