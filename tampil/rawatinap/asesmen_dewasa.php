<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>.: Pengkajian Keperawatan</title>
</head>
<body id=tab1>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" method="post" action="asesmen_dewasa_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
    <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3"><strong>PENGKAJIAN PASIEN DEWASA </strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3">A. Informasi Umum</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">1. Masuk Melalui </td>
      <td width="142"><?php
	if ($data['a1']=="UGD") {
	$cek_ugd = "checked";
	$cek_poli = "";
	$cek_adm = "";
	}
	elseif ($data['a1']=="Poliklinik") {
	$cek_ugd = "";
	$cek_poli = "checked";
	$cek_adm = "";
	}
	elseif ($data['a1']=="Admission") {
	$cek_ugd = "";
	$cek_poli = "";
	$cek_adm = "checked";
	}
	else {
	$cek_ugd = "";
	$cek_poli = "";
	$cek_adm = "";
	}
	?>
        <input name="a1" type="radio" value="UGD" <?php echo $cek_ugd;?>>
UGD</td>
      <td width="142"><input name="a1" type="radio" value="Poliklinik" <?php echo $cek_poli;?>>
Poliklinik</td>
      <td width="142"><input name="a1" type="radio" value="Admission" <?php echo $cek_adm;?>>
Admission</td>
      <td width="263">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">2. Menggunakan</td>
      <td><?php
	if ($data['a2']=="Brancard") {
	$cek_bed = "checked";
	$cek_kroda = "";
	$cek_lain = "";
	}
	elseif ($data['a2']=="Kursi roda") {
	$cek_bed = "";
	$cek_kroda = "checked";
	$cek_lain = "";
	}
	elseif ($data['a2']=="Lain-lain") {
	$cek_bed = "";
	$cek_kroda = "";
	$cek_lain = "checked";
	}
	else {
	$cek_bed = "";
	$cek_kroda = "";
	$cek_lain = "";
	}
	?>
        <input name="a2" type="radio" value="Brancard" <?php echo $cek_bed;?>>
        Brancard      </td>
      <td><input name="a2" type="radio" value="Kursi roda" <?php echo $cek_kroda;?>>
	Kursi roda</td> 
      <td><input name="a2" type="radio" value="" <?php echo $cek_lain;?>>
	Lain-lain</td>
      <td><input type="text" name="a2a" size="8"></td>	
    </tr> 
    <tr bgcolor="#FFFFFF">
      <td colspan="2">3. Jam masuk </td>
      <td colspan="4"><input type="text" name="a3" value="<?php echo "".date('H:i') ;?>" size="8" ></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">4. Gelang identitas </td>
      <td colspan="4"><?php
	if ($data['a4']=="Terpasang gelang") {
	$cek_tg = "checked";
	$cek_ttg = "";
	}
	if ($data['a4']=="Tidak terpasang gelang") {
	$cek_tg = "";
	$cek_ttg = "checked";
	}
	else {
	$cek_tg = "";
	$cek_ttg = "";
	}
	?>
        <input name="a4" type="radio" value="Terpasang gelang" <?php echo $cek_tg;?>>
        Terpasang gelang
        <input name="a4" type="radio" value="Tidak terpasang gelang" <?php echo $cek_ttg;?>>
        Tidak terpasang gelang</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">5. Diagnosa saat masuk </td>
      <td colspan="4"><input type="text" name="a5" value="<?php echo $data['a5'];?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">6. Riwayat alergi </td>
      <td colspan="4"><?php
	if ($data['a6']=="Tidak ada alergi") {
	$cek_taa = "checked";
	$cek_aa = "";
	}
	elseif ($data['a6']=="Ada alergi") {
	$cek_taa = "";
	$cek_aa = "checked";
	}
	else {
	$cek_taa = "";
	$cek_aa = "";
	}
	?>
        <input name="a6" type="radio" value="Tidak ada alergi" <?php echo $cek_taa;?>>
        Tidak ada alergi 
        <input name="a6" type="radio" value="Ada alergi" <?php echo $cek_aa;?>>
        Ada alergi 
        <input type="text" name="a6a" size="8" title="Isi dengan nama makanan">, 
	<input type="text" name="a6b" size="8" title="Isi dengan nama obat">, 
	<input type="text" name="a6c" size="8" title="Isi dengan 'Debu'">
	</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">7. Keluhan utama</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6">
      <textarea name="a7" cols="94%" rows="2" value="<?php echo $data['a7'];?>"></textarea>      </td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3">B. Riwayat penyakit sekarang </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><textarea name="b" cols="94%" rows="2"  value="<?php echo $data['b'];?>"></textarea></td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3">C. Riwayat kesehatan </td>
    </tr>
     <tr bgcolor="#FFFFFF">
       <td colspan="2">1. Pernah dirawat di RS </td>
       <td><?php
	if ($data['c1']=="Tidak pernah") {
	$cek_tpr = "checked";
	$cek_pr = "";
	}
	elseif ($data['c1']=="Pernah") {
	$cek_tpr = "";
	$cek_pr = "checked";
	}
	else {
	$cek_tpr = "";
	$cek_pr = "";
	}
	?>
         <input name="c1" type="radio" value="Tidak pernah" <?php echo $cek_tpr;?>>
Tidak pernah</td>
       <td><input name="c1" type="radio" value="Pernah" <?php echo $cek_pr;?>>
Pernah</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
  <tr bgcolor="#FFFFFF">
       <td colspan="2" align="center">Jika pernah</td>
       <td colspan="4">Kapan : <input type="text" name="c1a" width="20" title="Ketik tanggal rawat atau cukup tahun saja">, alasan dirawat : <input type="text" name="c1b" width="20" title="Ketik alasan masuk rawat atau diagnosa rawat sebelumnya"></td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">2. Riwayat operasi </td>
      <td width="142"><?php
	if ($data['c2']=="Tidak pernah") {
	$cek_tpo = "checked";
	$cek_po = "";
	}
	elseif ($data['c2']=="Pernah") {
	$cek_tpo = "";
	$cek_po = "checked";
	}
	else {
	$cek_tpo = "";
	$cek_po = "";
	}
	?>
         <input name="c2" type="radio" value="Tidak pernah" <?php echo $cek_tpo;?>>
Tidak pernah</td>
       <td><input name="c2" type="radio" value="Pernah" <?php echo $cek_po;?>>
Pernah</td>
      <td width="142">&nbsp;</td>
      <td width="263">&nbsp;</td>
    </tr>
 <tr bgcolor="#FFFFFF">
       <td colspan="2" align="center">Jika pernah</td>
       <td colspan="4">Kapan : <input type="text" name="c2a" width="20" title="Ketik tanggal operasi atau cukup tahun saja">, alasan dirawat : <input type="text" name="c2b" width="20" title="Ketik nama atau jenis operasi"></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3">D.Riwayat penyakit keluarga </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6"><?php
	if ($data['d1']=="Tidak ada") {
	$cek_tpk = "checked";
	$cek_pk = "";
	}
	elseif ($data['d1']=="Ada") {
	$cek_tpk = "";
	$cek_pk = "checked";
	}
	else {
	$cek_l = "";
	$cek_p = "";
	}
	?>
        <input name="d1" type="radio" value="Tidak ada" <?php echo $cek_tpk;?>>
Tidak ada 
<input name="d1" type="radio" value="Ada" <?php echo $cek_pk;?>>
Ada : 
 <input type="checkbox" name="d1a" value="Hipertensi">
Hipertensi
<input type="checkbox" name="d1b" value="Diabetes">
Diabetes
<input type="checkbox" name="d1c" value="Penyakit jantung">
Penyakit jantung 
<input type="checkbox" name="d1d" value="Asma">
Asma, lainnya
<input type="text" name="d1e" width="20" value="<?php echo $data['d1e'];?>"></td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3">E. Pengkajian fisik dan identifikasi masalah </td>
    </tr>
     <tr bgcolor="#FFFFFF">
       <td colspan="2">1. Pernapasan</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>a</td>
       <td>Frekuensi</td>
       <td colspan="4"><input type="text" name="e1a" size="4">
  x/menit; Pola
  	<?php
	if ($data['e1a1']=="Teratur") {
	$cek_t = "checked";

	$cek_tt = "";
	}
	elseif ($data['e1a1']=="Tidak teratur") {
	$cek_t = "checked";
	$cek_tt = "";
	}
	else {
	$cek_t = "";
	$cek_tt = "checked";
	}
	?>
  <input name="e1a1" type="radio" value="Teratur" <?php echo $cek_t;?>>
Teratur
  <input name="e1a1" type="radio" value="Tidak teratur" <?php echo $cek_tt;?>> 
  Tidak teratur ;
<?php
	if ($data['e1a2']=="Dalam") {
	$cek_dlm = "checked";
	$cek_dkl = "";
	}
	elseif ($data['e1a2']=="Dangkal") {
	$cek_dlm = "";
	$cek_dkl = "checked";
	}
	else {
	$cek_dlm = "";
	$cek_dkl = "";
	}
	?>
  <input name="e1a2" type="radio" value="L" <?php echo $cek_dlm;?>>
Dalam
  <input name="e1a2" type="radio" value="L" <?php echo $cek_dkl;?>> 
  Dangkal</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>b</td>
       <td>Sesak</td>
       <td colspan="4"><?php
	if ($data['e1b']=="Tidak sesak") {
	$cek_ts = "checked";
	$cek_as = "";
	}
	if ($data['e1b']=="Ada sesak") {
	$cek_ts = "";
	$cek_as = "checked";
	}
	else {
	$cek_ts = "";
	$cek_ad = "";
	}
	?>
         <input name="e1b" type="radio" value="Tidak sesak" <?php echo $cek_ts;?>>
Tidak ada
<input name="e1b" type="radio" value="Ada sesak" <?php echo $cek_as;?>>
Ada</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>c</td>
       <td>Suara napas tambahan </td>
       <td colspan="4"><?php
	if ($data['e1c']=="Tidak ada suara tambahan") {
	$cek_tast = "checked";
	$cek_ast = "";
	}
	if ($data['e1c']=="Ada suara tambahan") {
	$cek_tast = "checked";
	$cek_ast = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="e1c" type="radio" value="Tidak ada suara tambahan" <?php echo $cek_tast;?>>
Tidak ada
<input name="e1c" type="radio" value="Ada suara tambahan" <?php echo $cek_ast;?>>
Ada</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>d</td>
       <td>Batuk</td>
       <td colspan="4"><?php
	if ($data['e1']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="e1" type="radio" value="L" <?php echo $cek_l;?>>
Tidak ada
<input name="e1" type="radio" value="L" <?php echo $cek_l;?>>
Ada</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>e</td>
       <td>Perokok</td>
       <td colspan="4"><?php
	if ($data['e1']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="e1" type="radio" value="L" <?php echo $cek_l;?>>
Tidak ada
<input name="e1" type="radio" value="L" <?php echo $cek_l;?>>
Ada</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">f</td>
      <td width="216">Alat bantu napas </td>
      <td colspan="4"><?php
	if ($data['e1']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
        <input name="e1" type="radio" value="L" <?php echo $cek_l;?>>
Tidak ada
<input name="e1" type="radio" value="L" <?php echo $cek_l;?>>
Ada</td>
    </tr>
	<tr bgcolor="#FFFFFF">
       <td colspan="2">2. Kardiovaskuler dan sirkulasi </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>a</td>
       <td>Nadi</td>
       <td colspan="4"><input type="text" name="textfield42" size="4">
         Pola
         <?php
	if ($data['jenis_kelamin']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Teratur
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Tidak teratur ;
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Kuat
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>> 
Lemah
</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>b</td>
       <td>Pengisian kapiler </td>
       <td colspan="4"><?php
	if ($data['jenis_kelamin']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Teratur
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Tidak teratur</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>c</td>
       <td>Tekanan darah </td>
       <td colspan="4"><input type="text" name="textfield422" size="4">
       /
       <input type="text" name="textfield423" size="4">
       mmHg, Suhu
       <input type="text" name="textfield424" size="4">
       oC </td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>d</td>
       <td>Warna kulit </td>
       <td colspan="4"><?php
	if ($data['jenis_kelamin']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
         Normal
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Pucat
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Sianosis
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>> 
Kemerahan
</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>e</td>
       <td>Akral</td>
       <td colspan="4"><?php
	if ($data['jenis_kelamin']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
         Hangat
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>> 
         Dingin, dan 
         <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Basah
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>> 
Kering
</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">f</td>
      <td width="216">Edema</td>
      <td colspan="4"><?php
	if ($data['jenis_kelamin']=="L") {
	$cek_l = "checked";
	$cek_p = "";
	}
	else {
	$cek_l = "";
	$cek_p = "checked";
	}
	?>
        <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Tidak ada
<input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
Ada</td>
    </tr>
	<tr bgcolor="#FFFFFF">
       <td colspan="2">3. Pencernaan</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Mulut dan gigi </td>
       <td colspan="4"><input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
         Bersih  
           <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
       Kotor 
       <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
       Sariawan 
       <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
       Karies 
       <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>>
       Karang gigi 
       <input name="jenis_kelamin" type="radio" value="L" <?php echo $cek_l;?>> 
         Lain-lain</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Bising usus </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kebiasaan makan </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Masalah dalam makan </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Diet</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Alat bantu </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Kebiasaan BAB </td>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr bgcolor="#FFFFFF">
       <td colspan="2">Perkemihan</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kebiasaan BAK </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Distensi kandung kemih </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Masalah dalam BAK </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Alat bantu yang digunakan </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     
	<tr bgcolor="#FFFFFF">
       <td colspan="2">Persyarafan</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kesadaran</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>GCS</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Mata</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Pupil</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kejang</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Gangguan pergerakkan </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Gangguan bicara </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Skrining nyeri </td>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr bgcolor="#FFFFFF">
       <td colspan="2">Integumen dan muskuloskeletal  </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Keadaan kulit </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Turgor kulit </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kesulitan pergerakkan </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kontraktur</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Risiko jatuh </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Risiko dekubitus </td>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr bgcolor="#FFFFFF">
       <td colspan="2">Reproduksi</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Riwayat menstruasi </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Status perkawinan </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Jumlah anak </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     
	<tr bgcolor="#FFFFFF">
       <td colspan="2">Istirahat dan tidur </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Kebiasaan tidur </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Masalah dalam tidur </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Penggunaan obat tidur </td>
      <td colspan="4">&nbsp;</td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td colspan="6" bgcolor="#D9E8F3">F. Pengkajian Sosio-Ekonomi-Psikologis-Spritual</td>
    </tr>
    <tr bgcolor="#FFFFFF">
       <td colspan="2">Sosial dan ekonomi </td>
      <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Bahasa yang dipakai sehari-hari </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Perlu penerjemah </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Tingkat pendidikan terakhir </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Pekerjaan</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Hobi</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Tinggal bersama siapa </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Penggunaan waktu luang </td>
      <td colspan="4">&nbsp;</td>
    </tr>
	 <tr bgcolor="#FFFFFF">
       <td colspan="2">Psikologi</td>
      <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Pola mengatasi masalah </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Keterampilan interaksi </td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Pola kognitif </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Pola koping keluarga/orang terdekat </td>
      <td colspan="4">&nbsp;</td>
    </tr>
	 <tr bgcolor="#FFFFFF">
       <td colspan="2">Spiritual</td>
      <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Keyakinan</td>
       <td colspan="4">&nbsp;</td>
     </tr>
     <tr bgcolor="#FFFFFF">
       <td>&nbsp;</td>
       <td>Praktek agama </td>
       <td colspan="4">&nbsp;</td>
     </tr>
    <tr bgcolor="#FFFFFF">
      <td width="21">&nbsp;</td>
      <td width="216">Harapam pasien terhadap dan pengobatan </td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input type="submit" name="Submit" value="Simpan" title="Simpan laporan"></td>
      <td colspan="4">&nbsp;</td>
    </tr>
</form>
  </table>
</body>
</html>

