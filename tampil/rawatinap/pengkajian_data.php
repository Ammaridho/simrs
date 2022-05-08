<?php
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$query = "SELECT * FROM divisidb,pasien_rawat WHERE pasien_rawat.kd_kunjungan='$kd_kunjungan' ORDER BY kd_divisi";
$hasil = mysqli_query($query);
$data = mysql_fetch_array($hasil);
?>

