<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}

$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($query);
$data_u = mysql_fetch_array($hasil);

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
one = document.form1.kaji_awal112.value;
two = document.form1.kaji_awal113.value;
three = document.form1.kaji_awal114.value;
document.form1.kaji_awal115.value = (one*1) + (two*1) + (three*1);
}
function stopCalc(){
clearInterval(interval);
}
</script>
<title>PENGKAJIAN AWAL KEPERAWATAN (NEONATUS/BAYI) </title>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" action="pengkajian_neonatus_sim.php" method="POST"  onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#D9E8F3">
    <td colspan="4"><div align="center"><strong>PENGKAJIAN AWAL KEPERAWATAN (NEONATUS/BAYI) </strong></div></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="4"><b>A. Identitas</b></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Nama orang tua </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal136" id="kaji_awal136" type="text" value="<?php echo $data['kaji_awal136'] ;?>"/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Tanggal dan jam lahir </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal137" id="kaji_awal137" type="text" value="<?php echo $data['tgl_lahir'] ;?>"/>
      <input name="kaji_awal138" id="kaji_awal138" type="text" size="4" value="<?php echo "".date('H:i:s') ;?>"/>
      WIB</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Informasi didapat dari </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal139" id="kaji_awal139" type="text" value="<?php echo $data['kaji_awal1139'] ;?>"/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Diagnosa Medis saat masuk </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal140" id="kaji_awal140" type="text" value="<?php echo $data['diagnosa_masuk'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="4"><B>B. Informasi Umum</B> :</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="472">&nbsp;&nbsp;    1. Masuk melalui&nbsp;&nbsp;&nbsp;</td>
    <td width="4">:</td>
    <td colspan="2">
	      <?php
	if ($data['kaji_awal01']=="IGD") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal01']=="Poliklinik") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal01']=="OK"){
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal01']=="Nursery"){
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
      <input name="kaji_awal01" type="radio" value="IGD" <?php echo $cek_1;?>/>
      IGD
      <input name="kaji_awal01" type="radio" value="Poliklinik" <?php echo $cek_2;?>/>
     Poliklinik    
    <input name="kaji_awal01" type="radio" value="OK" <?php echo $cek_3;?>/>
    OK     
    <input name="kaji_awal01" type="radio" value="Nursery" <?php echo $cek_4;?>/>
    Nursery</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Menggunakan&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal02']=="Inkubator") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="Box") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal02']=="Infant warmer") {
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
      <input name="kaji_awal02" type="radio" value="Inkubator" <?php echo $cek_1;?>/>
      Inkubator
      <input name="kaji_awal02" type="radio" value="Box" <?php echo $cek_2;?>/>
      Box 
      <input name="kaji_awal02" type="radio" value="Infant warmer" <?php echo $cek_3;?>/>
      Infant warmer
      <input name="kaji_awal02" type="radio" value="Lain-lain" <?php echo $cek_4;?>/>
      Lain-lain</td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Jam masuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal03" id="kaji_awal03" type="text" size="6"  value="<?php echo "".date('H:i') ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;4.&nbsp;Diantar oleh </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="pengantar" id="pengantar" type="text" value="<?php echo $data['pengantar'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    5. Kondisi saat masuk &nbsp;&nbsp;&nbsp;</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal05" id="kaji_awal05" type="text" value="<?php echo $data['kaji_awal05'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    6. Alasan masuk/dirawat &nbsp;&nbsp;</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal06" id="kaji_awal06"type="text" value="<?php echo $data['kaji_awal06'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    7. Berat badan </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal07" id="kaji_awal07"type="text" size="4" value="<?php echo $data['kaji_awal07'] ;?>"/>
      gram</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tinggi badan </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal08" type="text" size="4" value="<?php echo $data['kaji_awal08'] ;?>"/> 
    cm </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanda-tanda vital   &nbsp;</td>
    <td>:</td>
    <td colspan="2">Suhu
      <input name="kaji_awal09" type="text" size="4" value="<?php echo $data['kaji_awal09'] ;?>"/>
      &deg;C </br>Nadi 
      <input name="kaji_awal10" type="text" size="4" value="<?php echo $data['kaji_awal10'] ;?>"/>
      kali/menit</br> Pernapasan
      <input name="kaji_awal11" type="text" size="4" value="<?php echo $data['kaji_awal11'] ;?>"/>
      kali/menit
      </br>Saturasi 
      <input name="kaji_awal12" type="text" size="4" value="<?php echo $data['kaji_awal12'] ;?>"/>
      %</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Riwayat kesehatan   </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal13" type="text" value="<?php echo $data['kaji_awal13'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    7. Kapan/lama perawatan (*diisi jika pernah dirawat) </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal14" id="kaji_awal14" type="text" size="10" value="<?php echo $data['kaji_awal14'] ;?>"/>
    , alasan dirawat 
      <input name="kaji_awal15" id="kaji_awal15" type="text" size="60" value="<?php echo $data['kaji_awal15'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="4"><B>C. Riwayat kesehatan orang tua &nbsp;:</B></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="386"><b>Ayah</b></td>
    <td width="404"><b>Ibu</b></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>Golongan darah </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal16" id="kaji_awal16" type="text" size="10" value="<?php echo $data['kaji_awal16'] ;?>"/></td>
    <td><input name="kaji_awal17" id="kaji_awal17" type="text" size="10" value="<?php echo $data['kaji_awal17'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>Riwayat alergi </td>
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
Ya</td>
    <td><?php
	if ($data['kaji_awal19']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal19']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal19" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal19" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>Penyebab alergi (*diisi jika ada) </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal20" id="kaji_awal20" type="text" size="10" value="<?php echo $data['kaji_awal20'] ;?>"/></td>
    <td><input name="kaji_awal21" id="kaji_awal21" type="text" size="10" value="<?php echo $data['kaji_awal21'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>Kapan</td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal22" id="kaji_awal22" type="text" size="10" value="<?php echo $data['kaji_awal22'] ;?>"/></td>
    <td><input name="kaji_awal23" id="kaji_awal23" type="text" size="10" value="<?php echo $data['kaji_awal23'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>Bentuk alergi </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal24" id="kaji_awal24" type="text" size="10" value="<?php echo $data['kaji_awal24'] ;?>"/></td>
    <td><input name="kaji_awal25" id="kaji_awal25" type="text" size="10" value="<?php echo $data['kaji_awal25'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>Penyakit keturunan </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal26']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal26']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal26" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal26" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
    <td><?php
	if ($data['kaji_awal27']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal27']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal27" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal27" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>*Diisi jika ada </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal28" id="kaji_awal28" type="text" size="10" value="<?php echo $data['kaji_awal28'] ;?>"/></td>
    <td><input name="kaji_awal29" id="kaji_awal29" type="text" size="10" value="<?php echo $data['kaji_awal29'] ;?>"/></td>
  </tr>
  
  <tr bgcolor="#D9E8F3">
    <td colspan="4"><B>D. Riwayat Kelahiran bayi &nbsp;:</B></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Usia kehamilan </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal30" type="text" size="4" value="<?php echo $data['kaji_awal30'] ;?>"/>
      minggu</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;2. Berat badan lahir </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal31" type="text" size="4" value="<?php echo $data['kaji_awal31'] ;?>"/>
      gram</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;3. Panjang badan lahir </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal32" type="text" size="4" value="<?php echo $data['kaji_awal32'] ;?>"/>
      cm</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Lingkar kepala </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal33" type="text" size="4" value="<?php echo $data['kaji_awal33'] ;?>"/>
      cm</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;5. Lingkar perut </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal34" type="text" size="4" value="<?php echo $data['kaji_awal34'] ;?>"/>
      cm</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;6. Persalinan </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal49']=="Spontan") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal49']=="Vakum Ekstraksi") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal49']=="Forcep") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal49']=="SC") {
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
      <input name="kaji_awal49" type="radio" value="Spontan" <?php echo $cek_1;?>/>
      Spontan
      <input name="kaji_awal49" type="radio" value="Vakum Ekstraksi" <?php echo $cek_2;?>/>
      Vakum Ekstraksi 
      <input name="kaji_awal49" type="radio" value="Forcep" <?php echo $cek_3;?>/>
      Forcep
      <input name="kaji_awal49" type="radio" value="SC" <?php echo $cek_3;?>/>
      SC</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    7. APGAR Score </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal50" type="text" size="4" value="<?php echo $data['kaji_awal50'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;8. Vitamin K </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal51']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal51']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal51" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal51" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya , dosis <input name="kaji_awal04" id="kaji_awal04"type="text" size="4" value="<?php echo $data['kaji_awal04'] ;?>"/> mg</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;9. Tetes mata </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
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
Ya </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>10. Imunisasi yang sudah diberikan </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal53']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal53']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal53" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal53" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp; * Diisi jika sudah imunisasi</td>
    <td>:</td>
    <td colspan="2"><?php 
    if ($data['kaji_awal54']=="BCG") echo "<input type='checkbox' name='kaji_awal54' value='BCG' checked>BCG";
    else echo "<input type='checkbox' name='kaji_awal54' value='BCG'>BCG";
    ?></br>
	Hepatitis<?php 
    if ($data['kaji_awal55']=="Hepatitis I") echo "<input type='checkbox' name='kaji_awal55' value='Hepatitis I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal55' value='Hepatitis I'>I";
    ?>
	<?php 
    if ($data['kaji_awal56']=="Hepatitis II") echo "<input type='checkbox' name='kaji_awal56' value='Hepatitis II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal56' value='Hepatitis II'>II";
    ?>
		<?php 
    if ($data['kaji_awal57']=="Hepatitis III") echo "<input type='checkbox' name='kaji_awal57' value='Hepatitis III' checked>III";
    else echo "<input type='checkbox' name='kaji_awal57' value='Hepatitis III'>III";
    ?></br>Polio
		<?php 
    if ($data['kaji_awal58']=="Polio I") echo "<input type='checkbox' name='kaji_awal58' value='Polio I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal58' value='Polio I'>I";
    ?>
		<?php 
    if ($data['kaji_awal59']=="Polio II") echo "<input type='checkbox' name='kaji_awal59' value='Polio II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal59' value='Polio II'>II";
    ?>
	<?php 
    if ($data['kaji_awal60']=="Polio III") echo "<input type='checkbox' name='kaji_awal60' value='Polio III' checked>III";
    else echo "<input type='checkbox' name='kaji_awal60' value='Polio III'>III";
    ?>
		<?php 
    if ($data['kaji_awal61']=="Polio IV") echo "<input type='checkbox' name='kaji_awal61' value='Polio IV' checked>IV";
    else echo "<input type='checkbox' name='kaji_awal61' value='Polio IV'>IV";
    ?>
		</br>DPT
		<?php 
    if ($data['kaji_awal62']=="DPT I") echo "<input type='checkbox' name='kaji_awal62' value='DPT I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal62' value='DPT I'>I";
    ?>
        <?php 
    if ($data['kaji_awal63']=="DPT II") echo "<input type='checkbox' name='kaji_awal63' value='DPT II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal63' value='DPT II'>II";
    ?>
        <?php 
    if ($data['kaji_awal64']=="DPT III") echo "<input type='checkbox' name='kaji_awal64' value='DPT III' checked>III";
    else echo "<input type='checkbox' name='kaji_awal64' value='DPT III'>III";
    ?>
        <?php 
    if ($data['kaji_awal65']=="DPT IV") echo "<input type='checkbox' name='kaji_awal65' value='DPT IV' checked>IV";
    else echo "<input type='checkbox' name='kaji_awal65' value='DPT IV'>IV";
    ?></br>
        <?php 
    if ($data['kaji_awal66']=="Campak") echo "<input type='checkbox' name='kaji_awal66' value='Campak' checked>Campak";
    else echo "<input type='checkbox' name='kaji_awal66' value='Campak'>Campak";
    ?></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="4"><B>E. Pengkajian Fisik dan Identifikasi    Masalah </B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Pernapasan&nbsp;</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal67']=="Spontan") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal67']=="Cuping hidung") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal67']=="Sesak napas") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal67']=="Retraksi") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal67']=="Sianosis") {
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
      <input name="kaji_awal67" type="radio" value="Spontan" <?php echo $cek_1;?>/>
Spontan
<input name="kaji_awal67" type="radio" value="Cuping hidung" <?php echo $cek_2;?>/>
Cuping hidung
<input name="kaji_awal67" type="radio" value="Sesak napas" <?php echo $cek_3;?>/>
Sesak napas
<input name="kaji_awal67" type="radio" value="Retraksi" <?php echo $cek_4;?>/>
Retraksi
<input name="kaji_awal67" type="radio" value="Sianosis" <?php echo $cek_5;?>/> 
Sianosis</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Frekuensi&nbsp;</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal68" id="kaji_awal68" type="text" value="<?php echo $data['kaji_awal68'] ;?>" size="2"/>
      x/menit</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;Irama</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal69']=="Teratur") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal69']=="Tidak teratur") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal69" type="radio" value="Teratur" <?php echo $cek_1;?>/>
Teratur
<input name="kaji_awal69" type="radio" value="Tidak teratur" <?php echo $cek_2;?>/>
Tidak teratur</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Suara napas</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal70']=="Vesikuler") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal70']=="Bronchial") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal70']=="Wheezing") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal70']=="Ronkhi") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal70']=="Rales") {
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
      <input name="kaji_awal70" type="radio" value="Vesikuler" <?php echo $cek_1;?>/>
Vesikuler
<input name="kaji_awal70" type="radio" value="Bronchial" <?php echo $cek_2;?>/>
Bronchial
<input name="kaji_awal70" type="radio" value="Wheezing" <?php echo $cek_3;?>/>
Wheezing
<input name="kaji_awal70" type="radio" value="Ronkhi" <?php echo $cek_4;?>/>
Ronkhi
<input name="kaji_awal70" type="radio" value="Rales" <?php echo $cek_5;?>/>
Rales
<input name="kaji_awal71" type="text" value="<?php echo $data['kaji_awal71'] ;?>"/></td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Batuk</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal72']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal72']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal72" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal72" type="radio" value="Ya" <?php echo $cek_2;?>/>
      Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e.&nbsp;Lendir</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
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
Ya,
<?php
	if ($data['kaji_awal74']=="Cair") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal74']=="Kental") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
<input name="kaji_awal74" type="radio" value="Cair" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_1;?>/>
Cair
<input name="kaji_awal74" type="radio" value="Kental" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_2;?>/>
Kental, warna
<input name="kaji_awal75" type="text" value="<?php echo $data['kaji_awal75'] ;?>"/></td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Memakai oksigen&nbsp;</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal76']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal76']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal76" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
  <input name="kaji_awal76" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya,
<input name="kaji_awal77" type="text" value="<?php echo $data['kaji_awal77'] ;?>" size="2"/>
lpm, menggunakan
<input name="kaji_awal78" type="text" value="<?php echo $data['kaji_awal78'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    g. Riwayat aspirasi </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal79']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal79']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal79" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal79" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Kardiovaskuler</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Bunyi jantung </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal80']=="Normal") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal80']=="Tidak normal") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal80" type="radio" value="Normal" <?php echo $cek_1;?>/>
Normal
<input name="kaji_awal80" type="radio" value="Tidak normal" <?php echo $cek_2;?>/>
Tidak normal </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Nadi&nbsp;</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal81" id="kaji_awal81" type="text" value="<?php echo $data['kaji_awal81'] ;?>" size="2"/>
      kali permenit </td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Tekanan darah&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal82" id="kaji_awal82" type="text" value="<?php echo $data['kaji_awal82'] ;?>" size="2"/>
mmHg</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Pengisian kapiler</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal83']=="Kurang 3 detik") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal83']=="Lebih 3 detik") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal83" type="radio" value="Kurang 3 detik" <?php echo $cek_1;?>/>
Kurang 3 detik
  <input name="kaji_awal83" type="radio" value="Lebih 3 detik" <?php echo $cek_2;?>/> 
  Lebih 3 detik</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Ekstremitas atas </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal84']=="Hangat") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal84']=="Dingin") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal84']=="Sianosis") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal84']=="Edema") {
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
      <input name="kaji_awal84" type="radio" value="Hangat" <?php echo $cek_1;?>/>
      Hangat
	  <input name="kaji_awal84" type="radio" value="Dingin" <?php echo $cek_2;?>/>
	  Dingin
	  <input name="kaji_awal84" type="radio" value="Sianosis" <?php echo $cek_3;?>/>Sianosis
	<input name="kaji_awal84" type="radio" value="Edema" <?php echo $cek_4;?>/>
	Edema</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f. Ekstremitas bawah&nbsp;</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal85']=="Hangat") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal85']=="Dingin") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal85']=="Sianosis") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal85']=="Edema") {
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
      <input name="kaji_awal85" type="radio" value="Hangat" <?php echo $cek_1;?>/>
Hangat
<input name="kaji_awal85" type="radio" value="Dingin" <?php echo $cek_2;?>/>
Dingin
<input name="kaji_awal85" type="radio" value="Sianosis" <?php echo $cek_3;?>/>
Sianosis
<input name="kaji_awal85" type="radio" value="Edema" <?php echo $cek_4;?>/>
Edema</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Pencernaan&nbsp;</td>
    <td>:</td>
    <td colspan="2"></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Puasa </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal86']=="Ya") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal86']=="Tidak") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal86" type="radio" value="Ya" <?php echo $cek_1;?>/>
Ya
<input name="kaji_awal86" type="radio" value="Tidak" <?php echo $cek_2;?>/>
Tidak</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jenis (* Diisi jika tidak puasa)</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal87']=="ASI") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal87']=="PASI") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal87']=="Lain-lain") {
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
      <input name="kaji_awal87" type="radio" value="ASI" <?php echo $cek_1;?>/>
      ASI
        <input name="kaji_awal87" type="radio" value="PASI" <?php echo $cek_2;?>/>
        PASI 
        <input name="kaji_awal87" type="radio" value="Lain-lain"<?php echo $cek_3;?> />
        Lain-lain</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Frekwensi    (* Diisi jika tidak puasa)</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal88" id="kaji_awal88" type="text" value="<?php echo $data['kaji_awal88'] ;?>" size="2"/> 
      kali/hari </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah (* Diisi jika tidak puasa)</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal89" id="kaji_awal89" type="text" value="<?php echo $data['kaji_awal89'] ;?>" size="2"/>
      cc</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cara minum (* Diisi jika tidak puasa)</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal90']=="Oral") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal90']=="NGT") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal90']=="OGT") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal90']=="Gastrostomi") {
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
      <input name="kaji_awal90" type="radio" value="Oral" <?php echo $cek_1;?>/>
Oral
<input name="kaji_awal90" type="radio" value="NGT" <?php echo $cek_2;?>/>
NGT
<input name="kaji_awal90" type="radio" value="OGT" <?php echo $cek_3;?>/>
OGT
<input name="kaji_awal90" type="radio" value="Gastrostomi" <?php echo $cek_4;?>/> 
Gastrostomi</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal pasang alat (*Diisi jika terpasang alat) </td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal91" id="kaji_awal91" type="text" value="<?php echo $data['kaji_awal91'] ;?>" size="8"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;Mukosa mulut </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal92']=="Lembab") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal92']=="Kering") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal92']=="Kotor") {
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
      <input name="kaji_awal92" type="radio" value="Lembab" <?php echo $cek_1;?>/>
Lembab
<input name="kaji_awal92" type="radio" value="Kering" <?php echo $cek_2;?>/>
Kering
<input name="kaji_awal92" type="radio" value="Kotor" <?php echo $cek_3;?>/> 
Kotor</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kelainan rongga mulut </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal93']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal93']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal93" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal93" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, sebutkan  
<input name="kaji_awal141a" id="kaji_awal141a" type="text" value="<?php echo $data['kaji_awal141a'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Abdomen </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal94']=="Supel") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal94']=="Kembung") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal94']=="Tegang") {
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
      <input name="kaji_awal94" type="radio" value="Supel" <?php echo $cek_1;?>/>
Supel
<input name="kaji_awal94" type="radio" value="Kembung" <?php echo $cek_2;?>/>
Kembung
<input name="kaji_awal94" type="radio" value="Tegang" <?php echo $cek_3;?>/> 
Tegang</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Kelainan abdomen &nbsp;</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal95']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal95']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal95" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal95" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, sebutkan
<input name="kaji_awal96" id="kaji_awal96" type="text" value="<?php echo $data['kaji_awal96'] ;?>"/></td></tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Bising usus </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal97" id="kaji_awal97" type="text" value="<?php echo $data['kaji_awal97'] ;?>" size="2"/> 
      kali permenit </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Tali pusat </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
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
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Masalah pada tali pusat </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal99']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal99']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal99" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal99" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Buang Air Besar </td>
    <td>:</td>
    <td colspan="2">Setiap
      <input name="kaji_awal100" id="kaji_awal100" type="text" value="<?php echo $data['kaji_awal100'] ;?>" size="2"/>
      kali sehari.</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cara BAB &nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal101']=="Spontan") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal101']=="Dirangsang") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal101']=="Lainnya") {
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
      <input name="kaji_awal101" type="radio" value="Spontan" <?php echo $cek_1;?>/>
Spontan
<input name="kaji_awal101" type="radio" value="Dirangsang" <?php echo $cek_2;?>/> 
Dirangsang,
<input name="kaji_awal101" type="radio" value="Lainnya" <?php echo $cek_3;?>/>Lainnya, 
keterangan
<input name="kaji_awal102" id="kaji_awal102" type="text" value="<?php echo $data['kaji_awal102'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konsistensi BAB</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal103']=="Lembek") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal103']=="Cair") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal103']=="Keras") {
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
      <input name="kaji_awal103" type="radio" value="Lembek" <?php echo $cek_1;?>/>
Lembek
<input name="kaji_awal103" type="radio" value="Cair" <?php echo $cek_2;?>/>
Cair
<input name="kaji_awal103" type="radio" value="Keras" <?php echo $cek_3;?>/> 
Keras</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna BAB</td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal104" id="kaji_awal104" type="text" value="<?php echo $data['kaji_awal104'] ;?>"/></td>
  </tr>
  
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Perkemihan&nbsp;</td>
    <td>:</td>
    <td colspan="2"></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kebiasaan BAK</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal105" id="kaji_awal105" type="text" value="<?php echo $data['kaji_awal105'] ;?>" size="2"/>
      kali/hari, </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal106']=="Kuning jernih") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal106']=="Kuning pekat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal106']=="Merah") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal106']=="Hematuri") {
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
      <input name="kaji_awal106" type="radio" value="Kuning jernih" <?php echo $cek_1;?>/>
Kuning jernih
<input name="kaji_awal106" type="radio" value="Kuning pekat" <?php echo $cek_2;?>/>
Kuning pekat
<input name="kaji_awal106" type="radio" value="Merah" <?php echo $cek_3;?>/>
Merah
<input name="kaji_awal106" type="radio" value="Hematuri" <?php echo $cek_4;?>/>
Hematuri</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Masalah dalam BAK</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal107']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal107']=="Inkontinentia urine") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal107']=="Retensi urine") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal107']=="Kesulitan BAK") {
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
      <input name="kaji_awal107" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal107" type="radio" value="Inkontinentia urine" <?php echo $cek_2;?>/>
      Inkontinentia urine
      <input name="kaji_awal107" type="radio" value="Retensi urine" <?php echo $cek_3;?>/>
      Retensi urine 
      <input name="kaji_awal107" type="radio" value="Kesulitan BAK" <?php echo $cek_4;?>/>
      Kesulitan BAK </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d.&nbsp; Alat bantu kateter </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal108']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal108']=="Ada") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal108" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak  
        <input name="kaji_awal108" type="radio" value="Ada" <?php echo $cek_2;?>/>
      Ada, nomor 
      <input name="kaji_awal109" id="kaji_awal109" type="text" value="<?php echo $data['kaji_awal109'] ;?>" size="1"/>
      , tanggal pasang 
      <input name="kaji_awal110" id="kaji_awal110" type="text" value="<?php echo $data['kaji_awal110'] ;?>" size="8"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    5. Neuro Sensori </td>
    <td>:</td>
    <td colspan="2"></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kesadaran</td>
    <td>:</td>
    <td colspan="2"><input name="kaji_awal111" id="kaji_awal111" type="text" value="<?php echo $data['kaji_awal111'] ;?>" size="8"/>
      , GCS : E
        <input name="kaji_awal112" id="kaji_awal112" type="text" value="<?php echo $data['kaji_awal112'] ;?>" size="1" onfocus="startCalc();" onblur="stopCalc();" />
V
<input name="kaji_awal113" id="kaji_awal113" type="text" value="<?php echo $data['kaji_awal113'] ;?>" size="1" onfocus="startCalc();" onblur="stopCalc();" />
M
<input name="kaji_awal114" id="kaji_awal114" type="text" value="<?php echo $data['kaji_awal114'] ;?>" size="1" onfocus="startCalc();" onblur="stopCalc();" />
Total
<input name="kaji_awal115" type="text" value="<?php echo $data['kaji_awal115'] ;?>" size="2"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Respon terhadap nyeri </td>
    <td>:</td>
    <td colspan="2">Gunakan skala NIPS </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Tangisan </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal116']=="Tidak ada") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal116']=="Merintih") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal116']=="Kurang kuat") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal116']=="Kuat") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal116']=="Melengking") {
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
      <input name="kaji_awal116" type="radio" value="Tidak ada" <?php echo $cek_1;?>/>
Tidak ada
<input name="kaji_awal116" type="radio" value="Merintih" <?php echo $cek_2;?>/>
Merintih
<input name="kaji_awal116" type="radio" value="Kurang kuat" <?php echo $cek_3;?>/>
Kurang kuat 
<input name="kaji_awal116" type="radio" value="Kuat" <?php echo $cek_4;?>/>
Kuat
<input name="kaji_awal116" type="radio" value="Melengking" <?php echo $cek_5;?>/> 
Melengking</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kepala     </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal117']=="Normo chepal") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal117']=="Chepal hematoma") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal117']=="Caput sussadeneum") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal117']=="Hidrosefalus") {
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
      <input name="kaji_awal117" type="radio" value="Normo chepal" <?php echo $cek_1;?>/>
      Normo chepal
      <input name="kaji_awal117" type="radio" value="Chepal hematoma" <?php echo $cek_2;?>/>
Chepal hematoma
<input name="kaji_awal117" type="radio" value="Caput sussadeneum" <?php echo $cek_3;?>/>
Caput sussadeneum
<input name="kaji_awal117" type="radio" value="Hidrosefalus" <?php echo $cek_4;?>/> 
Hidrosefalus</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Lingkar kepala </td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="kaji_awal118" type="text" value="<?php echo $data['kaji_awal118'] ;?>" size="2"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Ubun-ubun </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal119']=="Datar") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal119']=="Cekung") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal119']=="Cembung") {
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
      <input name="kaji_awal119" type="radio" value="Datar" <?php echo $cek_1;?>/>
Datar
<input name="kaji_awal119" type="radio" value="Cekung" <?php echo $cek_2;?>/>
Cekung
<input name="kaji_awal119" type="radio" value="Cembung" <?php echo $cek_3;?>/>
Cembung</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Pupil : </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal120']=="Isokor") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal120']=="Anisokor") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal120" type="radio" value="Isokor" <?php echo $cek_1;?>/>Isokor
        <input name="kaji_awal120" type="radio" value="Anisokor" <?php echo $cek_2;?>/>
      Anisokor</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td rowspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Reaksi cahaya : </td>
    <td>&nbsp;</td>
    <td colspan="2">KANAN
      
      <?php
	if ($data['kaji_awal121']=="Positif") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal121']=="Negatif") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal121" type="radio" value="Positif" <?php echo $cek_1;?>/>
      Positif
      <input name="kaji_awal121" type="radio" value="Negatif" <?php echo $cek_2;?>/>
Negatif      </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;</td>
    <td colspan="2">KIRI
      <?php
	if ($data['kaji_awal122']=="Positif") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal122']=="Negatif") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal122" type="radio" value="Positif" <?php echo $cek_1;?>/>
Positif
<input name="kaji_awal122" type="radio" value="Negatif" <?php echo $cek_2;?>/>
Negatif</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Gerakan </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal123']=="Aktif") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal123']=="Lemah") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal123']=="Paralise") {
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
      <input name="kaji_awal123" type="radio" value="Aktif" <?php echo $cek_1;?>/>
Aktif
<input name="kaji_awal123" type="radio" value="Lemah" <?php echo $cek_2;?>/>
Lemah
<input name="kaji_awal123" type="radio" value="Paralise" <?php echo $cek_3;?>/> 
Paralise</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Kejang</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal124']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal124']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal124" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal124" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya, 
        <input name="kaji_awal150" type="text" value="<?php echo $data['kaji_awal150'] ;?>" size="2"/>
      Menit</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    6. Integumen&nbsp;</td>
    <td>:</td>
    <td colspan="2"></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Warna kulit</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal125']=="Kemerahan") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal125']=="Pucat") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal125']=="Ikterus") {
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
      <input name="kaji_awal125" type="radio" value="Kemerahan" <?php echo $cek_1;?>/>
Kemerahan
<input name="kaji_awal125" type="radio" value="Pucat" <?php echo $cek_2;?>/>
Pucat
<input name="kaji_awal125" type="radio" value="Ikterus" <?php echo $cek_3;?>/> 
Ikterus</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Turgor kulit</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal126']=="Elastis") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal126']=="Tidak elastis") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal126" type="radio" value="Elastis" <?php echo $cek_1;?>/>
Elastis
<input name="kaji_awal126" type="radio" value="Tidak elastis" <?php echo $cek_2;?>/>
Tidak elastis</td>
  </tr>
  
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kebersihan</td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal127']=="Bersih") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal127']=="Kotor") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal127']=="Bau") {
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
      <input name="kaji_awal127" type="radio" value="Bersih" <?php echo $cek_1;?>/>
Bersih
<input name="kaji_awal127" type="radio" value="Kotor" <?php echo $cek_2;?>/>
Kotor
<input name="kaji_awal127" type="radio" value="Bau" <?php echo $cek_3;?>/>
Bau</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Integritas kulit</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal128']=="Utuh") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Bercak-bercak") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Petechie") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Gatal-gatal") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Memar") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	$cek_6 = "";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Skar") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "checked";
	$cek_7 = "";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Luka") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	$cek_7 = "checked";
	$cek_8 = "";
	}
	elseif ($data['kaji_awal128']=="Dekubitus") {
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
      <input name="kaji_awal128" type="radio" value="Utuh" <?php echo $cek_1;?>/>
Utuh
<input name="kaji_awal128" type="radio" value="Bercak-bercak" <?php echo $cek_2;?>/>
Bercak
<input name="kaji_awal128" type="radio" value="Petechie" <?php echo $cek_3;?>/>
Petechie
<input name="kaji_awal128" type="radio" value="Gatal-gatal" <?php echo $cek_4;?>/>
Gatal
<input name="kaji_awal128" type="radio" value="Memar" <?php echo $cek_5;?>/>
Memar
<input name="kaji_awal128" type="radio" value="Skar" <?php echo $cek_6;?>/>
Skar
<input name="kaji_awal128" type="radio" value="Luka" <?php echo $cek_7;?>/>
Luka
<input name="kaji_awal128" type="radio" value="Dekubitus" <?php echo $cek_8;?>/>
Dekubitus</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Sekret mata </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal129']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal129']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal129" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal129" type="radio" value="Ya" <?php echo $cek_2;?>/>
        Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;7. Reproduksi </td>
    <td>:</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Perempuan </td>
    <td>:</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vagina </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal130']=="Bersih") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal130']=="Kotor") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal130']=="Keluar cairan") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal130']=="Keluar darah") {
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
      <input name="kaji_awal130" type="radio" value="Bersih" <?php echo $cek_1;?>/>
Bersih
<input name="kaji_awal130" type="radio" value="Kotor" <?php echo $cek_2;?>/>
Kotor
<input name="kaji_awal130" type="radio" value="Keluar cairan" <?php echo $cek_3;?>/>
Keluar cairan
<input name="kaji_awal130" type="radio" value="Keluar darah" <?php echo $cek_4;?>/> 
Keluar darah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelainan vagina</td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal131']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal131']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal131" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal131" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, sebutkan
<input name="kaji_awal151" type="text" value="<?php echo $data['kaji_awal151'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Laki-laki </td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penis </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal132']=="Normal") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal132']=="Ada kelainan") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal132" type="radio" value="Normal" <?php echo $cek_1;?>/>
Normal
<input name="kaji_awal132" type="radio" value="Ada kelainan" <?php echo $cek_2;?>/> 
Ada kelainan, sebutkan
<input name="kaji_awal133" type="text" value="<?php echo $data['kaji_awal133'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preputium </td>
    <td>&nbsp;</td>
    <td colspan="2"><?php
	if ($data['kaji_awal134']=="Dapat dibuka") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal134']=="Tidak dapat dibuka sebagian") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal134']=="Tidak dapat dibuka seluruhnya") {
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
      <input name="kaji_awal134" type="radio" value="Dapat dibuka" <?php echo $cek_1;?>/>
Dapat dibuka
<input name="kaji_awal134" type="radio" value="Tidak dapat dibuka sebagian" <?php echo $cek_2;?>/>
Tidak dapat dibuka sebagian
<input name="kaji_awal134" type="radio" value="Tidak dapat dibuka seluruhnya"<?php echo $cek_3;?> /> 
Tidak dapat dibuka seluruhnya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scrotum </td>
    <td>:</td>
    <td colspan="2"><?php
	if ($data['kaji_awal135']=="Testis sudah turun") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal135']=="Testis belum turun") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal135" type="radio" value="Testis sudah turun" <?php echo $cek_1;?>/>
Testis sudah turun
<input name="kaji_awal135" type="radio" value="Testis belum turun" <?php echo $cek_2;?>/> 
Testis belum turun</td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td>&nbsp;&nbsp;
      <input type="submit" name="Submit" value="Submit" /></td>
    <td>:</td>
    <td colspan="2"></td>
  </tr>
  </form>
</table>
</body>
</html>
