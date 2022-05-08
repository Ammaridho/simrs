<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];

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
      <td width="5%" bgcolor="#D9E8F3"><div align="center"><strong>No</strong></div></td>
	  <td width="20%" bgcolor="#D9E8F3"><div align="center"><strong>Tanggal</strong></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>Jam</strong></div></td>
	  <td width="50%" bgcolor="#D9E8F3"><div align="center"><strong>Pengkajian</strong></div></td>
	  <td width="15%" bgcolor="#D9E8F3"><div align="center"><strong>Perawat</strong></div></td>
    </tr>

<?php 
	$sql = "SELECT * FROM pengkajian_awal WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC";
	$qry = mysqli_query($koneksi, $sql) or die ("SQL Error DP".mysqli_error($koneksi));
	$no = 1;
	while ($data=mysqli_fetch_array($qry)) {
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['jenis'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['nik'];?></td>
    </tr>
<?php
	}
?>

<?php 
	$sql2 = "SELECT * FROM pengkajian a, asm_db1 b WHERE a.asm_db1=b.asm_db1_code AND a.kd_kunjungan='$kd_kunjungan' GROUP BY a.kd_kunjungan ORDER BY a.tanggal DESC";
	$qry2 = mysqli_query($koneksi, $sql2) or die ("SQL Error DP".mysqli_error($koneksi));
	while ($data2=mysqli_fetch_array($qry2)) {
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['asm_db1_name'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"><?php echo $data2['nik'];?></td>
    </tr>
<?php
	}
?>

<?php 
	$sql3 = "SELECT * FROM skala_nyeri WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC";
	$qry3 = mysqli_query($koneksi, $sql3) or die ("SQL Error DP".mysqli_error($koneksi));
	while ($data3=mysqli_fetch_array($qry3)) {
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data3['jenis'];?>, Skor : <?php echo $data3['nyeri05'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"></td>
    </tr>
<?php
	}
?>

<?php 
	$sql4 = "SELECT * FROM skala_jatuh WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC";
	$qry4 = mysqli_query($koneksi, $sql4) or die ("SQL Error DP".mysqli_error($koneksi));
	while ($data4=mysqli_fetch_array($qry4)) {
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data4['tanggal'];?></div></td>
	  <td width="15%" bgcolor="#FFFFFF"><div align="left"><?php echo $data4['jam'];?></td>
	  <td width="50%" bgcolor="#FFFFFF"><div align="left"><?php echo $data4['jenis'];?>, Total Skor : <?php echo $data4['total_skor'];?></div></td>
	  <td width="10%" bgcolor="#FFFFFF"><div align="left"><?php echo $data4['nik'];?></td>
    </tr>
<?php
	}
?>
</body>
</html>