<?php
include "../librari/inc.koneksidb.php";
$klinik = $_GET['klinik'];
$query	= "SELECT * FROM user WHERE spesialis='$klinik' order by username";
$dokter = mysqli_query($koneksi,$query);
echo "<option value=''>-- Pilih Petugas --</option>";
while($k = mysqli_fetch_array($dokter)){
    echo "<option value=\"".$k['username']."\">".$k['nama_user']."</option>\n";
}
?>
