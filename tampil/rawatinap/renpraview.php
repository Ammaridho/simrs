<?php
include "../librari/inc.koneksidb.php";
include "header.php";
?>
<html>
<head>
<title>RENCANA KEPERAWATAN</title>
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
<body id="tab3">
RENCANA KEPERAWATAN
<a href="diagnosa_search.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" onClick="NewWindow(this.href,'name','1200','600','yes');return false">Tambah</a>

  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#D9E8F3"><div align="center"><strong>No</strong></div></td>
      <td width="25%" bgcolor="#D9E8F3"><div align="center"><strong>Diagnosa</strong></div></td>
      <td width="35%" bgcolor="#D9E8F3"><div align="center"><strong>Tujuan</strong></div></td>
      <td width="35%" bgcolor="#D9E8F3"><div align="center"><strong>Intervensi</strong></div></td>
    </tr>
<?php 
	$kd_kunjungan = $_REQUEST['kd_kunjungan'];
	$sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' ORDER BY prioritas";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error DP".mysqli_connect_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++
?>
    <tr bgcolor="#FFFFFF">
      <td align="center" valign=top><?php echo $no;?></td>
      <td align="left" valign=top><a href="renpra_data.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&nama_diagnosa=<?php echo $data['nama_diagnosa'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false"><?php echo $data['nama_diagnosa'];?> <?php echo $data['bd'];?></a>
</td>

    <td align="left" valign=top><?php
	$nama_diagnosa = $data['nama_diagnosa'];
	$sql1 = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
    $qry1 = mysqli_query($koneksi,$sql1) or die ("gagal Query");
	while ($data1 =mysqli_fetch_array($qry1)) {
	if ($data1['nama_diagnosa']==$nama_diagnosa) {
	echo "Setelah perawatan ".$data1['waktu']." x ".$data1['satuan']."";
	}
	}

	$sql2 = "SELECT * FROM noc WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      	$qry2 = mysqli_query($koneksi,$sql2) or die ("Gagal Query NOC");
	while ($data2 =mysqli_fetch_array($qry2)) {
	if ($data2['nama_diagnosa']==$nama_diagnosa) {
	echo "<ul><li>".$data2['outcome']." (Target : ".$data2['target'].")</li></ul>";
	}
	}
	?></td>
	<td align="left" valign=top>
	<?php
		$sql3 = "SELECT * FROM nic WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      	$qry3 = mysqli_query($koneksi,$sql3) or die ("Gagal Query NIC");
	while ($data3 =mysqli_fetch_array($qry3)) {
		if ($data3['nama_diagnosa']==$nama_diagnosa) {
	echo "<ul><li>".$data3['intervensi']."</li></ul>";
	}
	}
	?>
</td>
    </tr>
<?php
}
?>
   <tr bgcolor="#FFFFFF">
      <td colspan="5" bgcolor="#D9E8F3"></td>
    </tr>
</table>
</body>
</html>
