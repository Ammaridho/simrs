<html>
<head>
<title>PASIEN TERDAFTAR</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="base.css" /></head>
<link rel="stylesheet" type="text/css" href="blue.css" /></head>
</head>
<body id="tab1">
<?php
// koneksi ke mysql
include "../librari/inc.koneksidb.php";
// query untuk mencari file berdasarkan kategori
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$query = "SELECT * FROM divisidb,pasien_rawat WHERE pasien_rawat.kd_kunjungan='$kd_kunjungan' ORDER BY kd_divisi";
$hasil = mysqli_query($query);
while ($data = mysql_fetch_array($hasil))
{
?>
<ul>
    <li><a href="?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&kd_divisi=<?php echo $data['kd_divisi'];?>"><?php echo $data['divisi'];?></a></li>
  </ul>
  <?php
}
?>
</body>
</html>
