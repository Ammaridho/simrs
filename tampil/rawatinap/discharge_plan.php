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
<title>PENGKAJIAN RENCANA PEMULANGAN</title>
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

function Calculatedp() {
with (document.dpskor){
Score = 0.0;
Probability.value= "";

if (dp01[0].checked){
Score = Score + 2;
}
if (dp01[1].checked){
Score = Score + 1;
}

if (dp02[0].checked){
Score = Score + 10;
}
if (dp02[1].checked){
Score = Score + 1;
}

if (dp03[0].checked){
Score = Score + 1;
}
if (dp03[1].checked){
Score = Score + 2;
}

if (dp04[0].checked){
Score = Score + 1;
}
if (dp04[1].checked){
Score = Score + 2;
}
if (dp04[2].checked){
Score = Score + 10;
}

if (dp05[0].checked){
Score = Score + 1;
}
if (dp05[1].checked){
Score = Score + 2;
}
if (dp05[2].checked){
Score = Score + 5;
}

if (dp06[0].checked){
Score = Score + 1;
}
if (dp06[1].checked){
Score = Score + 2;
}
if (dp06[2].checked){
Score = Score + 10;
}

if (dp07[0].checked){
Score = Score + 1;
}
if (dp07[1].checked){
Score = Score + 2;
}
if (dp07[2].checked){
Score = Score + 3;
}
if (dp07[3].checked){
Score = Score + 4;
}
if (dp07[4].checked){
Score = Score + 5;
}

if (dp08[0].checked){
Score = Score + 5;
}
if (dp08[1].checked){
Score = Score + 1;
}

if (dp09[0].checked){
Score = Score + 10;
}
if (dp09[1].checked){
Score = Score + 1;
}

if (dp10[0].checked){
Score = Score + 2;
}
if (dp10[1].checked){
Score = Score + 1;
}

if (dp11[0].checked){
Score = Score + 5;
}
if (dp11[1].checked){
Score = Score + 1;
}

if (dp12[0].checked){
Score = Score + 2;
}
if (dp12[1].checked){
Score = Score + 1;
}

if (dp13[0].checked){
Score = Score + 2;
}
if (dp13[1].checked){
Score = Score + 1;
}

if (dp14[0].checked){
Score = Score + 1;
}
if (dp14[1].checked){
Score = Score + 5;
}
if (dp14[2].checked){
Score = Score + 10;
}

dptotal.value = Score;

if (Score<16){
Probability.value= "Kategori 1, dilakukan edukasi 1 (satu) kali pada pasien atau keluarga sesuai permasalahan";
}
if (Score>=16 && Score<=22){
Probability.value= "Kategori 2, dilakukan edukasi 1 (satu) kali pada pasien dan keluarga sesuai permasalahan";
}
if (Score>=23 && Score<=43){
Probability.value= "Kategori 3, dilakukan  edukasi pada pasien dan keluarga masing-masing 2 kali  sesuai permasalahan";
}
if (Score>43){
Probability.value= "Kategori 4, pasien membutuhkan pendamping/orang yang merawat di rumah dan lakukan edukasi 3 kali pada pasien dan pendamping sesuai permasalahan";
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

   var radio_val1 = check_radio(dpskor.dp01);
   var radio_val2 = check_radio(dpskor.dp02);
   var radio_val3 = check_radio(dpskor.dp03);
   var radio_val4 = check_radio(dpskor.dp04);
   var radio_val5 = check_radio(dpskor.dp05);
   var radio_val6 = check_radio(dpskor.dp06);
   var radio_val7 = check_radio(dpskor.dp07);
   var radio_val8 = check_radio(dpskor.dp08);
   var radio_val9 = check_radio(dpskor.dp09);
   var radio_val10 = check_radio(dpskor.dp10);
   var radio_val11 = check_radio(dpskor.dp11);
   var radio_val12 = check_radio(dpskor.dp12);
   var radio_val13 = check_radio(dpskor.dp13);
   var radio_val14 = check_radio(dpskor.dp14);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Pendamping... belum diisi!");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Riwayat berobat... belum diisi!");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Umur... belum diisi!");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Status mental... belum diisi!");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Kebutuhan... belum diisi!");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Aktifitas... belum diisi!");
      return false;
    }
	if (radio_val7 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mobilisasi... belum diisi!?");
      return false;
    }
	if (radio_val8 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Ketergantungan pada alat medis... belum diisi!");
      return false;
    }
		if (radio_val9 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, pendamping dalam perjalanan penyakit... belum diisi!");
      return false;
    }
		if (radio_val10 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Perawatan minimal... belum diisi!");
      return false;
    }
	   if (radio_val11 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Arahan untuk masalah... belum diisi!");
      return false;
    }
	   if (radio_val12 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Arahan perawatan langsung... belum diisi!");
      return false;
    }
		   if (radio_val13 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Rehabilitasi medis... belum diisi!");
      return false;
    }
	if (radio_val14 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Akomodasi lain... belum diisi!");
      return false;
    }
   return (true);
}
</script>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>PENGKAJIAN RENCANA PEMULANGAN </strong></td>
    </tr>
<form name="dpskor" method="post" action="dp_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
<input name="kd_kunjungan" type="text" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#FFFFFF">
<td width="52%" valign="top" bgcolor="#FFFFFF">Selama ini menggunakan pendamping dalam melakukan aktifitas sehari hari, dalam pemberian obat atau home care</td>
<td width="48%" bgcolor="#FFFFFF">
<input name="dp01" type="radio" value="2" title="BAB tidak dapat dikontrol" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp01" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF" valign="top">Riwayat pernah berobat ke puskesmas /rumah sakit</td>
	<td bgcolor="#FFFFFF">
<input name="dp02" type="radio" value="10" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp02" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
    </tr><tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Umur</td>
<td bgcolor="#FFFFFF">
<input name="dp03" type="radio" value="1" <?php echo $cek_0;?> onClick="Calculatedp();">Kurang dari 65 tahun</br>
<input name="dp03" type="radio" value="2" <?php echo $cek_1;?> onClick="Calculatedp();">Lebih dari 65 tahun</br></td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Status mental </td>
<td bgcolor="#FFFFFF">
<input name="dp04" type="radio" value="1" <?php echo $cek_0;?> onClick="Calculatedp();">Sadar & Rasional</br>
<input name="dp04" type="radio" value="2" <?php echo $cek_1;?> onClick="Calculatedp();">Bingung</br>
<input name="dp04" type="radio" value="10" <?php echo $cek_2;?> onClick="Calculatedp();">Koma</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Kebutuhan</td>
<td bgcolor="#FFFFFF">
<input name="dp05" type="radio" value="1" <?php echo $cek_0;?> onClick="Calculatedp();">Tidak Perlu bantuan</br>
<input name="dp05" type="radio" value="2" <?php echo $cek_1;?> onClick="Calculatedp();">Sedikit Bantuan</br>
<input name="dp05" type="radio" value="5" <?php echo $cek_2;?> onClick="Calculatedp();">Perlu Bantuan</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Aktifitas</td>
<td bgcolor="#FFFFFF">
<input name="dp06" type="radio" value="1" <?php echo $cek_0;?> onClick="Calculatedp();">Tidak Perlu bantuan</br>
<input name="dp06" type="radio" value="2" <?php echo $cek_1;?> onClick="Calculatedp();">Sedikit Bantuan</br>
<input name="dp06" type="radio" value="10" <?php echo $cek_2;?> onClick="Calculatedp();">Perlu Bantuan</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi</td>
<td bgcolor="#FFFFFF">
<input name="dp07" type="radio" value="1" <?php echo $cek_0;?> onClick="Calculatedp();">Mandiri</br>
<input name="dp07" type="radio" value="2" <?php echo $cek_1;?> onClick="Calculatedp();">Perlu  pendamping</br>
<input name="dp07" type="radio" value="3" <?php echo $cek_2;?> onClick="Calculatedp();">Perlu bantuan peralatan</br>
<input name="dp07" type="radio" value="4" <?php echo $cek_3;?> onClick="Calculatedp();">Perlu bantuan peralatan dan pendamping</br>
<input name="dp07" type="radio" value="5" <?php echo $cek_4;?> onClick="Calculatedp();">Terbaring</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan ketergantungan penuh dengan peralatan medis</td>
<td bgcolor="#FFFFFF">
<input name="dp08" type="radio" value="5" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp08" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan pendamping dalam perjalanan penyakitnya</td>
<td bgcolor="#FFFFFF">
<input name="dp09" type="radio" value="10" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp09" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan perawatan minimal di rumah</td>
<td bgcolor="#FFFFFF">
<input name="dp10" type="radio" value="2" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp10" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan arahan untuk masalah sosial, keluarga , masalah keuangan</td>
<td bgcolor="#FFFFFF">
<input name="dp11" type="radio" value="5" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp11" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan arahan perawatan langsung</td>
<td bgcolor="#FFFFFF">
<input name="dp12" type="radio" value="2" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp12" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Memerlukan Rehabilitasi Medis</td>
<td bgcolor="#FFFFFF">
<input name="dp13" type="radio" value="2" <?php echo $cek_0;?> onClick="Calculatedp();">Ya</br>
<input name="dp13" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatedp();">Tidak</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Akomodasi lain</td>
<td bgcolor="#FFFFFF">
<input name="dp14" type="radio" value="1" <?php echo $cek_0;?> onClick="Calculatedp();">Tidak memerlukan</br>
<input name="dp14" type="radio" value="5" <?php echo $cek_1;?> onClick="Calculatedp();">Memerlukan selama di RS, komunitas RS</br>
<input name="dp14" type="radio" value="10" <?php echo $cek_2;?> onClick="Calculatedp();">Memerlukan untuk di rumah secara berkala</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Total Skor </td>
  <td bgcolor="#FFFFFF"><input type="text" name="dptotal" size="24" /></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Keterangan</td>
  <td bgcolor="#FFFFFF"><textarea name="Probability" cols="40" rows="3" ></textarea></td>
</tr>
<tr>
    <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>