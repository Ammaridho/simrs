<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysqli_fetch_array($qry);
?>
<html>
<head>
<title>IMPLEMENTASI</title>
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
<body id="tab4">
<div id="dash_box_titlediagnosis"><a href="implementasi_data.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">Tambah</a></div>
<div id="dash_boxdiagnosis">
<?php
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$query1 = "SELECT * FROM tx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' GROUP BY tanggal_tx DESC";
$hasil1 = mysqli_query($koneksi,$query1);
$no = 1;
while ($data1 = mysqli_fetch_array($hasil1))
{ 
 echo "<b>";
 echo $data1['tanggal_tx'];
  echo "</b>";
 echo "</br>";
 	$tanggal_tx = $data1['tanggal_tx'];
	$query2 = "SELECT * FROM tx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND tanggal_tx='$tanggal_tx' GROUP BY 	shift";
	$hasil2 = mysqli_query($koneksi,$query2);
	$no = 1;
	while ($data2 = mysqli_fetch_array($hasil2))
	{ 
	echo "<b>";
 	echo $data2['shift'];
	echo "</b>";
	echo "</br>";
		$shift = $data2['shift'];
		$query3 = "SELECT * FROM tx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND tanggal_tx='$tanggal_tx' AND shift='$shift'";
		$hasil3 = mysqli_query($koneksi,$query3);
		$no = 1;
		while ($data3 = mysqli_fetch_array($hasil3))
		{ 
		echo $data3['jam_tx'] ; 
		echo " : ";
		echo $data3['implementasi'];
		echo "&nbsp;&nbsp;";
		echo $data3['keterangan'];
		echo "</br>";
		echo "<hr>";
		}
	}
	echo "<hr>";
} 
 ?>
</div>
</br>
<?php
}
?>
</body>
</html>
