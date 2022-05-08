<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "../librari/inc.kodeauto.php";

$jumMK = $_POST['jumMK'];
for($i = 1; $i <= $jumMK; $i++)
{
   if (isset($_POST['kd_item'.$i]))
   {
	$kd_transaksi = $_POST['kd_transaksi'];
	$tanggal_trx   = $_POST['tanggal_trx'.$i];
	$kd_kunjungan = $_POST['kd_kunjungan'];
	$kd_item   = $_POST['kd_item'.$i];
	$grup_item = $_POST['grup_item'.$i];
	$nama_item = $_POST['nama_item'.$i];
	$qty_item = $_POST['qty_item'.$i];
	$asuransi = $_POST['asuransi'.$i];
	$pribadi = $_POST['pribadi'.$i];
	$operator = $_POST['operator'.$i];
	$username = $_SESSION['username'];
		{
		$query = "INSERT INTO transaksi (kd_transaksi,tanggal_trx,kd_kunjungan,kd_item,grup_item,nama_item,qty_item,asuransi,pribadi,operator,username)
		VALUES('$kd_transaksi','$tanggal_trx','$kd_kunjungan','$kd_item','$grup_item','$nama_item','$qty_item','$asuransi','$pribadi','$operator','$username')";
		mysqli_query($koneksi,$query);	  
		}
	} 
}

	  $query2 = "INSERT INTO transaksi_no VALUES('$kd_transaksi','$kd_kunjungan')";
      mysqli_query($koneksi,$query2);	
	  
	  $query3 = "UPDATE reg SET selesai='Selesai' WHERE kd_kunjungan='$kd_kunjungan'";
      mysqli_query($koneksi,$query3);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
    $prn = $_GET['kd_kunjungan'];
	$sql = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi,$sql) 
		 or die ("SQL Error".mysqli_error($koneksi));
	while ($data=mysqli_fetch_array($qry)) {
  ?>
<meta http-equiv="refresh" content="0;url=kwitansi.php?kd_kunjungan=<?php echo "".$data['kd_kunjungan']."";?>" />
<?php
}
?>
<title>Transaksi berhasil disimpan !</title>
</head>
<body id="tab1">
<h3 align="center">Sedang menyimpan...</h3>
<h3 align="center"><img src="<?php echo $url;?>media/image/facebook.gif"/></h3>
</div>
</body>
</html>
