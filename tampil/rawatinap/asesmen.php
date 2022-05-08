<?php 
session_start();
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "header.php";
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
<body id="tab1">
<h2 align="center">Pilih Diagnosa</h2>
</hr>
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
    <input name="kd_unit" type="text" value="<?php echo $data['kd_unit'];?>" />
    <input name="user" type="text" value="<?php echo $_SESSION['username'];?>" />
<?php
$asesmen_02 = $_REQUEST['asesmen_02'];
$query = "SELECT * FROM asesmen  GROUP BY asesmen_02";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
<tr>
<td colspan="6"><?php echo $data['asesmen_02'];?></td>
</tr>
  <tr bgcolor="#FFFFFF">
<?php
$asesmen_02 = $_REQUEST['asesmen_02'];
$query = "SELECT * FROM asesmen  GROUP BY asesmen_03";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
      <td width="5%" align="center" bgcolor="#FFFFFF"><input type="checkbox" value="<?php echo $data['asesmen_03'];?>" name="dx<?php echo $no;?>" /></td>
      <td width="55%" align="left" bgcolor="#FFFFFF"><?php echo $data['asesmen_03'];?></td>
      <td width="40%" align="left" bgcolor="#FFFFFF"><select name="bd<?php echo $no;?>">
    <option value=" bd ?" selected>[Pilih...]</option>
	<?php
	$asesmen_03 = $data[asesmen_03];
	$asesmen_04 = $data[asesmen_04];
	$sql = "SELECT * FROM asesmen WHERE asesmen_03='$asesmen_03'";
      	$qry = @mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[asesmen_03]==$asesmen_03) {
	$cek="";
	}
	else {
	$cek="selected";
	}
	echo "<option value=' bd $data[asesmen_04]' $cek>".$data['asesmen_04']."</option>";
	}
	?>
    </select>

<?php$no++;?></td>
   	</tr>
    <?php
}
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
