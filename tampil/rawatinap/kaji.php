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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="../sidebar/jquery-1.2.1.min.js" type="text/javascript"></script>
	<script src="../sidebar/menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../sidebar/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Menu</title>
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->
</head>
<body>
<ul id="menu">
<li>
<ul>
<?php
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$query = "SELECT * FROM divisidb";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
<li><a href="kaji_view.php?kd_divisi=<?php echo $data['kd_divisi'];?>&kd_kunjungan=<?php echo $kd_kunjungan;?>" target="iFrame2"><?php echo $data['divisi'];?></a></li>
<?php
}
?>
</body>
</html>
