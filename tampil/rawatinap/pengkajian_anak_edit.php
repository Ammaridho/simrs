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
<title>PENGKAJIAN ANAK DAN REMAJA</title>
</head>
<body>
<?php	
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$sql = "SELECT * FROM pengkajian_awal WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi, $sql)
or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);
?>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" action="pengkajian_anak_edit_sim.php" method="POST">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo $data['tanggal'] ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo $data['jam'] ;?>">
<input name="shift" type="hidden" id="jam" value="<?php echo $data['shift'] ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $data['nik'] ;?>">
<tr bgcolor="#D9E8F3">
    <td colspan="3"><div align="center"><strong>PENGKAJIAN  KEPERAWATAN (ANAK DAN REMAJA) </strong></div></td>
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
    <td>&nbsp;&nbsp;    5. Nama panggilan anak&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="panggilan" id="panggilan" type="text" value="<?php echo $data['panggilan'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    6. Diagnosa saat masuk&nbsp;&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal05" id="kaji_awal05"type="text" value="<?php echo $data['kaji_awal05'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td><b>B. Riwayat Alergi</b></td>
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
    <td><b>C. Keluhan Utama</b>&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal10" id="kaji_awal10" type="text" size="60" value="<?php echo $data['kaji_awal10'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>D. Riwayat Penyakit sekarang&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td colspan="3"><textarea name="kaji_awal11" id="kaji_awal11" cols="80"><?php echo $data['kaji_awal11']; ?></textarea></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>E. Riwayat Kesehatan&nbsp;</B>:</td>
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
    <td colspan="3"><B>F. Riwayat penyakit keluarga&nbsp;</B>:</td>
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
    <td colspan="3"><b>G. Riwayat kelahiran</b></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    1. Riwayat prenatal </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Riwayat sakit </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal151']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal151']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal151" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal151" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, pada kehamilan 
<input name="kaji_awal152" type="text" size="2" value="<?php echo $data['kaji_awal152'] ;?>"/>
minggu</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Riwayat perdarahan &nbsp;</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal153']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal153']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal153" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal153" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, pada kehamilan
<input name="kaji_awal154" type="text" size="2" value="<?php echo $data['kaji_awal154'] ;?>"/>
minggu</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Riwayat muntah berlebihan </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal155']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal155']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal155" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal155" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya, pada kehamilan
<input name="kaji_awal156" type="text" size="2" value="<?php echo $data['kaji_awal156'] ;?>"/>
minggu</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    2. Riwayat kelahiran </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal157']=="Spontan") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal157']=="Vakum Ekstraksi") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal157']=="Forcep") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal157']=="SC") {
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
      <input name="kaji_awal157" type="radio" value="Spontan" <?php echo $cek_1;?>/>
Spontan
<input name="kaji_awal157" type="radio" value="Vakum Ekstraksi" <?php echo $cek_2;?>/>
Vakum Ekstraksi
<input name="kaji_awal157" type="radio" value="Forcep" <?php echo $cek_3;?>/>
Forcep
<input name="kaji_awal157" type="radio" value="SC" <?php echo $cek_4;?>/>
SC</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    3. Ditolong oleh </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal158']=="Dokter") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal158']=="Bidan") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal158']=="Lainnya"){
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
      <input name="kaji_awal158" type="radio" value="Dokter" <?php echo $cek_1;?>/>
Dokter
<input name="kaji_awal158" type="radio" value="Bidan" <?php echo $cek_2;?>/> 
Bidan
<input name="kaji_awal158" type="radio" value="Lainnya" <?php echo $cek_3;?>/> 
Lainnya
<input name="kaji_awal159" type="text" value="<?php echo $data['kaji_awal159'] ;?>"/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    4. Berat badan lahir </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal160" type="text" size="2" value="<?php echo $data['kaji_awal160'] ;?>"/>
      gram</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    5. Panjang badan lahir </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal161" type="text" size="2" value="<?php echo $data['kaji_awal161'] ;?>"/>
      cm</td>
  </tr>
  
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><b>H. Riwayat imunisasi</b></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    1.Usia balita </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. BCG </td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal162']=="BCG") echo "<input type='checkbox' name='kaji_awal162' value='BCG' checked>BCG";
    else echo "<input type='checkbox' name='kaji_awal162' value='BCG'>BCG";
    ?>
      </br></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. DPT </td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal163']=="DPT I") echo "<input type='checkbox' name='kaji_awal163' value='DPT I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal163' value='DPT I'>I";
    ?>
      <?php 
    if ($data['kaji_awal164']=="DPT II") echo "<input type='checkbox' name='kaji_awal164' value='DPT II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal164' value='DPT II'>II";
    ?>
      <?php 
    if ($data['kaji_awal165']=="DPT III") echo "<input type='checkbox' name='kaji_awal165' value='DPT III' checked>III";
    else echo "<input type='checkbox' name='kaji_awal165' value='DPT III'>III";
    ?>
      <?php 
    if ($data['kaji_awal166']=="DPT IV") echo "<input type='checkbox' name='kaji_awal166' value='DPT IV' checked>IV";
    else echo "<input type='checkbox' name='kaji_awal166' value='DPT IV'>IV";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Polio </td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal167']=="Polio I") echo "<input type='checkbox' name='kaji_awal167' value='Polio I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal167' value='Polio I'>I";
    ?>
      <?php 
    if ($data['kaji_awal168']=="Polio II") echo "<input type='checkbox' name='kaji_awal168' value='Polio II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal168' value='Polio II'>II";
    ?>
      <?php 
    if ($data['kaji_awal169']=="Polio III") echo "<input type='checkbox' name='kaji_awal169' value='Polio III' checked>III";
    else echo "<input type='checkbox' name='kaji_awal169' value='Polio III'>III";
    ?>
      <?php 
    if ($data['kaji_awal170']=="Polio IV") echo "<input type='checkbox' name='kaji_awal170' value='Polio IV' checked>IV";
    else echo "<input type='checkbox' name='kaji_awal170' value='Polio IV'>IV";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d.  Hepatitis </td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal171']=="Hepatitis I") echo "<input type='checkbox' name='kaji_awal171' value='Hepatitis I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal171' value='Hepatitis I'>I";
    ?>
      <?php 
    if ($data['kaji_awal172']=="Hepatitis II") echo "<input type='checkbox' name='kaji_awal172' value='Hepatitis II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal172' value='Hepatitis II'>II";
    ?>
      <?php 
    if ($data['kaji_awal173']=="Hepatitis III") echo "<input type='checkbox' name='kaji_awal173' value='Hepatitis III' checked>III";
    else echo "<input type='checkbox' name='kaji_awal173' value='Hepatitis III'>III";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Campak </td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal174']=="Campak") echo "<input type='checkbox' name='kaji_awal174' value='Campak' checked>Campak";
    else echo "<input type='checkbox' name='kaji_awal174' value='Campak'>Campak";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f. Lainnya </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal175" type="text" value="<?php echo $data['kaji_awal175'] ;?>"/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    2.Usia sekolah </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. DP</td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal176']=="DP I") echo "<input type='checkbox' name='kaji_awal176' value='DP I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal176' value='DP I'>I";
    ?>
      <?php 
    if ($data['kaji_awal177']=="DP II") echo "<input type='checkbox' name='kaji_awal177' value='DP II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal177' value='DP II'>II";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. TT</td>
    <td>&nbsp;</td>
    <td><?php 
    if ($data['kaji_awal178']=="TT I") echo "<input type='checkbox' name='kaji_awal178' value='TT I' checked>I";
    else echo "<input type='checkbox' name='kaji_awal178' value='TT I'>I";
    ?>
      <?php 
    if ($data['kaji_awal179']=="TT II") echo "<input type='checkbox' name='kaji_awal179' value='TT II' checked>II";
    else echo "<input type='checkbox' name='kaji_awal179' value='TT II'>II";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Lainnya </td>
	<td>&nbsp;</td>
	<td><input name="kaji_awal180" type="text" value="<?php echo $data['kaji_awal180'] ;?>"/></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><b>I. Riwayat pertumbuhan dan perkembangan</b></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    1. Mendapatkan ASI sampai umur </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal181" type="text" size="2" value="<?php echo $data['kaji_awal181'] ;?>"/>
      bulan</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    2. Mendapatkan susu formula umur </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal182" type="text" size="2" value="<?php echo $data['kaji_awal182'] ;?>"/>
      bulan</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    3. Mendapatkan makanan tambahan umur </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal183" type="text" size="2" value="<?php echo $data['kaji_awal183'] ;?>"/>
      bulan</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    4. Berbicara </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal184']=="Belum") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal184']=="Sudah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal184" type="radio" value="Belum" <?php echo $cek_1;?>/>
Belum
<input name="kaji_awal184" type="radio" value="Sudah" <?php echo $cek_2;?>/>
Sudah, mulai umur
<input name="kaji_awal185" type="text" size="2" value="<?php echo $data['kaji_awal185'] ;?>"/>
bulan</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    5. Berjalan</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal186']=="Belum") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal186']=="Sudah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal186" type="radio" value="Belum" <?php echo $cek_1;?>/>
Belum
<input name="kaji_awal186" type="radio" value="Sudah" <?php echo $cek_2;?>/>
Sudah , mulai umur
      <input name="kaji_awal187" type="text" size="2" value="<?php echo $data['kaji_awal187'] ;?>"/>
      bulan</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    6. Toilet training </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal122']=="Belum") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal122']=="Sudah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal122" type="radio" value="Belum" <?php echo $cek_1;?>/>
Belum
<input name="kaji_awal122" type="radio" value="Sudah" <?php echo $cek_2;?>/>
Sudah, umur
      <input name="kaji_awal188" type="text" size="2" value="<?php echo $data['kaji_awal188'] ;?>"/>
      bulan</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    7. Berat badan saat ini </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal189" type="text" size="2" value="<?php echo $data['kaji_awal189'] ;?>"/>
      kg</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;&nbsp;    8. Tinggi badan saat ini </td>
	<td>&nbsp;</td>
	<td><input name="kaji_awal190" type="text" size="2" value="<?php echo $data['kaji_awal190'] ;?>"/>
	  cm</td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B> J. Riwayat terhadap kekerasan&nbsp;</B>:</td>
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
    <td colspan="3"><B>K. Pengkajian Fisik dan Identifikasi    Masalah </B>:</td>
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
      <input name="kaji_awal30" type="radio" value="dengan aktifitas" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan"  <?php echo $cek_1;?>/>
      dengan aktifitas 
  <input name="kaji_awal30" type="radio" value="tanpa aktifitas" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan"  <?php echo $cek_2;?>/>
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
<input name="kaji_awal59" type="radio" value="Gigi atas" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_1;?>/>
Gigi atas
<input name="kaji_awal59" type="radio" value="Gigi bawah" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_2;?>/>
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
kali/hari,<br/> bentuk feses
<input name="kaji_awal70" type="text" value="<?php echo $data['kaji_awal70'] ;?>"/></td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Perkemihan&nbsp;</td>
    <td>:</td>
    <td>Kelainan Genitalia : </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kelainan Genitalia </td>
    <td>&nbsp;</td>
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
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Kebiasaan BAK</td>
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
<input name="kaji_awal89" type="radio" value="Tetraplegi" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_1;?>/>
Tetraplegi /
<input name="kaji_awal89" type="radio" value="Tetraparese" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_2;?>/>
Tetraparese / 
<input name="kaji_awal89" type="radio" value="Hemiplegi" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_3;?>/>
Hemiplegi / 
<input name="kaji_awal89" type="radio" value="Hemiparese" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_4;?>/>
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
<input name="kaji_awal90" type="radio" value="Kanan" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan"  <?php echo $cek_1;?>/>
Kanan
<input name="kaji_awal90" type="radio" value="Kiri" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan"  <?php echo $cek_2;?>/>
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
    <td>&nbsp;&nbsp;    7. Istirahat dan Tidur&nbsp;</td>
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
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Kebiasaan sebelum tidur </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal115" type="text" value="<?php echo $data['kaji_awal115'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Masalah dalam tidur</td>
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
    <td>&nbsp;&nbsp;    8. Sosial&nbsp; dan&nbsp; Ekonomi&nbsp;</td>
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
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Hobi</td>
    <td>:</td>
    <td><input name="kaji_awal123" id="kaji_awal123" type="text" value="<?php echo $data['kaji_awal123'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    e. Tinggal&nbsp; bersama siapa</td>
    <td>:</td>
    <td><input name="kaji_awal124" id="kaji_awal124" type="text" value="<?php echo $data['kaji_awal124'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    f.&nbsp; Penggunaan waktu luang</td>
    <td>:</td>
    <td><input name="kaji_awal125" id="kaji_awal125" type="text" value="<?php echo $data['kaji_awal125'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    9. Psikologis&nbsp;</td>
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
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal126']=="Sedih") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";	
	}
	elseif ($data['kaji_awal126']=="Berontak") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal126']=="Menangis") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal126']=="Menarik diri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "checked";
	$cek_6 = "";
	}
	elseif ($data['kaji_awal126']=="Mencederai diri") {
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
      <input name="kaji_awal126" type="radio" value="Tenang" <?php echo $cek_1;?>/>Tenang
      <input name="kaji_awal126" type="radio" value="Sedih" <?php echo $cek_2;?>/>Sedih
      <input name="kaji_awal126" type="radio" value="Berontak" <?php echo $cek_3;?>/>Berontak
      <input name="kaji_awal126" type="radio" value="Menangis" <?php echo $cek_4;?>/>Menangis
	  <input name="kaji_awal126" type="radio" value="Menarik diri" <?php echo $cek_5;?>/>Menarik diri
	  <input name="kaji_awal126" type="radio" value="Mencederai diri" <?php echo $cek_6;?>/>
	  Mencederai diri, dengan
      <input name="kaji_awal108" type="text" value="<?php echo $data['kaji_awal108'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    b. Keterampilan interaksi</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal127']=="Mudah berinteraksi") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal127']=="Takut berinteraksi") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal127']=="Sulit berinteraksi") {
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
      <input name="kaji_awal127" type="radio" value="Mudah berinteraksi" <?php echo $cek_1;?>/>Mudah berinteraksi
      <input name="kaji_awal127" type="radio" value="Takut berinteraksi" <?php echo $cek_2;?>/>Takut berinteraksi
	  <input name="kaji_awal127" type="radio" value="Sulit berinteraksi" <?php echo $cek_3;?>/>Sulit berinteraksi</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    c. Pola kognitif</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal128']=="Mudah konsentrasi") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal128']=="Lambat konsentrasi") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal128" type="radio" value="Mudah konsentrasi" <?php echo $cek_1;?>/>Mudah konsentrasi
      <input name="kaji_awal128" type="radio" value="Lambat konsentrasi" <?php echo $cek_2;?>/>Lambat konsentrasi</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Gangguan persepsi sensori </td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Mendengar &nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal104']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal104']=="Ada") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal104" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal104" type="radio" value="Ada" <?php echo $cek_2;?>/>
        Ada</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Melihat &nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal107']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal107']=="Ada") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal107" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
        <input name="kaji_awal107" type="radio" value="Ada" <?php echo $cek_2;?>/>
        Ada        </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Meraba </td>
    <td>:</td>
    <td><?php
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
Ada </td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e. Respon terhadap hospitalisasi </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal110']=="Menerima") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal110']=="Menolak") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal110']=="Menangis") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal110']=="Menarik diri") {
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
      <input name="kaji_awal110" type="radio" value="Menerima" <?php echo $cek_1;?>/>
      Menerima
      <input name="kaji_awal110" type="radio" value="Menolak" <?php echo $cek_2;?>/>
      Menolak
      <input name="kaji_awal110" type="radio" value="Menangis" <?php echo $cek_3;?>/>
      Menangis
      <input name="kaji_awal110" type="radio" value="Menarik diri" <?php echo $cek_4;?>/>
      Menarik diri</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;    f. Pola koping keluarga/orang terdekat&nbsp;</td>
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
    <td>&nbsp;&nbsp;    10. Spiritual&nbsp;&nbsp;</td>
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
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pelaksanaan keagamaan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal132" id="kaji_awal132" type="text" value="<?php echo $data['kaji_awal132'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Harapan pasien/keluarga terhadap perawatan dan pengobatan&nbsp;</td>
    <td>:</td>
    <td><input name="kaji_awal133" id="kaji_awal133" type="text" value="<?php echo $data['kaji_awal133'] ;?>"/></td>
  </tr>
<?php
if ($tahun >= 65 && $hari >= 1) { ?>
  <tr bgcolor="#D9E8F3">
    <td colspan="3"><B>&nbsp;&nbsp; PENGKAJIAN TAMBAHAN KHUSUS (setelah menarche sampai usia 18 tahun)&nbsp;&nbsp;</B>:</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    1. Pola fungsi seksualitas </td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wanita</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Menarche umur </td>
    <td>:</td>
    <td><input name="kaji_awal134" id="kaji_awal134" type="text" size="2" value="<?php echo $data['kaji_awal134'] ;?>"/>
      tahun</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Riwayat menstruasi </td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lamanya </td>
    <td>&nbsp;</td>
    <td><input name="kaji_awal135" id="kaji_awal135" type="text" size="2" value="<?php echo $data['kaji_awal135'] ;?>"/>
      hari</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teratur</td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal136']=="Teratur") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal136']=="Tidak teratur") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal136" type="radio" value="Teratur" <?php echo $cek_1;?>/>
      Teratur
      <input name="kaji_awal136" type="radio" value="Tidak teratur" <?php echo $cek_2;?>/>
      Tidak teratur</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masalah saat haid </td>
    <td>&nbsp;</td>
    <td><?php
	if ($data['kaji_awal137']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal137']=="Ada") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal137" type="radio" value="Tidak" <?php echo $cek_1;?>/>
      Tidak
      <input name="kaji_awal137" type="radio" value="Ada" <?php echo $cek_2;?>/>
      Ada</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Payudara tumbuh </td>
    <td>:</td>
    <td>umur 
      <input name="kaji_awal138" id="kaji_awal138" type="text" size="2" value="<?php echo $data['kaji_awal138'] ;?>"/>
      tahun</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laki-laki</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Perubahan suara/adam apples </td>
    <td>:</td>
    <td>umur
      <input name="kaji_awal139" id="kaji_awal139" type="text" size="2" value="<?php echo $data['kaji_awal139'] ;?>"/>
      tahun</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Mimpi basah </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal1140']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal140']=="Ya") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal140" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal140" type="radio" value="Ya" <?php echo $cek_2;?>/>
Ya</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kumis </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal141']=="Tidak") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal141']=="Ada") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal141" type="radio" value="Tidak" <?php echo $cek_1;?>/>
Tidak
<input name="kaji_awal141" type="radio" value="Ada" <?php echo $cek_2;?>/>
Ada</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Perubahan otot punggung </td>
    <td>:</td>
    <td>umur
      <input name="kaji_awal142" id="kaji_awal142" type="text" size="2" value="<?php echo $data['kaji_awal142'] ;?>"/>
tahun</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;2. Pola koping </td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Pengambilan keputusan &nbsp;</td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal143']=="Mandiri") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal143']=="Tergantung") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal143" type="radio" value="Mandiri" <?php echo $cek_1;?>/>
     Mandiri
      <input name="kaji_awal143" type="radio" value="Tergantung" <?php echo $cek_2;?>/>
      Tergantung,
      <?php
	if ($data['kaji_awal144']=="Ibu") {
	$cek_1 = "checked";
	$cek_2 = "";
	}
	elseif ($data['kaji_awal144']=="Ayah") {
	$cek_1 = "";
	$cek_2 = "checked";
	}
	else {
	$cek_1 = "";
	$cek_2 = "";
	}
	?>
      <input name="kaji_awal144" type="radio" value="Ibu" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_1;?>/>
Ibu
<input name="kaji_awal144" type="radio" value="Ayah" ondblclick="rC(this)" title="Double click untuk menghilangkan pilihan" <?php echo $cek_2;?>/>
Ayah</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    b. Respon terhadap masalah/stress </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal145']=="Berbagi") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal145']=="Berontak") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal145']=="Menarik diri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal145']=="Melarikan diri") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "checked";
	$cek_5 = "";
	}
	elseif ($data['kaji_awal145']=="Pergaulan bebas") {
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
      <input name="kaji_awal153" type="radio" value="Berbagi" <?php echo $cek_1;?>/>
Berbagi
<input name="kaji_awal153" type="radio" value="Berontak" <?php echo $cek_2;?>/> 
Berontak
<input name="kaji_awal153" type="radio" value="Menarik diri" <?php echo $cek_3;?>/>
Menarik diri 
<input name="kaji_awal153" type="radio" value="Melarikan diri" <?php echo $cek_4;?>/>
Melarikan diri
<input name="kaji_awal153" type="radio" value="Pergaulan bebas" <?php echo $cek_5;?>/> 
Pergaulan bebas</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Orang yang dipercaya </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal146']=="Ibu") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal146']=="Ayah") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal146']=="Kakak") {
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
      <input name="kaji_awal146" type="radio" value="Ibu" <?php echo $cek_1;?>/>
Ibu
<input name="kaji_awal146" type="radio" value="Ayah" <?php echo $cek_2;?>/>
Ayah
<input name="kaji_awal146" type="radio" value="Kakak" <?php echo $cek_3;?>/>
Kakak, lainnya 
<input name="kaji_awal147" id="kaji_awal147" type="text" value="<?php echo $data['kaji_awal147'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Orang yang diidolakan  </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal148']=="Ibu") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal148']=="Ayah") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	}
	elseif ($data['kaji_awal148']=="Kakak") {
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
      <input name="kaji_awal148" type="radio" value="Ibu" <?php echo $cek_1;?>/>
Ibu
<input name="kaji_awal148" type="radio" value="Ayah" <?php echo $cek_2;?>/>
Ayah
<input name="kaji_awal148" type="radio" value="Kakak" <?php echo $cek_3;?>/>
Kakak, lainnya
<input name="kaji_awal114" id="kaji_awal114" type="text" value="<?php echo $data['kaji_awal114'] ;?>"/></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;3. Status mental </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kemampuan komunikasi </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal149']=="Percaya diri") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal149']=="Ragu-ragu") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal149']=="Menggunakan bahasa non verbal") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal149']=="Acuh tak acuh") {
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
      <input name="kaji_awal149" type="radio" value="Percaya diri" <?php echo $cek_1;?>/>
      Percaya diri
      <input name="kaji_awal149" type="radio" value="Ragu-ragu" <?php echo $cek_2;?>/>
      Ragu-ragu
      <input name="kaji_awal149" type="radio" value="Menggunakan bahasa non verbal" <?php echo $cek_3;?>/>
Menggunakan bahasa non verbal
<input name="kaji_awal149" type="radio" value="Acuh tak acuh" <?php echo $cek_4;?>/> 
Acuh tak acuh</td>
  </tr>
  
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Kontak mata </td>
    <td>:</td>
    <td><?php
	if ($data['kaji_awal150']=="Menatap") {
	$cek_1 = "checked";
	$cek_2 = "";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal150']=="Menantang") {
	$cek_1 = "";
	$cek_2 = "checked";
	$cek_3 = "";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal150']=="Menunduk") {
	$cek_1 = "";
	$cek_2 = "";
	$cek_3 = "checked";
	$cek_4 = "";
	}
	elseif ($data['kaji_awal150']=="Menghindar") {
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
      <input name="kaji_awal150" type="radio" value="Menatap" <?php echo $cek_1;?>/>
Menatap
<input name="kaji_awal150" type="radio" value="Menantang" <?php echo $cek_2;?>/>
Menantang
<input name="kaji_awal150" type="radio" value="Menunduk" <?php echo $cek_3;?>/>
Menunduk
<input name="kaji_awal150" type="radio" value="Menghindar" <?php echo $cek_4;?>/>
Menghindar</td>
  </tr>  <?php }
  else {
  echo "";
  }
  ?>
  <tr bgcolor="#D9E8F3">
    <td colspan="3">&nbsp;&nbsp;
      <input type="submit" name="Submit" value="UPDATE" />
      <input type="submit" name="submit" value="END SESSION" onclick="form1.action='pengkajian_anak_selesai.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;" /></td>
    </tr>
  </form>
</table>
</body>
</html>
