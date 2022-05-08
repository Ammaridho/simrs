<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM barthel WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>BARTHEL INDEX</title>
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
<body id="tab7">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>Barthel Index (Khusus Pasien ICP Stroke)</strong></td>
    </tr>
<form name="form1" method="post" action="barthel_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" id="kd_kunjungan" maxlength="8" size="13" value="<?php echo $data['kd_kunjungan']; ?>">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'];?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mengontrol BAB</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel01']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['barthel01']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['barthel01']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="barthel01" type="radio" value="0" <?php echo $cek_0;?>>Inkontinen/tidak teratur</br>
<input name="barthel01" type="radio" value="1" <?php echo $cek_1;?>>Kadang inkontinen (1x/mgg)</br>
<input name="barthel01" type="radio" value="2" <?php echo $cek_2;?>>Kontinen teratur</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mengontrol BAK</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel02']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['barthel02']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['barthel02']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="barthel02" type="radio" value="0" <?php echo $cek_0;?>>Inkontinen atau pakai kateter dan tidak terkontrol</br>
<input name="barthel02" type="radio" value="1" <?php echo $cek_1;?>>Kadang-kadang inkontinen (max 1x/24 jam)</br>
<input name="barthel02" type="radio" value="2" <?php echo $cek_2;?>>Kontinen (untuk lebih dari 7 hari)</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Membersihkan diri, melap muka, menyisir rambut, menyikat gigi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel03']=="0") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['barthel03']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="barthel03" type="radio" value="0" <?php echo $cek_0;?>>Butuh orang lain</br>
<input name="barthel03" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Penggunaan toilet</br> Pergi ke dan dari WC </br>(melepas, memakai celana, menyeka, menyiram)</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel04']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['barthel04']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['barthel04']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="barthel04" type="radio" value="0" <?php echo $cek_0;?>>Tergantung pertolongan orang lain</br>
<input name="barthel04" type="radio" value="1" <?php echo $cek_1;?>>Perlu pertolongan pada beberapa aktivitas tetapi dapat mengerjakan sendiri beberapa aktivitas lain</br>
<input name="barthel04" type="radio" value="2" <?php echo $cek_2;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Makan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel05']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['barthel05']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['barthel05']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="barthel05" type="radio" value="0" <?php echo $cek_0;?>>Tidak mampu</br>
<input name="barthel05" type="radio" value="1" <?php echo $cek_1;?>>Perlu seseorang untuk memotong makanan</br>
<input name="barthel05" type="radio" value="2" <?php echo $cek_2;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpindah tempat dari tidur ke duduk</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel06']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['barthel06']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['barthel06']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
elseif ($data['barthel06']=="3") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
}
?>
<input name="barthel06" type="radio" value="0" <?php echo $cek_0;?>>Tidak mampu</br>
<input name="barthel06" type="radio" value="1" <?php echo $cek_1;?>>Perlu bantuan untuk duduk (2 orang)</br>
<input name="barthel06" type="radio" value="2" <?php echo $cek_2;?>>Bantuan minimal (1 0rang)</br>
<input name="barthel06" type="radio" value="3" <?php echo $cek_3;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi/berjalan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel07']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['barthel07']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['barthel07']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
elseif ($data['barthel07']=="3") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
}
?>
<input name="barthel07" type="radio" value="0" <?php echo $cek_0;?>>Tidak mampu</br>
<input name="barthel07" type="radio" value="1" <?php echo $cek_1;?>>Bisa berjalan dengan kursi roda</br>
<input name="barthel07" type="radio" value="2" <?php echo $cek_2;?>>Berjalan dengan bantuan 1 orang/<i>walker</i></br>
<input name="barthel07" type="radio" value="3" <?php echo $cek_3;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpakaian</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel08']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['barthel08']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['barthel08']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="barthel08" type="radio" value="0" <?php echo $cek_0;?>>Tergantung orang lain</br>
<input name="barthel08" type="radio" value="1" <?php echo $cek_1;?>>Sebagian dibantu (mis : mengancingkan baju)</br>
<input name="barthel08" type="radio" value="2" <?php echo $cek_2;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Naik turun tangga</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel09']=="0") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['barthel09']=="1") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['barthel09']=="2") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="barthel09" type="radio" value="0" <?php echo $cek_0;?>>Tidak Mampu</br>
<input name="barthel09" type="radio" value="1" <?php echo $cek_1;?>>Butuh pertolongan</br>
<input name="barthel09" type="radio" value="2" <?php echo $cek_2;?>>Mandiri</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mandi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel10']=="0") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['barthel10']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="barthel10" type="radio" value="0" <?php echo $cek_0;?>>Tergantung orang lain</br>
<input name="barthel10" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
</tr>

<?php
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
<tr> 
    <td bgcolor="#FFFFFF">Barthel index</td>
    <td bgcolor="#FFFFFF"><input name="barthel_pasien" type="text" value="<?php echo $min_care;?>"/></td>
  </tr>
<tr> 
    <td colspan="2" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Update"> 
    <input type='submit' name='Verify' value='Verify' onClick="form1.action='barthel_verify.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;"> </td>
  </tr>
   </form>
</table>
</body>
</html>
