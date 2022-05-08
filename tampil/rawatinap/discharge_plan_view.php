<?php 
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php
$sql1 = "SELECT * FROM discharge_plan WHERE kd_kunjungan='$kd_kunjungan'";
$qry1 = mysqli_query($koneksi,$sql)
      or die ("SQL Error".mysql_error());
$data1=mysql_fetch_array($qry1);
$pengkajian = $data1['kd_kunjungan'];
if ($pengkajian != ""){
echo "<table width='99%' border='0' cellpadding='2' cellspacing='1'>";
echo "<tr><td>DISCHARGE PLANNING</td><td></td></tr>";
echo "<tr><td>Tanggal</td><td>: ".$data1['tanggal']."</td></tr>";
echo "<tr><td>Selama ini menggunakan pendamping dalam melakukan aktifitas sehari hari, dalam pemberian obat atau home care</td><td> : "; if ($data1['dp01']==2){ echo "Ya (Skor $data1['dp01'])"; } else { echo "Tidak (Skor $data1['dp01'])"; }"</td></tr>";
echo "<tr><td>Riwayat pernah berobat ke puskesmas /rumah sakit</td><td>: "; if($data1['dp02']==10) { echo "Ya (Skor ".$data1['dp02'].")";} else { echo "Tidak (Skor ".$data1['dp02'].")"; }"</td></tr>";
echo "<tr><td>Umur</td><td>:  "; if($data1['dp03']==1) {echo "< 65 tahun (Skor $data1['dp03'])";} else {echo ">65 tahun (Skor $data1['dp03'])";} "</td></tr>";
echo "<tr><td>Mental status</td><td>: "; if($data1['dp04']==1) {echo "Sadar dan rasional (Skor $data1['dp04'])";} elseif($data1['dp04']==2) {echo "Bingung (Skor $data1['dp04'])";} else {echo "Koma (Skor $data1['dp04'])";}"</td></tr>";
echo "<tr><td>Kebutuhan</td><td>: "; if($data1['dp05']==1){echo"Tidak perlu bantuan (Skor $data1['dp05'])";} elseif($data1['dp05']==2){echo"Perlu sedikit bantuan (Skor $data1['dp05'])";} elseif($data1['dp05']==5) {echo"Perlu bantuan (Skor $data1['dp05'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Aktifitas</td><td>: ";if($data1['dp06']==1){echo"Tidak perlu bantuan (Skor $data1['dp06'])";} elseif($data1['dp06']==2){echo"Perlu sedikit bantuan (Skor $data1['dp06'])";} elseif($data1['dp06']==10) {echo"Perlu bantuan (Skor $data1['dp06'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Mobilisasi</td><td>: "; if($data1['dp07']==1){echo"Mandiri (Skor $data1['dp07'])";} elseif($data1['dp07']==2){echo"Perlu pendamping (Skor $data1['dp07'])";} elseif($data1['dp07']==3){echo"Perlu bantuan peralatan (Skor $data1['dp07'])";} elseif($data1['dp07']==4){echo"Perlu pendamping dan bantuan peralatan (Skor $data1['dp07'])";} elseif($data1['dp07']==5){echo"Terbaring (Skor $data1['dp07'])";} else{echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Memerlukan ketergantungan penuh dengan peralatan medis</td><td>: "; if($data1['dp08']==5){echo "Ya (Skor $data1['dp08'])";} elseif($data1['dp08']==1){echo"Tidak (Skor $data1['dp08'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Memerlukan pendamping dalam perjalanan penyakitnya</td><td>: "; if($data1['dp09']==10){echo "Ya (Skor $data1['dp09'])";} elseif($data1['dp09']==1){echo"Tidak (Skor $data1['dp09'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Memerlukan perawatan minimal di rumah</td><td>: "; if($data1['dp10']==2){echo "Ya (Skor $data1['dp10'])";} elseif($data1['dp10']==1){echo"Tidak (Skor $data1['dp10'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Memerlukan arahan untuk masalah sosial, keluarga , masalah keuangan</td><td>: ";if($data1['dp11']==5){echo "Ya (Skor $data1['dp11'])";} elseif($data1['dp11']==1){echo"Tidak (Skor $data1['dp11'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Memerlukan arahan perawatan langsung</td><td>: ";if($data1['dp12']==2){echo "Ya (Skor $data1['dp12'])";} elseif($data1['dp12']==1){echo"Tidak (Skor $data1['dp12'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Memerlukan Rehabilitasi Medis</td><td>: "; if($data1['dp13']==2){echo "Ya (Skor $data1['dp13'])";} elseif($data1['dp13']==1){echo"Tidak (Skor $data1['dp13'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Akomodasi lain</td><td>: "; if($data1['dp14']==1){echo"Tidak memerlukan (Skor $data1['dp14'])";}  elseif($data1['dp14']==5){echo"Memerlukan selama di RS (Skor $data1['dp14'])";}  elseif($data1['dp14']==10){echo"Memerlukan secara berkala (Skor $data1['dp14'])";} else {echo"Tidak ada nilai";}"</td></tr>";
echo "<tr><td>Total Skor<td>: $data1['hasil']<td></tr>";
echo "<tr><td>Kriteria<td>: $data1['kriteria'''']<td></tr>";
echo "</table>";
}
else {
echo "Pengkajian awal belum di cek...";
}
?>
</body>
</html>
