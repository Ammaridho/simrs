<?php
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi,$sql)
      or die ("SQL Error".mysqli_connect_error());
   $data=mysqli_fetch_array($qry);
}

   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['rx'.$i]))
     {
       $rx = $_POST['rx'.$i];
       $nama_obat = $_POST['nama_obat'.$i];
       $query = "DELETE FROM resep WHERE kd_kunjungan='$rx' AND nama_obat='$nama_obat' AND status='Order'";
       mysqli_query($koneksi,$query);
     }
   }
   include "resep_view.php";
?>