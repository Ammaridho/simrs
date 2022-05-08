<?php 
include "../librari/inc.koneksidb.php";
include "header.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}

if (isset($_GET['action'])) {
if ($_GET['action'] == "update")
{
   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($no=0; $no<=$n-1; $no++)
   {
     if (isset($_POST['dx'.$no]))
     {
	   $nama_diagnosa = $_POST['nama_diagnosa'.$no];
	   $dx = $_POST['dx'.$no];
       $prioritas = $_POST['prioritas'.$no];
       $query = "UPDATE dx_keperawatan SET prioritas='$prioritas' WHERE kd_kunjungan='$dx' AND nama_diagnosa='$nama_diagnosa'";
       mysqli_query($query);
     }
   }
}
}
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
<body id="tab2">

<div id="dash_box_titlediagnosis">
<a href="diagnosa.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">Tambah</a></div>
<div id="dash_boxdiagnosis">
<?php 
	$sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' ORDER BY prioritas";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	$no++;	
	while ($data=mysql_fetch_array($qry)) {
?>

<table width="100%">
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>?action=update&kd_kunjungan=<?php echo $kd_kunjungan;?>">
<tr><td>
<input type="hidden" name="dx<?php echo $no;?>" value="<?php echo $data['kd_kunjungan'];?>"/>
DP<input type="text" name="prioritas<?php echo $no;?>" size="1" value="<?php echo $data['prioritas'];?>">
<input type="hidden" name="nama_diagnosa<?php echo $no;?>" size="1" value="<?php echo $data['nama_diagnosa'];?>"><?php echo $data['nama_diagnosa'];?> <?php echo $data['bd'];?><?php $no++;?>
</td>
</tr><hr>
  <?php
}
?>
<tr><td><input type="hidden" name="n" value="<?php echo $no;?>"><input type="submit" name="submit" value="Update"></td></tr>

</form>
</table>
</div>
</body>
</html>
