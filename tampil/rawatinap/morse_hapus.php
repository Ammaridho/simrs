<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = date("Y-m-d");


if ($kd_kunjungan !="") {
$sql = "DELETE FROM morse WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
mysqli_query($koneksi, $sql) 
or die ("SQL Error".mysql_error());
}
include "morse_form.php";
?>
