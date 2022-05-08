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
<title>NEONATAL INFANT PAIN SCORE</title>
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

function Calculatenips() {
with (document.nipsskor){
Score = 0.0;
Probability.value= "";

if (nips01[0].checked){
Score = Score + 0;
}
if (nips01[1].checked){
Score = Score + 1;
}


if (nips02[0].checked){
Score = Score + 0;
}
if (nips02[1].checked){
Score = Score + 1;
}
if (nips02[2].checked){
Score = Score + 2;
}

if (nips03[0].checked){
Score = Score + 0;
}
if (nips03[1].checked){
Score = Score + 1;
}

if (nips04[0].checked){
Score = Score + 0;
}
if (nips04[1].checked){
Score = Score + 1;
}

if (nips05[0].checked){
Score = Score + 0;
}
if (nips05[1].checked){
Score = Score + 1;
}

if (nips06[0].checked){
Score = Score + 0;
}
if (nips06[1].checked){
Score = Score + 1;
}

if (nips07[0].checked){
Score = Score + 0;
}
if (nips07[1].checked){
Score = Score + 1;
}
if (nips07[2].checked){
Score = Score + 2;
}

if (nips08[0].checked){
Score = Score + 0;
}
if (nips08[1].checked){
Score = Score + 1;
}

nipstotal.value = Score;

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

   var radio_val1 = check_radio(nipsskor.nips01);
   var radio_val2 = check_radio(nipsskor.nips02);
   var radio_val3 = check_radio(nipsskor.nips03);
   var radio_val4 = check_radio(nipsskor.nips04);
   var radio_val5 = check_radio(nipsskor.nips05);
   var radio_val6 = check_radio(nipsskor.nips06);
   var radio_val7 = check_radio(nipsskor.nips07);
   var radio_val8 = check_radio(nipsskor.nips08);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, ekspresinya mana?");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, bayinya menangis Nggak?");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, bagaimana napas bayinya?");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, gerak lengannya bagaimana?");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, gerak kakinya bagaimana?");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, keadaan rangsang masih kosong?");
      return false;
    }
	if (radio_val7 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, nadinya berapa?");
      return false;
    }
	if (radio_val8 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, nadinya berapa?");
      return false;
    }
   return (true);
}
</script>
</head>
<body id="tab8">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3"><strong>NEONATAL INFANT PAIN SCORE </strong></td>
    </tr>
<form name="nipsskor" method="post" action="nips_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#FFFFFF">
<td width="33%" valign="top" bgcolor="#FFFFFF">Ekspresi Wajah </td>
<td width="67%" bgcolor="#FFFFFF">
<input name="nips01" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
Santai</br>
<input name="nips01" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
Meringis</td>
</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF" valign="top">Menangis</td>
	  <td bgcolor="#FFFFFF">
<input name="nips02" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
Tidak Menangis </br>
<input name="nips02" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
Merintih</br>
<input name="nips02" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatenips();">
Menagis kuat </td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Pola bernapas </td>
<td bgcolor="#FFFFFF">
<input name="nips03" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
Santai
</br>
<input name="nips03" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
Perubahan pola napas </td>
    </tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Lengan</td>
<td bgcolor="#FFFFFF">
<input name="nips04" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
Santai </br>
<input name="nips04" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
Flexi/extensi</td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Kaki</td>
<td bgcolor="#FFFFFF">
<input name="nips05" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
Santai</br>
<input name="nips05" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
Flexi/extensi</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td bgcolor="#FFFFFF" valign="top">Keadaan rangsangan </td>
  <td bgcolor="#FFFFFF"><input name="nips06" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
    Tertidur/bangun<br/>
      <input name="nips06" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
      Rewel</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td bgcolor="#FFFFFF" valign="top">Nadi</td>
  <td bgcolor="#FFFFFF"><input name="nips07" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();"> 
    10% dari baseline</br>
<input name="nips07" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();"> 
11-20% dari baseline</br>
<input name="nips07" type="radio" value="2" <?php echo $cek_2;?> onClick="Calculatenips();"> 
&gt;20% dari baseline</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td bgcolor="#FFFFFF" valign="top">Saturasi oksigen </td>
  <td bgcolor="#FFFFFF"><input name="nips08" type="radio" value="0" <?php echo $cek_0;?> onClick="Calculatenips();">
    Tidak memerlukan oksigen tambahan 
    </br>
    <input name="nips08" type="radio" value="1" <?php echo $cek_1;?> onClick="Calculatenips();">
    Memerlukan oksigen tambahan </td>
</tr>
<tr bgcolor="#FFFFFF">
<td bgcolor="#FFFFFF" valign="top">Total Skor </td>
<td bgcolor="#FFFFFF"><input type="text" name="nipstotal" size="4" /></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF">Kategori</td>
  <td bgcolor="#FFFFFF"><input type="text" name="Probability" cols="60" rows="3" ></textarea></td>
</tr>
<tr> 
    <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Simpan">
[ Skala kurang dari 15, ditegakkan diagnosa keperawatan : Risiko gangguan integritas kulit ] </td>
  </tr>
   </form>
</table>
</body>
</html>
