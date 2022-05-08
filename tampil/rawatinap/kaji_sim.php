<?php
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_POST['kd_kunjungan'];
$pengkajian   = $_POST['pengkajian'];
$nama_diagnosa   = $_POST['nama_diagnosa'];
$jumMK = $_POST['jumMK'];


for($i = 1; $i <= $jumMK; $i++)
{
   $dx = $_POST['dx'.$i];
   $kaji = $_POST['kaji'.$i];
   if (!empty($kaji))
   {
      $query = "INSERT INTO pengkajian VALUES('$kd_kunjungan','$dx','$kaji')";
      mysqli_query($query);	  
   }
}
       
include "kaji_view.php";
?>

