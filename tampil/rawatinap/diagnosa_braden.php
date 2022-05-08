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
<title>DIAGNOSA KEPERAWATAN</title>
<style type="text/css">
<!--
.style1 {font-size: 9px}
-->
</style>
</head>
<body id="tab3">
  <table align="left" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF">
      <td width="5%" align="center" bgcolor="#D9E8F3"><b>Cek</b></td>
      <td width="55%" align="center" bgcolor="#D9E8F3"><b>Diagnosa Keperawatan</b></td>
      <td width="40%" align="left" bgcolor="#D9E8F3"><b>Faktor yang berhubungan</b></td>
   	</tr>
  <form name="form1" method="post" action="diagnosasim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
    <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
    <input name="tanggal_dx" type="hidden" value="<?php echo "".date('Y-m-d');?>" />
    <input name="jam_dx" type="hidden" value="<?php echo "".date('H:i');?>" />
  <tr bgcolor="#FFFFFF">
<?php
$query = "SELECT * FROM diagnosadb WHERE nama_diagnosa like '%kulit%' ORDER BY nama_diagnosa";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
      <td width="5%" align="center" bgcolor="#FFFFFF"><input type="checkbox" value="<?php echo $data['nama_diagnosa'];?>" name="dx<?php echo $no;?>" /></td>
      <td width="55%" align="left" bgcolor="#FFFFFF"><?php echo $data['nama_diagnosa'];?></td>
      <td width="40%" align="left" bgcolor="#FFFFFF"><select name="bd<?php echo $no;?>">
    <option value=" bd ?" selected>[Pilih...]</option>
	<?php
	$nama_faktor = $data[nama_faktor];
	$kd_diagnosa = $data[kd_diagnosa];
	$sql = "SELECT * FROM faktordb WHERE kd_diagnosa='$kd_diagnosa'";
      	$qry = @mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[kd_diagnosa]==$kd_diagnosa) {
	$cek="";
	}
	else {
	$cek="selected";
	}
	echo "<option value=' bd $data[nama_faktor]' $cek>".$data['nama_faktor']."</option>";
	}
	?>
    </select>

<?php$no++;?></td>
   	</tr>
    <?php
}
?>
    <tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" /></td>
      <td width="55%" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Tambahkan"></td>
<td width="40%"><span class="style1">Daftar ini hanya menampilkan 30 diagnosa, silahkan cari dengan kata kunci yang lebih spesifik.</span></td>
    </tr>
	  </form>
	  <script>
<!--
/*By George Chiang(JK's JavaScript tutorial)http://javascriptkit.com 
Credit must stay intact for use*/
function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM"
if(hours>11){
dn="PM"
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.form1.jam_dx.value=hours+":"+minutes+":"+seconds+" "+dn
setTimeout("show()",1000)
}
show()
//-->
</script>
</table>
</body>
</html>
