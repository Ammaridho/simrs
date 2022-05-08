<?php
session_start();
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
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
      <td width="10%" bgcolor="#D9E8F3"><div align="left">No</div></td>
      <td width="90%" bgcolor="#D9E8F3"><div align="left">Jenis Pengkajian</div></td>
    </tr>
<?php 
	$sql3 = "SELECT * FROM asm_db1";
	$qry3 = mysqli_query($koneksi, $sql3) or die ("SQL Error DP".mysqli_error($koneksi));
    $no=1;
	while ($data3=mysqli_fetch_array($qry3)) {
    
?>

	<tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><?php echo $no++;?></div></td>
      <td width="5%" bgcolor="#FFFFFF"><div align="left"><a href='pengkajian_dewasa_new.php?kd_kunjungan=<?php echo $kd_kunjungan;?>&asm_db1_code=<?php echo $data3['asm_db1_code'];?>'><?php echo $data3['asm_db1_name'];?></a></div></td>
    </tr>
<?php
	}
?>
</body>
</html>