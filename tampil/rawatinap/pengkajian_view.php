<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}

$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($query);
$data_u = mysql_fetch_array($hasil);

$tahun = floor($data_u['selisih']/365);
$bulan = floor(($data_u['selisih'] - ($tahun * 365))/30);
$hari = $data_u['selisih'] - $bulan * 30 - $tahun * 365;

?>
<html>
<head>
<title>Pengkajian</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
<body>
<?php
if ($tahun == 0 && $bulan <= 2) { 
$query1 = "SELECT * FROM pengkajiandb WHERE type_pengkajian='1' AND kd_pengkajian!='3' AND (kelompok_usia='1' OR kelompok_usia='5')";
$hasil1 = mysqli_query($query1);
while ($data1 = mysql_fetch_array($hasil1))
{
?>
<div id="dash_box_titlediagnosis"><a href="<?php echo $data1['link']; ?>?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false"><?php echo $data1['nama_pengkajian']; ?></a></div>
<div id="dash_boxdiagnosis">
<?php include "".$data1['link_view']." "; ?>
</div><br>
<?php }} 


elseif ($tahun >=4 && $tahun <= 17){
$query2 = "SELECT * FROM pengkajiandb WHERE type_pengkajian='1' AND (kelompok_usia='1' OR kelompok_usia='3')";
$hasil2 = mysqli_query($query2);
while ($data2 = mysql_fetch_array($hasil2))
{
?>
<div id="dash_box_titlediagnosis"><a href="<?php echo $data2['link']; ?>?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false"><?php echo $data1['nama_pengkajian']; ?></a></div>
<div id="dash_boxdiagnosis">
<?php include "".$data2['link_view']." "; ?>
</div><br>
<?php }} 


elseif ($tahun >=18){
$query1 = "SELECT * FROM pengkajiandb WHERE type_pengkajian='1' AND (kelompok_usia='1' OR kelompok_usia='2')";
$hasil1 = mysqli_query($query1);
while ($data1 = mysql_fetch_array($hasil1))
{
?>
<div id="dash_box_titlediagnosis"><a href="<?php echo $data1['link']; ?>?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false"><?php echo $data1['nama_pengkajian']; ?></a></div>
<div id="dash_boxdiagnosis">
<?php include "".$data1['link_view']." "; ?>
</div><br>
<?php }}


elseif ($bulan >= 3 && $bulan <= 11) {
$query4 = "SELECT * FROM pengkajiandb WHERE type_pengkajian='1' AND (kelompok_usia='1' OR kelompok_usia='4')";
$hasil4 = mysqli_query($query4);
while ($data4 = mysql_fetch_array($hasil4))
{
?>
<div id="dash_box_titlediagnosis"><a href="<?php echo $data4['link']; ?>?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false"><?php echo $data1['nama_pengkajian']; ?></a></div>
<div id="dash_boxdiagnosis">
<?php include "".$data4['link_view']." "; ?>
</div><br>
<?php }} 

?>
</body>
</html>
