<?php
// membaca file koneksi.php
include "koneksi.php";
include "inc.session.php";
 
echo "<h1>Dump MySQL</h1>";
echo "<h3>Nama Database: ".$dbName."</h3>";
echo "<h3>Daftar Tabel</h3>";
 
// query untuk menampilkan semua tabel dalam database
$query = "SHOW TABLES";
$hasil = query($query);
 
// menampilkan semua tabel dalam form
echo "<form method='post' action='proses.php'>";
echo "<table>";
while ($data = fetch_row($hasil))
{
   echo "<tr><td><input type='checkbox' name='tabel[]' value='".$data[0]."'></td><td>".$data[0]."</td></tr>";
}
echo "</table><br>";
echo "<input type='submit' name='submit' value='Backup Data'>";
echo "</form>";
 
 
?>
