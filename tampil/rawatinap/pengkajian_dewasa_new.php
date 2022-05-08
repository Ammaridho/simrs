<?php 
session_start();
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];

if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
    });
</script>
</head>
<body>
<?php
   $asm_db1      = $_REQUEST['asm_db1'];
   $sql_asm = "SELECT * FROM pengkajian WHERE kd_kunjungan='$kd_kunjungan' AND asm_db1='$asm_db1'";
   $qry_asm = mysqli_query($koneksi, $sql_asm)
      or die ("SQL Error".mysqli_error($koneksi));
   $data_asm=mysqli_fetch_array($qry_asm);
   $jumdata_asm=mysqli_num_rows($qry_asm);
   if($jumdata_asm==0){
?>
<!-- PENGKAJIAN AWAL BARU -->
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form class="form" id="form" method="post" action="pengkajian_dewasa_new_sim.php?action=input" style="font-size: 13px; font-family: Verdana; width: 650px;">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo "".$_SESSION['nama']."";?>">
<?php 
$asm_db1_code = $_REQUEST['asm_db1_code'];
$query1 ="SELECT * FROM asm_db1 WHERE asm_db1_code='$asm_db1_code'";
$result1 =mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
while($data1=mysqli_fetch_array($result1)){
  ?>
<tr bgcolor="#D9E8F3">
    <td colspan="3"><div align="center"><B><?php echo $data1['asm_db1_name'];?></B></div></td>
  </tr>
<?php 
$asm_db1_code = $data1['asm_db1_code'];
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
$result3 =mysqli_query($koneksi, $query3) or die(mysqli_error($koneksi));
while($data3=mysqli_fetch_array($result3)){
$i++;
?>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="asm_db1<?php echo $i;?>" value="<?php echo $data1['asm_db1_code'];?>" />
        <input type="hidden" name="asm_db2<?php echo $i;?>" value="<?php echo $data2['asm_db2_code'];?>" />
        <input type="hidden" name="asm_db3<?php echo $i;?>" value="<?php echo $data3['asm_db3_code'];?>">
      <?php echo $data3['asm_db3_name']; echo $mark;?> </td>
    <td width="2%">:</td>
    <td width="48%">
	<input type=<?php echo $data3['datatype'];?> list=asm_db4<?php echo $i;?> name=asm_db4<?php echo $i;?> placeholder="<?php echo $data3['asm_db3_name'];?>" size="50%">
		<datalist id=asm_db4<?php echo $i;?> >
		<?php 
$asm_db3_code = $data3[asm_db3_code];
$query4 ="SELECT * FROM asm_db4,asm_db5 WHERE asm_db4.asm_db5_code=asm_db5.asm_db5_code AND asm_db3_code='$asm_db3_code'";
$result4 =mysqli_query($koneksi, $query4) or die(mysqli_error($koneksi));
while($data4=mysqli_fetch_array($result4)){
?>
		  <option> <?php echo $data4['asm_db5_name'];?>  <?php } ?>
		</datalist>	
	</td>
  </tr>
  <?php }}}?>
  <tr bgcolor="#D9E8F3">
    <td>&nbsp;&nbsp;
      <input type="hidden" name="jumMK" value="<?php echo $i;?>" /><input name="submit" type="submit" id="sendButton" style="margin-top: 0px;" value="Submit" /></td>
    <td>:</td>
    <td></td>
  </tr>
  </form>
</table>
<?php
exit;
}
else { 
?>

<!-- PENGKAJIAN AWAL EDIT -->
<script type="text/javascript">
	$(document).ready(function(){			
		autosave();
		var jumMK = 0;
	});
	
	function autosave()
	{
		var t = setTimeout("autosave()", 1000); // Jalankan fungsi autosave setiap 1 detik sekali
		jumMK += 1;
		var tanggal = $("#tanggal").val();				
		var asm_db3 = $("#asm_db3 '+jumMK+'").val();
		var asm_db4 = $("#asm_db4 '+jumMK+'").val();
			
		if (asm_db4.length > 0)
		{
			$.ajax(
			{
				type: "POST",
				url: "pengkajian_dewasa_new_autosave.php",
				data: "kd_kunjungan=" + <?php echo $kd_kunjungan ?> + "&tanggal=" + tanggal + "&asm_db3=" + asm_db3 + "&asm_db4=" + asm_db4,
				cache: false,
				success: function(pesan)
				{	
					$("#waktu").empty().append(pesan);
				}
			});
		}
	} 
</script>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form class="form" id="form" method="post" action="pengkajian_dewasa_new_sim.php?action=update" style="font-size: 13px; font-family: Verdana; width: 650px;">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tgl_update" type="hidden" id="tgl_update" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam_update" type="hidden" id="jam_update" value="<?php echo "".date('H:i:s') ;?>">
<input name="shift" type="hidden" id="jam" value="<?php echo "".$_SESSION['shift']."" ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo "".$_SESSION['nama']."";?>">
<?php
$asm_db1 = $_REQUEST['asm_db1'];

$query1 ="SELECT a.*, b.* FROM pengkajian a, asm_db1 b WHERE a.asm_db1=b.asm_db1_code AND a.asm_db1='$asm_db1' AND a.kd_kunjungan='$kd_kunjungan'";
$result1 =mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
$data1=mysqli_fetch_array($result1);
?>
<tr bgcolor="#D9E8F3">
    <td colspan="3"><div align="center"><B><?php echo $data1['asm_db1_name'];?></B></div></td>
  </tr>
<?php 
$asm_db1 = $data1[asm_db1];
$query2 ="SELECT * FROM pengkajian,asm_db2 WHERE pengkajian.asm_db2=asm_db2.asm_db2_code AND asm_db1='$asm_db1' AND kd_kunjungan='$kd_kunjungan' GROUP  BY asm_db2";
$result2 =mysqli_query($koneksi,$query2) or die(mysqli_error($koneksi));
while($data2=mysqli_fetch_array($result2)){
?>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B><?php echo $data2['asm_db2_name'];?></B> :</td>
  </tr>
<?php 
$asm_db2 = $data2[asm_db2];
$query3 ="SELECT * FROM pengkajian,asm_db3 WHERE pengkajian.asm_db3=asm_db3.asm_db3_code AND asm_db2='$asm_db2' AND kd_kunjungan='$kd_kunjungan' ORDER BY asm_db3";
$result3 =mysqli_query($koneksi,$query3) or die(mysqli_error($koneksi));
while($data3=mysqli_fetch_array($result3)){
$i++;

if($data3['mandatori']==1){
$wajib_isi = "required";
$mark = "*";
}
else { 
  $wajib_isi = "";
  $mark = "";
}
?>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="asm_db1<?php echo $i;?>" value="<?php echo $data1['asm_db1'];?>" />
        <input type="hidden" name="asm_db2<?php echo $i;?>" value="<?php echo $data2['asm_db2'];?>" />
        <input type="hidden" name="asm_db3<?php echo $i;?>" value="<?php echo $data3['asm_db3'];?>">
        <input name="tanggal" type="hidden" id="tgl_update" value="<?php echo $data3['tanggal']; ;?>">
      <?php echo $data3['asm_db3_name']; echo $mark;?> </td>
    <td width="2%">:</td>
    <td width="48%">
	<input type=<?php echo $data3['datatype'];?> list=asm_db4<?php echo $i;?> name=asm_db4<?php echo $i;?> placeholder="<?php echo $data3['asm_db3_name'];?>" size="50%" value="<?php echo $data3['asm_db4'];?>" <?php echo $wajib_isi;?>>
		<datalist id=asm_db4<?php echo $i;?> >
		<?php 
$asm_db3_code = $data3[asm_db3_code];
$query4 ="SELECT * FROM asm_db4,asm_db5 WHERE asm_db4.asm_db5_code=asm_db5.asm_db5_code AND asm_db3_code='$asm_db3_code'";
$result4 =mysqli_query($koneksi,$query4) or die(mysqli_error($koneksi));
while($data4=mysqli_fetch_array($result4)){
?>
   			<option> <?php echo $data4['asm_db5_name'];?>  <?php } ?>
		</datalist>	
	</td>
  </tr>
  <?php }}?>
  <tr bgcolor="#D9E8F3">
    <td>&nbsp;&nbsp;
      <input type="hidden" name="jumMK" value="<?php echo $i;?>" /><input name="submit" type="submit" id="sendButton" style="margin-top: 0px;" value="Update" /></td>
    <td>:</td>
    <td></td>
  </tr>
  </form>
</table>

<?php
}
?>
</body>
</html>
