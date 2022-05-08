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
<title>PENGKAJIAN BUILDER</title>
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
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form class="form" id="form" method="post" action="pengkajian_dewasa_new_sim.php" style="font-size: 13px; font-family: Verdana; width: 650px;">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<a href="pengkajian_db1_create.php" onClick="NewWindow(this.href,'name','800','600','yes');return false"><img src="file_add.png" height="15" width="15"/></a>
<tr bgcolor="#D9E8F3">
  <td width="10%" align="center">AKSI</td>
  <td width="4%" align="center">KODE</td>
  <td width="86%" align="center">NAMA PENGKAJIAN AWAL </td>
</tr><?php 
$query1 ="SELECT * FROM asm_db1";
$result1 =mysqli_query($koneksi,$query1) or die(mysqli_error($koneksi));
while($data1=mysqli_fetch_array($result1)){
  ?>
<tr bgcolor="#D9E8F3">
    <td><div align="left">
	&nbsp;<a href="pengkajian_db1_create.php?asm_db1_code=<?php echo $data1['asm_db1_code'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false"><img src="file_edit.png" height="15" width="15"/></a>
	&nbsp;<a href="pengkajian_db2_view.php?asm_db1_code=<?php echo $data1['asm_db1_code'];?>"><img src="file_search.png" height="15" width="15"/></a>
	<!--&nbsp;<img src="file_delete.png" height="15" width="15"/>-->
        </div></td>
    <td><b><?php echo $data1['asm_db1_code'];?></b></td>
    <td><b><?php echo $data1['asm_db1_name'];?></b></td>
</tr>
  <?php }?>
  </form>
</table>
</body>
</html>
