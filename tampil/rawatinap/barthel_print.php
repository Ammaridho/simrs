<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM barthel WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
header("Content-type: application/msword");
header("Content-disposition: inline; filename=$kd_kunjungan&$tanggal.doc");
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
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
    <tr>
      <td colspan="2" bgcolor="#FFFFFF"><strong>Barthel Index (Khusus Pasien ICP Stroke)</strong></td>
    </tr>
<form name="form1" method="post" action="barthel_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" id="kd_kunjungan" maxlength="8" size="13" value="<?php echo $data['kd_kunjungan']; ?>">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'];?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mengontrol BAB</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel01']=="0") {
echo "Inkontinen/tidak teratur";
}
elseif ($data['barthel01']=="1") {
echo "Kadang inkontinen (1x/mgg)";
}
elseif ($data['barthel01']=="2") {
echo "Kontinen teratur";
}
else {
echo "Tidak ada data";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mengontrol BAK</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel02']=="0") {
echo "Inkontinen atau pakai kateter dan tidak terkontrol";
}
elseif ($data['barthel02']=="1") {
echo "Kadang-kadang inkontinen (max 1x/24 jam)";
}
elseif ($data['barthel02']=="2") {
echo "Kontinen (untuk lebih dari 7 hari)";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Membersihkan diri, melap muka, menyisir rambut, menyikat gigi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel03']=="0") {
echo "Butuh orang lain";
}
elseif ($data['barthel03']=="1") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Penggunaan toilet</br> Pergi ke dan dari WC </br>(melepas, memakai celana, menyeka, menyiram)</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel04']=="0") {
echo "Tergantung pertolongan orang lain";
}
elseif ($data['barthel04']=="1") {
echo "Perlu pertolongan pada beberapa aktivitas tetapi dapat mengerjakan sendiri beberapa aktivitas lain";
}
elseif ($data['barthel04']=="2") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Makan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel05']=="0") {
echo "Tidak mampu";
}
elseif ($data['barthel05']=="1") {
echo "Perlu seseorang untuk memotong makanan";
}
elseif ($data['barthel05']=="2") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpindah tempat dari tidur ke duduk</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel06']=="0") {
echo "Tidak mampu";
}
elseif ($data['barthel06']=="1") {
echo "Perlu bantuan untuk duduk (2 orang)";
}
elseif ($data['barthel06']=="2") {
echo "Bantuan minimal (1 0rang)";
}
elseif ($data['barthel06']=="3") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi/berjalan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel07']=="0") {
echo "Tidak mampu";
}
elseif ($data['barthel07']=="1") {
echo "Bisa berjalan dengan kursi roda";
}
elseif ($data['barthel07']=="2") {
echo "Berjalan dengan bantuan 1 orang/<i>walker</i>";
}
elseif ($data['barthel07']=="3") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpakaian</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel08']=="0") {
echo "Tergantung orang lain";
}
elseif ($data['barthel08']=="1") {
echo "Sebagian dibantu (mis : mengancingkan baju)";
}
elseif ($data['barthel08']=="2") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Naik turun tangga</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel09']=="0") {
echo "Tidak Mampu";
}
elseif ($data['barthel09']=="1") {
echo "Butuh pertolongan";
}
elseif ($data['barthel09']=="2") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mandi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['barthel10']=="0") {
echo "Tergantung orang lain";
}
elseif ($data['barthel10']=="1") {
echo "Mandiri";
}
else {
echo "";
}
?>
</td>
</tr>
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
$barthel_total = $barthel01 + $barthel02 + $barthel03 + $barthel04 + $barthel05 + $barthel06 + $barthel07 + $barthel08 + $barthel09 + $barthel10;

if ($barthel_total<="8") {
$min_care = "Ketergantungan berat";
}
elseif ($barthel_total>="9" && $barthel_total<="11") {
$min_care = "Ketergantungan sedang";
}
elseif ($barthel_total>="12" && $barthel_total<="19") {
$min_care = "Ketergantungan ringan";
}
if ($barthel_total>="20") {
$min_care = "Mandiri";
}
}
?>
<tr> 
    <td bgcolor="#FFFFFF"><b>Skor Barthel index</b></td>
    <td bgcolor="#FFFFFF"><?php echo $min_care;?></td>
  </tr>
</form>
</table>
</body>
</html>
