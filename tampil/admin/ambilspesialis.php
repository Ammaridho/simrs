<?php
include "../librari/inc.koneksidb.php";
include "../librari/config.php";
$kategori = $_GET['kategori'];
$query = "SELECT * FROM klinikdb WHERE kd_gol_tm='$kategori'";
$spesialis = mysqli_query($koneksi,$query);
echo "<option value=\"".$k['kd_klinik']."\">[ Pilih Spesialis ]</option>";
while($k = mysqli_fetch_array($spesialis)){
    echo "<option value=\"".$k['kd_klinik']."\">".$k['nama_klinik']."</option>\n";
}
?>
