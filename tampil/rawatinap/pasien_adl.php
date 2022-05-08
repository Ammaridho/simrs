<?php 
include "../librari/inc.koneksidb.php"; 
?>
<html>
<head>
<title>Rencana ADL</title>
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
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>Rencana ADL tanggal <?php echo date("d-m-Y");?></strong></div></td>
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
	$tanggal = date("Y:m:d");
	$kd_unit = $data[kd_unit];
	$sql2 = "SELECT * FROM data_pasien,adl WHERE data_pasien.kd_kunjungan=adl.kd_kunjungan AND data_pasien.kd_unit='$kd_unit' AND adl.tanggal='$tanggal' AND data_pasien.status='Aktif' AND (adl.status='Inprogress' OR adl.status='Selesai')";
      	$qry2 = @mysqli_query($sql2, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry2)) {
	?>
<td  width="14%" bgcolor="#FFFFFF"><a href="../renpra/adl.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></td>
<td  width="20%" bgcolor="#FFFFFF"><a href="../renpra/adl.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></td>
<td  width="14%" bgcolor="#FFFFFF"><a href="../renpra/adl.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></a></td>
<td  width="40%" bgcolor="#FFFFFF"><a href="../renpra/adl.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['adl'];?></a></td>
<td  width="10%" bgcolor="#FFFFFF"><a href="../renpra/adl.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['status'];?></a></td>
</tr>
<?php
}
}
?>
     </tr>
  </table>
</body>
</html>
