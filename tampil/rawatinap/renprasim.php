<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan 	= $_POST['kd_kunjungan'];
$nama_diagnosa  = $_POST['nama_diagnosa'];
$nic   			= $_POST['nic'];
$noc   			= $_POST['noc'];
$user 			= $_POST['user'];
$target   		= $_POST['target'];
$jumMK 			= $_POST['jumMK'];


for($i = 1; $i <= $jumMK; $i++)
{
   $noc = $_POST['noc'.$i];
   $target = $_POST['target'.$i];
   if (!empty($noc))
   {
      $query = "INSERT INTO noc VALUES('$kd_kunjungan','$nama_diagnosa','$noc','$target','$user')";
      mysqli_query($koneksi,$query);	  
   }
   
   $nic = $_POST['nic'.$i];
   if (!empty($nic))
   {
      $query2 = "INSERT INTO nic VALUES('$kd_kunjungan','$nama_diagnosa','$nic','$user')";
      mysqli_query($koneksi,$query2);	  
   }
}
      $waktu = $_POST['waktu'];
	  $satuan = $_POST['satuan'];
      $query3 = "UPDATE dx_keperawatan SET waktu='$waktu',satuan='$satuan' WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      mysqli_query($koneksi,$query3);

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>

