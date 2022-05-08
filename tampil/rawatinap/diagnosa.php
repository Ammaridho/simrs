<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".error());
   $data=mysqli_fetch_array($qry);
}
?>
<html>
<head>
<link href="css/autocomplete.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="jquery/themes/base/jquery.ui.all.css">
</head>
<body>
<form method="post" action="diagnosa_search.php?kd_kunjungan=<?php echo $kd_kunjungan;?>">
<div align="center"><input name="q" size="60" VALUE=""  placeholder="Ketik keyword dari diagnosa keperawatan yang dicari, tekan enter."></input>
<input align="center" type="submit" name="submit" value="Search"></div>
</form>
<body>
</html> 