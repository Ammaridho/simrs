<?php
include "../librari/inc.koneksidb.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PENGKAJIAN AWAL</title>
</head>

<body>
<?php
    $tampil = mysqli_query("SELECT * FROM pengkajian_awal WHERE kd_kunjungan='$kd_kunjungan'");  
    while($data_kajiawal=mysql_fetch_array($tampil)){  
	if ($data_kajiawal['kd_kunjungan']!="" && $data_kajiawal['status']=="Inprogress"){?>
Pengkajian awal belum lengkap ! <a href="pengkajian_dewasa_edit.php?kd_kunjungan=<?php echo $data_kajiawal['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false">Klik disini untuk melengkapi </a>
<?php
}
elseif ($data_kajiawal['kd_kunjungan']==""){
echo "Pengkajian awal belum dilakukan!";
}
else {
echo"
<p align='center'><B>PENGKAJIAN AWAL KEPERAWATAN<br />
  (PASIEN DEWASA DAN LANSIA)</B><br />
</p>
  <B>A. Informasi Umum</B><br />
  &nbsp;&nbsp; 1. Masuk melalui&nbsp;&nbsp; :&nbsp; $data_kajiawal[kaji_awal01]<br />
  &nbsp;&nbsp; 2. Menggunakan&nbsp;&nbsp;  :&nbsp;  $data_kajiawal[kaji_awal02]<br />
  &nbsp;&nbsp; 3. Jam masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;$data_kajiawal[kaji_awal03] WIB ; Perawat yang  mengantar:&nbsp; $data_kajiawal[pengantar] <br />
  &nbsp;&nbsp; 4. Gelang identitas&nbsp;&nbsp; :&nbsp;  $data_kajiawal[kaji_awal04]<br />
  &nbsp;&nbsp; 5. Diagnosa saat masuk&nbsp; : $data_kajiawal[kaji_awal05]<br />
  &nbsp;&nbsp; 6. Riwayat Alergi: $data_kajiawal[kaji_awal06] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Penyebab : $data_kajiawal[kaji_awal07]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kapan : $data_kajiawal[kaji_awal08] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bentuk reaksi : $data_kajiawal[kaji_awal09]<br />
  &nbsp;&nbsp; 7. Keluhan Utama :  $data_kajiawal[kaji_awal10]<br />
  &nbsp;<br />
  <B>B. Riwayat  Penyakit sekarang : </B>$data_kajiawal[kaji_awal11]<br /><br />
  <B>C. Riwayat  Kesehatan : </B><br />
  &nbsp;&nbsp; 1. Pernah dirawat di RS:&nbsp;&nbsp;  $data_kajiawal[kaji_awal12], kapan : $data_kajiawal[kaji_awal13] Alasan dirawat : $data_kajiawal[kaji_awal14] <br />
  &nbsp;&nbsp; 2. Riwayat Operasi :&nbsp; $data_kajiawal[kaji_awal15], kapan  : $data_kajiawal[kaji_awal16], Jenis Operasi : $data_kajiawal[kaji_awal17]<br />
  &nbsp;&nbsp; 3. Riwayat penyakit infeksi/menular atau  daya tahan tubuh menurun&nbsp; :  $data_kajiawal[kaji_awal18]&nbsp;, bila ada sebutkan : $data_kajiawal[kaji_awal19] , kapan : $data_kajiawal[kaji_awal20]<br />
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br /><br />
  <B>D. Riwayat terhadap  kekerasan :</B> $data_kajiawal[kaji_awal21] <br />
  &nbsp;&nbsp;&nbsp; Jika&nbsp;  ada : Kekerasan berupa : $data_kajiawal[kaji_awal22].&nbsp; <br />
  &nbsp;&nbsp;&nbsp; Kekerasan dilakukan oleh : $data_kajiawal[kaji_awal23]<br /><br />
  <B>E. Riwayat  penyakit keluarga :</B> $data_kajiawal[kaji_awal24] $data_kajiawal[kaji_awal25] <br /><br />
  <B>F. Pengkajian  Fisik dan Identifikasi Masalah: </B><br />
  &nbsp;&nbsp; 1. Pernapasan <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Frekuensi : $data_kajiawal[kaji_awal26] x / menit;&nbsp; Pola: $data_kajiawal[kaji_awal27]; $data_kajiawal[kaji_awal28].<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Sesak: $data_kajiawal[kaji_awal29]; $data_kajiawal[kaji_awal30] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Suara napas tambahan: $data_kajiawal[kaji_awal31],  jenis: $data_kajiawal[kaji_awal32] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Batuk: $data_kajiawal[kaji_awal33]&nbsp;, dahak : $data_kajiawal[kaji_awal34], warna : $data_kajiawal[kaji_awal35]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Perokok: $data_kajiawal[kaji_awal36],&nbsp;$data_kajiawal[kaji_awal37] batang/hari; berhenti merokok sejak : $data_kajiawal[kaji_awal38] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Memakai oksigen : $data_kajiawal[kaji_awal39] ,  $data_kajiawal[kaji_awal40] liter/menit, menggunakan : $data_kajiawal[kaji_awal41]<br />
  &nbsp;&nbsp; 2. Kardiovaskuler &amp; sirkulasi <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Nadi : $data_kajiawal[kaji_awal42] x/menit; $data_kajiawal[kaji_awal43], $data_kajiawal[kaji_awal44] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Pengisian kapiler: $data_kajiawal[kaji_awal45] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Tekanan darah : $data_kajiawal[kaji_awal46] mmHg, Suhu: $data_kajiawal[kaji_awal47]0C;  $data_kajiawal[kaji_awal48]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Warna kulit :  $data_kajiawal[kaji_awal49]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Perabaan akral :&nbsp; $data_kajiawal[kaji_awal50] : $data_kajiawal[kaji_awal51]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Edema: $data_kajiawal[kaji_awal52], lokasi : $data_kajiawal[kaji_awal53]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Alat bantu yang digunakan : $data_kajiawal[kaji_awal54].  Bila ada sebutkan jenisnya :$data_kajiawal[kaji_awal55].<br />
  &nbsp;&nbsp; 3. Pencernaan <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Mulut : $data_kajiawal[kaji_awal56] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gigi :  $data_kajiawal[kaji_awal57] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gigi palsu :  $data_kajiawal[kaji_awal58],&nbsp; $data_kajiawal[kaji_awal59]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Bising usus : $data_kajiawal[kaji_awal60] x/menit, kembung:  $data_kajiawal[kaji_awal61]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Kebiasaan makan : $data_kajiawal[kaji_awal62] kali / hari; Nafsu  makan: $data_kajiawal[kaji_awal63]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Masalah dalam makan: $data_kajiawal[kaji_awal64] <br />
  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;e.  Diet : $data_kajiawal[kaji_awal65]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Alat bantu : $data_kajiawal[kaji_awal66]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Kebiasaan BAB : setiap $data_kajiawal[kaji_awal67] x/hari&nbsp; <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Masalah dalam BAB: $data_kajiawal[kaji_awal68]&nbsp; , frekuensi:  $data_kajiawal[kaji_awal69] x/hari; bentuk feses : $data_kajiawal[kaji_awal70] <br />
  &nbsp;&nbsp; 4. Perkemihan<br />
  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;a.  Kebiasaan BAK: $data_kajiawal[kaji_awal71] kali / hari; warna: $data_kajiawal[kaji_awal72]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Distensi kandung kemih: $data_kajiawal[kaji_awal73]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Masalah dalam BAK: $data_kajiawal[kaji_awal74]. <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d.&nbsp;  Alat bantu yang digunakan: $data_kajiawal[kaji_awal75] <br />
  &nbsp;&nbsp; 5. Persyarafan <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Kesadaran: $data_kajiawal[kaji_awal76] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. GCS: E : $data_kajiawal[kaji_awal77]; V : $data_kajiawal[kaji_awal79]; M : $data_kajiawal[kaji_awal78]; Total : $data_kajiawal[kaji_awal80]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Mata : $data_kajiawal[kaji_awal81]; alat bantu : $data_kajiawal[kaji_awal82] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Pupil : $data_kajiawal[kaji_awal83]; reaksi  terhadap cahaya; kanan: $data_kajiawal[kaji_awal84] ; kiri: $data_kajiawal[kaji_awal85]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Kejang : $data_kajiawal[kaji_awal86]; lamanya $data_kajiawal[kaji_awal87] menit <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Gangguan pergerakan : $data_kajiawal[kaji_awal88]; $data_kajiawal[kaji_awal89] : $data_kajiawal[kaji_awal90] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Alat bantu yang digunakan : $data_kajiawal[kaji_awal91]. Bila ada sebutkan : $data_kajiawal[kaji_awal92].<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; h. Gangguan bicara: $data_kajiawal[kaji_awal93]  <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i. Skrining nyeri: $data_kajiawal[kaji_awal94](jika  Ada nyeri, lanjutkan ke pengkajian nyeri)<br />
  &nbsp;&nbsp; 6. Integumen dan Muskoloskeletal/ Mobilisasi <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Keadaaan kulit : $data_kajiawal[kaji_awal95]; lokasi $data_kajiawal[kaji_awal96] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Turgor kulit : $data_kajiawal[kaji_awal97] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Kesulitan pergerakan : $data_kajiawal[kaji_awal98]; bagian tubuh $data_kajiawal[kaji_awal99] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Kontraktur: $data_kajiawal[kaji_awal100], bagian tubuh : $data_kajiawal[kaji_awal101]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Alat bantu yang digunakan : $data_kajiawal[kaji_awal102].  Bila ada sebutkan : $data_kajiawal[kaji_awal103]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Risiko jatuh (gunakan pengkajian  risiko jatuh)<br />
  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;g.  Risiko Dekubitus (gunakan pengkajian risiko dekubitus)<br />
  &nbsp;&nbsp; 7. Reproduksi <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. (Untuk pasien wanita) Riwayat  mensturasi : $data_kajiawal[kaji_awal104]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; lamanya $data_kajiawal[kaji_awal105], haid terakhir :  $data_kajiawal[kaji_awal106] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Masalah dalam haid $data_kajiawal[kaji_awal107] $data_kajiawal[kaji_awal108]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Status perkawinan: $data_kajiawal[kaji_awal109] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Jumlah anak $data_kajiawal[kaji_awal110] <br />
  &nbsp;&nbsp; 8. Istirahat dan Tidur <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Kebiasaan tidur: malam $data_kajiawal[kaji_awal111] jam ;&nbsp; siang $data_kajiawal[kaji_awal112] jam <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Masalah dalam tidur: $data_kajiawal[kaji_awal113]<br />
  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;c.  Penggunaan obat tidur: $data_kajiawal[kaji_awal114], jenis: $data_kajiawal[kaji_awal115]; dosis : $data_kajiawal[kaji_awal116]. <br />
  F. Pengkajian  Sosio-Ekonomi-Psikologis-Spritual-Identifikasi Edukasi <br />
  &nbsp;&nbsp; 1. Sosial&nbsp;  dan&nbsp; Ekonomi <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Bahasa yang dipakai sehari-hari: $data_kajiawal[kaji_awal117] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Perlu penerjemah: $data_kajiawal[kaji_awal118], jika ya  bahasa : $data_kajiawal[kaji_awal119] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Tingkat pendidikan terakhir:&nbsp; $data_kajiawal[kaji_awal120] $data_kajiawal[kaji_awal121]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Pekerjaan : $data_kajiawal[kaji_awal122] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Hobi : $data_kajiawal[kaji_awal123]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Tinggal&nbsp; bersama siapa : $data_kajiawal[kaji_awal124]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g.&nbsp;  Penggunaan waktu luang: $data_kajiawal[kaji_awal125]<br />
  &nbsp;&nbsp; 2. Psikologis <br />
  &nbsp;&nbsp;&nbsp;&nbsp; a. Pola mengatasi masalah : $data_kajiawal[kaji_awal126] <br />
  &nbsp;&nbsp;&nbsp;&nbsp; b. Keterampilan interaksi : $data_kajiawal[kaji_awal127] <br />
  &nbsp;&nbsp;&nbsp;&nbsp; c. Pola kognitif : $data_kajiawal[kaji_awal128]<br />
  &nbsp;&nbsp;&nbsp;&nbsp; d. Pola koping keluarga/orang terdekat :  $data_kajiawal[kaji_awal129] <br />
  &nbsp;&nbsp; 3. Spiritual&nbsp; <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Keyakinan :  $data_kajiawal[kaji_awal130]  $data_kajiawal[kaji_awal131] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Praktek keagamaan : $data_kajiawal[kaji_awal132]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Harapan pasien terhadap perawatan dan  pengobatan&nbsp; $data_kajiawal[kaji_awal133]</p>
<p><B>PENGKAJIAN TAMBAHAN KHUSUS PASIEN LANSIA  (usia &gt; 65 tahun)</B> &nbsp;<br />
  &nbsp;&nbsp; 1. Kemampuan Perawatan Diri <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Makan dan minum : $data_kajiawal[kaji_awal134]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Mandi dan eliminasi : $data_kajiawal[kaji_awal135]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Memakai baju dan penampilan :$data_kajiawal[kaji_awal136]<br />
  &nbsp;&nbsp; 2. Aktivitas dan Mobilisasi <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Ganti posisi baring: $data_kajiawal[kaji_awal137]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Ganti posisi duduk : $data_kajiawal[kaji_awal138]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Berjalan : $data_kajiawal[kaji_awal139]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Keseimbangan: $data_kajiawal[kaji_awal140]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Kekuatan otot: $data_kajiawal[kaji_awal141] bagian $data_kajiawal[kaji_awal141a]<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Alat bantu yang digunakan : $data_kajiawal[kaji_awal142].&nbsp; Bila ada sebutkan $data_kajiawal[kaji_awal143].<br />
  &nbsp;&nbsp; 3. Pola Kognitif dan Persepsi <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Penglihatan:$data_kajiawal[kaji_awal144] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Masalah penglihatan: Rabun : $data_kajiawal[kaji_awal145] ;&nbsp; buta : $data_kajiawal[kaji_awal146]; katarak $data_kajiawal[kaji_awal147]; glaucoma : $data_kajiawal[kaji_awal148] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Pendengaran: $data_kajiawal[kaji_awal149] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Masalah pendengaran:  tuli $data_kajiawal[kaji_awal150]; berdenging  $data_kajiawal[kaji_awal151] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Vertigo: $data_kajiawal[kaji_awal152] <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Status mental: $data_kajiawal[kaji_awal153]<br />
  
<p>-------------------------</p>
";
?>
<a href="pengkajian_dewasa_edit.php?kd_kunjungan=<?php echo $data_kajiawal['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false">Klik disini untuk mengupdate </a>
<?php
}}
?>
</body>
</html>
