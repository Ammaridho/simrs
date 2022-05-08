<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysqli_fetch_array($qry);
}
$nama_diagnosa = $_REQUEST['nama_diagnosa']; 
?>
<html>
<head>
<title>DAFTAR IMPLEMENTASI</title>
</head>
<body id="tab5">

</body>
</html>

