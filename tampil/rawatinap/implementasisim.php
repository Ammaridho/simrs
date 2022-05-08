<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan 	= $_POST['kd_kunjungan'];
$tanggal_tx 	= $_POST['tanggal_tx'];
$jam_tx 		= $_POST['jam_tx'];
$shift 		= $_POST['shift'];
$nik  		= $_POST['nik'];
$dx  			= $_POST['dx'];
$nac 			= $_POST['nac'];
$ket  		= $_POST['ket'];
$jumMK 		= $_POST['jumMK'];


for($i = 1; $i <= $jumMK; $i++)
{
   $nac = $_POST['nac'.$i];
   $dx 	= $_POST['dx'.$i];
   $jam_tx = $_POST['jam_tx'.$i];
   $ket = $_POST['ket'.$i];
   if (!empty($nac))
   {
      $query = "INSERT INTO tx_keperawatan VALUES('$kd_kunjungan','$tanggal_tx','$jam_tx','$shift','$nik','$dx','$nac','$ket')";
      mysqli_query($koneksi,$query) or die("error :".mysqli_error($koneksi));	  
   }
}
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>

