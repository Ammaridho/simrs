<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_connect_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>HUMPTY DUMPTY</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script language="JavaScript">

function Calculatehumpty() {
with (document.humptyskor){
Score = 0.0;
Probability.value= "";

if (humpty01[0].checked){
Score = Score + 4;
}
if (humpty01[1].checked){
Score = Score + 3;
}
if (humpty01[2].checked){
Score = Score + 2;
}
if (humpty01[3].checked){
Score = Score + 1;
}

if (humpty02[0].checked){
Score = Score + 2;
}
if (humpty02[1].checked){
Score = Score + 1;
}

if (humpty03[0].checked){
Score = Score + 4;
}
if (humpty03[1].checked){
Score = Score + 3;
}
if (humpty03[2].checked){
Score = Score + 2;
}
if (humpty03[3].checked){
Score = Score + 1;
}

if (humpty04[0].checked){
Score = Score + 3;
}
if (humpty04[1].checked){
Score = Score + 2;
}
if (humpty04[2].checked){
Score = Score + 1;
}

if (humpty05[0].checked){
Score = Score + 4;
}
if (humpty05[1].checked){
Score = Score + 3;
}
if (humpty05[2].checked){
Score = Score + 2;
}
if (humpty05[3].checked){
Score = Score + 1;
}

if (humpty06[0].checked){
Score = Score + 3;
}
if (humpty06[1].checked){
Score = Score + 2;
}
if (humpty06[2].checked){
Score = Score + 1;
}

if (humpty07[0].checked){
Score = Score + 3;
}
if (humpty07[1].checked){
Score = Score + 2;
}
if (humpty07[2].checked){
Score = Score + 1;
}

humptytotal.value = Score;

if (Score<=12){
Probability.value= "Risiko rendah";
}
if (Score>12){
Probability.value= "Risiko tinggi";
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

   var radio_val1 = check_radio(humptyskor.humpty01);
   var radio_val2 = check_radio(humptyskor.humpty02);
   var radio_val3 = check_radio(humptyskor.humpty03);
   var radio_val4 = check_radio(humptyskor.humpty04);
   var radio_val5 = check_radio(humptyskor.humpty05);
   var radio_val6 = check_radio(humptyskor.humpty06);
   var radio_val7 = check_radio(humptyskor.humpty07);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Usia... belum diisi!");
      return false;
    }
	   if (radio_val2 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Jenis kelamin... belum diisi!");
      return false;
    }
		   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Diagnosis... belum diisi!");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Gangguan kognitif... belum diisi!");
      return false;
    }
	if (radio_val5 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Faktor lingkungan... belum diisi!");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Respon terhadap anestesi/sedasi... belum diisi!");
      return false;
    }
	if (radio_val7 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Respon terhadap medikamentosa... belum diisi!?");
      return false;
    }
   return (true);
}
</script>
</head>
<body>
<p align="center"><strong>
SKALA RISIKO JATUH HUMPTY DUMPTY UNTUK PEDIATRI
  </strong>
  <table align="center" width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="humptyskor" method="post" action="humpty_sim.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" onSubmit="return validasi()">
  	<input name="kd_kunjungan" type="hidden" value="<?php echo $_REQUEST['kd_kunjungan'];?>"/>
	<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
	<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['nama'];?>">
    <tr bgcolor="#D9E8F3">
      <td width="223" valign="top"><p align="center"><strong>PARAMETER</strong></p></td>
      <td width="912" valign="top"><p align="center"><strong>KRITERIA</strong></p></td>
      <td width="48" valign="top"><p align="center"><strong>NILAI</strong></p></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="223" valign="top"><p><strong>Usia</strong></p></td>
      <td width="912" valign="top">
        <input name="humpty01" type="radio" value="4"  onClick="Calculatehumpty();"/>&lt; 3 tahun<br/>
        <input name="humpty01" type="radio" value="3"  onClick="Calculatehumpty();"/>3 &ndash; 7 tahun<br/>
        <input name="humpty01" type="radio" value="2"  onClick="Calculatehumpty();"/>7 &ndash; 13 tahun<br/>
        <input name="humpty01" type="radio" value="1"  onClick="Calculatehumpty();"/>&ge; 13 tahun      </td>
      <td width="48" valign="top"><p align="center">4<br>
        3<br>
        2<br>
        1</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="223" valign="top"><p><strong>Jenis kelamin</strong></p></td>
      <td width="912" valign="top">
        
          <input name="humpty02" type="radio" value="2"  onClick="Calculatehumpty();"/>
          Laki-laki
        <br/>
          <input name="humpty02" type="radio" value="1"  onClick="Calculatehumpty();"/>
          Perempuan      </td>
      <td width="48" valign="top"><p align="center">2<br>
      1</p></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="223" valign="top"><p><strong>Diagnosis</strong></p></td>
      <td width="912" valign="top">
        
          <input name="humpty03" type="radio" value="4"  onClick="Calculatehumpty();"/>
          Diagnosis neurologi
        <br/>
          <input name="humpty03" type="radio" value="3"  onClick="Calculatehumpty();"/>
          Perubahan oksigenasi (diagnosis        respiratorik, dehidrasi, anemia, anoreksia, sinkop, pusing, dsb)
        <br/>
          <input name="humpty03" type="radio" value="2"  onClick="Calculatehumpty();"/>
          Gangguan perilaku / psikiatri
        <br/>
          <input name="humpty03" type="radio" value="1"  onClick="Calculatehumpty();"/>
          Diagnosis lainnya      </td>
      <td width="48" valign="top"><p align="center">4<br>
        3<br />2<br>
      1</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="223" valign="top"><p><strong>Gangguan kognitif</strong></p></td>
      <td width="912" valign="top">
        
          <input name="humpty04" type="radio" value="3" onClick="Calculatehumpty();" />
          Tidak menyadari keterbatasan dirinya
        <br/>
          <input name="humpty04" type="radio" value="2"  onClick="Calculatehumpty();"/>
          Lupa akan adanya keterbatasan
        <br/>
          <input name="humpty04" type="radio" value="1" onClick="Calculatehumpty();" />
          Orientasi baik terhadap diri        sendiri      </td>
      <td width="48" valign="top"><p align="center">3<br>
        2<br>
      1</p></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="223" valign="top"><p><strong>Faktor lingkungan</strong></p></td>
      <td width="912" valign="top">
        
          <input name="humpty05" type="radio" value="4" onClick="Calculatehumpty();" />
          Riwayat jatuh / bayi diletakkan        di tempat tidur dewasa
        <br/>
          <input name="humpty05" type="radio" value="3" onClick="Calculatehumpty();" />
          Pasien menggunakan alat        bantu&nbsp; / bayi diletakkan dalam&nbsp; tempat tidur bayi / perabot rumah
        <br/>
          <input name="humpty05" type="radio" value="2"  onClick="Calculatehumpty();"/>
          Pasien diletakkan di tempat        tidur
        <br/>
          <input name="humpty05" type="radio" value="1" onClick="Calculatehumpty();" />
          Area di luar rumah sakit      </td>
      <td width="48" valign="top"><p align="center">4<br>
        3<br>
        2<br>
      1</p></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="223" valign="top"><strong>Respons terhadap:
          </strong><br/>
            Pembedahan/ sedasi / anestesi
          
        <p>&nbsp;</p>
        <p>Penggunaan medikamentosa </p></td>
      <td width="912" valign="top">
        <br/>
          <input name="humpty06" type="radio" value="3"  onClick="Calculatehumpty();"/>
          Dalam 24 jam
        <br/>
          <input name="humpty06" type="radio" value="2"  onClick="Calculatehumpty();"/>
          Dalam 48 jam
        <br/>
          <input name="humpty06" type="radio" value="1"  onClick="Calculatehumpty();"/>
          &gt; 48 jam atau tidak menjalani        pembedahan/sedasi/anestesi
      
          <p>
            <input name="humpty07" type="radio" value="3"  onClick="Calculatehumpty();"/>
          Penggunaan multipel: sedatif,        obat hipnosis, barbiturat, fenotiazin, antidepresan, pencahar, diuretik,        narkose
          <br/>
            <input name="humpty07" type="radio" value="2"  onClick="Calculatehumpty();"/>
          Penggunaan salah satu obat di        atas
          <br/>
            <input name="humpty07" type="radio" value="1"  onClick="Calculatehumpty();"/>
          Penggunaan medikasi lainnya /        tidak ada medikasi      </p>      </td>
      <td width="48" valign="top"><p align="center">3<br>
        2<br>
        1</p>
          <p>&nbsp;</p>
        <p align="center">3<br/>
        2<br>
      1</p></td>
    </tr>
	    <tr bgcolor="#FFFFFF">
	      <td valign="top">Total skor </td>
	      <td colspan="2" valign="top"><input type="text" name="humptytotal" size="4" /></td>
    </tr>
	    <tr bgcolor="#FFFFFF">
	      <td valign="top">Kategori</td>
	      <td colspan="2" valign="top"><input type="text" name="Probability" cols="60" rows="3" /></td>
    </tr>
	    <tr bgcolor="#D9E8F3">
      <td width="223" valign="top">&nbsp;</td>
      <td colspan="2" valign="top"><input type="submit" name="Submit" value="Simpan" /></td>
    </tr>
  </form>
</table>
</body>
</html>
