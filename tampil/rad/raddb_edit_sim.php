<?php
include "../librari/inc.koneksidb.php";

   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['rad'.$i]))
     {
       $rad 		= $_POST['rad'.$i];
	   $inst 	    = $_POST['inst'.$i];
	   $nama_rad 	= $_POST['nama_rad'.$i];
	   $harga_rad 	= $_POST['harga_rad'.$i];
	   $discount	= $_POST['discount'.$i];
	   $keterangan	= $_POST['keterangan'.$i];
       $query 	= "UPDATE rad_db SET inst='$inst', nama_rad='$nama_rad', harga_rad='$harga_rad', discount='$discount', keterangan='$keterangan' WHERE kd_rad='$rad'";
       mysqli_query($koneksi,$query);
     }
   }
include "pengaturan.php";
?>
