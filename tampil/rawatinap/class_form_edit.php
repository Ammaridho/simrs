<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>KLASIFIKASI PASIEN</title>
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
<body id="tab6">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="8" bgcolor="#D9E8F3">Tingkat Ketergantungan</strong></td>
    </tr>
<form name="form1" method="post" action="class_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" id="kd_kunjungan" maxlength="8" size="13" value="<?php echo $data['kd_kunjungan']; ?>">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'];?>">
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Keadaan umum</td>
      <td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class01']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class01']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class01" type="radio" value="1" <?php echo $cek_1;?>>Ringan</td>
<td><input name="class01" type="radio" value="2" <?php echo $cek_2;?>>Sedang</td>
<td><input name="class01" type="radio" value="3" <?php echo $cek_3;?>>Berat
    </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Kebersihan diri, mandi, ganti pakaian</td>
	<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class02']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class02']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class02" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
<td><input name="class02" type="radio" value="2" <?php echo $cek_2;?>>Dibantu sebagian</td>
<td><input name="class02" type="radio" value="3" <?php echo $cek_3;?>>Dibantu penuh
      
</td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Makan dan minum</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class03']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class03']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class03" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
<td><input name="class03" type="radio" value="2" <?php echo $cek_2;?>>Dibantu sebagian</td>
<td><input name="class03" type="radio" value="3" <?php echo $cek_3;?>>Dibantu penuh
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Ambulasi</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class04']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class04']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class04" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
<td><input name="class04" type="radio" value="2" <?php echo $cek_2;?>>Dibantu sebagian</td>
<td><input name="class04" type="radio" value="3" <?php echo $cek_3;?>>Mika-miki / 2 jam
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Observasi tanda-tanda vital</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class05']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class05']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class05" type="radio" value="1" <?php echo $cek_1;?>>Tiap shift</td>
<td><input name="class05" type="radio" value="2" <?php echo $cek_2;?>>Tiap 4 jam</td>
<td><input name="class05" type="radio" value="3" <?php echo $cek_3;?>>Tiap 2 jam
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Pengobatan</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class06']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class06']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class06" type="radio" value="1" <?php echo $cek_1;?>>Oral</td>
<td><input name="class06" type="radio" value="2" <?php echo $cek_2;?>>Parenteral</td>
<td><input name="class06" type="radio" value="3" <?php echo $cek_3;?>>Drips
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Alat yang terpasang</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class07']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class07']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class07" type="radio" value="1" <?php echo $cek_1;?>>Tidak pakai</td>
<td><input name="class07" type="radio" value="2" <?php echo $cek_2;?>>1-2 alat</td>
<td><input name="class07" type="radio" value="3" <?php echo $cek_3;?>>Lebih dari 2 alat
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Suction</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class08']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class08']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class08" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
<td><input name="class08" type="radio" value="2" <?php echo $cek_2;?>>1-5 kali</td>
<td><input name="class08" type="radio" value="3" <?php echo $cek_3;?>>Lebih dari 5 kali
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Perawatan luka</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class09']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class09']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class09" type="radio" value="1" <?php echo $cek_1;?>>Tidak / sederhana</td>
<td><input name="class09" type="radio" value="2" <?php echo $cek_2;?>>Luka Sedang</td>
<td><input name="class09" type="radio" value="3" <?php echo $cek_3;?>>Luka Besar
      </td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Psikologi</td>
<td colspan="5" bgcolor="#FFFFFF">
<?php
if ($data['class10']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['class10']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
?>
<input name="class10" type="radio" value="1" <?php echo $cek_1;?>>Stabil</td>
<td><input name="class10" type="radio" value="2" <?php echo $cek_2;?>>Disorientasi</td>
<td><input name="class10" type="radio" value="3" <?php echo $cek_3;?>>Gelisah
      </td>
    </tr>
<?php
$class_pasien = $class01 + $class02 + $class03 + $class04 + $class05 + $class06 + $class07 + $class08 + $class09 + $class10;
if ($class_pasien>"0" && $class_pasien<="13") {
$min_care = "Minimal Care";
}
elseif ($class_pasien>="14" && $class_pasien<="22") {
$min_care = "Partial Care";
}
elseif ($class_pasien>="23") {
$min_care = "Total Care";
}
if ($class_pasien="0") {
$min_care = "";
}
?>
<tr> 
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"><input name="class_pasien" type="text" value="<?php echo $min_care;?>"/></td>
  </tr>
<tr> 
    <td colspan="6" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Update"> 
    <input type='submit' name='Verify' value='Verify' onClick="form1.action='class_verify.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;"> </td>
  </tr>
   </form>
<?php
include "classview.php"; 
?>
</table>
</body>
</html>
