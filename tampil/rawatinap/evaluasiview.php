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
<title>EVALUASI</title>
<link rel="stylesheet" type="text/css" href="base.css" />
<link rel="stylesheet" type="text/css" href="blue.css" />
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
<body id="tab5">
<?php 
    $nama_diagnosa = $_POST['nama_diagnosa'];
	$sql = "SELECT kd_kunjungan,DATE_FORMAT(tanggal_dx,'%d-%m-%Y') AS tanggal_dx, nama_diagnosa,jam_dx,bd FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
?>
<div id="container">
	<div id="dash_box_titlediagnosis">
    	<a href="evaluasi_data.php?kd_kunjungan=<?php echo $kd_kunjungan;?>&nama_diagnosa=<?php echo $data['nama_diagnosa'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">
	DP <?php echo $no;?>. <?php echo $data['nama_diagnosa'];?> <?php echo $data['bd'];?> :
	<?php
	$nama_diagnosa = $data['nama_diagnosa'];
	$sql2 = "SELECT * FROM data_keperawatan WHERE nama_diagnosa='$nama_diagnosa' AND kd_kunjungan='$kd_kunjungan'";
      	$qry2 = mysqli_query($koneksi, $sql2) or die ("gagal Query");
	while ($data2 =mysqli_fetch_array($qry2)) {
	if ($data2['nama_diagnosa']==$nama_diagnosa) {
	echo "" .$data2['data']."";
	}
	}
	?>
    </a></div>
<div id="dash_boxdiagnosis">
<table><tr><td>
<?php include "evaluasinic.php";?>
</td></tr></table>
</div>
</div>
</br>
<?php
}
}
?>
</body>
</html>
