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
}

$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($query);
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
<script>
            function validasi(){
var pengantar =form1.pengantar.value;
var kaji_awal03 =form1.kaji_awal03.value;
var kaji_awal05 =form1.kaji_awal05.value;
var kaji_awal10 =form1.kaji_awal10.value;
var kaji_awal11 =form1.kaji_awal11.value;
var kaji_awal26 =form1.kaji_awal26.value;
var kaji_awal42 =form1.kaji_awal42.value;
var kaji_awal46 =form1.kaji_awal46.value;
var kaji_awal47 =form1.kaji_awal47.value;
var kaji_awal60 =form1.kaji_awal60.value;
var kaji_awal62 =form1.kaji_awal62.value;
var kaji_awal65 =form1.kaji_awal65.value;
var kaji_awal67 =form1.kaji_awal67.value;
var kaji_awal71 =form1.kaji_awal71.value;
var kaji_awal77 =form1.kaji_awal77.value;
var kaji_awal78 =form1.kaji_awal78.value;
var kaji_awal110 =form1.kaji_awal110.value;
var kaji_awal111 =form1.kaji_awal111.value;
var kaji_awal112 =form1.kaji_awal112.value;
var kaji_awal117 =form1.kaji_awal117.value;
var kaji_awal122 =form1.kaji_awal122.value;
var kaji_awal123 =form1.kaji_awal123.value;
var kaji_awal124 =form1.kaji_awal124.value;
var kaji_awal125 =form1.kaji_awal125.value;
var kaji_awal132 =form1.kaji_awal132.value;
var kaji_awal133 =form1.kaji_awal133.value;
var pesan = '';
		if (	pengantar	== '') {	 pesan = '	Nama pengantar belum diisi 	\n';	}
        if (	kaji_awal03	== '') {	 pesan += '	Jam masuk belum diisi 	\n';	}
        if (	kaji_awal05	== '') {	 pesan += '	Diagnosa masuk belum diisi 	\n';	}
        if (	kaji_awal10	== '') {	 pesan += '	Keluhan utama belum diisi 	\n';	}
        if (	kaji_awal11	== '') {	 pesan += '	Riwayat penyakit sekarang belum diisi	\n';	}
        if (	kaji_awal26	== '') {	 pesan += '	Frekwensi napas belum diisi	\n';	}
        if (	kaji_awal42	== '') {	 pesan += '	Frekwensi nadi belum diisi 	\n';	}
        if (	kaji_awal46	== '') {	 pesan += '	Tekanan darah belum diisi 	\n';	}
        if (	kaji_awal47	== '') {	 pesan += '	Suhu belum diisi 	\n';	}
        if (	kaji_awal60	== '') {	 pesan += '	Bising usus belum diisi 	\n';	}
        if (	kaji_awal62	== '') {	 pesan += '	Kebiasaan makan belum diisi	\n';	}
        if (	kaji_awal65	== '') {	 pesan += '	DIET belum diisi 	\n';	}
        if (	kaji_awal67	== '') {	 pesan += '	Kebiasaan BAB belum diisi 	\n';	}
        if (	kaji_awal71	== '') {	 pesan += '	Kebiasaan BAK belum diisi 	\n';	}
        if (	kaji_awal77	== '') {	 pesan += '	GCS E belum diisi 	\n';	}
        if (	kaji_awal78	== '') {	 pesan += '	GCS M belum diisi 	\n';	}
        if (	kaji_awal110	== '') {	 pesan += '	Jumlah anak belum diisi 	\n';	}
        if (	kaji_awal111	== '') {	 pesan += '	Tidur malam belum diisi 	\n';	}
        if (	kaji_awal112	== '') {	 pesan += '	Tidur siang belum diisi 	\n';	}
        if (	kaji_awal117	== '') {	 pesan += '	Bahasa belum diisi 	\n';	}
        if (	kaji_awal122	== '') {	 pesan += '	Pekerjaan belum diisi 	\n';	}
        if (	kaji_awal123	== '') {	 pesan += '	Hobi belum diisi 	\n';	}
        if (	kaji_awal124	== '') {	 pesan += '	Orang yang tinggal serumah belum diisi	\n';	}
        if (	kaji_awal125	== '') {	 pesan += '	Penggunaan waktu luang belum diisi	\n';	}
        if (	kaji_awal132	== '') {	 pesan += '	Praktek keagamaan belum diisi	\n';	}
        if (	kaji_awal133	== '') {	 pesan += '	Harapan pasien belum diisi	\n';	}
        if (pesan != '') {
            alert('Belum lengkap <?php echo $_SESSION[nama]; ?> ! \n'+pesan);
            return false;
        }

function check_radio(radio)
  {
// memeriksa apakah radio button sudah ada yang dipilih
    for (i = 0; i < radio.length; i++)
    {
      if (radio[i].checked === true)
      {
        return radio[i].value;
      }
    }
	   return false;
   }

   var radio_val1 = check_radio(form1.kaji_awal01);
   var radio_val2 = check_radio(form1.kaji_awal02);
   var radio_val3 = check_radio(form1.kaji_awal04);
   var radio_val4 = check_radio(form1.kaji_awal06);
   var radio_val5 = check_radio(form1.kaji_awal12);
   var radio_val6 = check_radio(form1.kaji_awal15);
   var radio_val7 = check_radio(form1.kaji_awal18);
   var radio_val8 = check_radio(form1.kaji_awal21);
   var radio_val9 = check_radio(form1.kaji_awal24);
   var radio_val10 = check_radio(form1.kaji_awal27); //Pola napas
   var radio_val11 = check_radio(form1.kaji_awal28); //Kedalaman pernapasan
   var radio_val12 = check_radio(form1.kaji_awal29); //Sesak
   var radio_val13 = check_radio(form1.kaji_awal31); //Suara tambahan
   var radio_val14 = check_radio(form1.kaji_awal33); //Batuk
   var radio_val15 = check_radio(form1.kaji_awal36); //Perokok
   var radio_val16 = check_radio(form1.kaji_awal39); //Oksigen
   var radio_val17 = check_radio(form1.kaji_awal43); //Nadi teratur
   var radio_val18 = check_radio(form1.kaji_awal44); //Nadi kuat
   var radio_val19 = check_radio(form1.kaji_awal45); //Pengisian kapiler
   var radio_val20 = check_radio(form1.kaji_awal48); //Lokasi pengukuran suhu
   var radio_val21 = check_radio(form1.kaji_awal49); //warna kulit
   var radio_val22 = check_radio(form1.kaji_awal50); //akral dingin atau hangat
   var radio_val23 = check_radio(form1.kaji_awal51); //akral kering atau lembab
   var radio_val24 = check_radio(form1.kaji_awal52); //ada edema
   var radio_val25 = check_radio(form1.kaji_awal54); //alat bantu sistem kardio
   var radio_val26 = check_radio(form1.kaji_awal56); //kebersihan mulut
   var radio_val27 = check_radio(form1.kaji_awal57); //kebersihan gigi
   var radio_val28 = check_radio(form1.kaji_awal58); //pakai gigi palsu atau tidak
   var radio_val29 = check_radio(form1.kaji_awal61); //bising usus
   var radio_val30 = check_radio(form1.kaji_awal63); //napsu makan
   var radio_val31 = check_radio(form1.kaji_awal64); //masalah dalam makan
   var radio_val32 = check_radio(form1.kaji_awal66); //alat bantu dalam makan
   var radio_val33 = check_radio(form1.kaji_awal68); //masalah dalam BAB
   var radio_val34 = check_radio(form1.kaji_awal72); //warna urin
   var radio_val35 = check_radio(form1.kaji_awal73); //Distensi kandung kemih
   var radio_val36 = check_radio(form1.kaji_awal74); //Masalah dalam BAK
   var radio_val37 = check_radio(form1.kaji_awal75); //Alat bantu BAK
   var radio_val38 = check_radio(form1.kaji_awal76); //kesadaran
   var radio_val39 = check_radio(form1.kaji_awal81); //mata
   var radio_val40 = check_radio(form1.kaji_awal82); //alat bantu mata
   var radio_val41 = check_radio(form1.kaji_awal83); //Pupil
   var radio_val42 = check_radio(form1.kaji_awal84); //Reaksi cahaya pupil
   var radio_val43 = check_radio(form1.kaji_awal85); //Reaksi cahaya pupil
   var radio_val44 = check_radio(form1.kaji_awal86); //ada kejang
   var radio_val45 = check_radio(form1.kaji_awal88); //gangguan pergerakan
   var radio_val46 = check_radio(form1.kaji_awal91); //alat bantu
   var radio_val47 = check_radio(form1.kaji_awal93); //Gangguan bicara
   var radio_val48 = check_radio(form1.kaji_awal94); //Skrining nyeri
   var radio_val49 = check_radio(form1.kaji_awal95); //keadaan kulit
   var radio_val50 = check_radio(form1.kaji_awal97); //turgor kulit
   var radio_val51 = check_radio(form1.kaji_awal98); //kesulitan pergerakkan
   var radio_val52 = check_radio(form1.kaji_awal84); //Reaksi cahaya pupil
   var radio_val53 = check_radio(form1.kaji_awal100); //kontraktur
   var radio_val54 = check_radio(form1.kaji_awal102); //alat bantu gerak
   var radio_val55 = check_radio(form1.kaji_awal109); //status pernikahan
   var radio_val56 = check_radio(form1.kaji_awal113); //masalah dalam tidur
   var radio_val57 = check_radio(form1.kaji_awal114); //penggunaan obat tidur
   var radio_val58 = check_radio(form1.kaji_awal118); //perlu penerjemah
   var radio_val59 = check_radio(form1.kaji_awal120); //tingkat pendidikan
   var radio_val60 = check_radio(form1.kaji_awal126); //pola mengatasi masalah
   var radio_val61 = check_radio(form1.kaji_awal127); //keterampilan interakasi
   var radio_val62 = check_radio(form1.kaji_awal128); //pola kognitif
   var radio_val63 = check_radio(form1.kaji_awal129); //koping keluarga
   var radio_val64 = check_radio(form1.kaji_awal130); //agama
   

   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, masuk melalui mana?");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, menggunakan apa?");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, gelang sudah terpasang belum?");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, ada riwayat alergi nggak?");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, pernah dirawat nggak?");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, pernah operasi nggak?");
      return false;
    }
	if (radio_val7 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, ada penyakit menular atau penurunan daya tahan tubuh, kah?");
      return false;
    }
	if (radio_val8 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, ada riwayat kekerasan nggak?");
      return false;
    }
	 if (radio_val9	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	riwayat penyakit keluarga belum diisi!	?");	return false;	}
  if (radio_val10	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	pola napas belum diisi	?");	return false;	}
 if (radio_val11	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	kedalaman pernapasan belum diisi	?");	return false;	}
 if (radio_val12	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	sesak belum diisi	?");	return false;	}
 if (radio_val13	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	suara tambahan belum diisi	?");	return false;	}
 if (radio_val14	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	batuk belum diisi	?");	return false;	}
 if (radio_val15	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	perokok belum diisi	?");	return false;	}
 if (radio_val16	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	oksigen belum diisi	?");	return false;	}
 if (radio_val17	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	nadi teratur belum diisi	?");	return false;	}
 if (radio_val18	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	nadi kuat belum diisi	?");	return false;	}
 if (radio_val19	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	pengisian kapiler belum diisi	?");	return false;	}
 if (radio_val20	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	lokasi pengukuran suhu belum diisi!	?");	return false;	}
 if (radio_val21	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	warna kulit belum diisi	?");	return false;	}
 if (radio_val22	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	akral dingin atau hangat belum diisi!	?");	return false;	}
 if (radio_val23	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	akral kering atau lembab belum diisi!	?");	return false;	}
 if (radio_val24	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	ada edema belum diisi	?");	return false;	}
 if (radio_val25	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	alat bantu sistem kardio belum diisi!	?");	return false;	}
 if (radio_val26	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	kebersihan mulut belum diisi	?");	return false;	}
 if (radio_val27	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	kebersihan gigi belum diisi	?");	return false;	}
 if (radio_val28	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	pakai gigi palsu atau tidak belum diisi!	?");	return false;	}
 if (radio_val29	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	bising usus belum diisi	?");	return false;	}
 if (radio_val30	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	napsu makan belum diisi	?");	return false;	}
 if (radio_val31	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	masalah dalam makan belum diisi!	?");	return false;	}
 if (radio_val32	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	alat bantu dalam makan belum diisi!	?");	return false;	}
 if (radio_val33	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	masalah dalam bab belum diisi!	?");	return false;	}
 if (radio_val34	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	warna urin belum diisi	?");	return false;	}
 if (radio_val35	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	distensi kandung kemih belum diisi!	?");	return false;	}
 if (radio_val36	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	masalah dalam bak belum diisi!	?");	return false;	}
 if (radio_val37	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	alat bantu bak belum diisi!	?");	return false;	}
 if (radio_val38	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	kesadaran belum diisi	?");	return false;	}
 if (radio_val39	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	mata belum diisi?");	return false;	}
 if (radio_val40	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	alat bantu mata belum diisi!	?");	return false;	}
 if (radio_val41	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	pupil belum diisi	?");	return false;	}
 if (radio_val42	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	reaksi cahaya pupil belum diisi!	?");	return false;	}
 if (radio_val43	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	reaksi cahaya pupil belum diisi!	?");	return false;	}
 if (radio_val44	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	ada kejang belum diisi	?");	return false;	}
 if (radio_val45	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	gangguan pergerakan belum diisi	?");	return false;	}
 if (radio_val46	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	alat bantu belum diisi	?");	return false;	}
 if (radio_val47	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	gangguan bicara belum diisi	?");	return false;	}
 if (radio_val48	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	skrining nyeri belum diisi	?");	return false;	}
 if (radio_val49	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	keadaan kulit belum diisi	?");	return false;	}
 if (radio_val50	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	turgor kulit belum diisi	?");	return false;	}
 if (radio_val51	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	kesulitan pergerakkan belum diisi	?");	return false;	}
 if (radio_val52	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	reaksi cahaya pupil belum diisi!	?");	return false;	}
 if (radio_val53	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	kontraktur belum diisi	?");	return false;	}
 if (radio_val54	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	alat bantu gerak belum diisi!	?");	return false;	}
 if (radio_val55	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	status pernikahan belum diisi	?");	return false;	}
 if (radio_val56	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	masalah dalam tidur belum diisi!	?");	return false;	}
 if (radio_val57	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	penggunaan obat tidur belum diisi!	?");	return false;	}
 if (radio_val58	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	perlu penerjemah belum diisi	?");	return false;	}
 if (radio_val59	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	tingkat pendidikan belum diisi	?");	return false;	}
 if (radio_val60	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	pola mengatasi masalah belum diisi!	?");	return false;	}
 if (radio_val61	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	keterampilan interakasi belum diisi	?");	return false;	}
 if (radio_val62	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	pola kognitif belum diisi	?");	return false;	}
 if (radio_val63	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	koping keluarga belum diisi	?");	return false;	}
 if (radio_val64	 === false)	{	alert("Belum lengkap <?php echo $_SESSION[nama]; ?>,	agama belum diisi	?");	return false;	}

   return (true);
}
</script>
<title>PENGKAJIAN AWAL DEWASA</title>
</head>
<body>
<?php	
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$sql = "SELECT * FROM pengkajian_awal WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi, $sql)
or die ("SQL Error".mysqli_error());
$data=mysqli_fetch_array($qry);
?>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" action="pengkajian_dewasa_edit_sim.php" method="POST"  onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'] ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo $data['jam'] ;?>">
<input name="shift" type="hidden" id="jam" value="<?php echo $data['shift'] ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $data['nik'] ;?>">
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
	      <?php
	if ($data['kaji_awal01']=="IGD") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal01']=="Poliklinik") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal01']=="Admission"){
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal01" type="radio" value="IGD" <?php echo $cek_1;?>/>
      IGD
      <input name="kaji_awal01" type="radio" value="Poliklinik" <?php echo $cek_2;?>/>
     Poliklinik    
    <input name="kaji_awal01" type="radio" value="Admission" <?php echo $cek_3;?>/>Admission     </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Menggunakan&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal02']=="Bed") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="Kursi roda") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="Jalan kaki") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="Lain-lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal02" type="radio" value="Bed" <?php echo $cek_1;?>/>
      Bed
      <input name="kaji_awal02" type="radio" value="Kursi roda" <?php echo $cek_2;?>/>
      Kursi roda 
      <input name="kaji_awal02" type="radio" value="Jalan kaki" <?php echo $cek_3;?>/>
      Jalan kaki 
      <input name="kaji_awal02" type="radio" value="Lain-lain" <?php echo $cek_4;?>/>
      Lain-lain</td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Jam masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal03" id="kaji_awal03" type="text" size="6"  value="<?php echo "".date('H:i') ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diantar oleh </td>
    <td>&nbsp;</td>
    <td><input name="pengantar" id="pengantar" type="text" value="<?php echo $data['pengantar'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Gelang identitas&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal04']=="Terpasang") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal04']=="Tidak terpasang") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal04" type="radio" value="Terpasang" <?php echo $cek_1;?>/>
      Terpasang
      <input name="kaji_awal04" type="radio" value="Tidak terpasang" <?php echo $cek_2;?>/>
      Tidak terpasang </td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    5. Diagnosa saat masuk&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal05" id="kaji_awal05"type="text" value="<?php echo $data['kaji_awal05'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    6. Riwayat Alergi</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal06']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal06']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal06" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal06" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya, jelaskan : </td></tr>
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
    <td><input name="kaji_awal10" id="kaji_awal10" type="text" size="60" value="<?php echo $data['kaji_awal10'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>B. Riwayat Penyakit sekarang&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td colspan="3"><textarea name="kaji_awal11" id="kaji_awal11" cols="80"><?php echo $data['kaji_awal11']; ?></textarea></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>C. Riwayat Kesehatan&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Pernah dirawat di RS</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal12']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal12']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal12" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal12" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya</td></tr>
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
    <td><?php
	if ($data['kaji_awal15']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal15']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal15" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal15" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya</td></tr>
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
    <td><?php
	if ($data['kaji_awal18']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal18']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal18" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal18" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya</td></tr>
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
    <td><?php
	if ($data['kaji_awal21']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal21']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal21" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal21" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya  </td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp; Berupa (*diisi jika ya) </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal22']=="Fisik") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal22']=="Emosional") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal22']=="Seksual") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal22" type="radio" value="Fisik" <?php echo $cek_1;?>/>
      Fisik
      <input name="kaji_awal22" type="radio" value="Emosional" <?php echo $cek_2;?>/>
      Emosional
      <input name="kaji_awal22" type="radio" value="Seksual" <?php echo $cek_3;?>/>
      Seksual</td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;    Kekerasan dilakukan oleh (*diisi jika ya) &nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal23']=="Diri sendiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal23']=="Orang lain") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal23" type="radio" value="Diri sendiri" <?php echo $cek_1;?>/>
      Diri sendiri
      <input name="kaji_awal23" type="radio" value="Orang lain" <?php echo $cek_2;?>/>
      Orang lain </td></tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>E. Riwayat penyakit keluarga&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td colspan="3">
	  <?php
	if ($data['kaji_awal24']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal24']=="Hipertensi") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal24']=="Jantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal24']=="DM") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal24']=="Asthma") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal24']=="Lainnya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	}
	?>
	  <input name="kaji_awal24" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>Tidak ada
      <input name="kaji_awal24" type="radio" value="Hipertensi" <?php echo $cek_2;?>/>Hipertensi
      <input name="kaji_awal24" type="radio" value="Jantung" <?php echo $cek_3;?>/>Jantung
      <input name="kaji_awal24" type="radio" value="DM" <?php echo $cek_4;?>/>DM
      <input name="kaji_awal24" type="radio" value="Asthma" <?php echo $cek_5;?>/>Asthma
	  <input name="kaji_awal24" type="radio" value="Lainnya" <?php echo $cek_6;?>/>Lainnya
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
    <td><input name="kaji_awal26" id="kaji_awal26" type="text" value="<?php echo $data['kaji_awal26'] ;?>" size="2"/>
      x/menit</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td rowspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pola</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal27']=="Teratur") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal27']=="Tidak teratur") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal27" type="radio" value="Teratur" <?php echo $cek_1;?>/>
Teratur
<input name="kaji_awal27" type="radio" value="Tidak teratur" <?php echo $cek_2;?>/>
Tidak teratur</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal28']=="Dalam") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal28']=="Dangkal") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal28" type="radio" value="Dalam" <?php echo $cek_1;?>/>
Dalam
<input name="kaji_awal28" type="radio" value="Dangkal"<?php echo $cek_2;?>/>
Dangkal</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Sesak</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal29']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal29']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal29" type="radio" value="Tidak"  <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal29" type="radio" value="Ya"  <?php echo $cek_2;?>/>
      Ya , jika ya 
      <?php
	if ($data['kaji_awal30']=="dengan aktifitas") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal30']=="tanpa aktifitas") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal30" type="radio" value="dengan aktifitas" ondblclick="rC(this)" <?php echo $cek_1;?>/>
      dengan aktifitas 
  <input name="kaji_awal30" type="radio" value="tanpa aktifitas" ondblclick="rC(this)" <?php echo $cek_2;?>/>
      tanpa aktifitas </td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Suara napas tambahan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal31']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal31']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal31" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal31" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya, jenis 
  <input name="kaji_awal32" type="text" value="<?php echo $data['kaji_awal32'] ;?>"/></td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Batuk</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal33']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal33']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal33" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal33" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dahak</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal34']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal34']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal34" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal34" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, warna
<input name="kaji_awal35" type="text" value="<?php echo $data['kaji_awal35'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Perokok</td>
    <td>:</td>
    <td>
     <?php
	if ($data['kaji_awal36']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal36']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
     <input name="kaji_awal36" type="radio" value="Tidak" <?php echo $cek_1;?>/> 
     Tidak
      <input name="kaji_awal36" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya,
  <input name="kaji_awal37" type="text" value="<?php echo $data['kaji_awal37'] ;?>" size="2"/>
      batang/hari; berhenti sejak 
  <input name="kaji_awal38" type="text" value="<?php echo $data['kaji_awal38'] ;?>" size="4"/></td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Memakai oksigen&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal39']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal39']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal39" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal39" type="radio" value="Ya" <?php echo $cek_2;?>/>
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
    <td rowspan="3" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Nadi&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal42" id="kaji_awal42" type="text" value="<?php echo $data['kaji_awal42'] ;?>" size="2"/>
      bpm</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal43']=="Teratur") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal43']=="Tidak teratur") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal43" type="radio" value="Teratur" <?php echo $cek_1;?>/>
Teratur
<input name="kaji_awal43" type="radio" value="Tidak teratur" <?php echo $cek_2;?>/>
Tidak teratur</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal44']=="Kuat") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal44']=="Lemah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal44" type="radio" value="Kuat" <?php echo $cek_1;?>/>
Kuat
<input name="kaji_awal44" type="radio" value="Lemah" <?php echo $cek_2;?>/>
Lemah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pengisian kapiler</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal45']=="Kurang 3 detik") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal45']=="Lebih 3 detik") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal45" type="radio" value="Kurang 3 detik" <?php echo $cek_1;?>/>
Kurang 3 detik
  <input name="kaji_awal45" type="radio" value="Lebih 3 detik" <?php echo $cek_2;?>/> 
  Lebih 3 detik</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td height="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Tekanan darah&nbsp; </td>
    <td>:</td>
    <td><input name="kaji_awal46" id="kaji_awal46" type="text" value="<?php echo $data['kaji_awal46'] ;?>" size="2"/>
      mmHg; Suhu : 
        <input name="kaji_awal47" id="kaji_awal47" type="text" value="<?php echo $data['kaji_awal47'] ;?>" size="2"/>
        &deg;C      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lokasi pengukuran</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal48']=="Axilla") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal48']=="Telinga") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal48" type="radio" value="Axilla" <?php echo $cek_1;?>/>
Axilla
<input name="kaji_awal48" type="radio" value="Telinga" <?php echo $cek_2;?>/>
Telinga</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Warna kulit&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal49']=="Normal") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal49']=="Pucat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal49']=="Sianosis") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal49']=="Kemerahan") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal49" type="radio" value="Normal" <?php echo $cek_1;?>/>Normal
	<input name="kaji_awal49" type="radio" value="Pucat" <?php echo $cek_2;?>/>Pucat
	<input name="kaji_awal49" type="radio" value="Sianosis" <?php echo $cek_3;?>/>Sianosis
	<input name="kaji_awal49" type="radio" value="Kemerahan" <?php echo $cek_4;?>/>Kemerahan</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td rowspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Perabaan akral&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal50']=="Hangat") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal50']=="Dingin") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal50" type="radio" value="Hangat" <?php echo $cek_1;?>/>
        Hangat
        <input name="kaji_awal50" type="radio" value="Dingin" <?php echo $cek_2;?>/>
        Dingin      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal51']=="Kering") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal51']=="Lembab") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal51" type="radio" value="Kering" <?php echo $cek_1;?>/>
Kering
<input name="kaji_awal51" type="radio" value="Lembab" <?php echo $cek_2;?>/>
Lembab</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Edema</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal52']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal52']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal52" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal52" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, lokasi
<input name="kaji_awal53" type="text" value="<?php echo $data['kaji_awal53'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal54']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal54']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal54" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
Tidak
  ada
  <input name="kaji_awal54" type="radio" value="Ya" <?php echo $cek_2;?>/>
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
    <td><?php
	if ($data['kaji_awal56']=="Bersih") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal56']=="Kotor") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal56']=="Sariawan") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal56" type="radio" value="Bersih" <?php echo $cek_1;?>/>
      Bersih
        <input name="kaji_awal56" type="radio" value="Kotor" <?php echo $cek_2;?>/>
        Kotor
        <input name="kaji_awal56" type="radio" value="Sariawan" <?php echo $cek_3;?>/>
        Sariawan</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Gigi</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal57']=="Bersih") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal57']=="Karang gigi") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal57']=="Karies") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal57" type="radio" value="Bersih" <?php echo $cek_1;?>/>
      Bersih
        <input name="kaji_awal57" type="radio" value="Karang gigi" <?php echo $cek_2;?>/>
        Karang gigi 
        <input name="kaji_awal57" type="radio" value="Karies"<?php echo $cek_3;?> />
        Karies</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Gigi palsu</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal58']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal58']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal58" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal58" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya ,
<?php
	if ($data['kaji_awal59']=="Gigi atas") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal59']=="Gigi bawah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
<input name="kaji_awal59" type="radio" value="Gigi atas" ondblclick="rC(this)" <?php echo $cek_1;?>/>
Gigi atas
<input name="kaji_awal59" type="radio" value="Gigi bawah" ondblclick="rC(this)" <?php echo $cek_2;?>/>
Gigi bawah </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Bising usus</td>
    <td>:</td>
    <td><input name="kaji_awal60" id="kaji_awal60" type="text" value="<?php echo $data['kaji_awal60'] ;?>" size="2"/>
      x/menit      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kembung</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal61']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal61']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal61" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal61" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kebiasaan makan</td>
    <td>:</td>
    <td><input name="kaji_awal62" id="kaji_awal62" type="text" value="<?php echo $data['kaji_awal62'] ;?>" size="2"/>
      kali/hari, </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nafsu makan</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal63']=="Baik") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal63']=="Cukup") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal63']=="Kurang") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal63" type="radio" value="Baik" <?php echo $cek_1;?>/>
Baik
<input name="kaji_awal63" type="radio" value="Cukup" <?php echo $cek_2;?>/>
Cukup
<input name="kaji_awal63" type="radio" value="Kurang" <?php echo $cek_3;?>/>
Kurang</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Masalah dalam makan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal64']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal64']=="Mual") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal64']=="Muntah") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal64']=="Sakit menelan") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal64" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
    Tidak ada
      <input name="kaji_awal64" type="radio" value="Mual" <?php echo $cek_2;?>/>
      Mual
        <input name="kaji_awal64" type="radio" value="Muntah" <?php echo $cek_3;?>/>
        Muntah
        <input name="kaji_awal64" type="radio" value="Sakit menelan" <?php echo $cek_4;?>/>
        Sakit menelan </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Diet</td>
    <td>:</td>
    <td><input name="kaji_awal65" id="kaji_awal65" type="text" value="<?php echo $data['kaji_awal65'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Alat bantu&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal66']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal66']=="NGT") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal66']=="Gastrostomy") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
	<input name="kaji_awal66" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
      Tidak ada
      <input name="kaji_awal66" type="radio" value="NGT" <?php echo $cek_2;?>/>
      NGT
  <input name="kaji_awal66" type="radio" value="Gastrostomy" <?php echo $cek_3;?>/>
      Gastrostomy </td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Kebiasaan BAB&nbsp;</td>
    <td>:</td>
    <td>Setiap
      <input name="kaji_awal67" id="kaji_awal67" type="text" value="<?php echo $data['kaji_awal67'] ;?>" size="2"/>
      kali sehari.</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h.    Masalah dalam BAB</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal68']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal68']=="Obstipasi") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal68']=="Konstipasi") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal68']=="Diare") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal68" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal68" type="radio" value="Obstipasi" <?php echo $cek_2;?>/>
Obstipasi
<input name="kaji_awal68" type="radio" value="Konstipasi" <?php echo $cek_3;?>/>
Konstipasi 
<input name="kaji_awal68" type="radio" value="Diare" <?php echo $cek_4;?>/>
Diare , frekwensi
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
    <td><input name="kaji_awal71" id="kaji_awal71" type="text" value="<?php echo $data['kaji_awal71'] ;?>" size="2"/>
      kali/hari, </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal72']=="Kuning jernih") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal72']=="Kuning pekat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal72']=="Merah") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal72']=="Darah") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal72" type="radio" value="Kuning jernih" <?php echo $cek_1;?>/>
Kuning jernih
<input name="kaji_awal72" type="radio" value="Kuning pekat" <?php echo $cek_2;?>/>
Kuning pekat
<input name="kaji_awal72" type="radio" value="Merah" <?php echo $cek_3;?>/>
Merah
<input name="kaji_awal72" type="radio" value="Darah" <?php echo $cek_4;?>/>
Darah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Distensi kandung kemih</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal73']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal73']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal73" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal73" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Masalah dalam BAK</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal74']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal74']=="Anyang-anyangan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal74']=="Sakit waktu berkemih") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal74']=="Tidak terkontrol") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal74']=="Oliguria") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	?>
      <input name="kaji_awal74" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal74" type="radio" value="Anyang-anyangan" <?php echo $cek_2;?>/>
      Anyang-anyangan
      <input name="kaji_awal74" type="radio" value="Sakit sewaktu berkemih" <?php echo $cek_3;?>/>
      Sakit waktu berkemih 
      <input name="kaji_awal74" type="radio" value="Tidak terkontrol" <?php echo $cek_4;?>/>
      Tidak terkontrol 
      <input name="kaji_awal74" type="radio" value="Oliguria" <?php echo $cek_5;?>/>
      Oliguria</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d.&nbsp; Alat bantu yang digunakan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal75']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal75']=="Kondom kateter") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal75']=="Folley kateter") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal75" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
      Tidak ada 
        <input name="kaji_awal75" type="radio" value="Kondom kateter" <?php echo $cek_2;?>/>
      Kondom kateter
      <input name="kaji_awal75" type="radio" value="Folley kateter" <?php echo $cek_3;?>/>
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
    <td><?php
	if ($data['kaji_awal76']=="Compos mentis") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal76']=="Apatis") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal76']=="Somnolen") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal76']=="Sopor") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal76']=="Koma") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	?>
      <input name="kaji_awal76" type="radio" value="Compos mentis" <?php echo $cek_1;?>/>
      Compos mentis
        <input name="kaji_awal76" type="radio" value="Apatis" <?php echo $cek_2;?>/>
        Apatis
        <input name="kaji_awal76" type="radio" value="Somnolen" <?php echo $cek_3;?>/>
      Somnolen
      <input name="kaji_awal76" type="radio" value="Sopor" <?php echo $cek_4;?>/>
      Sopor
      <input name="kaji_awal76" type="radio" value="Koma" <?php echo $cek_5;?>/>
      Koma</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. GCS</td>
    <td>:</td>
    <td>E
      <input name="kaji_awal77" id="kaji_awal77" type="text" value="<?php echo $data['kaji_awal77'] ;?>" size="1" onFocus="startCalc();" onBlur="stopCalc();" />
      V 
      <input name="kaji_awal79" id="kaji_awal79" type="text" value="<?php echo $data['kaji_awal79'] ;?>" size="1" onFocus="startCalc();" onBlur="stopCalc();" /> 
      M 
      <input name="kaji_awal78" id="kaji_awal78" type="text" value="<?php echo $data['kaji_awal78'] ;?>" size="1" onfocus="startCalc();" onblur="stopCalc();" />
Total 
      <input name="kaji_awal80" type="text" value="<?php echo $data['kaji_awal80'] ;?>" size="2"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Mata</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal81']=="Normal") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal81']=="Penglihatan jauh") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal81']=="Penglihatan dekat") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal81" type="radio" value="Normal" <?php echo $cek_1;?>/>
      Normal
        <input name="kaji_awal81" type="radio" value="Penglihatan jauh" <?php echo $cek_2;?> />
        Penglihatan jauh 
        <input name="kaji_awal81" type="radio" value="Penglihatan dekat" <?php echo $cek_3;?>/>
        Penglihatan dekat</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Alat bantu</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal82']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal82']=="Kacamata") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal82']=="Kontak lensa") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal82" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
Tidak ada
  <input name="kaji_awal82" type="radio" value="kacamata" <?php echo $cek_2;?>/>
Kacamata
<input name="kaji_awal82" type="radio" value="Kontak lensa" <?php echo $cek_3;?>/>
Kontak lensa </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Pupil</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal83']=="Isokor") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal83']=="Anisokor") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal83" type="radio" value="Isokor" <?php echo $cek_1;?>/>Isokor
        <input name="kaji_awal83" type="radio" value="Anisokor" <?php echo $cek_2;?>/>
      Anisokor</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td rowspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Reaksi cahaya : </td>
    <td>&nbsp;</td>
    <td>KANAN
      
      <?php
	if ($data['kaji_awal84']=="Positif") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal84']=="Negatif") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal84" type="radio" value="Positif" <?php echo $cek_1;?>/>
      Positif
      <input name="kaji_awal84" type="radio" value="Negatif" <?php echo $cek_2;?>/>
Negatif      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>KIRI
      <?php
	if ($data['kaji_awal85']=="Positif") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal85']=="Negatif") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal85" type="radio" value="Positif" <?php echo $cek_1;?>/>
Positif
<input name="kaji_awal85" type="radio" value="Negatif" <?php echo $cek_2;?>/>
Negatif</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Kejang</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal86']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal86']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal86" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal86" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya, 
        <input name="kaji_awal87" type="text" value="<?php echo $data['kaji_awal87'] ;?>" size="2"/>
      Menit</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Gangguan pergerakan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal88']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal88']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal88" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal88" type="radio" value="Ya"<?php echo $cek_2;?> />
Ya,
<?php
	if ($data['kaji_awal89']=="Tetraplegi") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal89']=="Tetraparese") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal89']=="Hemiplegi") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal89']=="Hemiparese") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
<input name="kaji_awal89" type="radio" value="Tetraplegi" ondblclick="rC(this)" <?php echo $cek_1;?>/>
Tetraplegi /
<input name="kaji_awal89" type="radio" value="Tetraparese" ondblclick="rC(this)" <?php echo $cek_2;?>/>
Tetraparese / 
<input name="kaji_awal89" type="radio" value="Hemiplegi" ondblclick="rC(this)" <?php echo $cek_3;?>/>
Hemiplegi / 
<input name="kaji_awal89" type="radio" value="Hemiparese" ondblclick="rC(this)" <?php echo $cek_4;?>/>
Hemiparese : 

<?php
	if ($data['kaji_awal90']=="Kanan") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal90']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
<input name="kaji_awal90" type="radio" value="Kanan" ondblclick="rC(this)" <?php echo $cek_1;?>/>
Kanan
<input name="kaji_awal90" type="radio" value="Kiri" ondblclick="rC(this)" <?php echo $cek_2;?>/>
Kiri</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal91']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal91']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal91" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal91" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya,sebutkan 
<input name="kaji_awal92" type="text" value="<?php echo $data['kaji_awal92'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    h. Gangguan bicara</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal93']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal93']=="Kesulitan bicara") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal93']=="Tidak bisa bicara") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal93']=="Pelo") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal93" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal93" type="radio" value="Kesulitan bicara" <?php echo $cek_2;?>/>Kesulitan bicara
      <input name="kaji_awal93" type="radio" value="Tidak bisa bicara" <?php echo $cek_3;?>/>Tidak bisa bicara
      <input name="kaji_awal93" type="radio" value="Pelo" <?php echo $cek_4;?>/>Pelo</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    i. Skrining nyeri</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal94']=="Tidak nyeri") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal94']=="Ada nyeri") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal94" type="radio" value="Tidak nyeri" <?php echo $cek_1;?>/>
      Tidak nyeri
        <input name="kaji_awal94" type="radio" value="Ada nyeri" <?php echo $cek_2;?>/>
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
    <td><?php
	if ($data['kaji_awal95']=="Utuh") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Bercak-bercak") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Petechie") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Gatal-gatal") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Memar") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Skar") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "checked";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Luka") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "checked";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal95']=="Dekubitus") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	?>
      <input name="kaji_awal95" type="radio" value="Utuh" <?php echo $cek_1;?>/>
      Utuh
        <input name="kaji_awal95" type="radio" value="Bercak-bercak" <?php echo $cek_2;?>/>
        Bercak
        <input name="kaji_awal95" type="radio" value="Petechie" <?php echo $cek_3;?>/>
        Petechie
        <input name="kaji_awal95" type="radio" value="Gatal-gatal" <?php echo $cek_4;?>/>
        Gatal
        <input name="kaji_awal95" type="radio" value="Memar" <?php echo $cek_5;?>/>
        Memar
        <input name="kaji_awal95" type="radio" value="Skar" <?php echo $cek_6;?>/>
        Skar
        <input name="kaji_awal95" type="radio" value="Luka" <?php echo $cek_7;?>/>
        Luka
        <input name="kaji_awal95" type="radio" value="Dekubitus" <?php echo $cek_8;?>/>
        Dekubitus<br/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Lokasi gangguan/kelainan kulit, jika ada </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal96" type="text" value="<?php echo $data['kaji_awal96'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Turgor kulit</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal97']=="Elastis") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal97']=="Tidak elastis") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal97" type="radio" value="Elastis" <?php echo $cek_1;?>/>
      Elastis
        <input name="kaji_awal97" type="radio" value="Tidak elastis" <?php echo $cek_2;?>/>
        Tidak elastis </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kesulitan pergerakan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal98']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal98']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal98" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal98" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya, bagian tubuh 
        <input name="kaji_awal99" type="text" value="<?php echo $data['kaji_awal99'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Kontraktur</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal100']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal100']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal100" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal100" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, bagian tubuh
<input name="kaji_awal101" type="text" value="<?php echo $data['kaji_awal101'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal102']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal102']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal102" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal102" type="radio" value="Ya" <?php echo $cek_2;?>/>
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
    <td><?php
	if ($data['kaji_awal104']=="Belum") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal104']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal104" type="radio" value="Belum" <?php echo $cek_1;?>/>
      Belum
        <input name="kaji_awal104" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya, lama 
        <input name="kaji_awal105" type="text" value="<?php echo $data['kaji_awal105'] ;?>" size="2"/>
        hari, haid terakhir 
        <input name="kaji_awal106" type="text" value="<?php echo $data['kaji_awal106'] ;?>" size="2"/></td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah dalam haid&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal107']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal107']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal107" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
      Tidak ada
        <input name="kaji_awal107" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya
        <input name="kaji_awal108" type="text" value="<?php echo $data['kaji_awal108'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Status perkawinan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal109']=="Tidak menikah") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal109']=="Menikah") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal109']=="Pisah/cerai/janda/duda") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal109" type="radio" value="Tidak menikah" <?php echo $cek_1;?>/>
      Tidak menikah
        <input name="kaji_awal109" type="radio" value="Menikah" <?php echo $cek_2;?>/>
        Menikah
        <input name="kaji_awal109" type="radio" value="Janda/duda"<?php echo $cek_3;?> />
        Janda/duda</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Jumlah anak &nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal110" id="kaji_awal110" type="text" value="<?php echo $data['kaji_awal110'] ;?>" size="2"/>
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
      <input name="kaji_awal111" id="kaji_awal111" type="text" value="<?php echo $data['kaji_awal111'] ;?>" size="2"/>
jam ; siang
<input name="kaji_awal112" id="kaji_awal112" type="text" value="<?php echo $data['kaji_awal112'] ;?>" size="2"/>
jam </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Masalah dalam tidur</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal113']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal113']=="Sukar tidur") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal113']=="Tidak bisa tidur") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal113']=="Bangun lebih awal") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal113']=="Sering terjaga") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	?>
      <input name="kaji_awal113" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
      Tidak ada
        <input name="kaji_awal113" type="radio" value="Sukar tidur" <?php echo $cek_2;?>/>
        Sukar tidur 
        <input name="kaji_awal113" type="radio" value="Tidak bisa tidur" <?php echo $cek_3;?>/>
        Tidak bisa tidur 
        <input name="kaji_awal113" type="radio" value="Bangun lebih awal" <?php echo $cek_4;?>/>
        Bangun lebih awal 
        <input name="kaji_awal113" type="radio" value="Sering terjaga" <?php echo $cek_5;?>/>
        Sering terjaga </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Penggunaan obat tidur</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal114']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal114']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal114" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal114" type="radio" value="Ya" <?php echo $cek_2;?>/>
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
    <td><input name="kaji_awal117" id="kaji_awal117" type="text" value="<?php echo $data['kaji_awal117'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Perlu penerjemah</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal118']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal118']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal118" type="radio" value="Tidak" <?php echo $cek_1;?>/>Tidak
      <input name="kaji_awal118" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya, bahasa 
      <input name="kaji_awal119" type="text" value="<?php echo $data['kaji_awal119'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Tingkat pendidikan terakhir</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal120']=="SD") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal120']=="SLTP") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal120']=="SMU") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal120']=="PT") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal120']=="Lain-lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	?>
      <input name="kaji_awal120" type="radio" value="SD" <?php echo $cek_1;?>/>
      SD
        <input name="kaji_awal120" type="radio" value="SLTP" <?php echo $cek_2;?>/>
        SLTP
        <input name="kaji_awal120" type="radio" value="SMU" <?php echo $cek_3;?>/>
        SMU
        <input name="kaji_awal120" type="radio" value="PT" <?php echo $cek_4;?>/>
        PT
        <input name="kaji_awal120" type="radio" value="Lain-lain" <?php echo $cek_5;?>/>
        Lain-lain
        <input name="kaji_awal121" type="text" value="<?php echo $data['kaji_awal121'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Pekerjaan</td>
    <td>:</td>
    <td><input name="kaji_awal122" id="kaji_awal122" type="text" value="<?php echo $data['kaji_awal122'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Hobi</td>
    <td>:</td>
    <td><input name="kaji_awal123" id="kaji_awal123" type="text" value="<?php echo $data['kaji_awal123'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Tinggal&nbsp; bersama siapa</td>
    <td>:</td>
    <td><input name="kaji_awal124" id="kaji_awal124" type="text" value="<?php echo $data['kaji_awal124'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g.&nbsp; Penggunaan waktu luang</td>
    <td>:</td>
    <td><input name="kaji_awal125" id="kaji_awal125" type="text" value="<?php echo $data['kaji_awal125'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Psikologis&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    a. Pola mengatasi masalah</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal126']=="Tenang") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal126']=="Sedih") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal126']=="Mudah panik") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal126']=="Menarik diri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal126" type="radio" value="Tenang" <?php echo $cek_1;?>/>Tenang
      <input name="kaji_awal126" type="radio" value="Sedih" <?php echo $cek_2;?>/>Sedih
      <input name="kaji_awal126" type="radio" value="Mudah panik" <?php echo $cek_3;?>/>Mudah panik
      <input name="kaji_awal126" type="radio" value="Menarik diri" <?php echo $cek_4;?>/>Menarik diri</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    b. Keterampilan interaksi</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal127']=="Mudah berinteraksi") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal127']=="Sulit berinteraksi") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal127" type="radio" value="Mudah berinteraksi" <?php echo $cek_1;?>/>Mudah berinteraksi
      <input name="kaji_awal127" type="radio" value="Sulit berinteraksi" <?php echo $cek_2;?>/>Sulit berinteraksi</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    c. Pola kognitif</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal128']=="Mudah memahami") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal128']=="Lambat memahami") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal128" type="radio" value="Mudah memahami" <?php echo $cek_1;?>/>Mudah memahami
      <input name="kaji_awal128" type="radio" value="Lambat memahami" <?php echo $cek_2;?>/>Lambat memahami</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    d. Pola koping keluarga/orang terdekat&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal129']=="Mendukung") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal129']=="Tidak mendukung") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal129" type="radio" value="Mendukung" <?php echo $cek_1;?>/>Mendukung
      <input name="kaji_awal129" type="radio" value="Tidak mendukung" <?php echo $cek_2;?>/>Tidak mendukung</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Spiritual&nbsp;&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Keyakinan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal130']=="Islam") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal130']=="Kristen") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal130']=="Katolik") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal130']=="Hindu") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal130']=="Budha") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	?>
      <input name="kaji_awal130" type="radio" value="Islam" <?php echo $cek_1;?>/>Islam
      <input name="kaji_awal130" type="radio" value="Kristen" <?php echo $cek_2;?>/>Kristen
      <input name="kaji_awal130" type="radio" value="Katolik" <?php echo $cek_3;?>/>Katolik
      <input name="kaji_awal130" type="radio" value="Hindu" <?php echo $cek_4;?>/>Hindu
      <input name="kaji_awal130" type="radio" value="Budha" <?php echo $cek_5;?>/>Budha
      <input name="kaji_awal131" type="text" value="<?php echo $data['kaji_awal131'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Praktek keagamaan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal132" id="kaji_awal132" type="text" value="<?php echo $data['kaji_awal132'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Harapan pasien terhadap perawatan dan pengobatan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal133" id="kaji_awal133" type="text" value="<?php echo $data['kaji_awal133'] ;?>"/></td>
  </tr>
<?php
if ($tahun >= 65 && $hari >= 1) { ?>
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
    <td><?php
	if ($data['kaji_awal134']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal134']=="Menggunakan alat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal134']=="Dibantu orang lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal134']=="Sangat tergantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal134" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
      Mandiri
        <input name="kaji_awal134" type="radio" value="Menggunakan alat" <?php echo $cek_2;?>/>
        Menggunakan alat
        <input name="kaji_awal134" type="radio" value="Dibantu orang lain" <?php echo $cek_3;?>/>
        Dibantu orang lain 
        <input name="kaji_awal134" type="radio" value="Sangat tergantung" <?php echo $cek_4;?>/>
        Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Mandi dan eliminasi</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal135']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal135']=="Menggunakan alat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal135']=="Dibantu orang lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal135']=="Sangat tergantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal135" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
Mandiri
  <input name="kaji_awal135" type="radio" value="Menggunakan alat" <?php echo $cek_2;?>/>
Menggunakan alat
<input name="kaji_awal135" type="radio" value="Dibantu orang lain" <?php echo $cek_3;?>/>
Dibantu orang lain
<input name="kaji_awal135" type="radio" value="Sangat tergantung" <?php echo $cek_4;?>/>
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Memakai baju dan penampilan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal136']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal136']=="Menggunakan alat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal136']=="Dibantu orang lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal136']=="Sangat tergantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal136" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
Mandiri
  <input name="kaji_awal136" type="radio" value="Menggunakan alat" <?php echo $cek_2;?>/>
Menggunakan alat
<input name="kaji_awal136" type="radio" value="Dibantu orang lain" <?php echo $cek_3;?>/>
Dibantu orang lain
<input name="kaji_awal136" type="radio" value="Sangat tergantung" <?php echo $cek_4;?>/>
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
    <td><?php
	if ($data['kaji_awal137']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal137']=="Menggunakan alat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal137']=="Dibantu orang lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal137']=="Sangat tergantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal137" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
Mandiri
  <input name="kaji_awal137" type="radio" value="Menggunakan alat" <?php echo $cek_2;?>/>
Menggunakan alat
<input name="kaji_awal137" type="radio" value="Dibantu orang lain" <?php echo $cek_3;?>/>
Dibantu orang lain
<input name="kaji_awal137" type="radio" value="Sangat tergantung" <?php echo $cek_4;?>/>
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Ganti posisi duduk</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal138']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal138']=="Menggunakan alat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal138']=="Dibantu orang lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal138']=="Sangat tergantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal138" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
Mandiri
  <input name="kaji_awal138" type="radio" value="Menggunakan alat" <?php echo $cek_2;?>/>
Menggunakan alat
<input name="kaji_awal138" type="radio" value="Dibantu orang lain" <?php echo $cek_3;?>/>
Dibantu orang lain
<input name="kaji_awal138" type="radio" value="Sangat tergantung" <?php echo $cek_4;?>/>
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Berjalan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal139']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal139']=="Menggunakan alat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal139']=="Dibantu orang lain") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal139']=="Sangat tergantung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal139" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
Mandiri
  <input name="kaji_awal139" type="radio" value="Menggunakan alat" <?php echo $cek_2;?>/>
Menggunakan alat
<input name="kaji_awal139" type="radio" value="Dibantu orang lain" <?php echo $cek_3;?>/>
Dibantu orang lain
<input name="kaji_awal139" type="radio" value="Sangat tergantung" <?php echo $cek_4;?>/>
Sangat tergantung </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Keseimbangan</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal140']=="Tegak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal140']=="Goyah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal140" type="radio" value="Tegak" <?php echo $cek_1;?>/>
      Tegak
        <input name="kaji_awal140" type="radio" value="Goyah" <?php echo $cek_2;?>/>
        Goyah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Kekuatan otot</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal141']=="Kuat") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal141']=="Sedang") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal141']=="Lemah") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal141']=="Lumpuh") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal141" type="radio" value="Kuat" <?php echo $cek_1;?>/>Kuat
      <input name="kaji_awal141" type="radio" value="Sedang" <?php echo $cek_2;?>/>Sedang
      <input name="kaji_awal141" type="radio" value="Lemah" <?php echo $cek_3;?>/>Lemah
      <input name="kaji_awal141" type="radio" value="Lumpuh" <?php echo $cek_4;?>/>Lumpuh, Bagian tubuh 
      <input name="kaji_awal141a" type="text" value="<?php echo $data['kaji_awal141a'] ;?>" size="4"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Alat bantu yang digunakan&nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal142']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal142']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal142" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal142" type="radio" value="Ya" <?php echo $cek_2;?>/>
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
    <td><?php
	if ($data['kaji_awal144']=="Normal") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal144']=="Kacamata") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal144']=="Kontak lensa") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal144" type="radio" value="Normal" <?php echo $cek_1;?>/>
Normal
<input name="kaji_awal144" type="radio" value="Kacamata" <?php echo $cek_2;?>/>
Kacamata
<input name="kaji_awal144" type="radio" value="Kontak lensa" <?php echo $cek_3;?>/>
Kontak lensa </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah penglihatan</td>
    <td>:</td>
    <td>      Rabun : 
      <?php
	if ($data['kaji_awal145']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal145']=="Kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal145']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal145']=="Kedua-duanya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal145" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal145" type="radio" value="Kanan" <?php echo $cek_2;?>/>
Kanan
<input name="kaji_awal145" type="radio" value="Kiri" <?php echo $cek_3;?>/>
Kiri
<input name="kaji_awal145" type="radio" value="Kedua-duanya" <?php echo $cek_4;?>/>
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Buta :
      <?php
	if ($data['kaji_awal146']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal146']=="Kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal146']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal146']=="Kedua-duanya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal146" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal146" type="radio" value="Kanan" <?php echo $cek_2;?>/>
Kanan
<input name="kaji_awal146" type="radio" value="Kiri" <?php echo $cek_3;?>/>
Kiri
<input name="kaji_awal146" type="radio" value="Kedua-duanya" <?php echo $cek_4;?>/>
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Katarak : 
      <?php
	if ($data['kaji_awal147']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal147']=="Kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal147']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal147']=="Kedua-duanya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal147" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal147" type="radio" value="Kanan" <?php echo $cek_2;?>/>
      Kanan
      <input name="kaji_awal147" type="radio" value="Kiri" <?php echo $cek_3;?>/>
      Kiri
      <input name="kaji_awal147" type="radio" value="Kedua-duanya" <?php echo $cek_4;?>/>
      Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Glaucoma : 
      <?php
	if ($data['kaji_awal148']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal148']=="Kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal148']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal148']=="Kedua-duanya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal148" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal148" type="radio" value="Kanan" <?php echo $cek_2;?>/>
      Kanan
      <input name="kaji_awal148" type="radio" value="Kiri" <?php echo $cek_3;?>/>
      Kiri
      <input name="kaji_awal148" type="radio" value="Kedua-duanya" <?php echo $cek_4;?>/>
      Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pendengaran</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal149']=="Normal") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal149']=="Hearing aid kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal149']=="Hearing aid kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	}
	?>
      <input name="kaji_awal149" type="radio" value="Normal" <?php echo $cek_1;?>/>
Normal
<input name="kaji_awal149" type="radio" value="Hearing aid kanan"<?php echo $cek_2;?> />
Hearing aid kanan
<input name="kaji_awal149" type="radio" value="Hearing aid kiri" <?php echo $cek_3;?>/>
Hearing aid kiri </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Masalah pendengaran</td>
    <td>:</td>
    <td>Tuli
      :
      <?php
	if ($data['kaji_awal150']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal150']=="Kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal150']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal150']=="Kedua-duanya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal150" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal150" type="radio" value="Kanan" <?php echo $cek_2;?>/>
Kanan
<input name="kaji_awal150" type="radio" value="Kiri" <?php echo $cek_3;?>/>
Kiri
<input name="kaji_awal150" type="radio" value="Kedua-duanya" <?php echo $cek_4;?>/>
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Berdenging
      :
      <?php
	if ($data['kaji_awal151']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal151']=="Kanan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal151']=="Kiri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal151']=="Kedua-duanya") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	?>
      <input name="kaji_awal151" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal151" type="radio" value="Kanan" <?php echo $cek_2;?>/>
Kanan
<input name="kaji_awal151" type="radio" value="Kiri" <?php echo $cek_3;?>/>
Kiri
<input name="kaji_awal151" type="radio" value="Kedua-duanya" <?php echo $cek_4;?>/>
Kedua-duanya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Vertigo</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal152']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal152']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal152" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal152" type="radio" value="Ada" <?php echo $cek_2;?>/>
        Ada</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Status mental</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal153']=="Respon baik") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal153']=="Respon tidak sesuai") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal153']=="Bingung") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal153']=="Mudah lupa") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal153']=="Dimensia") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	?>
      <input name="kaji_awal153" type="radio" value="Respon baik" <?php echo $cek_1;?>/>
      Respon baik
        <input name="kaji_awal153" type="radio" value="Respon tidak sesuai" <?php echo $cek_2;?>/>
        Respon tidak sesuai 
        <input name="kaji_awal153" type="radio" value="Bingung" <?php echo $cek_3;?>/>
        Bingung
        <input name="kaji_awal153" type="radio" value="Mudah lupa" <?php echo $cek_4;?>/>
        Mudah lupa 
        <input name="kaji_awal153" type="radio" value="Dimensia" <?php echo $cek_5;?>/>
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
</body>
</html>
