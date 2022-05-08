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
  <table>
  <?php 
     	$sql = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

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
      <td><b><?php echo $min_care;?></b></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
