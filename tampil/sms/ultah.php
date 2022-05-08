<?php
include "../librari/inc.koneksidb.php";

// baca tanggal sekarang
$tglNow = date("d");

// baca bulan sekarang
$blnNow = date("m");

// baca tahun-bulan-tanggal sekarang
$now = date("Y-m-d");

// cari data teman yang bulan lahir dan tanggal lahir sesuai pada current date
$query = "SELECT * FROM biodata WHERE DAY(tanggal_lahir) = '$tglNow' AND MONTH(tanggal_lahir) = '$blnNow'";
$hasil = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($hasil))
{
   // baca nomor HP dan nama teman
   $noHP = $data['noHP'];
   $nama = $data['nama'];

   // insert data ke tabel kirim
   $query2 = "INSERT INTO kirimhut (noHP, tglKirim) VALUES ('$noHP', '$now')";
   $hasil2 = mysqli_query($koneksi,$query2);

   // jika proses insert ke tabel kirim sukses maka kirim sms ucapan
   if ($hasil2)
   {
      // isi pesan SMS ucapan ultah, disertai nama temannya
	  $sql = "SELECT * FROM sms_keyword WHERE keyword='ultah'";
	  $qry = mysqli_query($koneksi,$sql);
	  $data = mysqli_fetch_array($qry);
      $pesanSMS = $data['template'];

      // proses kirim sms via insert data ke tabel outbox
      $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHP', '$nama $pesanSMS', 'Hendi')";
      mysqli_query($koneksi,$query2);
   }
}

?>

</body>
</html>
