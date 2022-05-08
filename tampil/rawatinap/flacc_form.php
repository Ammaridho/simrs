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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>FLACC</title>
<script language="JavaScript">

function Calculateflacc() {
with (document.flaccskor){
Score = 0.0;
Probability.value= "";

if (flacc01[0].checked){
Score = Score + 0;
}
if (flacc01[1].checked){
Score = Score + 1;
}
if (flacc01[2].checked){
Score = Score + 2;
}

if (flacc02[0].checked){
Score = Score + 0;
}
if (flacc02[1].checked){
Score = Score + 1;
}
if (flacc02[2].checked){
Score = Score + 2;
}

if (flacc03[0].checked){
Score = Score + 0;
}
if (flacc03[1].checked){
Score = Score + 1;
}
if (flacc03[2].checked){
Score = Score + 2;
}

if (flacc04[0].checked){
Score = Score + 0;
}
if (flacc04[1].checked){
Score = Score + 1;
}
if (flacc04[2].checked){
Score = Score + 2;
}

if (flacc05[0].checked){
Score = Score + 0;
}
if (flacc05[1].checked){
Score = Score + 1;
}
if (flacc05[2].checked){
Score = Score + 2;
}

flacctotal.value = Score;

if (Score==0){
Probability.value= "Tidak nyeri";
}
if (Score>=1 && Score<=3){
Probability.value= "Nyeri ringan";
}
if (Score>=4 && Score<=6){
Probability.value= "Nyeri Sedang";
}
if (Score>=7){
Probability.value= "Nyeri Berat";
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

   var radio_val1 = check_radio(flaccskor.flacc01);
   var radio_val2 = check_radio(flaccskor.flacc02);
   var radio_val3 = check_radio(flaccskor.flacc03);
   var radio_val4 = check_radio(flaccskor.flacc04);
   var radio_val5 = check_radio(flaccskor.flacc05);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Face/muka belum dipilih !");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Leg/kaki belum dipilih !");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Aktivity/aktivitas belum dipilih !");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Cry/menangis belum dipilih !");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Consolability/Respon tubuh belum dipilih !");
      return false;
    }
   return (true);
}
</script>
</head>

<body>
  <table align="center" width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="flaccskor" method="post" action="flacc_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
  <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
  <tr>
    <td width="4%" height="48" bgcolor="#D9E8F3"><p align="center"><strong>&nbsp;</strong> </td>
    <td width="196" bgcolor="#D9E8F3"><p align="center"><strong>KATEGORI</strong> </td>
    <td width="241" bgcolor="#D9E8F3"><p align="center"><strong>0</strong> </td>
    <td width="193" bgcolor="#D9E8F3"><p align="center"><strong>1</strong> </td>
    <td width="207" bgcolor="#D9E8F3"><p align="center"><strong>2</strong> </td>
  </tr>
  <tr>
    <td width="4%" height="48" bgcolor="#FFFFFF"><p align="center"><strong>F</strong> </td>
    <td width="196" valign="top" bgcolor="#FFFFFF">Face / Muka</td>
    <td width="241" valign="top" bgcolor="#FFFFFF"><input name="flacc01" type="radio" value="0" <?php echo $cek_0;?> onclick="Calculateflacc();" />
    Tidak ada    ekspresi/senyum</td>
    <td width="193" valign="top" bgcolor="#FFFFFF"><input name="flacc01" type="radio" value="1" <?php echo $cek_1;?> onclick="Calculateflacc();" />
    Sesekali    meringis</td>
    <td width="207" valign="top" bgcolor="#FFFFFF"><input name="flacc01" type="radio" value="2" <?php echo $cek_2;?> onclick="Calculateflacc();" />
    Mengatupkan    rahang<br/> (seperti marah)</td>
  </tr>
  <tr>
    <td width="4%" height="48" valign="top" bgcolor="#FFFFFF"><p align="center"><strong>L</strong> </td>
    <td width="196" valign="top" bgcolor="#FFFFFF">Legs / Kaki</td>
    <td width="241" valign="top" bgcolor="#FFFFFF"><input name="flacc02" type="radio" value="0" <?php echo $cek_0;?> onclick="Calculateflacc();" />
    Posisi    normal atau tenang dan rileks</td>
    <td width="193" valign="top" bgcolor="#FFFFFF"><input name="flacc02" type="radio" value="1" <?php echo $cek_1;?> onclick="Calculateflacc();" />
    Tidak    nyaman / tidak dapat istirahat</td>
    <td width="207" valign="top" bgcolor="#FFFFFF"><input name="flacc02" type="radio" value="2" <?php echo $cek_2;?> onclick="Calculateflacc();" />
    Menendang,    kaki diangkat keatas, sengaja tidak bergerak</td>
  </tr>
  <tr>
    <td width="4%" height="48" valign="top" bgcolor="#FFFFFF"><p align="center"><strong>A</strong> </td>
    <td width="196" valign="top" bgcolor="#FFFFFF">Activity /    Aktivitas</td>
    <td width="241" valign="top" bgcolor="#FFFFFF"><input name="flacc03" type="radio" value="0" <?php echo $cek_0;?> onclick="Calculateflacc();" />
    Mudah    berbaring dengan tenang</td>
    <td width="193" valign="top" bgcolor="#FFFFFF"><input name="flacc03" type="radio" value="1" <?php echo $cek_1;?> onclick="Calculateflacc();" />
    Menggeliat,    tegang</td>
    <td width="207" valign="top" bgcolor="#FFFFFF"><input name="flacc03" type="radio" value="2" <?php echo $cek_2;?> onclick="Calculateflacc();" />
    Badan    terlihat kaku</td>
  </tr>
  <tr>
    <td width="4%" valign="top" bgcolor="#FFFFFF"><p align="center"><strong>C</strong> </td>
    <td width="196" valign="top" bgcolor="#FFFFFF">Cry /    Menangis</td>
    <td width="241" valign="top" bgcolor="#FFFFFF"><input name="flacc04" type="radio" value="0" <?php echo $cek_0;?> onclick="Calculateflacc();" />
    Tidak    menangis (bangun atau tidur)</td>
    <td width="193" valign="top" bgcolor="#FFFFFF"><input name="flacc04" type="radio" value="1" <?php echo $cek_1;?> onclick="Calculateflacc();" />
    Mengerang/merintih</td>
    <td width="207" valign="top" bgcolor="#FFFFFF"><input name="flacc04" type="radio" value="2" <?php echo $cek_2;?> onclick="Calculateflacc();" />
    Menangis/merintih    terus sampai dengan menjerit</td>
  </tr>
  <tr>
    <td height="48" valign="top" bgcolor="#FFFFFF" align="center"><strong>C</strong></td>
    <td valign="top" bgcolor="#FFFFFF">Consolability    /Respon tubuh</td>
    <td valign="top" bgcolor="#FFFFFF"><input name="flacc05" type="radio" value="0" <?php echo $cek_0;?> onclick="Calculateflacc();" />
    Santai</td>
    <td valign="top" bgcolor="#FFFFFF"><input name="flacc05" type="radio" value="1" <?php echo $cek_1;?> onclick="Calculateflacc();" />
Mudah    terangsang dengan sentuhan</td>
    <td valign="top" bgcolor="#FFFFFF"><input name="flacc05" type="radio" value="2" <?php echo $cek_2;?> onclick="Calculateflacc();" />
Mudah    terangsang tanpa sentuhan</td>
  </tr>
  <tr>
    <td height="25" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">Total Skor </td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><input type="text" name="flacctotal" size="4" /></td>
  </tr>
  <tr>
    <td height="26" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">Kategori</td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><input type="text" name="Probability" cols="60" rows="3"></td>
  </tr>
  <tr>
    <td width="4%" height="23" valign="top" bgcolor="#FFFFFF"><p align="center"></td>
    <td colspan="4" valign="top" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Simpan" /></td>
    </tr>
  </form>
</table>
</body>
</html>
