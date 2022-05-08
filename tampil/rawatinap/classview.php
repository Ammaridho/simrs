<html>
<head>
<title>Klasifikasi tingkat ketergantungan pasien</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <?php 
    $sql = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysqli_connect_error());
	while ($data=mysqli_fetch_array($qry)) {

$class01 = $data['class01'];
$class02 = $data['class02'];
$class03 = $data['class03'];
$class04 = $data['class04'];
$class05 = $data['class05'];
$class06 = $data['class06'];
$class07 = $data['class07'];
$class08 = $data['class08'];
$class09 = $data['class09'];
$class10 = $data['class10'];
$class_pasien = $class01 + $class02 + $class03 + $class04 + $class05 + $class06 + $class07 + $class08 + $class09 + $class10;

if ($class_pasien<="13") {
$min_care = "Minimal Care";
}
elseif ($class_pasien>="14" && $class_pasien<="22") {
$min_care = "Partial Care";
}
if ($class_pasien>="23") {
$min_care = "Total Care";
}
?>
    <tr bgcolor="#FFFFFF">
      <td><b><?php echo $data['tanggal'];?></b></td>
      <td><b><?php echo $class_pasien;?></b></td>
      <td><b><?php echo $data['class_pasien'];?></b></td>
      <td><a href="class_form_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&tanggal=<?php echo $data['tanggal'];?>">Edit</a></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
