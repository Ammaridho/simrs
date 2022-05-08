<html>
<head>
<title>.: LAPORAN UGD EKA HOSPITAL</title></head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr>
      <td colspan="9" bgcolor="#CCCCCC"><div align="center"><strong>LAPORAN ABSENSI MASUK</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="25%" bgcolor="#D9E8F3">Nama</td>
      <td width="9%" bgcolor="#D9E8F3">DC Shock </td>
      <td width="8%" bgcolor="#D9E8F3">Monitor</td>
      <td width="12%" bgcolor="#D9E8F3">Syringe Pump </td>
      <td width="11%" bgcolor="#D9E8F3">Infuse Pump  </td>
      <td width="6%" bgcolor="#D9E8F3">EKG</td>
      <td width="8%" bgcolor="#D9E8F3">Warmer</td>
      <td width="10%" bgcolor="#D9E8F3">Oxymetri</td>
      <td width="11%" bgcolor="#D9E8F3">Ventilator</td>
    </tr>
<?php
// koneksi ke mysql
include "../librari/inc.koneksidb.php";

// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM laporan WHERE shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
 
while ($data = mysql_fetch_array($hasil))
{
?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['dc'];?></td>
      <td><?php echo $data['mon'];?></td>
      <td><?php echo $data['syr'];?></td>
      <td><?php echo $data['inf'];?></td>
      <td><?php echo $data['ekg'];?></td>
      <td><?php echo $data['warm'];?></td>
      <td><?php echo $data['oxy'];?></td>
      <td><?php echo $data['vent'];?></td>
    </tr>
<?php
}
?>
    <tr bgcolor="#FFFFFF">
      <?php
$query = "SELECT * FROM laporan WHERE dc='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_dc = mysql_num_rows($hasil);
?>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#CCCCCC">Jumlah</td>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_dc;?></td>
<?php
$query = "SELECT * FROM laporan WHERE mon='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_mon = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_mon;?></td>
<?php
$query = "SELECT * FROM laporan WHERE syr='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_syr = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_syr;?></td>
<?php
$query = "SELECT * FROM laporan WHERE inf='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_inf = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_inf;?></td>
<?php
$query = "SELECT * FROM laporan WHERE ekg='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_ekg = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_ekg;?></td>
<?php
$query = "SELECT * FROM laporan WHERE warm='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_warm = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_warm;?></td>
<?php
$query = "SELECT * FROM laporan WHERE oxy='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_oxy = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_oxy;?></td>
<?php
$query = "SELECT * FROM laporan WHERE vent='1' AND shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_vent = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><?php echo $num_rows_vent;?></td>
    </tr>
  </table>
</body>
</html>
