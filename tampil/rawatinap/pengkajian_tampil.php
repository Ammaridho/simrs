<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_connect_error());
   $data=mysqli_fetch_array($qry);
}

$kategori = $data['kategori'];
$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($koneksi, $query);
$data_u = mysqli_fetch_array($hasil);

$tahun = floor($data_u['selisih']/365);
$bulan = floor(($data_u['selisih'] - ($tahun * 365))/30);
$hari = $data_u['selisih'] - $bulan * 30 - $tahun * 365;

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pengkajian</title>
	<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<style type="text/css">
@media print {
input.noPrint { display: none; }
}
</style>
<script language="javascript">
	var win = null;
	function NewWindow(mypage,myname,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings =
	'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	win = window.open(mypage,myname,settings)
	}
</script>
</head>
<body id="tab1">
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
	<tr bgcolor="#FFFFFF">
      <td width="100%" bgcolor="#D9E8F3" colspan="6"><div align="left"><a href="pengkajian_list.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" 
onClick="NewWindow(this.href,'name','800','800','yes');return false">Tambah</a></div></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#D9E8F3"><div align="center"><strong>No</strong></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Tanggal</strong></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Jam</strong></div></td>
	  <td width="50%" bgcolor="#D9E8F3"><div align="center"><strong>Pengkajian</strong></div></td>
	  <td width="15%" bgcolor="#D9E8F3"><div align="center"><strong>Perawat</strong></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Action</strong></div></td>
    </tr>

<?php 
	$sql = "SELECT * FROM pengkajian_awal WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC";
	$qry = mysqli_query($koneksi, $sql) or die ("SQL Error DP".mysqli_error($koneksi));
	$no = 1;
	while ($data=mysqli_fetch_array($qry)) {
		$jenis = $data['jenis'];
		if($jenis=="Pengkajian Neonatus"){
			$jenis_pengkajian = "pengkajian_neonatus_edit.php";
		}
		if($jenis=="Pengkajian awal anak"){
			$jenis_pengkajian = "pengkajian_anak_edit.php";
		}
		if($jenis=="Pengkajian awal dewasa dan lansia"){
			$jenis_pengkajian = "pengkajian_dewasa_edit.php";
		}
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['jenis'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['nik'];?></td>
	  <td width="5%" bgcolor="#FFFFFF">
	  <a href="<?php echo $jenis_pengkajian;?>?kd_kunjungan=<?php echo $kd_kunjungan;?>"
		onClick="NewWindow(this.href,'name','800','800','yes');return false">Edit</a>
	  </td>
    </tr>
<?php
	}
?>

<?php 
	$sql2 = "SELECT * FROM pengkajian a, asm_db1 b WHERE a.asm_db1=b.asm_db1_code AND a.kd_kunjungan='$kd_kunjungan' GROUP BY a.kd_kunjungan,a.asm_db1 ORDER BY a.tanggal DESC";
	$qry2 = mysqli_query($koneksi, $sql2) or die ("SQL Error DP".mysqli_error($koneksi));
	while ($data2=mysqli_fetch_array($qry2)) {
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['asm_db1_name'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['nik'];?></td>
	  <td width="5%" bgcolor="#FFFFFF">
		<?php
		if($data2['status']=="Selesai"){
			?>
			<a href="pengkajian_dewasa_new_view.php?kd_kunjungan=<?php echo $kd_kunjungan;?>&asm_db1=<?php echo $data2['asm_db1'];?>"
			onClick="NewWindow(this.href,'name','800','800','yes');return false">Print</a>
		<?php
		}
		else {
			?>
			<a href="pengkajian_dewasa_new.php?kd_kunjungan=<?php echo $kd_kunjungan;?>&asm_db1=<?php echo $data2['asm_db1'];?>"
			onClick="NewWindow(this.href,'name','800','800','yes');return false">Edit</a>
		<?php
		}
		?>
	  </td>
    </tr>
<?php
	}
?>

<?php 
	$sql3 = "SELECT * FROM skala_jatuh WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC";
	$qry3 = mysqli_query($koneksi, $sql3) or die ("SQL Error DP".mysqli_error($koneksi));
	while ($data3=mysqli_fetch_array($qry3)) {
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['jenis'];?>, Skor : <?php echo $data3['total_skor'];?>, kategori <?php echo $data3['kategori'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['nik'];?></td>
	  <td width="5%" bgcolor="#FFFFFF">
	  <a href="pengkajian_nyeri_view.php?kd_kunjungan=<?php echo $kd_kunjungan;?>"
		onClick="NewWindow(this.href,'name','800','800','yes');return false">Edit</a>
	  </td>
    </tr>
<?php
	}
?>
</body>
</html>