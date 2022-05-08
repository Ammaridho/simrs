<?php 
include "../librari/inc.koneksidb.php"; 
?>
<html>
<head>
<title>Handover</title>
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
     <?php
	$sql2 = "SELECT * FROM data_pasien,handover WHERE data_pasien.kd_kunjungan=handover.kd_kunjungan ORDER BY kd_ho DESC LIMIT =2";
      	$qry2 = mysqli_query($koneksi,$sql2) or die ("gagal Query");
	while ($data =mysqli_fetch_array($qry2)) {
	?>
<td  width="10%" bgcolor="#FFFFFF"><a href="../renpra/handover_edit.php?kd_ho=<?php echo $data['kd_ho'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['tgl_ho'];?></a></td>
<td  width="10%" bgcolor="#FFFFFF"><a href="../renpra/handover_edit.php?kd_ho=<?php echo $data['kd_ho'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['jam_ho'];?></a></td>
<td  width="10%" bgcolor="#FFFFFF"><a href="../renpra/handover_edit.php?kd_ho=<?php echo $data['kd_ho'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['shift'];?></a></td>
<td  width="69%" bgcolor="#FFFFFF"><?php echo $data['handover'];?></td>
</tr>
  
<?php
}
?>

  </table>
</body>
</html>
