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
    <tr bgcolor="#FFFFFF">
     <?php
	$sql2 = "SELECT * FROM adl WHERE kd_kunjungan='$kd_kunjungan' AND (status='Inprogress' OR status='Selesai')";
      	$qry2 = @mysqli_query($sql2, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry2)) {
	?>
<td  width="14%" bgcolor="#FFFFFF"><a href="adledit.php?kd_adl=<?php echo $data['kd_adl'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['tanggal'];?></a></td>
<td  width="20%" bgcolor="#FFFFFF"><a href="adledit.php?kd_adl=<?php echo $data['kd_adl'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['jam'];?></a></td>
<td  width="40%" bgcolor="#FFFFFF"><a href="adledit.php?kd_adl=<?php echo $data['kd_adl'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['adl'];?></a></td>
<td  width="10%" bgcolor="#FFFFFF"><a href="adledit.php?kd_adl=<?php echo $data['kd_adl'];?>&kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['status'];?></a></td>
</tr>
  
<?php
}
?>

  </table>
</body>
</html>
