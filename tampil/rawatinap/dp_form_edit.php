<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM dp WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}

?>
<html>
<head>
<title>dp INDEX</title>
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
<body id="tab2">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>Pengkajian rencana pulang</strong></td>
    </tr>
<form name="form1" method="post" action="dp_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" id="kd_kunjungan" maxlength="8" size="13" value="<?php echo $data['kd_kunjungan']; ?>">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'];?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Selama ini menggunakan pendamping dalam melakukan aktifitas sehari hari, dalam pemberian obat atau home care</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp01']=="2") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp01']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp01" type="radio" value="2" title="BAB tidak dapat dikontrol" <?php echo $cek_0;?>>Ya</br>
<input name="dp01" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Riwayat pernah berobat ke puskesmas /rumah sakit</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp02']=="10") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp02']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp02" type="radio" value="10" <?php echo $cek_0;?>>Ya</br>
<input name="dp02" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Umur</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp03']=="1") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp03']=="2") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp03" type="radio" value="1" <?php echo $cek_0;?>>Kurang dari 65 tahun</br>
<input name="dp03" type="radio" value="2" <?php echo $cek_1;?>>Lebih dari 65 tahun</br></td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mental status</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp04']=="1") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['dp04']=="2") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['dp04']=="10") {
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
<input name="dp04" type="radio" value="1" <?php echo $cek_0;?>>Tanda & Rasional</br>
<input name="dp04" type="radio" value="2" <?php echo $cek_1;?>>Bingung</br>
<input name="dp04" type="radio" value="10" <?php echo $cek_2;?>>Koma</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Kebutuhan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp05']=="1") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['dp05']=="2") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['dp05']=="5") {
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
<input name="dp05" type="radio" value="1" <?php echo $cek_0;?>>Tidak Perlu bantuan</br>
<input name="dp05" type="radio" value="2" <?php echo $cek_1;?>>Sedikit Bantuan</br>
<input name="dp05" type="radio" value="5" <?php echo $cek_2;?>>Perlu Bantuan</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpindah tempat dari tidur ke duduk</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp06']=="1") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['dp06']=="2") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['dp06']=="10") {
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
<input name="dp06" type="radio" value="1" <?php echo $cek_0;?>>Tidak Perlu bantuan</br>
<input name="dp06" type="radio" value="2" <?php echo $cek_1;?>>Sedikit Bantuan</br>
<input name="dp06" type="radio" value="10" <?php echo $cek_2;?>>Perlu Bantuan</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp07']=="1") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['dp07']=="2") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['dp07']=="3") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['dp07']=="4") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
$cek_4 = "";
}
elseif ($data['dp07']=="5") {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
?>
<input name="dp07" type="radio" value="1" <?php echo $cek_0;?>>Mandiri</br>
<input name="dp07" type="radio" value="2" <?php echo $cek_1;?>>Perlu  pendamping</br>
<input name="dp07" type="radio" value="3" <?php echo $cek_2;?>>Perlu bantuan peralatan</br>
<input name="dp07" type="radio" value="4" <?php echo $cek_3;?>>Perlu bantuan peralatan dan pendamping</br>
<input name="dp07" type="radio" value="5" <?php echo $cek_4;?>>Terbaring
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan ketergantungan penuh dengan peralatan medis</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp08']=="5") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp08']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp08" type="radio" value="5" <?php echo $cek_0;?>>Ya</br>
<input name="dp08" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan pendamping dalam perjalanan penyakitnya</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp09']=="10") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp09']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp09" type="radio" value="10" <?php echo $cek_0;?>>Ya</br>
<input name="dp09" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan perawatan minimal di rumah</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp10']=="2") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp10']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp10" type="radio" value="2" <?php echo $cek_0;?>>Ya</br>
<input name="dp10" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan arahan untuk masalah sosial, keluarga , masalah keuangan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp11']=="2") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp11']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp11" type="radio" value="5" <?php echo $cek_0;?>>Ya</br>
<input name="dp11" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan arahan perawatan langsung</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp12']=="2") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp12']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp12" type="radio" value="2" <?php echo $cek_0;?>>Ya</br>
<input name="dp12" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan Rehabilitasi Medis</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp13']=="2") {
$cek_0 = "checked";
$cek_1 = "";
}
elseif ($data['dp13']=="1") {
$cek_0 = "";
$cek_1 = "checked";
}
else {
$cek_0 = "";
$cek_1 = "";
}
?>
<input name="dp13" type="radio" value="2" <?php echo $cek_0;?>>Ya</br>
<input name="dp13" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Akomodasi lain</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['dp14']=="1") {
$cek_0 = "checked";
$cek_1 = "";
$cek_2 = "";
}
elseif ($data['dp14']=="5") {
$cek_0 = "";
$cek_1 = "checked";
$cek_2 = "";
}
elseif ($data['dp14']=="10") {
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
<input name="dp14" type="radio" value="1" <?php echo $cek_0;?>>Tidak memerlukan</br>
<input name="dp14" type="radio" value="5" <?php echo $cek_1;?>>Memerlukan selama di RS, komunitas RS</br>
<input name="dp14" type="radio" value="10" <?php echo $cek_2;?>>Memerlukan untuk di rumah secara berkala</td>
</tr>

<?php
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
<tr> 
    <td bgcolor="#FFFFFF">Total skor</td>
    <td bgcolor="#FFFFFF"><b><?php echo $min_care;?></b><input name="dp_pasien" type="hidden" value="<?php echo $min_care;?>"/></td>
  </tr>
<tr> 
    <td colspan="2" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Update"> 
    <input type='submit' name='Verify' value='Verify' onClick="form1.action='dp_verify.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;"> </td>
  </tr>
   </form>
<?php
include "dpview.php"; 
?>
</table>
</body>
</html>
