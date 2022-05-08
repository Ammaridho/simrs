<html>
<head>
<title>Discharge plan</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
 <?php 
     	$sql = "SELECT * FROM dp WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

$dp01 = $data['dp01'];
$dp02 = $data['dp02'];
$dp03 = $data['dp03'];
$dp04 = $data['dp04'];
$dp05 = $data['dp05'];
$dp06 = $data['dp06'];
$dp07 = $data['dp07'];
$dp08 = $data['dp08'];
$dp09 = $data['dp09'];
$dp10 = $data['dp10'];
$dp11 = $data['dp11'];
$dp12 = $data['dp12'];
$dp13 = $data['dp13'];
$dp14 = $data['dp14'];

$dp_pasien = $dp01 + $dp02 + $dp03 + $dp04 + $dp05 + $dp06 + $dp07 + $dp08 + $dp09 + $dp10 + $dp11 + $dp12 + $dp13 + $dp14;
if ($dp_pasien<"16") {
$min_care = "Kategori 1";
}
elseif ($dp_pasien>="16" && $dp_pasien<="22") {
$min_care = "Kategori 2";
}
elseif ($dp_pasien>="23" && $dp_pasien<="43") {
$min_care = "Kategori 3";
}
if ($dp_pasien>"43") {
$min_care = "Kategori 4";
}

?>
    <tr bgcolor="#FFFFFF">
      <td><b><?php echo $data['tanggal'];?></b></td>
      <td><b><?php echo $dp_pasien;?></b></td>
      <td><b><?php echo $data['dp_pasien'];?></b></td>
      <td>
<?php
if ($data['dp_pasien']=="") {
echo "<a href='dp_form_edit.php?kd_kunjungan=".$data['kd_kunjungan']."&tanggal=".$data['tanggal']."'>Edit</a>";
}
else {
echo "<a href='dp_print.php?kd_kunjungan=".$data['kd_kunjungan']."&tanggal=".$data['tanggal']."'>Print</a>";
}
?>
</td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
