<?php 
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
?>
<html>
<head>
<title>DIAGNOSA KEPERAWATAN</title>
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
<body id="tab3">
<?php 
        $nama_diagnosa = $_POST['nama_diagnosa'];
	$sql = "SELECT kd_kunjungan,DATE_FORMAT(tanggal_dx,'%d-%m-%Y') AS tanggal_dx, nama_diagnosa,jam_dx,bd FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' ORDER BY prioritas";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
?>
	<div id="container">
	<div id="dash_box_titlediagnosis">
	<a href="renpra_data.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&nama_diagnosa=<?php echo $data['nama_diagnosa'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">
      	<?php echo $data['nama_diagnosa'];?> <?php echo $data['bd'];?> yang ditandai dengan :
	<?php
	$nama_diagnosa = $data[nama_diagnosa];
	$sql2 = "SELECT * FROM data_keperawatan WHERE nama_diagnosa='$nama_diagnosa' AND kd_kunjungan='$kd_kunjungan'";
      	$qry2 = @mysqli_query($sql2, $koneksi) or die ("gagal Query");
	while ($data2 =mysql_fetch_array($qry2)) {
	if ($data2[nama_diagnosa]==$nama_diagnosa) {
	echo "" .$data2['data'].",";
	}
	}
	?></a>
</div>
<div id="dash_boxdiagnosis">
<table>    
    <tr>
    <td align="center" width="427"><b>Kriteria</b></td>
    <td width="429" align="center"><b>Intervensi</b></td>
    </tr>
    <tr>
    <td width="427" valign=TOP>
        <?php
	$sql3 = "SELECT * FROM noc WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      	$qry3 = @mysqli_query($sql3, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry3)) {
	if ($data[nama_diagnosa]==$nama_diagnosa) {
	echo "<ul><li>".$data['outcome']."</li></ul>";
	}
	}
	?>      </td>
      <td valign=TOP>
<?php
	$sql4 = "SELECT * FROM nic WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      	$qry4 = @mysqli_query($sql4, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry4)) {
	if ($data[nama_diagnosa]==$nama_diagnosa) {
	echo "<ul><li>".$data['intervensi']."</li></ul>";
	}
	}
	?>
	</td>
    </tr>
</table>
</div>
</div>

</br>
<?php
}
}
?>

</body>
</html>
