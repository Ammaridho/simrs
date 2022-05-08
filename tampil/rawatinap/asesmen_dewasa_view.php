<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM asesmen_dewasa WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>PENGKAJIAN AWAL KEPERAWATAN</title>
</head>
<body id=tab0>
<div align="center">PENGKAJIAN AWAL KEPERAWATAN</br>
(Pasien dewasa dan lansia)</br></br></div>
<b>PASIEN DEWASA</br></br></b>
<b>A.  Informasi Umum</br></b>
    1. Masuk melalui   :   <?php echo $data['a1'];?></br>
    2. Menggunakan   :  <?php echo $data['a2'];?></br>
    3. Jam masuk           :  , Perawat yang mengantar:  </br> 
    4. Gelang identitas   :  </br>
    5. Diagnosa saat masuk  : </br>
    6. Riwayat Alergi : <?php
	if ($data['a6']=="Ada alergi") {
	echo "  ".$data['a6']." : ".$data['a6a']."  ".$data['a6b']."  ".$data['a6c']."";
	}
	else {
		echo "".$data['a6']."";
	}
	?>
	</br>
 &nbsp;&nbsp; &nbsp;Kapan :  bentuk reaksi:</br>
    7. Keluhan Utama : </br></br>

<b>B. Riwayat Penyakit sekarang :</br></br></b>
<b>C. Riwayat Kesehatan :  </br></br></b>
   1. Pernah dirawat di RS: ,kapan . Alasan dirawat :    </br>
   2. Riwayat Operasi:  tidak/ya, kapan .....             Jenis Operasi : ....</br></br>
<b>D. Riwayat penyakit keluarga: hipertensi/jantung/DM/asma/.... </br></br></b>
<b>E. Pengkajian Fisik dan Identifikasi Masalah: </br></br></b>
   1. Pernapasan </br>
     a. Frekuensi :  x / menit;  Pola: teratur/tidak teratur; dalam/dangkal</br>
     b. Sesak: tidak/ada; dengan/tanpa aktivitas </br>
     c. Suara napas tambahan: tidak/ada, jenis: .. </br>
     d. Batuk: tidak/ada,   dahak: tidak/ada, warna ....</br>
     e. Perokok: tidak/ ya,   batang/hari; berhenti merokok sejak :  </br>
     f. Alat bantu napas: tidak/ya , oksigen .... liter/menit</br></br>
   2. Kardiovaskuler & sirkulasi </br>
     a. Nadi :  x/menit; teratur/tidak teratur; kuat/lemah, </br>
     b. Pengisian kapiler: kurang /lebih  3 detik </br>
     c. Tekanan darah : / mmHg, Suhu: 0C; axilla/telinga/</br>
     d. Warna kulit: normal/pucat/sianosis/kemerahan</br>
     e. Perabaan:  dingin /lembab/lain-lain : ..</br>
     f. Edema: tidak/ya, lokasi ....</br></br>
  3. Pencernaan </br>
     a. Mulut dan gigi: bersih / kotor / sariawan / karies; / karang gigi / lain-lain   </br>
         Gigi palsu: tidak/ada,  gigi atas / bawah </br>
     b. Bising usus: ....x/menit, kembung: tidak/ya</br>
     c. Kebiasaan makan:  kali / hari; Nafsu makan: baik/cukup /kurang</br>
     d. Masalah dalam makan: mual/ muntah /sakit menelan </br>
     e. Diet: </br>
     f. Alat bantu: NGT/gastrostomi</br>
     g. Kebiasaan BAB: setiap  x/hari  </br>
         Masalah dalam BAB: obstipasi / konstipasi /diare; tidak/ya, frekuensi: x/hari; kolostomi bag tidak/ya, bentuk feses ....  </br></br>
  4. Perkemihan
     a. Kebiassaan BAK: kali / hari; warna: kuning jernih/kuning pekat/merah/ darah</br>
     b. Distensi kandung kemih: tidak/ya</br>
     c. Masalah dalam BAK: anyang-anyangan/sakit waktu berkemih/terkontrol/tidak terkontrol/ oliguria.</br> 
     d.  Alat bantu yang digunakan: tidak ada/ kondom / kateter folley </br></br>
  5. Persyarafan</br>
     a. Kesadaran: compos mentis/apatis/somnolen/sopor/coma</br>
     b. GCS: E: ....  V: .... M: ..... total ....</br>
     c. Mata: normal/penglihatan jauh/penglihatan dekat; alat bantu: kaca mata/kontak lensa </br>
     d. Pupil: isokor/an-isokor; reaksi terhadap cahaya; kanan: positif / negatif ; kiri: positif / negatif</br>
     e. Kejang:  tidak/ ada; lamanya ... detik/menit </br>
     f. Gangguan pergerakan: tidak/ada; hemiparese/hemiplegi: kanan/kiri; tetra parese/tetra plegi</br> 
     g. Gangguan bicara: tidak/ada; kesulitan bicara/tidak bisa bicara/ pelo  </br>
     h. Skrining nyeri: nyeri: tidak /ya (jika ya, lanjutkan ke pengkajian nyeri)</br></br>
  6. Integumen dan Muskoloskeletal/ Mobilisasi </br>
     a. Keadaaan kulit: utuh/bercak-bercak/ petechie/ gatal-gatal/ memar/ skar / terdapat luka/ dekubitus; lokasi ....</br> 
     b. Turgor kulit: elastis/tidak elastis </br>
     c. Kesulitan pergerakan:  tidak/ ada; bagian tubuh ....  </br>
     d. Kontraktur: tidak /ada, bagian tubuh .... </br>
     e. Risiko jatuh (gunakan pengkajian risiko jatuh)</br>
     f. Risiko Dekubitus (gunakan pengkajian risiko dekubitus)</br></br>
  7. Reproduksi </br>
     a. Riwayat mensturasi: lamanya , haid terakhir : .  masalah .. </br>
     b. Status perkawinan: menikah/belum menikah/janda/duda </br>
     c. Jumlah anak .... </br></br>
  8. Istirahat dan Tidur </br>
     a. Kebiasaan tidur: malam jam ;  siang .. jam </br>
     b. Masalah dalam tidur: sukar tidur / tidak bisa tidur / bangun lebih awal/lain-lain </br>
     c. Penggunaan obat tidur: tidak/ya, jenis: dosis:. </br></br>
<b>F. Pengkajian Sosio-Ekonomi-Psikologis-Spritual</br></b>
  1. Sosial  dan  Ekonomi </br>
     a. Bahasa yang dipakai sehari-hari: .... </br>
     b. Perlu penerjemah: tidak/ ya, jika ya bahasa: .............. </br>
     c. Tingkat pendidikan terakhir:  SD / SLTP / SLTA / PT / lain-lain ...</br>
     d. Pekerjaan:  </br>
     e. Hobi: </br>
     f. Tinggal  bersama siapa: </br>
     g.  Penggunaan waktu luang: </br></br>
 2. Psikologis </br>
     a. Pola mengatasi masalah: tenang/ sedih/ mudah panik/ menarik diri </br>
     b. Keterampilan interaksi: mudah / sulit berinteraksi </br>
     c. Pola kognitif: mudah memahami/lambat memahami</br>
     d. Pola koping keluarga/orang terdekat : mendukung/ tidak mendukung </br></br>
 3. Spiritual  </br>
     a. Keyakinan: Islam/Kristen/Katolik/Hindu/Budha/Lain-lain :  </br>
     b. Praktek keagamaan : ....</br>
     c. Harapan pasien terhadap perawatan dan pengobatan  ..... </br></br>
 
<b>PENGKAJIAN TAMBAHAN KHUSUS PASIEN LANSIA (dikaji jika usia > 65 tahun)  </br></b>
  1. Kemampuan Perawatan Diri </br>
     a. Makan dan minum: mandiri/ menggunakan alat/dibantu oleh orang lain/ sangat tergantung</br>
     b. Mandi dan eliminasi: mandiri/ menggunakan alat/dibantu oleh orang lain/ sangat tergantung</br>
     c. Memakai baju dan penampilan: mandiri/ menggunakan alat/dibantu oleh orang lain/ sangat tergantung</br></br>
  2. Aktivitas dan Mobilisasi </br>
     a. Ganti posisi baring: mandiri/ menggunakan alat/dibantu oleh orang lain/ sangat tergantung</br>
     b. Ganti posisi duduk: mandiri/ menggunakan alat/dibantu oleh orang lain/ sangat tergantung </br>
     c. Berjalan: mandiri/ mengunakan alat/dibantu oleh orang lain/ sangat tergantung</br>
     d. Keseimbangan: tegak/goyah</br>
     e. Kekuatan otot: kuat /sedang /lemah/ lumpuh bagian ....</br></br>
  3. Pola Kognitif dan Persepsi </br>
     a. Penglihatan: normal/ alat bantu  kaca mata/ kontak lensa </br>
        Masalah penglihatan: tidak ada; rabun kanan/kiri;  buta kanan/ kiri; katarak kanan /kiri; glaucoma kanan / kiri</br> 
     b. Pendengaran: normal/ alat bantu hearing aid kanan / kiri </br>
        Masalah pendengaran: tidak ada;  tuli kanan/kiri; berdenging kanan / kiri </br>
     c. Vertigo: tidak / ada </br>
     d. Status mental: respon baik /respon tidak sesuai /bingung /mudah lupa /dimensia </br></br>
 
<b>PENGKAJIAN TAMBAHAN KHUSUS PASIEN TERMINAL/MENJELANG AKHIR HAYAT  (dikaji jika status pasien DNR/menjelang ajal)</br></b>
  1. Spiritual </br>
     a. Respon pasien terhadap keadaannya: menolak/marah/tawar menawar/sedih/menerima </br>
     b. Respon keluarga terhadap keadaan pasien: menolak/marah/tawar menawar/sedih/menerima</br>
     c. Perasaan yang dialami saat menjelang akhir hayat: putus asa/ menderita/merasa bersalah/keinginan untuk dimaafkan dan memaafkan. </br>
     d. Kebutuhan pendampingan rohani  dari keluarga/orang terdekat / kelompok keagamaan/ petugas rohani </br></br>
  2. Psikososial </br>
     a. Kebutuhan relasi: keinginan untuk didampingi orang terdekat /didampingi keluarga / kelompok sosialnya/ petugas kesehatan</br>
     b. Kebutuhan kelanjutan perawatan: perawatan di rumah / perawatan alternatif / lain-lain..... </br>
     c. Kebutuhan pelayanan dukungan: berada di kd_unitan khusus / kamar tersendiri  / lain-lain ....  </br>
     d. Kebutuhan lain-lain .... </br></br>
  3. Respon fisik : </br>
     a. Pernapasan: sesak napas / pernapasan cuping hidung / periode apnea/ sianosis </br>
     b. Pencernaan: mual/ muntah/asam lambung berlebihan</br>
     c. Sirkulasi: akral dingin / lembab/ pengisian kapiler memanjang </br>
     d. Eliminasi: </br>
      - Urine: inkotinensia / poliuri/ oliguri / anuri </br>
      - Defikasi: konstipasi/diare </br></br>
  4. Mental sensori </br>
     a. Penglihatan: tidak bisa dinilai / melihat benda yang tidak nyata / melihat orang yang tidak nyata / lain-lain ...</br>
     b. Pendengaran: tidak dapat dinilai / mendengar suara-suara yang tidak nyata </br>
     c. Penghidu: tidak dapat dinilai / menghidu bau tertentu ... </br>
     d. Peraba: tidak dapat dinilai / merasakan sesuatu sentuhan</br>
 </br>
Selesai
 
</body>
</html>
