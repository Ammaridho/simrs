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
</head>
<body id="tab8"><b>Skala Dekubitus Braden</b></br>

Tanggal :<?php $data['tanggal'];?></br>
1. Persepsi sensori :
<?php
if ($data['braden01']=="1") {
echo "Sangat terbatas (Skor ".$data['braden01'].")";
}
elseif ($data['braden01']=="2") {
echo "Terbatas (Skor ".$data['braden01'].")";
}
elseif ($data['braden01']=="3") {
echo "Sedikit terbatas (Skor ".$data['braden01'].")";
}
elseif ($data['braden01']=="4") {
echo "Normal (Skor ".$data['braden01'].")";
}
else {
echo "Tidak ada data";
}
?></br>
2. Kelembaban :
<?php
if ($data['braden02']=="1") {
echo "Selalu lembab (Skor ".$data['braden02'].")";
}
elseif ($data['braden02']=="2") {
echo "Sering lembab (Skor ".$data['braden02'].")";
}
elseif ($data['braden02']=="3") {
echo "Kadang-kadang lembab (Skor ".$data['braden02'].")";
}
elseif ($data['braden02']=="4") {
echo "Jarang lembab (Skor ".$data['braden02'].")";
}
else {
echo "";
}
?>
</br>
3. Aktifitas :
<?php
if ($data['braden03']=="1") {
echo "Di tempat tidur (Skor ".$data['braden03'].")";
}
elseif ($data['braden03']=="2") {
echo "Terbatas di kursi atau kursi roda (Skor ".$data['braden03'].")";
}
elseif ($data['braden03']=="3") {
echo "Kadang-kadang berjalan (Skor ".$data['braden03'].")";
}
elseif ($data['braden03']=="4") {
echo "Sering berjalan (Skor ".$data['braden03'].")";
}
else {
echo "";
}
?>
</br>
4. Mobilisasi : 
<?php
if ($data['braden04']=="1") {
echo "Tergantung (Skor ".$data['braden04'].")";
}
elseif ($data['braden04']=="2") {
echo "Sangat terbatas (Skor ".$data['braden04'].")";
}
elseif ($data['braden04']=="3") {
echo "Sedikit terbatas (Skor ".$data['braden04'].")";
}
elseif ($data['braden04']=="4") {
echo "Tidak terbatas (Skor ".$data['braden04'].")";
}
else {
echo "";
}
?>
</br>
5. Nutrisi :
<?php
if ($data['braden05']=="1") {
echo "Sangat buruk (Skor ".$data['braden05'].")";
}
elseif ($data['braden05']=="2") {
echo "Tidak cukup (Skor ".$data['braden05'].")";
}
elseif ($data['braden05']=="3") {
echo "Cukup (Skor ".$data['braden05'].")";
}
elseif ($data['braden05']=="4") {
echo "Sangat baik (Skor ".$data['braden05'].")";
}
else {
echo "";
}
?>
</br>
6. Pergesekan :
<?php
if ($data['braden06']=="1") {
echo "Masalah (Skor ".$data['braden05'].")";
}
elseif ($data['braden06']=="2") {
echo "Masalah potensial (Skor ".$data['braden06'].")";
}
elseif ($data['braden06']=="3") {
echo "Tidak ada masalah nyata (Skor ".$data['braden06'].")";
}
else {
echo "";
}
?>
</br>
<?php 
     	$sql = "SELECT * FROM braden WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

$braden01 = $data['braden01'];
$braden02 = $data['braden02'];
$braden03 = $data['braden03'];
$braden04 = $data['braden04'];
$braden05 = $data['braden05'];
$braden06 = $data['braden06'];

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
}
?>
</br></br>
<b>Skor braden :  <?php echo $min_care;?> (Skor <?php echo $braden_pasien;?>)</b><hr>
--------------------------------------------------------------------------------------
</body>
</html>
