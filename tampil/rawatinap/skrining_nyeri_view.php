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
$sql1 = "SELECT * FROM skrining_nyeri WHERE kd_kunjungan='$kd_kunjungan'";
$qry1 = mysqli_query($sql1,$koneksi)
      or die ("SQL Error".mysql_error());
$data1=mysql_fetch_array($qry1);
$pengkajian = $data1[kd_kunjungan];
if ($pengkajian != ""){
echo "<table width='99%' border='0' cellpadding='2' cellspacing='1'>";
echo "<tr><td width='300'>Tanggal<td>: $data1[tanggal_masuk]<td></tr>";
echo "<tr><td width='300'>NIK Perawat yang mengkaji<td>: $data1[nik]<td></tr>";
echo "<tr><td>Skrining<td>: $data1[skrining]<td></tr>";
echo "<tr><td>Hasil skrining<td>: $data1[hasil]<td></tr>";
echo "<tr><td>Dicek oleh<td>: $data1[tracer]<td></tr>";
echo "</table>";
}
else {
echo "Pengkajian awal belum di cek...";
}
?>
</body>
</html>
