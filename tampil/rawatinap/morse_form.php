<?php
session_start();
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>Skala Morse</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
<script language="JavaScript">

function Calculatemorse() {
with (document.morseskor){
Score = 0.0;
Probability.value= "";

if (morse01[0].checked){
Score = Score + 0;
}
if (morse01[1].checked){
Score = Score + 25;
}

if (morse02[0].checked){
Score = Score + 0;
}
if (morse02[1].checked){
Score = Score + 15;
}

if (morse03[0].checked){
Score = Score + 30;
}
if (morse03[1].checked){
Score = Score + 15;
}
if (morse03[2].checked){
Score = Score + 0;
}

if (morse04[0].checked){
Score = Score + 0;
}
if (morse04[1].checked){
Score = Score + 20;
}

if (morse05[0].checked){
Score = Score + 0;
}
if (morse05[1].checked){
Score = Score + 10;
}
if (morse05[2].checked){
Score = Score + 20;
}

if (morse06[0].checked){
Score = Score + 0;
}
if (morse06[1].checked){
Score = Score + 15;
}

morsetotal.value = Score;

if (Score<=24){
Probability.value= "Rendah";
}
if (Score>=25 && Score<=44){
Probability.value= "Sedang";
}
if (Score>=45){
Probability.value= "Tinggi";
}
}}

//-->
</script>
<script>
            function validasi(){
				var nik = document.getElementById('nik');
				  if (harusDiisi(nik, "nik belum diisi")) {
                            return true;
				};
                return false;
            }

            function harusDiisi(att, msg){
                if (att.value.length == 0) {
                    alert(msg);
                    att.focus();
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

   var radio_val1 = check_radio(morseskor.morse01);
   var radio_val2 = check_radio(morseskor.morse02);
   var radio_val3 = check_radio(morseskor.morse03);
   var radio_val4 = check_radio(morseskor.morse04);
   var radio_val5 = check_radio(morseskor.morse05);
   var radio_val6 = check_radio(morseskor.morse06);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Riwayat jatuh... belum diisi!");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Diagnosa sekunder... belum diisi!");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Alat bantu... belum diisi!");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Alat kesehatan... belum diisi!");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mobilisasi... belum diisi!");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Status mental... belum diisi!");
      return false;
    }
   return (true);
}
</script>
</head>
<body id="tab11">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>Skala Morse</strong></td>
    </tr>
<form name="morseskor" method="post" action="morse_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['nama'];?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Riwayat jatuh dalam 3 (tiga) bulan terakhir </td>
<td bgcolor="#FFFFFF">
<input name="morse01" type="radio" value="0" <?php echo $cek_1;?> onClick="Calculatemorse();">Tidak</br>
<input name="morse01" type="radio" value="25" <?php echo $cek_2;?> onClick="Calculatemorse();">Ya</td>
</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF" valign="top">Diagnosa sekunder</td>
	<td bgcolor="#FFFFFF">
<input name="morse02" type="radio" value="0" <?php echo $cek_1;?> onClick="Calculatemorse();">Tidak</br>
<input name="morse02" type="radio" value="15" <?php echo $cek_2;?> onClick="Calculatemorse();">Ya</td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Menggunakan alat bantu</td>
<td bgcolor="#FFFFFF">
<input name="morse03" type="radio" value="30" <?php echo $cek_1;?> onClick="Calculatemorse();">Furniture (meja, kursi/sofa, lemari, dll)</br>
<input name="morse03" type="radio" value="15" <?php echo $cek_2;?> onClick="Calculatemorse();">Kruk, tongkat berjalan, walker</br>
<input name="morse03" type="radio" value="0" <?php echo $cek_3;?> onClick="Calculatemorse();">Tidak menggunakan alat bantu/bedrest</td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Penggunaan alat kesehatan (IV catheter, Dower catheter, NGT) </td>
<td bgcolor="#FFFFFF">
<input name="morse04" type="radio" value="0" <?php echo $cek_1;?> onClick="Calculatemorse();">Tidak</br>
<input name="morse04" type="radio" value="20" <?php echo $cek_2;?> onClick="Calculatemorse();">Ya</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi/pergerakkan </td>
<td bgcolor="#FFFFFF">
<input name="morse05" type="radio" value="0" <?php echo $cek_1;?> onClick="Calculatemorse();">Normal/Bedrest total/immobilisasi</br>
<input name="morse05" type="radio" value="10" <?php echo $cek_2;?> onClick="Calculatemorse();">Mobilisasi lemah</br>
<input name="morse05" type="radio" value="20" <?php echo $cek_3;?> onClick="Calculatemorse();">Terganggu, menggunakan pegangan untuk keseimbangan</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Status mental</td>
<td bgcolor="#FFFFFF">
<input name="morse06" type="radio" value="0" <?php echo $cek_1;?> onClick="Calculatemorse();">Sadar akan kemampuan dirinya</br>
<input name="morse06" type="radio" value="15" <?php echo $cek_2;?> onClick="Calculatemorse();">Tidak sadar/keterbatasan</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Total Skor </td>
  <td bgcolor="#FFFFFF"><input type="text" name="morsetotal" size="24" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Menggunakan obat-obat/alkohol</td>
<td bgcolor="#FFFFFF">
<input name="ketergantungan_obat" type="radio" value="Tidak" <?php echo $cek_1;?>>Tidak</br>
<input name="ketergantungan_obat" type="radio" value="Ya" <?php echo $cek_2;?>>Ya, sebutkan :
<input type="text" name="keterangan" size="24" /></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Kategori</td>
  <td bgcolor="#FFFFFF"><textarea name="Probability" cols="40" rows="3" ></textarea></td>
</tr>
<tr> 
    <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>
