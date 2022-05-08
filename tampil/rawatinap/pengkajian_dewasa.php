<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_error($koneksi));
   $data=mysqli_fetch_array($qry);
   $jumdata=mysqli_num_rows($qry);
}

$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($koneksi, $query)  or die ("SQL Error".mysqli_error($koneksi));
$data_u = mysqli_fetch_array($hasil);

$tahun = floor($data_u['selisih']/365);
$bulan = floor(($data_u['selisih'] - ($tahun * 365))/30);
$hari = $data_u['selisih'] - $bulan * 30 - $tahun * 365;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
rC = function(radioEl) {
		if(radioEl.checked == true) {
				radioEl.checked = false;
				return false;
				}
				else {
				radioEl.checked = true;
				return true;
				}
		}
</script>
<script>
function startCalc(){
interval = setInterval("calc()",1);
}
function calc(){
one = document.form1.kaji_awal77.value;
two = document.form1.kaji_awal78.value;
three = document.form1.kaji_awal79.value;
document.form1.kaji_awal80.value = (one*1) + (two*1) + (three*1);
}
function stopCalc(){
clearInterval(interval);
}
</script>
<title>PENGKAJIAN AWAL DEWASA</title>
</head>
<body>
<?php
   $sql2 = "SELECT * FROM pengkajian_awal WHERE kd_kunjungan='$kd_kunjungan'";
   $qry2 = mysqli_query($koneksi, $sql2)
      or die ("SQL Error".mysqli_error($koneksi));
   $jumdata=mysqli_num_rows($qry2);
if ($jumdata>=1) {
echo "Pengkajian sudah dilakukan !";
}
else {?>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" action="pengkajian_dewasa_sim.php" method="POST">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#D9E8F3">
    <td colspan="3"><div align="center"><strong>PENGKAJIAN DEWASA KEPERAWATAN (DEWASA DAN LANSIA) </strong></div></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>A. Informasi Umum</B> :</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="402">&nbsp;&nbsp;    1. Masuk melalui&nbsp;&nbsp;&nbsp;</td>
    <td width="5">:</td>
    <td width="864">
      <input name="kaji_awal01" type="radio" value="IGD" />
      IGD
      <input name="kaji_awal01" type="radio" value="Poliklinik" />
     Poliklinik    
    <input name="kaji_awal01" type="radio" value="Admission" />Admission     </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Menggunakan&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal02" type="radio" value="Bed" />
      Bed
        <input name="kaji_awal02" type="radio" value="Kursi roda" />
        Kursi roda 
        <input name="kaji_awal02" type="radio" value="Jalan kaki" />
        Jalan kaki 
        <input name="kaji_awal02" type="radio" value="Lain-lain" />
        Lain-lain</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Jam masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal03" type="text" size="6"  value="<?php echo "".date('H:i') ;?>"/>
      , </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Petugas yang mengantar</td>
    <td>&nbsp;</td>
    <td><input name="pengantar" type="text" value="<?php echo $data['pengantar'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Gelang identitas&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal04" type="radio" value="Terpasang" />
      Terpasang
      <input name="kaji_awal04" type="radio" value="Tidak terpasang" />
      Tidak terpasang </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    5. Diagnosa saat masuk&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal05" type="text" value="<?php echo $data['kaji_awal05'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    6. Riwayat Alergi</td>
    <td>:</td>
    <td><input name="kaji_awal06" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal06" type="radio" value="Ya" />
      Ya, jelaskan : </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyebab</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal07" type="text" value="<?php echo $data['kaji_awal07'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Kapan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal08" type="text" value="<?php echo $data['kaji_awal08'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Bentuk reaksi</td>
    <td>:</td>
    <td><input name="kaji_awal09" type="text" value="<?php echo $data['kaji_awal09'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    7. Keluhan Utama&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal10" type="text" size="60" value="<?php echo $data['kaji_awal10'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>B. Riwayat Penyakit sekarang&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td colspan="3"><textarea name="kaji_awal11" cols="80"><?php echo $data['kaji_awal11']; ?></textarea></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>C. Riwayat Kesehatan&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Pernah dirawat di RS</td>
    <td>:</td>
    <td><input name="kaji_awal12" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal12" type="radio" value="Ya" />
      Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kapan (*diisi jika ya) </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal13" type="text" value="<?php echo $data['kaji_awal13'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Alasan (*diisi jika ya)</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal14" type="text" value="<?php echo $data['kaji_awal14'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Riwayat Operasi</td>
    <td>:</td>
    <td><input name="kaji_awal15" type="radio" value="Tidak" />
    Tidak
      <input name="kaji_awal15" type="radio" value="Ya" />
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kapan (*diisi jika ya) </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal16" type="text" value="<?php echo $data['kaji_awal16'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jenis operasi (*diisi jika ya) </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal17" type="text" value="<?php echo $data['kaji_awal17'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Riwayat penyakit infeksi/menular atau daya tahan tubuh menurun</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal18" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal18" type="radio" value="Ya" />
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kapan (*diisi jika ya) </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal19" type="text" value="<?php echo $data['kaji_awal19'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sebutkan (*diisi jika ya) </td>
    <td>:</td>
    <td><input name="kaji_awal20" type="text" value="<?php echo $data['kaji_awal20'] ;?>"/></td>
  </tr>
  
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>D. Riwayat terhadap kekerasan&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Kekerasan</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal21" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal21" type="radio" value="Ya" />
Ya  </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp; Berupa (*diisi jika ya) </td>
    <td>:</td>
    <td><input name="kaji_awal22" type="radio" value="Fisik" />
      Fisik
        <input name="kaji_awal22" type="radio" value="Emosional" />
        Emosional
        <input name="kaji_awal22" type="radio" value="Seksual" />
        Seksual</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;    Kekerasan dilakukan oleh (*diisi jika ya) &nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal23" type="radio" value="Diri sendiri"/>
      Diri sendiri
        <input name="kaji_awal23" type="radio" value="Orang lain" />
        Orang lain </td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>E. Riwayat penyakit keluarga&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td colspan="3">
	  <input name="kaji_awal24" type="radio" value="Tidak ada"/>Tidak ada
      <input name="kaji_awal24" type="radio" value="Hipertensi"/>Hipertensi
      <input name="kaji_awal24" type="radio" value="Jantung"/>Jantung
      <input name="kaji_awal24" type="radio" value="DM"/>DM
      <input name="kaji_awal24" type="radio" value="Asthma"/>Asthma
	  <input name="kaji_awal24" type="radio" value="Lainnya"/>Lainnya
	  <input name="kaji_awal25" type="text" value="<?php echo $data['kaji_awal25'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>F. Pengkajian Fisik dan Identifikasi    Masalah </B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Pernapasan&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Frekuensi&nbsp;</td>
    <td>:</td>
    <td><p>
          <input name="kaji_awal26" type="text" value="<?php echo $data['kaji_awal25'] ;?>" size="2"/>
      x/menit</p>      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pola </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal27" type="radio" value="Teratur"/>
Teratur
<input name="kaji_awal27" type="radio" value="Tidak teratur"/>
Tidak teratur </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal28" type="radio" value="Dalam"/>
Dalam
  <input name="kaji_awal28" type="radio" value="Dangkal"/>
Dangkal</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Sesak</td>
    <td>:</td>
    <td><input name="kaji_awal29" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal29" type="radio" value="Ya" />
Ya , jika ya 
<input name="kaji_awal30" type="radio" value="dengan aktifitas" ondblclick="rC(this)"/>
dengan aktifitas 
<input name="kaji_awal30" type="radio" value="tanpa aktifitas" ondblclick="rC(this)"/>
tanpa aktifitas </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Suara napas tambahan</td>
    <td>:</td>
    <td><input name="kaji_awal31" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal31" type="radio" value="Ya" />
Ya, jenis 
<input name="kaji_awal32" type="text" value="<?php echo $data['kaji_awal32'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Batuk</td>
    <td>:</td>
    <td><input name="kaji_awal33" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal33" type="radio" value="Ya" />
Ya; Dahak
<input name="kaji_awal34" type="radio" value="Tidak"  ondblclick="rC(this)"/>
Tidak
<input name="kaji_awal34" type="radio" value="Ya"  ondblclick="rC(this)"/>
Ya, warna 
<input name="kaji_awal35" type="text" value="<?php echo $data['kaji_awal35'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Perokok</td>
    <td>:</td>
    <td><input name="kaji_awal36" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal36" type="radio" value="Ya" />
Ya,
<input name="kaji_awal37" type="text" value="<?php echo $data['kaji_awal37'] ;?>" size="2"/>
batang/hari; berhenti sejak 
<input name="kaji_awal38" type="text" value="<?php echo $data['kaji_awal38'] ;?>" size="4"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Memakai oksigen&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal39" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal39" type="radio" value="Ya" />
Ya,
<input name="kaji_awal40" type="text" value="<?php echo $data['kaji_awal40'] ;?>" size="2"/>
lpm, menggunakan
<input name="kaji_awal41" type="text" value="<?php echo $data['kaji_awal41'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Kardiovaskuler &amp; sirkulasi&nbsp;</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td rowspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Nadi&nbsp;</td>
    <td>:</td>
    <td><p>
          <input name="kaji_awal42" type="text" value="<?php echo $data['kaji_awal42'] ;?>" size="2"/>
      bpm, 
        <input name="kaji_awal43" type="radio" value="Teratur" />
Teratur
<input name="kaji_awal43" type="radio" value="Tidak teratur" />
Tidak teratur</p>      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td><input name="kaji_awal44" type="radio" value="Kuat" />
Kuat
  <input name="kaji_awal44" type="radio" value="Lemah" />
Lemah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pengisian kapiler</td>
    <td>:</td>
    <td><input name="kaji_awal45" type="radio" value="Kurang 3 detik" />
Kurang 3 detik
  <input name="kaji_awal45" type="radio" value=" Lebih 3 detik" /> 
  Lebih 3 detik</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Tekanan darah&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal46" type="text" value="<?php echo $data['kaji_awal46'] ;?>" size="2"/>
      mmHg; </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suhu :</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal47" type="text" value="<?php echo $data['kaji_awal47'] ;?>" size="2"/>
&deg;C
<input name="kaji_awal48" type="radio" value="Axilla" />
Axilla
<input name="kaji_awal48" type="radio" value="Telinga" />
Telinga</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Warna kulit&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal49" type="radio" value="Normal" />Normal
	<input name="kaji_awal49" type="radio" value="Pucat" />Pucat
	<input name="kaji_awal49" type="radio" value="Sianosis" />Sianosis
	<input name="kaji_awal49" type="radio" value="Kemerahan" />Kemerahan</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td rowspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Perabaan akral&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal50" type="radio" value="Hangat" />
Hangat
  <input name="kaji_awal50" type="radio" value="Dingin" />
Dingin</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>:</td>
    <td><input name="kaji_awal51" type="radio" value="Kering" />
        Kering
        <input name="kaji_awal51" type="radio" value="Lembab" />
        Lembab</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Edema</td>
    <td>:</td>
    <td><input name="kaji_awal52" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal52" type="radio" value="Ya" />
Ya, lokasi
<input name="kaji_awal53" type="text" value="<?php echo $data['kaji_awal53'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal54" type="radio" value="Tidak ada" />
Tidak
  ada
  <input name="kaji_awal54" type="radio" value="Ya" />
Ya, sebutkan jenisnya 
<input name="kaji_awal55" type="text" value="<?php echo $data['kaji_awal55'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Pencernaan&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Mulut</td>
    <td>:</td>
    <td><input name="kaji_awal56" type="radio" value="Bersih" />
      Bersih 
        <input name="kaji_awal56" type="radio" value="Kotor" />
        Kotor
        <input name="kaji_awal56" type="radio" value="Sariawan" />
        Sariawan</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Gigi</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal57" type="radio" value="Bersih" />
      Bersih
        <input name="kaji_awal57" type="radio" value="Karang gigi" />
        Karang gigi 
        <input name="kaji_awal57" type="radio" value="Karies" />
        Karies</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Gigi palsu</td>
    <td>:</td>
    <td><input name="kaji_awal58" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal58" type="radio" value="Ya" />
Ya ,
<input name="kaji_awal59" type="radio" value="Gigi atas" ondblclick="rC(this)"/>
Gigi atas
<input name="kaji_awal59" type="radio" value="Gigi bawah" ondblclick="rC(this)"/>
Gigi bawah </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Bising usus</td>
    <td>:</td>
    <td><input name="kaji_awal60" type="text" value="<?php echo $data['kaji_awal60'] ;?>" size="2"/>
      x/menit
        <input name="kaji_awal61" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal61" type="radio" value="Ya" />
Ya </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kebiasaan makan</td>
    <td>:</td>
    <td><input name="kaji_awal62" type="text" value="<?php echo $data['kaji_awal62'] ;?>" size="2"/>
      kali/hari, nafsu makan 
      <input name="kaji_awal63" type="radio" value="Baik" />
      Baik
      <input name="kaji_awal63" type="radio" value="Cukup" />
      Cukup
      <input name="kaji_awal63" type="radio" value="Kurang" />
      Kurang</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Masalah dalam makan</td>
    <td>:</td>
    <td><input name="kaji_awal64" type="radio" value="Tidak ada" />
    Tidak ada
      <input name="kaji_awal64" type="radio" value="Mual" />
      Mual
        <input name="kaji_awal64" type="radio" value="Muntah" />
        Muntah
        <input name="kaji_awal64" type="radio" value="Sakit menelan" />
        Sakit menelan </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Diet</td>
    <td>:</td>
    <td><input name="kaji_awal65" type="text" value="<?php echo $data['kaji_awal65'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Alat bantu&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal66" type="radio" value="Tidak ada" />
      Tidak ada
        <input name="kaji_awal66" type="radio" value="NGT" />
      NGT
  <input name="kaji_awal66" type="radio" value="Gastrostomy" />
      Gastrostomy </td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Kebiasaan BAB&nbsp;</td>
    <td>:</td>
    <td>Setiap
      
      <input name="kaji_awal67" type="text" value="<?php echo $data['kaji_awal67'] ;?>" size="2"/>
      kali sehari.</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah dalam BAB</td>
    <td>:</td>
    <td><input name="kaji_awal68" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal68" type="radio" value="Obstipasi" />
Obstipasi
<input name="kaji_awal68" type="radio" value="Konstipasi" />
Konstipasi 
<input name="kaji_awal68" type="radio" value="Diare" />
Diare, </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>frekwensi
      <input name="kaji_awal69" type="text" value="<?php echo $data['kaji_awal69'] ;?>" size="2"/>
kali/hari, bentuk feses
<input name="kaji_awal70" type="text" value="<?php echo $data['kaji_awal70'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Perkemihan&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kebiasaan BAK</td>
    <td>:</td>
    <td><input name="kaji_awal71" type="text" value="<?php echo $data['kaji_awal71'] ;?>" size="2"/>
      kali/hari, </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal72" type="radio" value="Kuning jernih" />
Kuning jernih
  <input name="kaji_awal72" type="radio" value="Kuning pekat" />
Kuning pekat
<input name="kaji_awal72" type="radio" value="Merah" />
Merah
<input name="kaji_awal72" type="radio" value="Darah" />
Darah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Distensi kandung kemih</td>
    <td>:</td>
    <td><input name="kaji_awal73" type="radio" value="Tidak" />
      Tidak
        <input name="kaji_awal73" type="radio" value="Ya" />
        Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Masalah dalam BAK</td>
    <td>:</td>
    <td><input name="kaji_awal74" type="radio" value="Tidak" />
      Tidak
      <input name="kaji_awal74" type="radio" value="Anyang-anyangan" />
      Anyang-anyangan
      <input name="kaji_awal74" type="radio" value="Sakit sewaktu berkemih" />
      Sakit waktu berkemih 
      <input name="kaji_awal74" type="radio" value="Tidak terkontrol" />
      Tidak terkontrol 
      <input name="kaji_awal74" type="radio" value="Oliguria" />
      Oliguria</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d.&nbsp; Alat bantu yang digunakan</td>
    <td>:</td>
    <td><input name="kaji_awal75" type="radio" value="Tidak ada" />
      Tidak ada 
        <input name="kaji_awal75" type="radio" value="Kondom kateter" />
      Kondom kateter
      <input name="kaji_awal75" type="radio" value="Folley kateter" />
      Folley kateter </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    5. Persyarafan&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kesadaran</td>
    <td>:</td>
    <td><input name="kaji_awal76" type="radio" value="Compos mentis" />
      Compos mentis
        <input name="kaji_awal76" type="radio" value="Apatis" />
        Apatis
        <input name="kaji_awal76" type="radio" value="Somnolen" />
      Somnolen
      <input name="kaji_awal76" type="radio" value="Sopor" />
      Sopor
      <input name="kaji_awal76" type="radio" value="Koma" />
      Koma</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. GCS</td>
    <td>:</td>
    <td>E
      <input name="kaji_awal77" type="text" value="<?php echo $data['kaji_awal77'] ;?>" size="1" onFocus="startCalc();" onBlur="stopCalc();" /> 
       
      V 
      <input name="kaji_awal79" type="text" value="<?php echo $data['kaji_awal79'] ;?>" size="1" onFocus="startCalc();" onBlur="stopCalc();" /> 
      M 
      <input name="kaji_awal78" type="text" value="<?php echo $data['kaji_awal78'] ;?>" size="1" onfocus="startCalc();" onblur="stopCalc();" />
      Total 
      <input name="kaji_awal80" type="text" value="<?php echo $data['kaji_awal80'] ;?>" size="2"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Mata</td>
    <td>:</td>
    <td><input name="kaji_awal81" type="radio" value="Normal" />
      Normal
        <input name="kaji_awal81" type="radio" value="Penglihatan jauh" />
        Penglihatan jauh 
        <input name="kaji_awal81" type="radio" value="Penglihatan dekat" />
        Penglihatan dekat</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Alat bantu</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal82" type="radio" value="Tidak ada" />
Tidak ada
  <input name="kaji_awal82" type="radio" value="kacamata" />
Kacamata
<input name="kaji_awal82" type="radio" value="Kontak lensa" />
Kontak lensa </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Pupil</td>
    <td>:</td>
    <td><input name="kaji_awal83" type="radio" value="Isokor" />Isokor
        <input name="kaji_awal83" type="radio" value="Anisokor" />
      Anisokor; </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Reaksi cahaya : </td>
    <td>&nbsp;</td>
    <td><p>KANAN
      <input name="kaji_awal84" type="radio" value="Positif" />
      Positif
      <input name="kaji_awal84" type="radio" value="Negatif" />
      Negatif
      </p>
      <p>KIRI
        <input name="kaji_awal85" type="radio" value="Positif" />
        Positif
        <input name="kaji_awal85" type="radio" value="Negatif" />
      Negatif</p></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Kejang</td>
    <td>:</td>
    <td><input name="kaji_awal86" type="radio" value="Tidak" />
      Tidak
        <input name="kaji_awal86" type="radio" value="Ya" />
        Ya, 
        <input name="kaji_awal87" type="text" value="<?php echo $data['kaji_awal87'] ;?>" size="2"/>
      Menit</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Gangguan pergerakan</td>
    <td>:</td>
    <td><input name="kaji_awal88" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal88" type="radio" value="Ya" />
Ya,
<input name="kaji_awal89" type="radio" value="Tetraplegi" ondblclick="rC(this)"/>
Tetraplegi /
<input name="kaji_awal89" type="radio" value="Tetraparese" ondblclick="rC(this)"/>
Tetraparese / 
<input name="kaji_awal89" type="radio" value="Hemiplegi" ondblclick="rC(this)"/>
Hemiplegi / 
<input name="kaji_awal89" type="radio" value="Hemiparese" ondblclick="rC(this)"/>
Hemiparese : 

<input name="kaji_awal90" type="radio" value="Kanan" ondblclick="rC(this)"/>
Kanan
<input name="kaji_awal90" type="radio" value="Kiri" ondblclick="rC(this)"/>
Kiri</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal91" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal91" type="radio" value="Ya" />
Ya,sebutkan 
<input name="kaji_awal92" type="text" value="<?php echo $data['kaji_awal92'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    h. Gangguan bicara</td>
    <td>:</td>
    <td><input name="kaji_awal93" type="radio" value="Tidak" />Tidak
      <input name="kaji_awal93" type="radio" value="Kesulitan bicara" />Kesulitan bicara
      <input name="kaji_awal93" type="radio" value="Tidak bisa bicara" />Tidak bisa bicara
      <input name="kaji_awal93" type="radio" value="Pelo" />Pelo</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    i. Skrining nyeri</td>
    <td>:</td>
    <td><input name="kaji_awal94" type="radio" value="Tidak nyeri" />
      Tidak nyeri
        <input name="kaji_awal94" type="radio" value="Ada nyeri" />
        Ada nyeri </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    6. Integumen dan Muskoloskeletal/ Mobilisasi&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Keadaaan kulit</td>
    <td>:</td>
    <td><input name="kaji_awal95" type="radio" value="Utuh" />
      Utuh
        <input name="kaji_awal95" type="radio" value="Bercak-bercak" />
        Bercak
        <input name="kaji_awal95" type="radio" value="Petechie" />
        Petechie
        <input name="kaji_awal95" type="radio" value="Gatal-gatal" />
        Gatal
        <input name="kaji_awal95" type="radio" value="Memar" />
        Memar
        <input name="kaji_awal95" type="radio" value="Skar" />
        Skar
        <input name="kaji_awal95" type="radio" value="Luka" />
        Luka
        <input name="kaji_awal95" type="radio" value="Dekubitus" />
        Dekubitus<br/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lokasi gangguan/kelainan kulit, jika ada </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal96" type="text" value="<?php echo $data['kaji_awal96'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Turgor kulit</td>
    <td>:</td>
    <td><input name="kaji_awal97" type="radio" value="Elastis" />
      Elastis
        <input name="kaji_awal97" type="radio" value="Tidak elastis" />
        Tidak elastis </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kesulitan pergerakan</td>
    <td>:</td>
    <td><input name="kaji_awal98" type="radio" value="Tidak" />
      Tidak
        <input name="kaji_awal98" type="radio" value="Ya" />
        Ya, bagian tubuh 
        <input name="kaji_awal99" type="text" value="<?php echo $data['kaji_awal99'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Kontraktur</td>
    <td>:</td>
    <td><input name="kaji_awal100" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal100" type="radio" value="Ya" />
Ya, bagian tubuh
<input name="kaji_awal101" type="text" value="<?php echo $data['kaji_awal101'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal102" type="radio" value="Tidak" />
Tidak
  <input name="kaji_awal102" type="radio" value="Ya" />
Ya, sebutkan
<input name="kaji_awal103" type="text" value="<?php echo $data['kaji_awal103'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Risiko jatuh </td>
    <td>:</td>
    <td>(Gunakan pengkajian risiko jatuh)</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Risiko Dekubitus</td>
    <td>:</td>
    <td>(gunakan pengkajian risiko dekubitus)</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    7. Reproduksi&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. (Untuk pasien wanita) Riwayat mensturasi&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal104" type="radio" value="Belum" />
      Belum
        <input name="kaji_awal104" type="radio" value="Ya" />
        Ya, lama 
        <input name="kaji_awal105" type="text" value="<?php echo $data['kaji_awal105'] ;?>" size="2"/>
        hari, haid terakhir 
        <input name="kaji_awal106" type="text" value="<?php echo $data['kaji_awal106'] ;?>" size="2"/></td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah dalam haid&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal107" type="radio" value="Tidak ada" />
      Tidak ada
        <input name="kaji_awal107" type="radio" value="Ya" />
        Ya
        <input name="kaji_awal108" type="text" value="<?php echo $data['kaji_awal108'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Status perkawinan</td>
    <td>:</td>
    <td><input name="kaji_awal109" type="radio" value="Tidak menikah" />
      Tidak menikah
        <input name="kaji_awal109" type="radio" value="Menikah" />
        Menikah
        <input name="kaji_awal109" type="radio" value="Pisah/cerai/janda/duda" />
        Pisah/cerai/janda/duda</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Jumlah anak</td>
    <td>:</td>
    <td><input name="kaji_awal110" type="text" value="<?php echo $data['kaji_awal110'] ;?>" size="2"/>
      orang</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    8. Istirahat dan Tidur&nbsp;</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kebiasaan tidur</td>
    <td>:</td>
    <td>Malam
      <input name="kaji_awal111" type="text" value="<?php echo $data['kaji_awal111'] ;?>" size="2"/>
jam ; siang
<input name="kaji_awal112" type="text" value="<?php echo $data['kaji_awal112'] ;?>" size="2"/>
jam </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Masalah dalam tidur</td>
    <td>:</td>
    <td><input name="kaji_awal113" type="radio" value="Tidak ada" />
      Tidak ada
        <input name="kaji_awal113" type="radio" value="Sukar tidur" />
        Sukar tidur 
        <input name="kaji_awal113" type="radio" value="Tidak bisa tidur" />
        Tidak bisa tidur 
        <input name="kaji_awal113" type="radio" value="Bangun lebih awal" />
        Bangun lebih awal 
        <input name="kaji_awal113" type="radio" value="Sering terjaga" />
        Sering terjaga </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Penggunaan obat tidur</td>
    <td>:</td>
    <td><input name="kaji_awal114" type="radio" value="Tidak" />
      Tidak
        <input name="kaji_awal114" type="radio" value="Ya" />
      Ya, jenis
      <input name="kaji_awal115" type="text" value="<?php echo $data['kaji_awal115'] ;?>"/>
      , 
      dosis
      <input name="kaji_awal116" type="text" value="<?php echo $data['kaji_awal116'] ;?>" size="1"/>
      mg</td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>F. Pengkajian    Sosio-Ekonomi-Psikologis-Spritual-Identifikasi Edukasi&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Sosial&nbsp; dan&nbsp; Ekonomi&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Bahasa yang dipakai sehari-hari</td>
    <td>:</td>
    <td><input name="kaji_awal117" type="text" value="<?php echo $data['kaji_awal117'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Perlu penerjemah</td>
    <td>:</td>
    <td><input name="kaji_awal118" type="radio" value="Tidak" />Tidak
      <input name="kaji_awal118" type="radio" value="Ya" />
      Ya, bahasa 
      <input name="kaji_awal119" type="text" value="<?php echo $data['kaji_awal119'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Tingkat pendidikan terakhir</td>
    <td>:</td>
    <td><input name="kaji_awal120" type="radio" value="SD" />
      SD
        <input name="kaji_awal120" type="radio" value="SLTP" />
        SLTP
        <input name="kaji_awal120" type="radio" value="SMU" />
        SMU
        <input name="kaji_awal120" type="radio" value="PT" />
        PT
        <input name="kaji_awal120" type="radio" value="Lain-lain" />
        Lain-lain
        <input name="kaji_awal121" type="text" value="<?php echo $data['kaji_awal121'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Pekerjaan</td>
    <td>:</td>
    <td><input name="kaji_awal122" type="text" value="<?php echo $data['kaji_awal122'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Hobi</td>
    <td>:</td>
    <td><input name="kaji_awal123" type="text" value="<?php echo $data['kaji_awal123'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Tinggal&nbsp; bersama siapa</td>
    <td>:</td>
    <td><input name="kaji_awal124" type="text" value="<?php echo $data['kaji_awal124'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g.&nbsp; Penggunaan waktu luang</td>
    <td>:</td>
    <td><input name="kaji_awal125" type="text" value="<?php echo $data['kaji_awal125'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Psikologis&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    a. Pola mengatasi masalah</td>
    <td>:</td>
    <td><input name="kaji_awal126" type="radio" value="Tenang" />Tenang
      <input name="kaji_awal126" type="radio" value="Sedih" />Sedih
      <input name="kaji_awal126" type="radio" value="Mudah panik" />Mudah panik
      <input name="kaji_awal126" type="radio" value="Menarik diri" />Menarik diri</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    b. Keterampilan interaksi</td>
    <td>:</td>
    <td><input name="kaji_awal127" type="radio" value="Mudah berinteraksi" />Mudah berinteraksi
      <input name="kaji_awal127" type="radio" value="Sulit berinteraksi" />Sulit berinteraksi</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    c. Pola kognitif</td>
    <td>:</td>
    <td><input name="kaji_awal128" type="radio" value="Mudah memahami" />Mudah memahami
      <input name="kaji_awal128" type="radio" value="Lambat memahami" />Lambat memahami</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    d. Pola koping keluarga/orang terdekat&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal129" type="radio" value="Mendukung" />Mendukung
      <input name="kaji_awal129" type="radio" value="Tidak mendukung" />Tidak mendukung</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Spiritual&nbsp;&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Keyakinan</td>
    <td>:</td>
    <td><input name="kaji_awal130" type="radio" value="Islam" />Islam
      <input name="kaji_awal130" type="radio" value="Kristen" />Kristen
      <input name="kaji_awal130" type="radio" value="Katolik" />Katolik
      <input name="kaji_awal130" type="radio" value="Hindu" />Hindu
      <input name="kaji_awal130" type="radio" value="Budha" />Budha
      <input name="kaji_awal131" type="text" value="<?php echo $data['kaji_awal131'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Praktek keagamaan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal132" type="text" value="<?php echo $data['kaji_awal132'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Harapan pasien terhadap perawatan dan pengobatan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal133" type="text" value="<?php echo $data['kaji_awal133'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td></td>
    <td>:</td>
    <td></td>
<?php
if ($tahun >= 65 && $hari >= 1) { ?>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>&nbsp;&nbsp; PENGKAJIAN TAMBAHAN KHUSUS PASIEN LANSIA (usia &gt; 65 tahun)&nbsp;&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Kemampuan Perawatan Diri&nbsp;</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Makan dan minum</td>
    <td>:</td>
    <td><input name="kaji_awal134" type="radio" value="Mandiri" />
      Mandiri
        <input name="kaji_awal134" type="radio" value="Menggunakan alat" />
        Menggunakan alat
        <input name="kaji_awal134" type="radio" value="Dibantu orang lain" />
        Dibantu orang lain 
        <input name="kaji_awal134" type="radio" value="Sangat tergantung" />
        Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Mandi dan eliminasi</td>
    <td>:</td>
    <td><input name="kaji_awal135" type="radio" value="Mandiri" />
Mandiri
  <input name="kaji_awal135" type="radio" value="Menggunakan alat" />
Menggunakan alat
<input name="kaji_awal135" type="radio" value="Dibantu orang lain" />
Dibantu orang lain
<input name="kaji_awal135" type="radio" value="Sangat tergantung" />
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Memakai baju dan penampilan</td>
    <td>:</td>
    <td><input name="kaji_awal136" type="radio" value="Mandiri" />
Mandiri
  <input name="kaji_awal136" type="radio" value="Menggunakan alat" />
Menggunakan alat
<input name="kaji_awal136" type="radio" value="Dibantu orang lain" />
Dibantu orang lain
<input name="kaji_awal136" type="radio" value="Sangat tergantung" />
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Aktivitas dan Mobilisasi&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Ganti posisi baring</td>
    <td>:</td>
    <td><input name="kaji_awal137" type="radio" value="Mandiri" />
Mandiri
  <input name="kaji_awal137" type="radio" value="Menggunakan alat" />
Menggunakan alat
<input name="kaji_awal137" type="radio" value="Dibantu orang lain" />
Dibantu orang lain
<input name="kaji_awal137" type="radio" value="Sangat tergantung" />
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Ganti posisi duduk</td>
    <td>:</td>
    <td><input name="kaji_awal138" type="radio" value="Mandiri" />
Mandiri
  <input name="kaji_awal138" type="radio" value="Menggunakan alat" />
Menggunakan alat
<input name="kaji_awal138" type="radio" value="Dibantu orang lain" />
Dibantu orang lain
<input name="kaji_awal138" type="radio" value="Sangat tergantung" />
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Berjalan</td>
    <td>:</td>
    <td><input name="kaji_awal139" type="radio" value="Mandiri" />
Mandiri
  <input name="kaji_awal139" type="radio" value="Menggunakan alat" />
Menggunakan alat
<input name="kaji_awal139" type="radio" value="Dibantu orang lain" />
Dibantu orang lain
<input name="kaji_awal139" type="radio" value="Sangat tergantung" />
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Keseimbangan</td>
    <td>:</td>
    <td><input name="kaji_awal140" type="radio" value="Tegak" />
      Tegak
        <input name="kaji_awal140" type="radio" value="Goyah" />
        Goyah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Kekuatan otot</td>
    <td>:</td>
    <td><input name="kaji_awal141" type="radio" value="Kuat" />Kuat
      <input name="kaji_awal141" type="radio" value="Sedang" />Sedang
      <input name="kaji_awal141" type="radio" value="Lemah" />Lemah
      <input name="kaji_awal141" type="radio" value="Lumpuh" />Lumpuh
      <input name="kaji_awal141a" type="text" value="<?php echo $data['kaji_awal141a'] ;?>" size="4"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal142" type="radio" value="Tidak" />
      Tidak
      <input name="kaji_awal142" type="radio" value="Ya" />
      Ya, sebutkan 
      <input name="kaji_awal143" type="text" value="<?php echo $data['kaji_awal143'] ;?>" size="4"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Pola Kognitif dan Persepsi&nbsp;</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Penglihatan</td>
    <td>:</td>
    <td><input name="kaji_awal144" type="radio" value="Normal" />
Normal
  <input name="kaji_awal144" type="radio" value="Kacamata" />
Kacamata
<input name="kaji_awal144" type="radio" value="Kontak lensa" />
Kontak lensa </td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah penglihatan</td>
    <td>&nbsp;</td>
    <td>Rabun : 
      <input name="kaji_awal145" type="radio" value="Tidak" />
      Tidak
      <input name="kaji_awal145" type="radio" value="Kanan" />Kanan
      <input name="kaji_awal145" type="radio" value="Kiri" />Kiri
      <input name="kaji_awal145" type="radio" value="Kedua-duanya" />Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Buta :
      <input name="kaji_awal146" type="radio" value="Tidak" />
Tidak
<input name="kaji_awal146" type="radio" value="Kanan" />
Kanan
<input name="kaji_awal146" type="radio" value="Kiri" />
Kiri
<input name="kaji_awal146" type="radio" value="Kedua-duanya" />
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Katarak : 
      <input name="kaji_awal147" type="radio" value="Tidak" />
      Tidak
      <input name="kaji_awal147" type="radio" value="Kanan" />
      Kanan
      <input name="kaji_awal147" type="radio" value="Kiri" />
      Kiri
      <input name="kaji_awal147" type="radio" value="Kedua-duanya" />
      Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Glaucoma : 
      <input name="kaji_awal148" type="radio" value="Tidak" />
      Tidak
      <input name="kaji_awal148" type="radio" value="Kanan" />
      Kanan
      <input name="kaji_awal148" type="radio" value="Kiri" />
      Kiri
      <input name="kaji_awal148" type="radio" value="Kedua-duanya" />
      Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pendengaran</td>
    <td>:</td>
    <td><input name="kaji_awal149" type="radio" value="Normal" />
Normal
  <input name="kaji_awal149" type="radio" value="Hearing aid kanan" />
Hearing aid kanan
<input name="kaji_awal149" type="radio" value="Hearing aid kiri" />
Hearing aid kiri </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah pendengaran</td>
    <td>:</td>
    <td>Tuli
      :
      <input name="kaji_awal150" type="radio" value="Tidak" />
Tidak
<input name="kaji_awal150" type="radio" value="Kanan" />
Kanan
<input name="kaji_awal150" type="radio" value="Kiri" />
Kiri
<input name="kaji_awal150" type="radio" value="Kedua-duanya" />
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Berdenging
      :
        <input name="kaji_awal151" type="radio" value="Tidak" />
Tidak
<input name="kaji_awal151" type="radio" value="Kanan" />
Kanan
<input name="kaji_awal151" type="radio" value="Kiri" />
Kiri
<input name="kaji_awal151" type="radio" value="Kedua-duanya" />
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Vertigo</td>
    <td>:</td>
    <td><input name="kaji_awal152" type="radio" value="Tidak" />
      Tidak
        <input name="kaji_awal152" type="radio" value="Ada" />
        Ada</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Status mental</td>
    <td>:</td>
    <td><input name="kaji_awal153" type="radio" value="Respon baik" />
      Respon baik
        <input name="kaji_awal153" type="radio" value="Respon tidak sesuai" />
        Respon tidak sesuai 
        <input name="kaji_awal153" type="radio" value="Bingung" />
        Bingung
        <input name="kaji_awal153" type="radio" value="Mudah lupa" />
        Mudah lupa 
        <input name="kaji_awal153" type="radio" value="Dimensia" />
        Dimensia</td>
  </tr>  <?php }
  else {
  echo "";
  }
  ?>
  <tr bgcolor="#D9E8F3">
    <td>&nbsp;&nbsp;
      <input type="submit" name="Submit" value="Submit" /></td>
    <td>:</td>
    <td></td>
  </tr>
  </form>
</table>
<?php }
?>
</body>
</html>
