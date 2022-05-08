<?php 
include "../librari/inc.koneksidb.php"; 
?>
<html>
<head>
<title>DIAGNOSA KEPERAWATAN</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#FFFFFF">
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>Tanggal</strong></div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>Jam</strong></div></td>
      <td width="60%" bgcolor="#D9E8F3"><div align="center"><strong>Diagnosa</strong></div></td>
      <td width="8%" bgcolor="#D9E8F3"><div align="center"></div></td>
    </tr>
<?php 
      $kd_kunjungan = $_GET['kd_kunjungan'];
	$sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['tanggal_dx'];?></td>
      <td><?php echo $data['jam_dx'];?></td>
      <td><?php echo $data['nama_diagnosa'];?> <?php echo $data['bd'];?></td>
      <td><a href="diagnosa_hapus.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&nama_diagnosa=<?php echo $data['nama_diagnosa'];?>">Hapus</a></td>
<?php
}
?>
  </table>
</body>
</html>
