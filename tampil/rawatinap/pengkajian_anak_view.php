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
Pengkajian awal belum lengkap ! <a href="pengkajian_anak_edit.php?kd_kunjungan=<?php echo $data_kajiawal['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false">Klik disini untuk melengkapi </a>
<?php
}
elseif ($data_kajiawal['kd_kunjungan']==""){
echo "Pengkajian awal belum dilakukan!";
}
else {
echo"
<p align='center'><B>PENGKAJIAN AWAL KEPERAWATAN<br />
  (PASIEN ANAK DAN REMAJA</B>)<br />
</p>
<B>A.	Informasi Umum</B><BR/>
   1.	Masuk melalui 		: $data_kajiawal[kaji_awal01]<BR/>
   2.	Menggunakan			: $data_kajiawal[kaji_awal02] <BR/>
   3.	Jam masuk     		: $data_kajiawal[kaji_awal03] WIB, Perawat yang mengantar  : $data_kajiawal[pengantar]<BR/>
   4.	Gelang identitas	: $data_kajiawal[kaji_awal04]<BR/>
   5.	Nama Panggilan Anak : $data_kajiawal[panggilan]<BR/>
   6.	Diagnosa saat  masuk: $data_kajiawal[kaji_awal05]<BR/><BR/>
<B>B.	Riwayat alergi		:</B>$data_kajiawal[kaji_awal06], penyebab alergi: $data_kajiawal[kaji_awal07]  $data_kajiawal[kaji_awal08]  $data_kajiawal[kaji_awal09] <BR/><BR/> 
<B>C.	Keluhan Utama :</B>$data_kajiawal[kaji_awal10] <BR/><BR/>
<B>D.	Riwayat Penyakit sekarang :</B>$data_kajiawal[kaji_awal11]<BR/><BR/>
<B>E.	Riwayat Kesehatan : </B> <BR/>
   1.	Pernah dirawat di RS: $data_kajiawal[kaji_awal12], $data_kajiawal[kaji_awal13] Alasan dirawat : $data_kajiawal[kaji_awal14]<BR/>
   2.	Riwayat operasi: $data_kajiawal[kaji_awal15], $data_kajiawal[kaji_awal16], Jenis Operasi : $data_kajiawal[kaji_awal17]<BR/>  
   3.	Riwayat penyakit infeksi/menular atau daya tahan tubuh menurun  : $data_kajiawal[kaji_awal18]<BR/>   
	&nbsp;&nbsp;&nbsp;Bila ada sebutkan $data_kajiawal[kaji_awal19], kapan : $data_kajiawal[kaji_awal20]<BR/><BR/>
<B>F.	Riwayat penyakit keluarga : </B>$data_kajiawal[kaji_awal24]  $data_kajiawal[kaji_awal25]<BR/><BR/>
<B>G.	Riwayat kelahiran</B><BR/>
   1.	Riwayat prenatal <BR/>
     &nbsp;&nbsp;&nbsp;a.	Riwayat  sakit : $data_kajiawal[kaji_awal151]; bila ya :  pada usia kehamilan $data_kajiawal[kaji_awal152] minggu<BR/>
     &nbsp;&nbsp;&nbsp;b.	Riwayat perdarahan : $data_kajiawal[kaji_awal153], bila ya : pada usia kehamilan $data_kajiawal[kaji_awal154] minggu<BR/>
     &nbsp;&nbsp;&nbsp;c.	Riwayat muntah berlebihan: $data_kajiawal[kaji_awal155], bila ya : pada usia kehamilan $data_kajiawal[kaji_awal156] minggu <BR/>
   2.	Riwayat kelahiran : $data_kajiawal[kaji_awal157]; <BR/>
   3.	Ditolong oleh: $data_kajiawal[kaji_awal158] $data_kajiawal[kaji_awal159]<BR/>
   4.	Berat badan lahir: $data_kajiawal[kaji_awal160] gram; Panjang badan  $data_kajiawal[kaji_awal161] cm  <BR/><BR/>
<B>H.	Riwayat Imunisasi :</B> <BR/>
   1.	Usia Balita: $data_kajiawal[kaji_awal162]<BR/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   		$data_kajiawal[kaji_awal163] $data_kajiawal[kaji_awal164] $data_kajiawal[kaji_awal165] $data_kajiawal[kaji_awal166]<BR/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		$data_kajiawal[kaji_awal167] $data_kajiawal[kaji_awal168] $data_kajiawal[kaji_awal169] $data_kajiawal[kaji_awal170]
		$data_kajiawal[kaji_awal171] $data_kajiawal[kaji_awal172] $data_kajiawal[kaji_awal173]
		$data_kajiawal[kaji_awal174] $data_kajiawal[kaji_awal175]
   2.	Usia sekolah: $data_kajiawal[kaji_awal176] $data_kajiawal[kaji_awal177]$data_kajiawal[kaji_awal178] $data_kajiawal[kaji_awal179] $data_kajiawal[kaji_awal180]<BR/><BR/>
<B>I.	Riwayat Pertumbuhan dan Perkembangan</B><BR/>
   1.	Anak mendapat ASI sampai dengan umur : $data_kajiawal[kaji_awal181] bulan<BR/>
   2.	Anak mendapat susu formula umur : $data_kajiawal[kaji_awal182] bulan<BR/>
   3.	Anak mendapat makanan tambahan umur : $data_kajiawal[kaji_awal183] bulan<BR/>
   4.	Berbicara: $data_kajiawal[kaji_awal184], mulai bicara umur $data_kajiawal[kaji_awal185] bulan<BR/>
   5.	Berjalan: $data_kajiawal[kaji_awal186], mulai berjalan  umur $data_kajiawal[kaji_awal187] bulan<BR/>
   6.	Toilet training: $data_kajiawal[kaji_awal122], umur $data_kajiawal[kaji_awal188] bulan<BR/>
   7.	Berat badan saat ini: $data_kajiawal[kaji_awal189] kg<BR/>
   8.	Tinggi badan saat ini: $data_kajiawal[kaji_awal190] cm<BR/><BR/>
<B>J.	Riwayat Kekerasan :</B> $data_kajiawal[kaji_awal21]. Jika  ada : <BR/>
   1.	Kekerasan berupa : $data_kajiawal[kaji_awal22] <BR/>
   2.	Kekerasan dilakukan oleh : $data_kajiawal[kaji_awal23]<BR/><BR/>
<B>K.	Pengkajian Fisik dan identifikasi masalah</B> <BR/>
   1.	Pernafasan <BR/>
     &nbsp;&nbsp;&nbsp;a.	Frekuensi : $data_kajiawal[kaji_awal26] x/menit;  Pola: $data_kajiawal[kaji_awal27]; $data_kajiawal[kaji_awal28]<BR/>
     &nbsp;&nbsp;&nbsp;b.	Sesak : $data_kajiawal[kaji_awal29]; $data_kajiawal[kaji_awal30] <BR/>
     &nbsp;&nbsp;&nbsp;c.	Suara napas tambahan : $data_kajiawal[kaji_awal31] $data_kajiawal[kaji_awal32]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Batuk: $data_kajiawal[kaji_awal33] ,   dahak : $data_kajiawal[kaji_awal34], $data_kajiawal[kaji_awal35] <BR/>
     &nbsp;&nbsp;&nbsp;e.	Perokok: $data_kajiawal[kaji_awal36], $data_kajiawal[kaji_awal37] batang/hari; berhenti merokok sejak : $data_kajiawal[kaji_awal38]<BR/>
     &nbsp;&nbsp;&nbsp;f.	Alat bantu napas : oksigen : $data_kajiawal[kaji_awal39], jika ya $data_kajiawal[kaji_awal40] liter/menit $data_kajiawal[kaji_awal41]<BR/><BR/>
   2.	Kardiovaskuler & sirkulasi <BR/>
     &nbsp;&nbsp;&nbsp;a.	Nadi: $data_kajiawal[kaji_awal42] kali/menit; $data_kajiawal[kaji_awal43]; $data_kajiawal[kaji_awal44] <BR/>
     &nbsp;&nbsp;&nbsp;b.	Pengisian kapiler: $data_kajiawal[kaji_awal45]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Tekanan darah : $data_kajiawal[kaji_awal46] mmHg, Suhu:$data_kajiawal[kaji_awal47] &deg;C; $data_kajiawal[kaji_awal48]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Warna kulit: $data_kajiawal[kaji_awal49]<BR/>
     &nbsp;&nbsp;&nbsp;e.	Perabaan akral : $data_kajiawal[kaji_awal50] $data_kajiawal[kaji_awal51] <BR/>
     &nbsp;&nbsp;&nbsp;f.	Edema: $data_kajiawal[kaji_awal52], lokasi $data_kajiawal[kaji_awal53]<BR/>
     &nbsp;&nbsp;&nbsp;g.	Alat bantu yang digunakan : $data_kajiawal[kaji_awal54]. Bila ada sebutkan $data_kajiawal[kaji_awal55]<BR/><BR/>
   3.	Pencernaan <BR/>
     &nbsp;&nbsp;&nbsp;a.	Mulut dan gigi: $data_kajiawal[kaji_awal56] / $data_kajiawal[kaji_awal57]<BR/> 
     &nbsp;&nbsp;&nbsp;b.	Gigi palsu: $data_kajiawal[kaji_awal58], bila ada  : $data_kajiawal[kaji_awal59] <BR/>
     &nbsp;&nbsp;&nbsp;c.	Bising usus: $data_kajiawal[kaji_awal60] x/menit, kembung: $data_kajiawal[kaji_awal61]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Kebiasaan makan : $data_kajiawal[kaji_awal62] kali/hari; Nafsu makan: $data_kajiawal[kaji_awal63]<BR/>
     &nbsp;&nbsp;&nbsp;e.	Masalah dalam  makan: $data_kajiawal[kaji_awal64] <BR/>
     &nbsp;&nbsp;&nbsp;f.	Diet khusus : $data_kajiawal[kaji_awal65]<BR/>
     &nbsp;&nbsp;&nbsp;g.	Alat bantu : $data_kajiawal[kaji_awal66]<BR/>
     &nbsp;&nbsp;&nbsp;h.	Kebiasaan BAB setiap $data_kajiawal[kaji_awal67] x/hari  <BR/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masalah dalam BAB: $data_kajiawal[kaji_awal68].  Frekuensi : $data_kajiawal[kaji_awal69] x/hari ;  bentuk feses : $data_kajiawal[kaji_awal70]<BR/><BR/>
   4.	Perkemihan<BR/>
     &nbsp;&nbsp;&nbsp;a.	Kelainan Genitalia: $data_kajiawal[kaji_awal73]; <BR/>
     &nbsp;&nbsp;&nbsp;b.	Kebiasaan BAK: $data_kajiawal[kaji_awal71] kali/hari; warna: $data_kajiawal[kaji_awal72]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Masalah dalam BAK: $data_kajiawal[kaji_awal74] <BR/>
     &nbsp;&nbsp;&nbsp;d.	Alat bantu yang digunakan: $data_kajiawal[kaji_awal75] <BR/><BR/>
   5.	Persyarafan <BR/>
     &nbsp;&nbsp;&nbsp;a.	Kesadaran : $data_kajiawal[kaji_awal76]<BR/>
     &nbsp;&nbsp;&nbsp;b.	GCS: E: $data_kajiawal[kaji_awal77]  V : $data_kajiawal[kaji_awal79] M: $data_kajiawal[kaji_awal78] total : $data_kajiawal[kaji_awal80]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Mata: $data_kajiawal[kaji_awal81]; alat bantu yang digunakan: $data_kajiawal[kaji_awal82] <BR/>
     &nbsp;&nbsp;&nbsp;d.	Pupil: $data_kajiawal[kaji_awal83]; reaksi terhadap cahaya, kanan: $data_kajiawal[kaji_awal84], kiri: $data_kajiawal[kaji_awal85]<BR/>
     &nbsp;&nbsp;&nbsp;e.	Kejang  : $data_kajiawal[kaji_awal86]; lamanya $data_kajiawal[kaji_awal87] detik/menit <BR/>
     &nbsp;&nbsp;&nbsp;f.	Gangguan pergerakan : $data_kajiawal[kaji_awal88]; $data_kajiawal[kaji_awal89]; $data_kajiawal[kaji_awal90]<BR/>
     &nbsp;&nbsp;&nbsp;g.	Alat bantu yang digunakan : $data_kajiawal[kaji_awal91]. Bila ada sebutkan $data_kajiawal[kaji_awal92]<BR/>
     &nbsp;&nbsp;&nbsp;h.	Gangguan bicara : $data_kajiawal[kaji_awal93]<BR/>
     &nbsp;&nbsp;&nbsp;i.	Skrining nyeri: $data_kajiawal[kaji_awal94]  (jika ya, lanjutkan ke pengkajian nyeri)<BR/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk usia < 3 tahun, Screening dan pengkajian nyeri menggunakan scala FLACC <BR/><BR/>
   6.	Integumen dan Muskoloskeletal/mobilisasi <BR/>
     &nbsp;&nbsp;&nbsp;a.	Keadaaan kulit :$data_kajiawal[kaji_awal95]; lokasi : $data_kajiawal[kaji_awal96] <BR/>
     &nbsp;&nbsp;&nbsp;b.	Turgor kulit: $data_kajiawal[kaji_awal97]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Kesulitan pergerakan  : $data_kajiawal[kaji_awal98], bagian tubuh $data_kajiawal[kaji_awal99]<BR/> 
     &nbsp;&nbsp;&nbsp;d.	Kontraktur: $data_kajiawal[kaji_awal100], $data_kajiawal[kaji_awal101]<BR/>
     &nbsp;&nbsp;&nbsp;e.	Alat bantu yang digunakan : $data_kajiawal[kaji_awal102]. Bila  ada sebutkan $data_kajiawal[kaji_awal103]<BR/>
     &nbsp;&nbsp;&nbsp;f.	Resiko jatuh : (gunakan pengkajian resiko jatuh dengan skala Humpty Dumpty) <BR/><BR/>
   7.	Istirahat dan Tidur <BR/>
     &nbsp;&nbsp;&nbsp;a.	Kebiasaan tidur: malam $data_kajiawal[kaji_awal111] jam ;  siang $data_kajiawal[kaji_awal112] jam<BR/> 
     &nbsp;&nbsp;&nbsp;b.	Kebiasaan sebelum tidur : $data_kajiawal[kaji_awal115]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Masalah dalam  tidur: $data_kajiawal[kaji_awal113] <BR/><BR/>
   8.	Sosial  & ekonomi<BR/>
     &nbsp;&nbsp;&nbsp;a.	 Bahasa yang dipakai sehari-hari : $data_kajiawal[kaji_awal117]<BR/>
     &nbsp;&nbsp;&nbsp;b.	 Perlu penerjemah: $data_kajiawal[kaji_awal118], $data_kajiawal[kaji_awal119] <BR/> 
     &nbsp;&nbsp;&nbsp;c.	Tingkat pendidikan terakhir : $data_kajiawal[kaji_awal120] $data_kajiawal[kaji_awal121] <BR/>
     &nbsp;&nbsp;&nbsp;d.	Hobi : $data_kajiawal[kaji_awal123]<BR/>
     &nbsp;&nbsp;&nbsp;e.	Tinggal  bersama siapa : $data_kajiawal[kaji_awal124]<BR/>
     &nbsp;&nbsp;&nbsp;f.	Penggunaan waktu luang : $data_kajiawal[kaji_awal125]<BR/><BR/>
   9.	Psikologis : <BR/>
     &nbsp;&nbsp;&nbsp;a.	Pola mengatasi masalah: $data_kajiawal[kaji_awal126]<BR/>  
     &nbsp;&nbsp;&nbsp;b.	Keterampilan interaksi: $data_kajiawal[kaji_awal127]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Pola kognitif: $data_kajiawal[kaji_awal128]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Gangguan persepsi sensori <BR/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -	Mendengar: $data_kajiawal[kaji_awal104] <BR/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -	Melihat: $data_kajiawal[kaji_awal107] <BR/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -	Meraba: $data_kajiawal[kaji_awal108] <BR/>
     &nbsp;&nbsp;&nbsp;e.	Respon terhadap hospitalisasi: $data_kajiawal[kaji_awal110] <BR/>
     &nbsp;&nbsp;&nbsp;f.	Pola koping keluarga/orang terdekat : $data_kajiawal[kaji_awal129]<BR/><BR/>
  10.	Spiritual  <BR/>
     &nbsp;&nbsp;&nbsp;a.	Keyakinan: $data_kajiawal[kaji_awal130] $data_kajiawal[kaji_awal131]<BR/> 
     &nbsp;&nbsp;&nbsp;b.	Pelaksanaan keagamaan : $data_kajiawal[kaji_awal132]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Harapan pasien/keluarga  terhadap perawatan dan pengobatan : $data_kajiawal[kaji_awal133]<BR/><BR/> 
<B>PENGKAJIAN KHUSUS TAMBAHAN</B><BR/>
Dikaji untuk anak remaja (setelah menarche sampai usia 18 tahun ) dilakukan oleh medior dan senior <BR/>
   1.	Pola fungsi seksualitas  <BR/>
	Wanita <BR/>
     &nbsp;&nbsp;&nbsp;a.	Menache  umur : $data_kajiawal[kaji_awal134] tahun <BR/>
     &nbsp;&nbsp;&nbsp;b.	Riwayat mensturasi:  lamanya  $data_kajiawal[kaji_awal135] hari , $data_kajiawal[kaji_awal136];  masalah saat haid:  $data_kajiawal[kaji_awal137]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Payudara tumbuh:  umur $data_kajiawal[kaji_awal138] tahun <BR/>
	Laki-laki <BR/>
     &nbsp;&nbsp;&nbsp;a.	Perubahan suara/muncul adam-apples: umur $data_kajiawal[kaji_awal139] tahun <BR/>
     &nbsp;&nbsp;&nbsp;b.	Mengalami mimpi basah :  $data_kajiawal[kaji_awal140] <BR/>
     &nbsp;&nbsp;&nbsp;c.	Kumis : $data_kajiawal[kaji_awal141]  <BR/>
     &nbsp;&nbsp;&nbsp;d.	Perubahan otot punggung :  umur $data_kajiawal[kaji_awal142] tahun <BR/><BR/>
   2.	Pola koping mekanisme <BR/>
     &nbsp;&nbsp;&nbsp;a.	Pengambilan keputusan : $data_kajiawal[kaji_awal143] $data_kajiawal[kaji_awal144]<BR/> 
     &nbsp;&nbsp;&nbsp;b.	Respon terhadap masalah/stress: $data_kajiawal[kaji_awal145] <BR/>
     &nbsp;&nbsp;&nbsp;c.	Orang yang dipercaya  : $data_kajiawal[kaji_awal146] $data_kajiawal[kaji_awal147]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Orang yang diidolakan : $data_kajiawal[kaji_awal148]$data_kajiawal[kaji_awal114]<BR/><BR/>
   3.	Status mental <BR/>
    &nbsp;&nbsp;&nbsp;a.	Kemampuan komunikasi : $data_kajiawal[kaji_awal149] <BR/>
     &nbsp;&nbsp;&nbsp;b.	Kontak mata: $data_kajiawal[kaji_awal150] <BR/><BR/>
	 
<B>Dikaji Untuk Pasien Terminal (menjelang akhir hayat) dilakukan oleh medior dan senior </B><BR/>
   1.	Spiritual <BR/>
     &nbsp;&nbsp;&nbsp;a.	Respon pasien terhadap keadaannya : $data_kajiawal[kaji_awal] <BR/>
     &nbsp;&nbsp;&nbsp;b.	Respon keluarga terhadap keadaan pasien: $data_kajiawal[kaji_awal]<BR/>
    &nbsp;&nbsp;&nbsp;c.	Perasaan yang dialamai saat menjelang akhir hayat: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Kebutuhan pendampingan rohani  dari k$data_kajiawal[kaji_awal] <BR/><BR/>
   2.	Psikososial <BR/>
     &nbsp;&nbsp;&nbsp;a.	Kebutuhan relasi: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;b.	Kebutuhan kelanjutan perawatan: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Kebutuahan pelayanan dukungan: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;d.	Kebutuhan lain-lain $data_kajiawal[kaji_awal]<BR/><BR/>
   3.	Respon fisik: <BR/>
     &nbsp;&nbsp;&nbsp;a.	Pernapasan: $data_kajiawal[kaji_awal]<BR/> 
     &nbsp;&nbsp;&nbsp;b.	Pencernaan: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Sirkulasi: $data_kajiawal[kaji_awal] <BR/>
     &nbsp;&nbsp;&nbsp;d.	Eliminasi: <BR/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -	Urine: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -	Defikasi: $data_kajiawal[kaji_awal] <BR/><BR/>
   4.	Mental sensori <BR/>
    &nbsp;&nbsp;&nbsp;a.	Penglihatan: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;b.	Pendengaran: $data_kajiawal[kaji_awal]<BR/>
     &nbsp;&nbsp;&nbsp;c.	Penghidu: $data_kajiawal[kaji_awal] <BR/>
     &nbsp;&nbsp;&nbsp;d.	Peraba: $data_kajiawal[kaji_awal]<BR/>

  <p>-------------------------</p>
";
?>
<a href="pengkajian_anak_edit.php?kd_kunjungan=<?php echo $data_kajiawal['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false">Klik disini untuk mengupdate </a>
<?php
}}
?>
</body>
</html>
