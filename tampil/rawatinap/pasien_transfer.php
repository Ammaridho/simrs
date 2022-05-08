<?php 
include "../librari/inc.koneksidb.php"; 
?>
<html>
<head>
<title>Daftar pasien per tanggal <?php echo date("d-m-Y");?></title>
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
<body><form name="form1" method="post" action="pasien_transfer.php?kd_unit='$kd_unit'">
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#D9E8F3">
      <td colspan="7">
        <select name="kd_unit" id="kd_unit">
          <option value="*" selected>[Pilih...]</option>
          <?php
	$sql = "SELECT * FROM unit WHERE unit='4' || unit='5' || unit='6'";
      	$qry = @mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[kd_unit]==$kd_unit) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[kd_unit]' $cek>".$data['nama_unit']."</option>";
	}
	?>
        </select>
        <input type="submit" name="Submit" value="Tampilkan">

      </td>
    </tr>
<?php 
$kd_unit = $_REQUEST['kd_unit'];
$query ="SELECT * FROM unit,pasien_rawat WHERE unit.kd_unit=pasien_rawat.kd_unit AND unit.kd_unit LIKE '%$kd_unit%'  AND status='Aktif' GROUP BY pasien_rawat.kd_unit";
$result =mysqli_query($query) or die(mysql_error());
$no = 1;
while($data=mysql_fetch_array($result)){

  ?>
    <tr bgcolor="#D9E8F3">
      <td colspan="7"><?php echo $data['nama_unit'];?></td>
    </tr>  
    <tr bgcolor="#FFFFFF">
      <td width="4%" bgcolor="#D9E8F3"><div align="center"><strong>No</strong></div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>Nama [ PRN ]</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Tanggal Lahir</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Tanggal Masuk</strong></div></td>
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Ruang</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Kamar/Kelas</strong></div>        </td>
      <td width="10%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 
	$tanggal = date("Y:m:d");
	$kd_unit2 = $data[kd_unit];
	$sql = "SELECT data_pasien.prn,nama,DATE_FORMAT(tgl_lahir,'%d-%m-%Y') AS tgl_lahir,tanggal,kd_unit,kamar,kelas,kd_kunjungan FROM data_pasien,pasien_rawat WHERE data_pasien.prn=pasien_rawat.prn AND kd_unit='$kd_unit2' AND pasien_rawat.status='Aktif' ORDER BY kamar";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
  ?>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
	<td><?php echo $no++ ;?> </td>
      <td><a href="../rawatinap/pengkajian.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?> [<?php echo $data['prn'];?>]</a></td>
      <td><a href="../rawatinap/pengkajian.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['tgl_lahir'];?></a></td>
      <td><a href="../rawatinap/pengkajian.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['tanggal'];?></a></td>
      <td><a href="../rawatinap/pengkajian.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama_unit'];?></a></td>
      <td><a href="../rawatinap/pengkajian.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?>/<?php echo $data['kelas'];?></a></td>
<td width="10%" bgcolor="#FFFFFF">
<div align="center"><a href="../registrasi/transfer.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>&prn=<?php echo $data['prn']; ?>" title="Untuk transfer pasien...!">Transfer</a></div></td>
<?php
}
}
?>
  </table>
        </form>
</body>
</html>
