<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM braden WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>Skala Dekubitus Braden</title>
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
      <td colspan="2" bgcolor="#D9E8F3"><strong>Skala Dekubitus Braden</strong></td>
    </tr>
<form name="form1" method="post" action="braden_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" id="kd_kunjungan" maxlength="8" size="13" value="<?php echo $data['kd_kunjungan']; ?>">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'];?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Persepsi sensori</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['braden01']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden01']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden01']=="3") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
$cek_4 = "";
}
elseif ($data['braden01']=="4") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
?>
<input name="braden01" type="radio" value="1" <?php echo $cek_1;?>>Sangat terbatas</br>
<input name="braden01" type="radio" value="2" <?php echo $cek_2;?>>Terbatas</br>
<input name="braden01" type="radio" value="3" <?php echo $cek_3;?>>Sedikit terbatas</br>
<input name="braden01" type="radio" value="4" <?php echo $cek_4;?>>Normal</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Kelembaban</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['braden02']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden02']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden02']=="3") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
$cek_4 = "";
}
elseif ($data['braden02']=="4") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
?>
<input name="braden02" type="radio" value="1" <?php echo $cek_1;?>>Selalu lembab</br>
<input name="braden02" type="radio" value="2" <?php echo $cek_2;?>>Sering lembab</br>
<input name="braden02" type="radio" value="3" <?php echo $cek_3;?>>Kadang-kadang lembab</br>
<input name="braden02" type="radio" value="4" <?php echo $cek_4;?>>Jarang lembab</td></tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Membersihkan diri, melap muka, menyisir rambut, menyikat gigi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['braden03']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden03']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden03']=="3") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
$cek_4 = "";
}
elseif ($data['braden03']=="4") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
?>
<input name="braden03" type="radio" value="1" <?php echo $cek_1;?>>Di tempat tidur</br>
<input name="braden03" type="radio" value="2" <?php echo $cek_2;?>>Terbatas di kursi atau kursi roda</br>
<input name="braden03" type="radio" value="3" <?php echo $cek_3;?>>Kadang-kadang berjalan</br>
<input name="braden03" type="radio" value="4" <?php echo $cek_4;?>>Sering berjalan</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['braden04']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden04']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden04']=="3") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
$cek_4 = "";
}
elseif ($data['braden04']=="4") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
?>
<input name="braden04" type="radio" value="1" <?php echo $cek_1;?>>Tergantung </br>
<input name="braden04" type="radio" value="2" <?php echo $cek_2;?>>Sangat terbatas</br>
<input name="braden04" type="radio" value="3" <?php echo $cek_3;?>>Sedikit terbatas</br>
<input name="braden04" type="radio" value="4" <?php echo $cek_4;?>>Tidak terbatas</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Nutrisi</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['braden05']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden05']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
$cek_4 = "";
}
elseif ($data['braden05']=="3") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "checked";
$cek_4 = "";
}
elseif ($data['braden05']=="4") {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "checked";
}
else {
$cek_1 = "";
$cek_2 = "";
$cek_3 = "";
$cek_4 = "";
}
?>
<input name="braden05" type="radio" value="1" <?php echo $cek_1;?>>Sangat buruk</br>
<input name="braden05" type="radio" value="2" <?php echo $cek_2;?>>Tidak cukup</br>
<input name="braden05" type="radio" value="3" <?php echo $cek_3;?>>Cukup</br>
<input name="braden05" type="radio" value="4" <?php echo $cek_4;?>>Sangat Baik</td>
</tr>

<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Pergesekan</td>
<td bgcolor="#FFFFFF">
<?php
if ($data['braden06']=="1") {
$cek_1 = "checked";
$cek_2 = "";
$cek_3 = "";
}
elseif ($data['braden06']=="2") {
$cek_1 = "";
$cek_2 = "checked";
$cek_3 = "";
}
elseif ($data['braden06']=="3") {
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
<input name="braden06" type="radio" value="1" <?php echo $cek_1;?>>Masalah</br>
<input name="braden06" type="radio" value="2" <?php echo $cek_2;?>>Masalah potensial</br>
<input name="braden06" type="radio" value="3" <?php echo $cek_3;?>>Tidak ada masalah nyata</td>
</tr>

<?php
$braden_pasien = $braden01 + $braden02 + $braden03 + $braden04 + $braden05 + $braden06;
if ($braden_pasien>="15") {
$min_care = "Berisiko";
}
elseif ($braden_pasien>="13" && $braden_pasien<="14") {
$min_care = "Risiko sedang";
}
elseif ($braden_pasien>="10" && $braden_pasien<="12") {
$min_care = "Risiko tinggi";
}
if ($braden_pasien<="9") {
$min_care = "Risiko sangat tinggi";
}
?>
<tr> 
    <td bgcolor="#FFFFFF">braden index</td>
    <td bgcolor="#FFFFFF"><input name="braden_pasien" type="hidden" value="<?php echo $min_care;?>"/><b><?php echo $min_care;?></b></td>
  </tr>
<tr> 
    <td colspan="2" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Update"> 
    <input type='submit' name='Verify' value='Verify' onClick="form1.action='braden_verify.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;"> 
    [ Skala kurang dari 15, ditegakkan diagnosa keperawatan : Risiko gangguan integritas kulit ] </td>
  </tr>
   </form>
<?php
include "bradenview.php"; 
?>
</table>
</body>
</html>
