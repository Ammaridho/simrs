<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal   = $_REQUEST['tanggal'];
$jam   = $_REQUEST['jam'];
$prioritas   = $_REQUEST['prioritas'];
$bd = $_REQUEST['bd'];
$waktu = $_REQUEST['waktu'];
$satuan = $_REQUEST['satuan'];
$kd_unit = $_REQUEST['kd_unit'];
$user = $_REQUEST['user'];
$jumMK = $_REQUEST['jumMK'];


for($i = 1; $i <= $jumMK; $i++)
{
   $dx = $_REQUEST['dx'.$i];
   $bd = $_REQUEST['bd'.$i];
   $prioritas = $_REQUEST['prioritas'.$i];
   if (!empty($dx))
   {
      $query = "INSERT INTO dx_keperawatan (kd_kunjungan,tanggal_dx,jam_dx,nama_diagnosa,bd,waktu,satuan,prioritas,user)";
	  $query .=  "VALUES('$kd_kunjungan','$tanggal','$jam','$dx','$bd','$waktu','$satuan','$prioritas','$user')";
      mysqli_query($koneksi, $query) or die ("SQL Error saat disimpan".mysqli_connect_error());	  
   }
}
       
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
