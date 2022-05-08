<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
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

<title>Skala Morse</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<body id="tab11"><b>Skala Morse</b></br></br>
1. Riwayat jatuh dalam 3 (tiga) bulan terakhir :
<td bgcolor="#FFFFFF">
<?php
if ($data['morse01']=="0") {
echo "Tidak (Skor ".$data['morse01'].")";
}
elseif ($data['morse01']=="25") {
echo "Ya (Skor ".$data['morse01'].")";
}
else {
echo "Tidak ada data";
}
?></br>
2. Diagnosa sekunder  :
<?php
if ($data['morse02']=="0") {
echo "Tidak (Skor ".$data['morse02'].")";
}
elseif ($data['morse02']=="15") {
echo "Ya (Skor ".$data['morse02'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
3. Menggunakan alat bantu :
<?php
if ($data['morse03']=="30") {
echo "Furniture (meja, kursi/sofa, lemari, dll)  (Skor ".$data['morse03'].")";
}
elseif ($data['morse03']=="15") {
echo "Kruk, tongkat berjalan, walker (Skor ".$data['morse03'].")";
}
elseif ($data['morse03']=="0") {
echo "Tidak menggunakan alat bantu/bedrest  (Skor ".$data['morse03'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
4. Penggunaan alat kesehatan (IV catheter, Dower catheter, NGT) : 
<?php
if ($data['morse04']=="0") {
echo "Tidak (Skor ".$data['morse04'].")";
}
elseif ($data['morse04']=="20") {
echo "Ya (Skor ".$data['morse04'].")";
}
else {
echo "Tidak ada data";
}
?>
</br>
5. Mobilisasi/pergerakkan  :
<?php
if ($data['morse05']=="0") {
echo "Normal/Bedrest total/immobilisasi (Skor ".$data['morse05'].")";
}
elseif ($data['morse05']=="10") {
echo "Mobilisasi lemah  (Skor ".$data['morse05'].")";
}
elseif ($data['morse05']=="20") {
echo "Terganggu, menggunakan pegangan untuk keseimbangan  (Skor ".$data['morse05'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
6. Status mental :
<?php
if ($data['morse06']=="0") {
echo "Sadar akan kemampuan dirinya (Skor ".$data['morse05'].")";
}
elseif ($data['morse06']=="15") {
echo "Tidak sadar/keterbatasan (Skor ".$data['morse06'].")";
}
else {
echo "Tidak ada data !";
}

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
if ($morse_pasien>="45") {
$min_care = "Risiko tinggi";
$asesmen = "Pengkajian dilakukan setiap hari";
}
elseif ($morse_pasien>="25" && $morse_pasien<="44") {
$min_care = "Risiko sedang";
$asesmen = "Pengkajian dilakukan setiap hari";
}
elseif ($morse_pasien<="24") {
$min_care = "Risiko rendah";
$asesmen = "Pengkajian diulang setiap 3 (Tiga) hari";
}
else {
$min_care = "Risiko tidak dapat dihitung";
}
}
?>
</br></br>
<b>Skor morse :  <?php echo $min_care;?> (Skor <?php echo $morse_pasien;?>)</b></br>
<b><?php echo $asesmen;?></b>
</body>
</html>
