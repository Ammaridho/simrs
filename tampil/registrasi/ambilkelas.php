<?php
include "../librari/inc.koneksidb.php";
$kamar = $_GET['kamar'];
$kelas = mysqli_query($koneksi, "SELECT * FROM ruang WHERE kamar='$kamar'");
while($kls = mysqli_fetch_array($kelas)){
    echo "<option value=\"".$kls['kelas']."\">".$kls['kelas']."</option>\n";
}
?>
