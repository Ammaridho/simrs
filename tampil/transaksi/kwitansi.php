<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "../librari/inc.kodeauto.php";


$kd_kunjungan 	= $_GET['kd_kunjungan'];

$sql = "SELECT * FROM data_pasien,reg,transaksi WHERE data_pasien.prn=reg.prn AND reg.kd_kunjungan=transaksi.kd_kunjungan AND transaksi.kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($qry); 

?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type" />
<title>KWITANSI PEMBAYARAN</title></head>
<body>
<div align="center"><img src="../../media/image/cropped-cropped-Klinik-Pratama-Seruni-FInal-copy.png"></div>
<div align="center">Jl. Kayu Besar Dalam, RT.5/RW.11, Cengkareng Timur, Jakarta Barat, DKI 11730</h3>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D9E8F3">
  <tr bgcolor="#D9E8F3"> 
    <td colspan="3" align="left"><strong>KWITANSI</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" align="left"><strong>PRN</strong></td>
    <td width="25%"><?php echo $data['prn']; ?> </td>
    <td width="25%"><strong>Visit Number </strong></td>
    <td width="25%"><input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan']; ?>">
    <?php echo $data['kd_kunjungan'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Name</strong></td>
    <td><?php echo $data['nama']; ?></td>
    <td ><strong>Invoice Nomor</strong></td>
    <td><?php echo $data['kd_transaksi'];?>	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Date of birth  </strong></td>
    <td><?php echo $data['tgl_lahir']; ?></td>
    <td><strong>Invoice Date </strong></td>
    <td><?php echo $data['tgl_reg'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Sex / Age </strong></td>
    <td>
		<?php 
		echo $data['jenis_kelamin']; ?> / <?php
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
    <td></td>
    <td></td>
  </tr>
</table>
</br>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D9E8F3">
  <tr bgcolor="#D9E8F3"> 
    <td colspan="4" align="left"><strong>Rincian</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="10%">No</td>
    <td width="50%">Deskripsi</td>
    <td width="10%">Qty</td>
    <td width="15%">Asuransi</td>
    <td width="15%">Pribadi</td>
  </tr>
  <?php
  $kd_kunjungan 	= $_GET['kd_kunjungan'];
  $query2 ="SELECT * FROM transaksi WHERE kd_kunjungan='$kd_kunjungan' AND grup_item='Consultation and procedur'";
  $hasil2 = mysqli_query($koneksi, $query2) or die("Query gagal");
  while($data2=mysqli_fetch_array($hasil2))
  {
	$harga_asuransi2 = $data2['asuransi'];
	$harga_pribadi2 = $data2['pribadi'];
	$sub_total_asuransi2 = $sub_total_asuransi2 + $harga_asuransi2;
	$sub_total_pribadi2 = $sub_total_pribadi2 + $harga_pribadi2;
	$sub_total_tindakan = $sub_total_asuransi2 + $sub_total_pribadi2;
  ?>
  <tr bgcolor="#FFFFFF">
    <td></td>
    <td><?php echo $data2['nama_item']; ?></td>
    <td><?php echo $data2['qty_item']; ?></td>
    <td><?php echo $harga_asuransi2; ?></td>
    <td><?php echo $harga_pribadi2; ?></td>
  </tr>
  <?php
	}
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="5" align="left"><strong>Sub total tindakan : <?php echo "Rp. ". angka($sub_total_tindakan) ;?></strong></td>
  </tr>
</table>
</br>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D9E8F3">
  <tr bgcolor="#D9E8F3"> 
    <td colspan="5" align="left"><strong>Rincian</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="10%">No</td>
    <td width="50%">Deskripsi</td>
    <td width="10%">Qty</td>
    <td width="15%">Asuransi</td>
    <td width="15%">Pribadi</td>
  </tr>
  <?php
  $kd_kunjungan 	= $_GET['kd_kunjungan'];
  $query3 ="SELECT * FROM transaksi WHERE kd_kunjungan='$kd_kunjungan' AND grup_item='Drug and retail'";
  $hasil3 = mysqli_query($koneksi, $query3) or die("Query gagal");
  while($data3=mysqli_fetch_array($hasil3))
  {
	$harga_asuransi3 = $data3['asuransi'];
	$harga_pribadi3 = $data3['pribadi'];
	$sub_total_asuransi3 = $sub_total_asuransi3 + $harga_asuransi3;
	$sub_total_pribadi3 = $sub_total_pribadi3 + $harga_pribadi3;
	$sub_total_obat = $sub_total_asuransi3 + $sub_total_pribadi3;
  ?>
  <tr bgcolor="#FFFFFF">
    <td></td>
    <td><?php echo $data3['nama_item']; ?></td>
    <td><?php echo $data3['qty_item']; ?></td>
    <td><?php echo $harga_asuransi3; ?></td>
    <td><?php echo $harga_pribadi3; ?></td>
  </tr>
  <?php
	}
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="5" align="left"><strong>Sub total obat dan retail : <?php echo "Rp. ". angka($sub_total_obat) ;?></strong></td>
  </tr>
</table>
</br>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D9E8F3">
<?php
$total = $sub_total_tindakan + $sub_total_obat;
?>
  <tr bgcolor="#D9E8F3"> 
    <td><strong>Rincian</strong></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td>Total : Rp. <?php echo angka($total);?>,-</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Terbilang : <?php echo terbilang($total);?> rupiah</td>
  </tr>
</table>
</body>
</html> 
<script>
	window.print();
</script>
