<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "../librari/config.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysqli_fetch_array($qry);
}
$query_rsData = "SELECT * FROM users ORDER BY nama ASC";
$rsData = mysqli_query($koneksi,$query_rsData) or die(mysql_error());
$row_rsData = mysqli_fetch_assoc($rsData);
$totalRows_rsData = mysqli_num_rows($rsData);

?>
<html>
<head>
<title>PEMASANGAN ALAT INVASIF</title>
<link rel="stylesheet" type="text/css" href="base.css" />
<link rel="stylesheet" type="text/css" href="blue.css" />
<link href="<?php echo $url;?>media/css/autocomplete.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo $url;?>media/jquery/themes/base/jquery.ui.all.css">
 <script src="<?php echo $url;?>media/jquery/jquery-1.9.1.js"></script>
 <script src="<?php echo $url;?>media/jquery/ui/jquery.ui.core.js"></script>
 <script src="<?php echo $url;?>media/jquery/ui/jquery.ui.widget.js"></script>
 <script src="<?php echo $url;?>media/jquery/ui/jquery.ui.position.js"></script>
 <script src="<?php echo $url;?>media/jquery/ui/jquery.ui.menu.js"></script>
 <script src="<?php echo $url;?>media/jquery/ui/jquery.ui.autocomplete.js"></script>
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

 <script>
 $(function() {
 var availableTags = [
 <?php do { ?>
"<?php echo $row_rsData['username']; ?> <?php echo $row_rsData['nama']; ?>",
<?php } while($row_rsData = mysqli_fetch_assoc($rsData)); ?>
 ];
 $( "#nik" ).autocomplete({
 source: availableTags
 });
 });
 </script>
</head>
<body id="tab5">
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" method="post" action="monitoring_sim.php?kd_kunjungan=<?php echo $kd_kunjungan;?>">
      <tr bgcolor="#D9E8F3">
      <td colspan="2" align="center"><strong>PEMASANGAN ALAT INVASIF </strong><strong> </strong></td>
      </tr>
   	<input name="kd_kunjungan" type="hidden" value="<?php echo $kd_kunjungan ;?>"/>
	<input name="tanggal_pasang" type="hidden" id="tanggal_pasang" value="<?php echo "".date('Y-m-d') ;?>">
	<input name="jam_pasang" type="hidden" id="jam_pasang" size="8" value="<?php echo "".date('H:i') ;?>">
   	<input name="user" type="hidden" value="<?php echo $_SESSION['nama'];?>" />
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td bgcolor="#FFFFFF" width="40%" align="left">Nama Alat</td>
      <td align="left" bgcolor="#FFFFFF"><select name="kd_alat" id="kd_alat">
        <option value="" selected>[Pilih...]</option>
        <?php
	$sql = "SELECT * FROM tm_db";
    $qry = mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysqli_fetch_array($qry)) {
	if ($data[kd_tm]==$kd_tm) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[kd_tm]' $cek>".$data['nama_tm']."</option>";
	}
	?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Frekwensi Pasang </td>
      <td bgcolor="#FFFFFF"><input type="text" name="frekwensi<?php echo $no;?>" size="2">
kali</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Petugas yang memasang </td>
      <td bgcolor="#FFFFFF"><input type="text" name="nik"  value="<?php echo $_SESSION['klinik'];?>" id="nik" size="4"></td>
    </tr>
    <tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3" width="40%"><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" /></td>
      <td bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Tambahkan"></td>
    </tr>
</form>
</table>
</body>
</html>

