<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM data_pasien WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>PENGKAJIAN</title>
<style type="text/css">
<!--
.style1 {font-size: 9px}
-->
</style>
</head>
<body>
  <table align="left" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="kaji_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
    <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<tr bgcolor="#FFFFFF">
<?php
$kd_divisi = $_REQUEST['kd_divisi'];
$query = "SELECT * FROM diagnosadb,kajidb WHERE diagnosadb.kd_diagnosa=kajidb.kd_diagnosa AND kajidb.kd_divisi='$kd_divisi' GROUP BY kajidb.data";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
      <td width="9%" align="center" bgcolor="#FFFFFF">
	  <input type="checkbox" value="<?php echo $data['data'];?>" name="kaji<?php echo $no;?>" /></td>
      <td width="91%" align="left" bgcolor="#FFFFFF">
	  <input type="hidden" value="<?php echo $data['nama_diagnosa'];?>" name="dx<?php echo $no;?>" size="100%"></input>
	  <?php echo $data['data'];?>


<?php
	if ($data[kd_diagnosa]=="Dx0004" && $data[data]!="Tidak ada nyeri") {
	echo "<input value='$data[nama_faktor]' type='text'>".$data['nama_faktor']."</input>";
	}
	?>


<?php$no++;?></td>
   	</tr>
    <?php
}
?>
    <tr bgcolor="#FFFFFF">
      <td width="9%" bgcolor="#FFFFFF"><input type="hidden" name="jumMK" value="<?php echo $no; ?>" /></td>
      <td width="91%" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Tambahkan"></td>
    </tr>
	  </form>
</table>
</body>
</html>
