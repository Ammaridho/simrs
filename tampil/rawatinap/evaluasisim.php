<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan 	= $_POST['kd_kunjungan'];
$tanggal_eval 	= $_POST['tanggal_eval'];
$jam_eval 	= $_POST['jam_eval'];
$nama_diagnosa  = $_POST['nama_diagnosa'];
$noc 		= $_POST['noc'];
$hasil 		= $_POST['hasil'];
$user  		= $_POST['user'];
$jumMK 		= $_POST['jumMK'];


for($i = 1; $i <= $jumMK; $i++)
{
   $noc = $_POST['noc'.$i];
   $hasil = $_POST['hasil'.$i];
   if (!empty($noc))
   {
      $query = "INSERT INTO evaluasi VALUES('$kd_kunjungan','$tanggal_eval','$jam_eval','$nama_diagnosa','$noc','$hasil','$user')";
      mysqli_query($koneksi,$query);	  
   }
}
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>

