<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";

$n = $_POST['n'];
for ($i=0; $i<=$n-1; $i++)
   {
   if (isset($_POST['rad'.$i]))
   {
   $tanggal_hasil	= $_POST['tanggal_hasil'];
   $jam_hasil		= $_POST['jam_hasil'];
   $rad 			= $_POST['rad'.$i];
   $dr_radiologi 	= $_POST['dr_radiologi'];
   $template		= $_POST['template'];
   {
   $query = "UPDATE rad SET tanggal_hasil='$tanggal_hasil',jam_hasil='$jam_hasil',expertise='$template',dr_radiologi='$dr_radiologi' WHERE id='$rad'";
      mysqli_query($koneksi,$query);	  
   }
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
    $kd_kunjungan = $_GET['kd_kunjungan'];
	$sql = "SELECT * FROM rad WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi,$sql) 
		 or die ("SQL Error".mysqli_connect_error());
	while ($data=mysqli_fetch_array($qry)) {
  ?>
<meta http-equiv="refresh" content="1;url=rad_input.php?kd_kunjungan=<?php echo "".$data['kd_kunjungan']."";?>" />
<?php
}
?>
<title>Data berhasil disimpan !</title>
</head>
<body id="tab1">
<h3 align="center">Sedang menyimpan...</h3>
<h3 align="center"><img src="<?php echo $url;?>media/image/facebook.gif"/></h3>
</div>
</body>
</html>