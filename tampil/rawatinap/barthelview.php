<html>
<head>
<title>Barthel Index</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <?php 
     	$sql = "SELECT * FROM barthel WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

$barthel01 = $data['barthel01'];
$barthel02 = $data['barthel02'];
$barthel03 = $data['barthel03'];
$barthel04 = $data['barthel04'];
$barthel05 = $data['barthel05'];
$barthel06 = $data['barthel06'];
$barthel07 = $data['barthel07'];
$barthel08 = $data['barthel08'];
$barthel09 = $data['barthel09'];
$barthel10 = $data['barthel10'];
$barthel_pasien = $barthel01 + $barthel02 + $barthel03 + $barthel04 + $barthel05 + $barthel06 + $barthel07 + $barthel08 + $barthel09 + $barthel10;

if ($barthel_pasien<="8") {
$min_care = "Ketergantungan berat";
}
elseif ($barthel_pasien>="9" && $barthel_pasien<="11") {
$min_care = "Ketergantungan sedang";
}
elseif ($barthel_pasien>="12" && $barthel_pasien<="19") {
$min_care = "Ketergantungan ringan";
}
if ($barthel_pasien>="20") {
$min_care = "Mandiri";
}
?>
    <tr bgcolor="#FFFFFF">
      <td><b><?php echo $data['tanggal'];?></b></td>
      <td><b><?php echo $barthel_pasien;?></b></td>
      <td><b><?php echo $data['barthel_pasien'];?></b></td>
      <td><?php
if ($data['barthel_pasien']=="") {
echo "<a href='barthel_form_edit.php?kd_kunjungan=".$data['kd_kunjungan']."&tanggal=".$data['tanggal']."'>Edit</a>";
}
else {
echo "<a href='barthel_print.php?kd_kunjungan=".$data['kd_kunjungan']."&tanggal=".$data['tanggal']."'>Print</a>";
}
?></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
