<h1>SMS Forward running....</h1>
<?php

// koneksi ke database gammu
include "../librari/inc.koneksidb.php";

// membaca sms yang masuk dan belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($hasil))
{
   // membaca id sms
   $id = $data['ID'];
   // membaca isi sms
   $sms = $data['TextDecoded'];

   // memecah isi sms berdasarkan karakter #
   $pecah = explode("#", $sms);

   // cek keywordnya apakah sama dengan 'FWD'?
   if (strtoupper($pecah[0]) == "FWD")
   {
       // jika keywordnya FWD maka lakukan proses forwarding

       // membaca data phonebook dari tabel 'pbk'
       $query2 = "SELECT * FROM biodata";
       $hasil2 = mysqli_query($koneksi,$query2);
       while ($data2 = mysqli_fetch_array($hasil2))
       {
         // membaca nomor hp
         $nohp = $data2['noHP'];
         // membaca isi pesan yang akan diforward
         $pesan = $pecah[1];
         // proses pengiriman pesan ke setiap no hp
         $query3 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nohp', '$pesan', 'Gammu')";
         mysqli_query($koneksi,$query3);
       }
   }

   // menandai sms telah diproses
   $query2 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
   mysqli_query($koneksi,$query2);
}

?>
