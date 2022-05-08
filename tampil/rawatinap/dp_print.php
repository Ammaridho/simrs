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
<title>Discharge Plan</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<body id="tab2"><b>PENGKAJIAN RENCANA PULANG </b></br>
1. Selama ini menggunakan pendamping dalam melakukan aktifitas sehari hari, dalam pemberian obat atau home care : 
<?php
if ($data['dp01']=="2") {
echo "Ya (".$data['dp01'].")";
}
elseif ($data['dp01']=="1") {
echo "Tidak (".$data['dp01'].")";
}
else {
echo "Tidak ada data";
}
?></br>
2. Riwayat pernah berobat ke puskesmas /rumah sakit :
<?php
if ($data['dp02']=="10") {
echo "Ya (".$data['dp02'].")";
}
elseif ($data['dp02']=="1") {
echo "Tidak (".$data['dp02'].")";
}
else {
echo "Tidak ada data";
}
?></br>
3. Umur :
<?php
if ($data['dp03']=="1") {
echo "Kurang dari 65 tahun (".$data['dp03'].")";
}
elseif ($data['dp03']=="2") {
echo "Lebih dari 65 tahun (".$data['dp03'].")";
}
else {
echo "Tidak ada data";
}
?></br>
4. Mental status :
<?php
if ($data['dp04']=="1") {
echo "Tanda & Rasional (".$data['dp04'].")";
}
elseif ($data['dp04']=="2") {
echo "Bingung (".$data['dp04'].")";
}
elseif ($data['dp04']=="10") {
echo "Koma (".$data['dp04'].")";
}
else {
echo "Tidak ada data !";
}
?></br>
5. Kebutuhan :
<?php
if ($data['dp05']=="1") {
echo "Tidak Perlu bantuan (".$data['dp05'].")";
}
elseif ($data['dp05']=="2") {
echo "Sedikit Bantuan (".$data['dp05'].")";
}
elseif ($data['dp05']=="5") {
echo "Perlu Bantuan (".$data['dp05'].")";
}
else {
echo "Tidak ada data !";
}
?></br>
6. Aktifitas :
<?php
if ($data['dp06']=="1") {
echo "Tidak Perlu bantuan (".$data['dp06'].")";
}
elseif ($data['dp06']=="2") {
echo "Sedikit Bantuan (".$data['dp06'].")";
}
elseif ($data['dp06']=="10") {
echo "Perlu Bantuan (".$data['dp06'].")";
}
else {
echo "Tidak ada data !";
}
?></br>
7. Mobilisasi :
<?php
if ($data['dp07']=="1") {
echo "Mandiri (".$data['dp07'].")";
}
elseif ($data['dp07']=="2") {
echo "Perlu  pendamping (".$data['dp07'].")";
}
elseif ($data['dp07']=="3") {
echo "Perlu bantuan peralatan (".$data['dp07'].")";
}
elseif ($data['dp07']=="4") {
echo "Perlu bantuan peralatan dan pendamping (".$data['dp07'].")";
}
elseif ($data['dp07']=="5") {
echo "Terbaring (".$data['dp07'].")";
}
else {
echo "Tidak ada data !";
}
?></br>
8. Memerlukan ketergantungan penuh dengan peralatan medis :
<?php
if ($data['dp08']=="5") {
echo "Ya (".$data['dp08'].")";
}
elseif ($data['dp08']=="1") {
echo "Tidak (".$data['dp08'].")";
}
else {
echo "";
}
?></br>
9. Memerlukan pendamping dalam perjalanan penyakitnya :
<?php
if ($data['dp09']=="10") {
echo "Ya  (".$data['dp09'].")";
}
elseif ($data['dp09']=="1") {
echo "Tidak (".$data['dp09'].")";
}
else {
echo "";
}
?></br>
10. Memerlukan perawatan minimal di rumah :
<?php
if ($data['dp10']=="2") {
echo "Ya (".$data['dp10'].")";
}
elseif ($data['dp10']=="1") {
echo "Tidak (".$data['dp10'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
11. Memerlukan arahan untuk masalah sosial, keluarga , masalah keuangan:
<?php
if ($data['dp11']=="5") {
echo "Ya (".$data['dp11'].")";
}
elseif ($data['dp11']=="1") {
echo "Tidak (".$data['dp11'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
12. Memerlukan arahan perawatan langsung :
<?php
if ($data['dp12']=="2") {
echo "Ya (".$data['dp12'].")";
}
elseif ($data['dp12']=="1") {
echo "Tidak (".$data['dp12'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
13. Memerlukan Rehabilitasi Medis :
<?php
if ($data['dp13']=="2") {
echo "Ya (".$data['dp13'].")";
}
elseif ($data['dp13']=="1") {
echo "Tidak (".$data['dp13'].")";
}
else {
echo "Tidak ada data !";
}
?>
</br>
14. Akomodasi lain :
<?php
if ($data['dp14']=="1") {
echo "Tidak memerlukan (".$data['dp14'].")";
}
elseif ($data['dp14']=="5") {
echo "Memerlukan selama di RS, komunitas RS (".$data['dp14'].")";
}
elseif ($data['dp14']=="10") {
echo "Memerlukan untuk di rumah secara berkala (".$data['dp14'].")";
}
else {
echo "Tidak ada data !";
}
?></br>
<?php 
     	$sql = "SELECT * FROM dp WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

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
$min_care = "Kategori 1 : dilakukan edukasi 1 (satu) kali pada pasien atau keluarga sesuai permasalahan";
}
elseif ($dp_pasien>="16" && $dp_pasien<="22") {
$min_care = "Kategori 2 : lakukan edukasi pada pasien dan keluarga 1 kali  sesuai permasalahan";
}
elseif ($dp_pasien>="23" && $dp_pasien<="43") {
$min_care = "Kategori 3 : pasien membutuhkan pendamping/orang yang merawat di rumah dan lakukan edukasi 3 kali pada pasien dan pendamping sesuai permasalahan";
}
if ($dp_pasien>"43") {
$min_care = "Kategori 4 : pasien membutuhkan pendamping/orang yang merawat di rumah dan lakukan edukasi 3 kali pada pasien dan pendamping sesuai permasalahan";
}
}
?>
<b>Skor : <?php echo $dp_pasien;?> </br><?php echo $min_care;?> </b></br>
Sumber : Roper Logan
</body>
</html>
