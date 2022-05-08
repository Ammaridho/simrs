<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi,$sql)
      or die ("SQL Error".mysqli_error($koneksi));
   $data=mysqli_fetch_array($qry);
   $jumdata=mysqli_num_rows($qry);
}

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PENGKAJIAN AWAL DEWASA</title>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form class="form" id="form" method="post" action="pengkajian_dewasa_new_sim.php" style="font-size: 13px; font-family: Verdana; width: 650px;">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<?php 
$asm_db1_code = $_GET['asm_db1_code'];
$query1 ="SELECT * FROM asm_db1 WHERE asm_db1_code='$asm_db1_code'";
$result1 =mysqli_query($koneksi,$query1) or die(mysqli_error($koneksi));
while($data1=mysqli_fetch_array($result1)){
  ?>
<tr bgcolor="#D9E8F3">
    <td colspan="3"><div align="center"><B><?php echo $data1['asm_db1_name'];?></B></div></td>
  </tr>
<?php 
$asm_db1_code = $data1[asm_db1_code];
$query2 ="SELECT * FROM asm_db2 WHERE asm_db1_code='$asm_db1_code'";
$result2 =mysqli_query($koneksi,$query2) or die(mysqli_error($koneksi));
while($data2=mysqli_fetch_array($result2)){
?>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B><?php echo $data2['asm_db2_name'];?></B> :</td>
  </tr>
<?php 
$asm_db2_code = $data2[asm_db2_code];
$query3 ="SELECT * FROM asm_db3 WHERE asm_db2_code='$asm_db2_code'";
$result3 =mysqli_query($koneksi,$query3) or die(mysqli_error($koneksi));
while($data3=mysqli_fetch_array($result3)){
$no++;
?>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data3['asm_db3_name'];?></td>
    <td width="2%">:</td>
    <td width="48%">
	<input type=text list=kaji<?php echo $data3['asm_db3_code'];?> name=kaji<?php echo $data3['asm_db3_code'];?> placeholder="Pilih atau ketik langsung">
		
		<datalist id=kaji<?php echo $data3['asm_db3_code'];?> >
		<?php 
$asm_db3_code = $data3[asm_db3_code];
$query4 ="SELECT * FROM asm_db4,asm_db5 WHERE asm_db4.asm_db5_code=asm_db5.asm_db5_code AND asm_db3_code='$asm_db3_code'";
$result4 =mysqli_query($koneksi,$query4) or die(mysqli_error($koneksi));
while($data4=mysqli_fetch_array($result4)){
$no++;
?>
   			<option> <?php echo $data4['asm_db5_name'];?>  <?php } ?>
		</datalist>	
	</td>
  </tr>
  <?php }}}?>
  <tr bgcolor="#D9E8F3">
    <td>&nbsp;&nbsp;
      <input name="submit" type="submit" id="sendButton" style="margin-top: 0px;" value="Submit" /></td>
    <td>:</td>
    <td></td>
  </tr>
  </form>
</table>
</body>
</html>
