<html>
<head>
<title>morse Index</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <?php 
     	$sql = "SELECT * FROM morse WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

$morse01 = $data['morse01'];
$morse02 = $data['morse02'];
$morse03 = $data['morse03'];
$morse04 = $data['morse04'];
$morse05 = $data['morse05'];
$morse06 = $data['morse06'];
$morse_pasien = $morse01 + $morse02 + $morse03 + $morse04 + $morse05 + $morse06;

if ($morse_pasien>="15") {
$min_care = "Berisiko";
}
elseif ($morse_pasien>="13" && $morse_pasien<="14") {
$min_care = "Risiko sedang";
}
elseif ($morse_pasien>="12" && $morse_pasien<="11") {
$min_care = "Risiko tinggi";
}
if ($morse_pasien<="9") {
$min_care = "Risiko sangat tinggi";
}
?>
    <tr bgcolor="#FFFFFF">
      <td><b><?php echo $data['tanggal'];?></b></td>
      <td><b><?php echo $morse_pasien;?></b></td>
      <td><b><?php echo $data['morse_pasien'];?></b></td>
      <td>
<?php
if ($data['morse_pasien']=="") {
echo "<a href='morse_form_edit.php?kd_kunjungan=".$data['kd_kunjungan']."&tanggal=".$data['tanggal']."'>Edit</a>";
}
else {
echo "<a href='morse_print.php?kd_kunjungan=".$data['kd_kunjungan']."&tanggal=".$data['tanggal']."'>Print</a>";
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
