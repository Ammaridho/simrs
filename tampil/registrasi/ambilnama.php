<?php
mysql_connect("localhost","root","12345678");
mysql_select_db("klinikdb");
$spesialis = $_GET['spesialis'];
$nama = mysqli_query($koneksi, "SELECT * FROM user WHERE spesialis='$spesialis'");
echo "<option value=''>--Pilih nama--</option>";
while($k = mysqli_fetch_array($nama)){
    echo "<option value=\"".$k['nik']."\">".$k['nama']."</option>\n";
}
?>
