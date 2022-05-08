<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM morse WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>Skala Dekubitus morse</title>
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
<body id="tab8">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>Skala Morse</strong></td>
    </tr>
<form name="form1" method="post" action="morse_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" id="kd_kunjungan" maxlength="8" size="13" value="<?php echo $data['kd_kunjungan']; ?>">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'];?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Riwayat jatuh dalam 3 (tiga) bulan terakhir </td>
<td bgcolor="#FFFFFF">
<?php
if ($data['morse01']=="0") {
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['morse01']=="25") {
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="morse01" type="radio" value="0" <?php echo $cek_1;?>>Tidak</br>
<input name="morse01" type="radio" value="25" <?php echo $cek_2;?>>Ya</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Diagnosa sekunder</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['morse02']=="0") {
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['morse02']=="15") {
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="morse02" type="radio" value="0" <?php echo $cek_1;?>>Tidak</br>
<input name="morse02" type="radio" value="15" <?php echo $cek_2;?>>Ya</td></tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Menggunakan alat bantu</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['morse03']=="30") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['morse03']=="15") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
elseif ($data['morse03']=="0") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
}
?>
<input name="morse03" type="radio" value="30" <?php echo $cek_1;?>>Furniture (meja, kursi/sofa, lemari, dll)</br>
<input name="morse03" type="radio" value="15" <?php echo $cek_2;?>>Kruk, tongkat berjalan, walker</br>
<input name="morse03" type="radio" value="0" <?php echo $cek_3;?>>Tidak menggunakan alat bantu/bedrest</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Penggunaan alat kesehatan (IV catheter, Dower catheter, NGT) </td>
<td bgcolor="#FFFFFF">
<?php
if ($data['morse04']=="0") {
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['morse04']=="20") {
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="morse04" type="radio" value="0" <?php echo $cek_1;?>>Tidak </br>
<input name="morse04" type="radio" value="20" <?php echo $cek_2;?>>Ya</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi/pergerakkan </td>
<td bgcolor="#FFFFFF">
<?php
if ($data['morse05']=="0") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['morse05']=="10") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
elseif ($data['morse05']=="20") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
}
?>
<input name="morse05" type="radio" value="0" <?php echo $cek_1;?>>Normal/Bedrest total/immobilisasi</br>
<input name="morse05" type="radio" value="10" <?php echo $cek_2;?>>Mobilisasi lemah</br>
<input name="morse05" type="radio" value="20" <?php echo $cek_3;?>>Terganggu, menggunakan pegangan untuk keseimbangan </td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Status mental</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['morse06']=="0") {
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['morse06']=="15") {
$cek_1 = "";
$cek_2 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
}
?>
<input name="morse06" type="radio" value="0" <?php echo $cek_1;?>>Sadar akan kemampuan dirinya </br>
<input name="morse06" type="radio" value="15" <?php echo $cek_2;?>>Tidak sadar/keterbatasan</td>
</tr>

<?php
$morse_pasien = $morse01 + $morse02 + $morse03 + $morse04 + $morse05 + $morse06;
if ($morse_pasien>="45") {
$min_care = "Risiko tinggi";
}
elseif ($morse_pasien>="25" && $morse_pasien<="44") {
$min_care = "Risiko sedang";
}
elseif ($morse_pasien<="24") {
$min_care = "Risiko rendah";
}
else {
$min_care = "Risiko tidak dapat dihitung";
}
?>
<tr> 
    <td bgcolor="#FFFFFF">morse index</td>
    <td bgcolor="#FFFFFF"><input name="morse_pasien" type="hidden" value="<?php echo $min_care;?>"/><b><?php echo $min_care;?></b></td>
  </tr>
<tr> 
    <td colspan="2" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Update"></td>
  </tr>
   </form>
</table>
</body>
</html>
