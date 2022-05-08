<?php 
include "../librari/inc.koneksidb.php"; 
?>
<html>
<head>
<title>Ketenagaan</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>Kebutuhan Tenaga Ruang <?php echo $kd_unit;?> </strong></div></td>
<tr bgcolor="#FFFFFF">
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>PRN</strong></div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>Nama </strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Kamar</strong></div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>DPJP</strong></div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Ka Modul</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Klasifikasi</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
<?php
$kd_unit =$_REQUEST['kd_unit'];
$query = "SELECT * FROM data_pasien WHERE kd_unit like '%$kd_unit%' AND status='Aktif'";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['dpjp'];?></a></td>
      <td><a href="../renpra/class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['modul'];?></a></td>
<td width="16%" bgcolor="#FFFFFF">
<?php
	$tanggal=date("Y-m-d");
	$kd_kunjungan = $data[kd_kunjungan];
	$sql2 = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
      	$qry2 = @mysqli_query($sql2, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry2)) {

echo "".$data['class_pasien']."";
}
}
?></td>
</tr>
<tr bgcolor="#FFFFFF">
      <td width="14%" bgcolor="#D9E8F3"><div align="center">Klasifikasi</div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center">Jumlah Pasien</div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center">Pagi</div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center">Sore</div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center">Malam</div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center">Sub Total</div></td>
    </tr>
<?php
$query3 ="SELECT class.class_pasien, COUNT(class.class_pasien),class.kd_kunjungan,data_pasien.kd_kunjungan,data_pasien.kd_unit FROM class,data_pasien WHERE class.kd_kunjungan=data_pasien.kd_kunjungan AND class.tanggal='$tanggal' AND data_pasien.kd_unit='$kd_unit' GROUP BY class.class_pasien";
$result3 =mysqli_query($query3) or die(mysql_error());
while($data=mysql_fetch_array($result3)){

$class_pasien = $data[class_pasien];

if ($class_pasien=="Minimal Care") {
$index_pagi = "0.17";
$index_sore = "0.14";
$index_malam = "0.14";
}
elseif ($class_pasien=="Partial Care") {
$index_pagi = "0.81";
$index_sore = "0.45";
$index_malam = "0.45";
}
if ($class_pasien=="Total Care") {
$index_pagi = "1.8";
$index_sore = "1.5";
$index_malam = "1.5";
}
$jum_class = $data[COUNT(class_pasien)];
$pagi = $jum_class*$index_pagi;
$sore = $jum_class*$index_sore;
$malam = $jum_class*$index_malam;
$total_pagi = $total_pagi + $pagi;
$total_sore = $total_sore + $sore;
$total_malam = $total_malam + $malam;
$sub_total=$pagi+$sore+$malam;
$total = $total+$sub_total;
?>
<tr bgcolor="#FFFFFF">
<td><?php echo $data['class_pasien'];?></td>
<td><?php echo $data['COUNT(class.class_pasien)'];?></td>
<td><?php echo $pagi ;?></td>
<td><?php echo $sore ;?></td>
<td><?php echo $malam ;?></td>
<td><?php echo $sub_total;?></td>
</tr>
<?php
}
?>
<tr bgcolor="#FFFFFF">
<td colspan="2">Total kebutuhan tenaga </td>
<td><?php echo $total_pagi ;?></td>
<td><?php echo $total_sore ;?></td>
<td><?php echo $total_malam ;?></td>
<td><?php echo $total;?></td>
</tr>
     </tr>
  </table>
</body>
</html>
