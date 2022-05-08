<?php
include "../librari/inc.koneksidb.php";
include "header.php";

$kd_kunjungan = $_POST['kd_kunjungan'];
$nama_diagnosa = $_POST['nama_diagnosa'];
$prioritas = $_POST['prioritas'];
$jumMK = $_POST['jumMK'];


for($no = 1; $no <= $jumMK; $no++)
{
$kd_kunjungan = $_POST['kd_kunjungan'.$no];
$nama_diagnosa = $_POST['nama_diagnosa'.$no];
$prioritas = $_POST['prioritas'.$no];
   if (!empty($kd_kunjungan))
   {
      $query = "UPDATE dx_keperawatan SET
			prioritas='$prioritas' WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
      mysqli_query($query);	  
   }
}
       
include "diagnosaview.php";
?>


