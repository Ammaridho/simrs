<?php
include "../librari/inc.koneksidb.php";
$kd_kunjungan 	= $_REQUEST['kd_kunjungan'];
$sql = "SELECT * FROM data_pasien,reg WHERE data_pasien.prn=reg.prn AND reg.kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($qry); 

$sql2 = "SELECT * FROM pasien_rawat a WHERE a.kd_kunjungan='$kd_kunjungan'";
$qry2 = mysqli_query($koneksi,$sql2);
$data2 = mysqli_fetch_array($qry2); 
?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type" />

</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#D9E8F3"> 
    <td colspan="4" align="left"><strong>DATA PASIEN</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" align="left"><strong>PRN</strong></td>
    <td width="25%">
      <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn']; ?>    </td>
    <td width="25%"><strong>Tanggal</strong></td>
    <td width="25%"><?php echo $data['tgl_reg'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Nama</strong></td>
    <td><?php echo $data['nama']; ?> (<?php echo $data['karyawan']; ?>)</td>
    <td ><strong>Jam Datang </strong></td>
    <td><?php echo $data['jam_reg'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Tanggal Lahir </strong></td>
    <td><?php echo $data['tgl_lahir']; ?></td>
    <td><strong>Jenis Kunjungan </strong></td>
    <td><?php
	$sql1 = "SELECT * FROM reg WHERE prn='$prn'";
      	$result1 = mysqli_query($koneksi,$sql1);
	$data1 = mysqli_num_rows($result1);
	$hasil1 = mysqli_fetch_array($result1);
	if ($data1<=1) {
	echo "Baru";
	}
	else
	{
    	echo "Lama";
	}
	?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Sex / Umur</strong></td>
    <td>
	<?php echo $data['jenis_kelamin']; ?> / <?php
	$tanggal = $data['tanggal'];
	$tgl_lahir = $data['tgl_lahir'];
	$query = "SELECT datediff('$tanggal', '$tgl_lahir')
			  as selisih";

	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);

	$tahun = floor($data['selisih']/365);
	$bulan = floor(($data['selisih'] - ($tahun * 365))/30);
	$hari = $data['selisih'] - $bulan * 30 - $tahun * 365;
	echo "".$tahun." Thn, ".$bulan." Bln";
	?>
	</td>
    <td><b>Ruang/Kamar</b></td>
    <td><?php echo $data2['ruang']; echo " - "; echo $data2['kamar']; ?></td>
  </tr>
</table>
</body>
</html>