<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal_dx = $_REQUEST['tanggal_dx'];
$nama_diagnosa = $_REQUEST['nama_diagnosa'];


if ($kd_kunjungan !="") {
$sql = "DELETE FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
mysqli_query($koneksi, $sql) 
or die ("SQL Error".mysql_error());
}
include "diagnosa_hapus_view.php";
?>
