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
Pengkajian awal belum lengkap ! <a href="pengkajian_neonatus_edit.php?kd_kunjungan=<?php echo $data_kajiawal['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false">Klik disini untuk melengkapi </a>
<?php
}
elseif ($data_kajiawal['kd_kunjungan']==""){
echo "Pengkajian awal belum dilakukan!";
}
else {
echo"
<p align='center'><B>PENGKAJIAN AWAL KEPERAWATAN<br />
  (PASIEN NEONATUS/BAYI</B>)<br />
</p>
<B>A. IDENTITAS</B><br />     
    Nama Orangtua(ayah/Ibu) 	: $data_kajiawal[kaji_awal136]<br />
    Tanggal/Jam Lahir 		: $data_kajiawal[kaji_awal137]/$data_kajiawal[kaji_awal138]<br />
    Jenis Kelamin    		: $data[jenis_kelamin]<br />
    Informasi didapat dari   	: $data_kajiawal[kaji_awal139]<br />
    Diagnosis Medis saat masuk : $data_kajiawal[kaji_awal140]<br /><br />
<B>B. PENGKAJIAN SAAT MASUK </B><br />
   1. Masuk melalui  		: $data_kajiawal[kaji_awal01]<br />
   2. Menggunakan  		: $data_kajiawal[kaji_awal02]<br /> 
   3. Jam Masuk   		: $data_kajiawal[kaji_awal03] WIB <br />
   4. Perawat yang mengantar 	: $data_kajiawal[pengantar]<br />
   5. Kondisi Saat masuk 	: $data_kajiawal[kaji_awal05]<br />
   6. Alasan Masuk / dirawat  : $data_kajiawal[kaji_awal06]<br />
   7. Berat Badan    		: $data_kajiawal[kaji_awal07] gram ;Tinggi Badan $data_kajiawal[kaji_awal08] cm <br />
   8. Suhu $data_kajiawal[kaji_awal09] &deg;C/axilla, HR $data_kajiawal[kaji_awal10] x/menit; Pernafasan $data_kajiawal[kaji_awal11] x/menit; Saturasi $data_kajiawal[kaji_awal12]% <br />
   9. Riwayat kesehatan : Pernah di rawat: $data_kajiawal[kaji_awal13], kapan/lama perawatan: $data_kajiawal[kaji_awal14] Alasan dirawat $data_kajiawal[kaji_awal15]<br /><br /> 
<B>C. RIWAYAT KESEHATAN ORANG TUA</B> <br />
   1. Ayah  			: <br />
      &nbsp;&nbsp;&nbsp;Golongan Darah 	: $data_kajiawal[kaji_awal16]<br />
      &nbsp;&nbsp;&nbsp;Riwayat alergi  	: $data_kajiawal[kaji_awal18], penyebab alergi: $data_kajiawal[kaji_awal20], Kapan: $data_kajiawal[kaji_awal22], Bentuk reaksi: $data_kajiawal[kaji_awal24]<br />
   2.  Ibu 				: 
      &nbsp;&nbsp;&nbsp;Golongan Darah 	:$data_kajiawal[kaji_awal17]<br />
      &nbsp;&nbsp;&nbsp;Riwayat alergi  	: $data_kajiawal[kaji_awal19], penyebab alergi: $data_kajiawal[kaji_awal21], Kapan: $data_kajiawal[kaji_awal23] Bentuk reaksi: $data_kajiawal[kaji_awal25] <br />
     &nbsp;&nbsp;&nbsp;Penyakit Keturunan: <br />
     &nbsp;&nbsp;&nbsp;a. Ayah  			: $data_kajiawal[kaji_awal26],$data_kajiawal[kaji_awal28] <br />  
    &nbsp;&nbsp;&nbsp; b. Ibu  				: $data_kajiawal[kaji_awal27], $data_kajiawal[kaji_awal29] <br /><br />
<B>D. RIWAYAT KELAHIRAN BAYI</B><br />
   1. Usia Kehamilan  	: $data_kajiawal[kaji_awal30] minggu, <br />
   2. Berat Badan lahir : $data_kajiawal[kaji_awal31] gram;  Panjang Badan lahir $data_kajiawal[kaji_awal32] cm<br /> 
   3. Lingkar Kepala  	: $data_kajiawal[kaji_awal33] cm; Lingkat Perut: $data_kajiawal[kaji_awal34] cm <br />
   4. Persalinan  		: $data_kajiawal[kaji_awal49]<br />
   5. APGAR Score 		: $data_kajiawal[kaji_awal50]<br /> 
   6. Vitamin K   		: $data_kajiawal[kaji_awal51], dosis $data_kajiawal[kaji_awal04] mg <br />
   7. Tetes mata   		: $data_kajiawal[kaji_awal52]<br />
   8. Immunisasi yang sudah diberikan: $data_kajiawal[kaji_awal53],<br />  
   $data_kajiawal[kaji_awal54], 
   $data_kajiawal[kaji_awal55], 
   $data_kajiawal[kaji_awal56], 
	$data_kajiawal[kaji_awal57], 
	$data_kajiawal[kaji_awal58], 
	$data_kajiawal[kaji_awal59], 
	$data_kajiawal[kaji_awal60], 
	$data_kajiawal[kaji_awal61], 
	$data_kajiawal[kaji_awal62], 
	$data_kajiawal[kaji_awal63], 
	$data_kajiawal[kaji_awal64], 
	$data_kajiawal[kaji_awal65], 
	$data_kajiawal[kaji_awal66] <br /> <br />
<B>E. PENGKAJIAN DAN IDENTIFIKASI MASALAH</B><br />
   1. Pernapasan 		: $data_kajiawal[kaji_awal67]<br />
      &nbsp;&nbsp;&nbsp;Frekuensi   		: $data_kajiawal[kaji_awal68] x/menit; Irama: $data_kajiawal[kaji_awal69]<br />
      &nbsp;&nbsp;&nbsp;Suara napas  		: $data_kajiawal[kaji_awal70] $data_kajiawal[kaji_awal71]<br />
      &nbsp;&nbsp;&nbsp;Batuk  			: $data_kajiawal[kaji_awal72]; Lendir: $data_kajiawal[kaji_awal73], konsistensi : $data_kajiawal[kaji_awal74]; Warna : $data_kajiawal[kaji_awal75]<br />
      &nbsp;&nbsp;&nbsp;Oksigen        	: $data_kajiawal[kaji_awal76]  $data_kajiawal[kaji_awal77] liter/menit ; $data_kajiawal[kaji_awal78] <br />
      &nbsp;&nbsp;&nbsp;Riwayat aspirasi 	:$data_kajiawal[kaji_awal79]<br /> <br />
   2. Kardio Vaskuler
      &nbsp;&nbsp;&nbsp;Bunyi Jantunng 	: $data_kajiawal[kaji_awal80] <br />
      &nbsp;&nbsp;&nbsp;Nadi $data_kajiawal[kaji_awal81] x/menit 	: Tekanan Darah $data_kajiawal[kaji_awal82] mmHg         Pengisian Kapiler  $data_kajiawal[kaji_awal83] <br />
      &nbsp;&nbsp;&nbsp;Ekstremitas Atas 	: $data_kajiawal[kaji_awal84]<br /> 
      &nbsp;&nbsp;&nbsp;Ektremitas Bawah 	: $data_kajiawal[kaji_awal85]<br /><br />
   3. Pencernaan 
      &nbsp;&nbsp;&nbsp;Puasa				: $data_kajiawal[kaji_awal86]; Jika tidak puasa: $data_kajiawal[kaji_awal87]; Frekuensi: $data_kajiawal[kaji_awal88] x $data_kajiawal[kaji_awal89] cc)<br />
      &nbsp;&nbsp;&nbsp;Bising Usus 		:  $data_kajiawal[kaji_awal97] x/menit <br />
      &nbsp;&nbsp;&nbsp;Cara minum		: $data_kajiawal[kaji_awal90]. Tanggal pasang: <br /> 
      &nbsp;&nbsp;&nbsp;Mukosa Mulut    	: $data_kajiawal[kaji_awal92]      Kelainan  rongga mulut: $data_kajiawal[kaji_awal93], $data_kajiawal[kaji_awal141a]   :<br />  
      &nbsp;&nbsp;&nbsp;Abdomen          	: $data_kajiawal[kaji_awal94]  ;    Kelainan $data_kajiawal[kaji_awal95] $data_kajiawal[kaji_awal96]   <br /> 
      &nbsp;&nbsp;&nbsp;Tali pusat   		: $data_kajiawal[kaji_awal98]; masalah pada talipusat: $data_kajiawal[kaji_awal99]<br />
      &nbsp;&nbsp;&nbsp;Buang Air Besar 	: Frekuensi $data_kajiawal[kaji_awal100] x/hari. Cara BAB: $data_kajiawal[kaji_awal101] $data_kajiawal[kaji_awal102]<br />
      &nbsp;&nbsp;&nbsp;Konsistensi b.a.b : $data_kajiawal[kaji_awal103]; Warna :$data_kajiawal[kaji_awal104]<br /><br />
   4. Perkemihan
      &nbsp;&nbsp;&nbsp;Buang Air Kecil	: Frekuensi: $data_kajiawal[kaji_awal105] x/hari;  Warna Urine: $data_kajiawal[kaji_awal106]<br />
      &nbsp;&nbsp;&nbsp;Masalah dalam buang air kecil: $data_kajiawal[kaji_awal107]<br />
      &nbsp;&nbsp;&nbsp;Alat bantu kateter: $data_kajiawal[kaji_awal108],nomor: $data_kajiawal[kaji_awal109]; tanggal pasang:$data_kajiawal[kaji_awal110]<br /><br />
   5. Neuro Sensori <br />
     &nbsp;&nbsp;&nbsp;Tingkat Kesadaran  : $data_kajiawal[kaji_awal111] <br />
	 &nbsp;&nbsp;&nbsp;GCS				  : E : $data_kajiawal[kaji_awal112] 
	 										V : $data_kajiawal[kaji_awal113]
											M: $data_kajiawal[kaji_awal114], Total :: $data_kajiawal[kaji_awal115]<br />
     &nbsp;&nbsp;&nbsp;Respon terhadap Nyeri    : Gunakan Skala NIPS <br />
     &nbsp;&nbsp;&nbsp;Tangisan           :  $data_kajiawal[kaji_awal116]<br /> 
     &nbsp;&nbsp;&nbsp;Kepala             :  $data_kajiawal[kaji_awal117]<br /> 
     &nbsp;&nbsp;&nbsp;Lingkar kepala     :  $data_kajiawal[kaji_awal118]cm <br />
     &nbsp;&nbsp;&nbsp;Ubun-ubun          : $data_kajiawal[kaji_awal119] 
     &nbsp;&nbsp;&nbsp;Pupil              : $data_kajiawal[kaji_awal120];  Reaksi terhadap  cahaya: $data_kajiawal[kaji_awal121]/$data_kajiawal[kaji_awal122]<br /> 
	 &nbsp;&nbsp;&nbsp;Gerakan  		  :   $data_kajiawal[kaji_awal123]<br /> 
     &nbsp;&nbsp;&nbsp;Kejang             : $data_kajiawal[kaji_awal124],  $data_kajiawal[kaji_awal150] detik/menit  <br /><br />
  6. Integumen
     &nbsp;&nbsp;&nbsp;Warna kulit  	: $data_kajiawal[kaji_awal125]<br /> 
     &nbsp;&nbsp;&nbsp;Turgor        	: $data_kajiawal[kaji_awal126]<br /> 
     &nbsp;&nbsp;&nbsp;Kebersihan  		: $data_kajiawal[kaji_awal127]<br />
     &nbsp;&nbsp;&nbsp;Integritas      	: $data_kajiawal[kaji_awal128]<br />
     &nbsp;&nbsp;&nbsp;Kebersihan Mata 	: Sekret: $data_kajiawal[kaji_awal129]<br /> <br />
  7. Reproduksi <br />
     &nbsp;&nbsp;&nbsp;a. Perempuan:<br />
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vagina  		: $data_kajiawal[kaji_awal130];  Kelainan: $data_kajiawal[kaji_awal131] $data_kajiawal[kaji_awal151]<br />
     &nbsp;&nbsp;&nbsp;b. Laki-laki <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penis  			: $data_kajiawal[kaji_awal132]; Jika kelainan $data_kajiawal[kaji_awal133]<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preputium  		: $data_kajiawal[kaji_awal134]<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Scrotum  		: $data_kajiawal[kaji_awal135]<br />

  <p>-------------------------</p>
";
?>
<a href="pengkajian_neonatus_edit.php?kd_kunjungan=<?php echo $data_kajiawal['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false">Klik disini untuk mengupdate </a>
<?php
}}
?>
</body>
</html>
