<?php
include "../librari/inc.koneksidb.php";

// baca tanggal sekarang
$tglNow = date("d");

// baca bulan sekarang
$blnNow = date("m");

// baca tahun-bulan-tanggal sekarang
$tanggal = date("Y-m-d");
$jam = date("H:i");

// cari data teman yang bulan lahir dan tanggal lahir sesuai pada current date
$query = "SELECT * FROM data_pasien WHERE sms='Ya' AND tgl_kirim='$tanggal' AND jam_kirim>='$jam' AND sms='Ya'";
$hasil = mysqli_query($koneksi,$query);
while ($data = mysqli_fetch_array($hasil))
{
   // baca nomor HP dan nama teman
   $kd_kunjungan =  $data['kd_kunjungan'];
   $nama = $data['nama'];
   $pesan = $data['pesan'];
   $noHP = $data['noHP'];
   $adl = $data['adl'];


   // proses kirim sms via insert data ke tabel outbox
      $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHP', 'Yth $nama, $pesan', 'Hendi')";
      mysqli_query($koneksi,$query2);

   // proses kirim sms via insert data ke tabel outbox
      $query2 = "UPDATE data_pasien SET sms='SENT' WHERE kd_kunjungan='$kd_kunjungan'";
      mysqli_query($koneksi,$query2);
   }
?>
