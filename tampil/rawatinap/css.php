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
?>
<html>
<head><title>RENCANA KEPERAWATAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="base.css" /></head>
<link rel="stylesheet" type="text/css" href="blue.css" /></head>
<body>
<left>
	<div id="container">
			<?php include "renpraview.php";?>
	</div>
	
</center>
</body>
</html>
