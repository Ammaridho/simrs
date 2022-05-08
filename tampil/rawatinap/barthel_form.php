<?php
session_start();
include "../../config/config.php";
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
<title>DAFTAR PASIEN</title>
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

function Calculatebarthel() {
with (document.barthelskor){
Score = 0.0;
Probability.value= "";

if (barthel01[0].checked){
Score = Score + 0;
}
if (barthel01[1].checked){
Score = Score + 1;
}
if (barthel01[2].checked){
Score = Score + 2;
}

if (barthel02[0].checked){
Score = Score + 0;
}
if (barthel02[1].checked){
Score = Score + 1;
}
if (barthel02[2].checked){
Score = Score + 2;
}

if (barthel03[0].checked){
Score = Score + 0;
}
if (barthel03[1].checked){
Score = Score + 1;
}

if (barthel04[0].checked){
Score = Score + 0;
}
if (barthel04[1].checked){
Score = Score + 1;
}
if (barthel04[2].checked){
Score = Score + 2;
}

if (barthel05[0].checked){
Score = Score + 0;
}
if (barthel05[1].checked){
Score = Score + 1;
}
if (barthel05[2].checked){
Score = Score + 2;
}

if (barthel06[0].checked){
Score = Score + 0;
}
if (barthel06[1].checked){
Score = Score + 1;
}
if (barthel06[2].checked){
Score = Score + 2;
}
if (barthel06[3].checked){
Score = Score + 3;
}

if (barthel07[0].checked){
Score = Score + 0;
}
if (barthel07[1].checked){
Score = Score + 1;
}
if (barthel07[2].checked){
Score = Score + 2;
}
if (barthel07[3].checked){
Score = Score + 3;
}

if (barthel08[0].checked){
Score = Score + 0;
}
if (barthel08[1].checked){
Score = Score + 1;
}
if (barthel08[2].checked){
Score = Score + 2;
}

if (barthel09[0].checked){
Score = Score + 0;
}
if (barthel09[1].checked){
Score = Score + 1;
}
if (barthel09[2].checked){
Score = Score + 2;
}

if (barthel10[0].checked){
Score = Score + 0;
}
if (barthel10[1].checked){
Score = Score + 1;
}

bartheltotal.value = Score;

if (Score<=8){
Probability.value= "Berat";
}
if (Score>="9" && Score<="11"){
Probability.value= "Sedang";
}
if (Score>="12" && Score<="19"){
Probability.value= "Ringan";
}
if (Score>="20"){
Probability.value= "Mandiri";
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

   var radio_val1 = check_radio(barthelskor.barthel01);
   var radio_val2 = check_radio(barthelskor.barthel02);
   var radio_val3 = check_radio(barthelskor.barthel03);
   var radio_val4 = check_radio(barthelskor.barthel04);
   var radio_val5 = check_radio(barthelskor.barthel05);
   var radio_val6 = check_radio(barthelskor.barthel06);
   var radio_val7 = check_radio(barthelskor.barthel07);
   var radio_val8 = check_radio(barthelskor.barthel08);
   var radio_val9 = check_radio(barthelskor.barthel09);
   var radio_val0 = check_radio(barthelskor.barthel10);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mengontrol BAB belum diisi!");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mengontrol BAK belum diisi!");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Membersihkan diri... belum diisi!");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Penggunaan toilet... belum diisi!");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Makan... belum diisi!");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Berpindah dari tempat tidur... belum diisi!");
      return false;
    }
	if (radio_val7 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mobilisasi... belum diisi!?");
      return false;
    }
	if (radio_val8 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Berpakaian... belum diisi!");
      return false;
    }
		if (radio_val9 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Naik turun tangga... belum diisi!");
      return false;
    }
		if (radio_val10 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mandi... belum diisi!");
      return false;
    }
   return (true);
}
</script>
</head>
<body id=tab7>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>Barthel Index (Khusus Pasien ICP Stroke)</strong></td>
    </tr>
<form name="barthelskor" method="post" action="barthel_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mengontrol BAB</td>
<td bgcolor="#FFFFFF">
<input name="barthel01" type="radio" value="0" title="BAB tidak dapat dikontrol" <?php echo $cek_0;?> onClick="Calculatebarthel();">Inkontinen/tidak teratur</br>
<input name="barthel01" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Kadang inkontinen (1x/mgg)</br>
<input name="barthel01" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Kontinen teratur</td>
</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF" valign="top">Mengontrol BAK</td>
	<td bgcolor="#FFFFFF">
<input name="barthel02" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Inkontinen atau pakai kateter dan tidak terkontrol</br>
<input name="barthel02" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Kadang-kadang inkontinen (max 1x/24 jam)</br>
<input name="barthel02" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Kontinen (untuk lebih dari 7 hari)</td>
    </tr><tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Membersihkan diri, melap muka, menyisir rambut, menyikat gigi</td>
<td bgcolor="#FFFFFF">
<input name="barthel03" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Butuh orang lain</br>
<input name="barthel03" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Mandiri</br></td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Penggunaan toilet</br> Pergi ke dan dari WC </br>(melepas, memakai celana, menyeka, menyiram)</td>
<td bgcolor="#FFFFFF">
<input name="barthel04" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tergantung pertolongan orang lain</br>
<input name="barthel04" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Perlu pertolongan pada beberapa aktivitas tetapi dapat mengerjakan sendiri beberapa aktivitas lain</br>
<input name="barthel04" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Makan</td>
<td bgcolor="#FFFFFF">
<input name="barthel05" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tidak mampu</br>
<input name="barthel05" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Perlu seseorang untuk memotong makanan</br>
<input name="barthel05" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpindah tempat dari tidur ke duduk</td>
<td bgcolor="#FFFFFF">
<input name="barthel06" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tidak mampu</br>
<input name="barthel06" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Perlu bantuan untuk duduk (2 orang)</br>
<input name="barthel06" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Bantuan minimal (1 0rang)</br>
<input name="barthel06" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi/berjalan</td>
<td bgcolor="#FFFFFF">
<input name="barthel07" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tidak mampu</br>
<input name="barthel07" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Bisa berjalan dengan kursi roda</br>
<input name="barthel07" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Berjalan dengan bantuan 1 orang/<i>walker</i></br>
<input name="barthel07" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Berpakaian</td>
<td bgcolor="#FFFFFF">
<input name="barthel08" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tergantung orang lain</br>
<input name="barthel08" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Sebagian dibantu (mis : mengancingkan baju)</br>
<input name="barthel08" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Naik turun tangga</td>
<td bgcolor="#FFFFFF">
<input name="barthel09" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tidak mampu</br>
<input name="barthel09" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Butuh pertolongan</br>
<input name="barthel09" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mandi</td>
<td bgcolor="#FFFFFF">
<input name="barthel10" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatebarthel();">Tergantung orang lain</br>
<input name="barthel10" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebarthel();">Mandiri</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Total skor </td>
  <td bgcolor="#FFFFFF"><input type="text" name="bartheltotal" size="24" /></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Tingkat ketergantungan </td>
  <td bgcolor="#FFFFFF"><input type="text" name="Probability" size="24" /></td>
</tr>
<tr> 
    <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>