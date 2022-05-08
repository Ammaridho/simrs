<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
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
<title>Skala Dekubitus Braden</title>
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

function Calculatebraden() {
with (document.bradenskor){
Score = 0.0;
Probability.value= "";

if (braden01[0].checked){
Score = Score + 1;
}
if (braden01[1].checked){
Score = Score + 2;
}
if (braden01[2].checked){
Score = Score + 3;
}
if (braden01[3].checked){
Score = Score + 4;
}
if (braden02[0].checked){
Score = Score + 1;
}
if (braden02[1].checked){
Score = Score + 2;
}
if (braden02[2].checked){
Score = Score + 3;
}
if (braden02[3].checked){
Score = Score + 4;
}
if (braden03[0].checked){
Score = Score + 1;
}
if (braden03[1].checked){
Score = Score + 2;
}
if (braden03[2].checked){
Score = Score + 3;
}
if (braden03[3].checked){
Score = Score + 4;
}
if (braden04[0].checked){
Score = Score + 1;
}
if (braden04[1].checked){
Score = Score + 2;
}
if (braden04[2].checked){
Score = Score + 3;
}
if (braden04[3].checked){
Score = Score + 4;
}
if (braden05[0].checked){
Score = Score + 1;
}
if (braden05[1].checked){
Score = Score + 2;
}
if (braden05[2].checked){
Score = Score + 3;
}
if (braden05[3].checked){
Score = Score + 4;
}
if (braden06[0].checked){
Score = Score + 1;
}
if (braden06[1].checked){
Score = Score + 2;
}
if (braden06[2].checked){
Score = Score + 3;
}

bradentotal.value = Score;

if (Score<15){
Probability.value= "Berisiko";
}
else{
Probability.value= "Kurang berisiko";
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

   var radio_val1 = check_radio(bradenskor.braden01);
   var radio_val2 = check_radio(bradenskor.braden02);
   var radio_val3 = check_radio(bradenskor.braden03);
   var radio_val4 = check_radio(bradenskor.braden04);
   var radio_val5 = check_radio(bradenskor.braden05);
   var radio_val6 = check_radio(bradenskor.braden06);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Persepsi sensori... belum diisi!");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Kelembaban... belum diisi!");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Aktifitas... belum diisi!");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Mobilisasi... belum diisi!");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Nutrisi... belum diisi!");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Pergesekan... belum diisi!");
      return false;
    }
   return (true);
}
</script>
</head>
<body id="tab8">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>Skala Dekubitus Braden</strong></td>
    </tr>
<form name="bradenskor" method="post" action="braden_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#FFFFFF">
<td width="33%" valign="top" bgcolor="#FFFFFF">Persepsi sensori</td>
<td width="67%" bgcolor="#FFFFFF">
<input name="braden01" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebraden();">Sangat terbatas</br>
<input name="braden01" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebraden();">Terbatas</br>
<input name="braden01" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebraden();">Sedikit terbatas</br>
<input name="braden01" type="radio" value="4" <?php echo $cek_4;?> onClick="Calculatebraden();">Normal</td>
</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF" valign="top">Kelembaban</td>
	<td bgcolor="#FFFFFF">
<input name="braden02" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebraden();">Selalu lembab</br>
<input name="braden02" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebraden();">Sering lembab</br>
<input name="braden02" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebraden();">Kadang-kadang lembab</br>
<input name="braden02" type="radio" value="4" <?php echo $cek_4;?> onClick="Calculatebraden();">Jarang lembab</td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Aktifitas</td>
<td bgcolor="#FFFFFF">
<input name="braden03" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebraden();">Di tempat tidur</br>
<input name="braden03" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebraden();">Terbatas di kursi atau kursi roda</br>
<input name="braden03" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebraden();">Kadang-kadang berjalan</br>
<input name="braden03" type="radio" value="4" <?php echo $cek_4;?> onClick="Calculatebraden();">Sering berjalan</br></td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Mobilisasi</td>
<td bgcolor="#FFFFFF">
<input name="braden04" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebraden();">Tergantung </br>
<input name="braden04" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebraden();">Sangat terbatas</br>
<input name="braden04" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebraden();">Sedikit terbatas</br>
<input name="braden04" type="radio" value="4" <?php echo $cek_4;?> onClick="Calculatebraden();">Tidak terbatas</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Nutrisi</td>
<td bgcolor="#FFFFFF">
<input name="braden05" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebraden();">Sangat buruk</br>
<input name="braden05" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebraden();">Tidak cukup</br>
<input name="braden05" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebraden();">Cukup</br>
<input name="braden05" type="radio" value="4" <?php echo $cek_4;?> onClick="Calculatebraden();">Sangat Baik</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td bgcolor="#FFFFFF" valign="top">Pergesekan</td>
  <td bgcolor="#FFFFFF"><input name="braden06" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatebraden();">
    Masalah</br>
      <input name="braden06" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatebraden();">
      Masalah potensial</br>
      <input name="braden06" type="radio" value="3" <?php echo $cek_3;?> onClick="Calculatebraden();">
      Tidak ada masalah nyata</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Total Skor </td>
<td bgcolor="#FFFFFF"><input type="text" name="bradentotal" size="24" /></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Keterangan</td>
  <td bgcolor="#FFFFFF"><textarea name="Probability" cols="60" rows="3" ></textarea></td>
</tr>
<tr> 
    <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Simpan">
[ Skala kurang dari 15, ditegakkan diagnosa keperawatan : Risiko gangguan integritas kulit ] </td>
  </tr>
   </form>
</table>
</body>
</html>
