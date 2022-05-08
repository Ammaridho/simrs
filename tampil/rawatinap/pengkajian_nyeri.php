<?php
session_start();
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_error());
   $data=mysqli_fetch_array($qry);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PENGKAJIAN NYERI</title>
<script>
            function validasi(){
				var nyeri5 = document.getElementById('nyeri5');
				  if (harusDiisi(nyeri5, "nyeri5 belum diisi")) {
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

var radio_val1 = check_radio(form1.nyeri1);
   var radio_val3 = check_radio(form1.nyeri3);
   var radio_val4 = check_radio(form1.nyeri4);
   var radio_val6 = check_radio(form1.nyeri6);
   var radio_val7 = check_radio(form1.nyeri7);
   var radio_val8 = check_radio(form1.nyeri8);
   var radio_val9 = check_radio(form1.nyeri9);
   var radio_val0 = check_radio(form1.nyeri10);
   if (radio_val1 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Faktor pencetus... belum diisi!");
      return false;
    }
   if (radio_val3 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Kualitas nyeri... belum diisi!");
      return false;
    }
	if (radio_val4 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Penyebaran nyeri... belum diisi!");
      return false;
    }
	if (radio_val6 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Kapan nyeri menyerang... belum diisi!");
      return false;
    }
	if (radio_val7 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Pernah mengalami nyeri yang sama... belum diisi!?");
      return false;
    }
	if (radio_val8 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Lokasi nyeri yang dialami... belum diisi!");
      return false;
    }
		if (radio_val9 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Ketergantungan obat nyeri... belum diisi!");
      return false;
    }
		if (radio_val10 === false)
    {
      alert("Belum lengkap <?php echo $_SESSION[nama]; ?>, Reaksi yang tidak diharapkan... belum diisi!");
      return false;
    }
   return (true);
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="pengkajian_nyeri_sim.php" onSubmit="return validasi()">
  <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3"  colspan="2"width="78%"><B>PENGKAJIAN NYERI</B> </td>
    </tr>
    
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><strong>A.</strong><strong>&nbsp;&nbsp;&nbsp; </strong><strong>Pengkajian Nyeri:</strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="82" colspan="2">1. Faktor  Pencetus/Penyebab, apa yang membuat nyeri terasa semakin hebat: </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">
<input name="nyeri1" type="radio" value="Luka" />Luka<br>
<input name="nyeri1" type="radio" value="Luka operasi" />Luka operasi&nbsp;Luka<br>
<input name="nyeri1" type="radio" value="Patah Tulang" />Patah Tulang&nbsp;Luka<br>
<input name="nyeri1" type="radio" value="Kontraksi" />KontraksiLuka<br>
<input name="nyeri1" type="radio" value="Haematoma" />HaematomaLuka<br>
<input name="nyeri1" type="radio" value="Kolik" />Kolik<br>
<input name="nyeri1" type="radio" value="Lainnya" />Lainnya </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">2. Faktor yang meredakan nyeri, apa yang membuat nyeri berkurang:</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">
	  <input type="checkbox" name="nyeri2[]" value="Obat" id="Obat">Obat <br> 
<input type="checkbox" name="nyeri2[]" value="Massage" id="Massage">Massage <br>
<input type="checkbox" name="nyeri2[]" value="Posisi tidur nyaman" id="Posisi tidur nyaman">Posisi tidur nyaman<br />
<input type="checkbox" name="nyeri2[]" value="Kompres dingin dan panas" id="Kompres dingin dan panas" />
Kompres dingin dan panas<br />
<input type="checkbox" name="nyeri2[]" value="Relaksasi dan meditasi" id="Relaksasi dan meditasi" />
Relaksasi dan meditasi<br />
<input type="checkbox" name="nyeri2[]" value="Relaksasi dengan musik" id="Relaksasi dengan musik" />
Relaksasi dengan musik<br />
<input type="checkbox" name="nyeri2[]" value="Aromatherapy" id="Aromatherapy" />
Aromatherapy<br> 
<input type="checkbox" name="nyeri2[]" value="Tehnik distraksi" id="Tehnik distraksi">
Tehnik distraksi<br> 
<input type="checkbox" name="nyeri2[]" value="Lainnya" id="Lainnya">Lainnya&nbsp; <input name="nyeri12" type="text"/></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">3.&nbsp;&nbsp;&nbsp;&nbsp; Kualitas nyeri, seperti apa rasa nyerinya; seperti : </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri3" type="radio" value="Terbakar" />
        Terbakar <br />
        <input name="nyeri3" type="radio" value="Ditusuk-tusuk" />
        Ditusuk-tusuk&nbsp; <br />
        <input name="nyeri3" type="radio" value="Senut-senut" />
        Senut-senut <br />
        <input name="nyeri3" type="radio" value="Lainnya" />
        Lainnya&nbsp; <input name="nyeri13" type="Text"/> </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">4.&nbsp;&nbsp;&nbsp;&nbsp; Apakah menyebar ke area lain: </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri4" type="radio" value="Tidak" />
        Tidak&nbsp; <br />
        <input name="nyeri4" type="radio" value="Ya" />
      Ya, ke lokasi 
      <input name="nyeri14" type="text"/></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">5.&nbsp;&nbsp;&nbsp;&nbsp; Beratnya rasa nyeri </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><strong><em>Wong-Baker Faces  scale </em></strong>(Skala nyeri ini  berdasarkan ekspresi wajah, digunakan pada pasien anak-anak dan pasien yang  mengalami gangguan pendengaran. Gunakan Skema Nyeri</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><div align="center"><img src="../../media/image/wongbaker.png" width="572" height="137" /></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><strong><em>Verbal Numeric Rating Pain </em></strong>(Skala nyeri berdasarkan respon verbal dan numerik. Gunakan Skema Nyeri) </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2" align="center">Skala : 
        <input type="text" name="nyeri5" id="nyeri5" size="2"/></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">6. Kapan waktu nyeri menyerang:</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri6" type="radio" value="Terus Menerus " />
        Terus Menerus <br />
        <input name="nyeri6" type="radio" value="Hilang timbul" />
        Hilang timbul&nbsp; <br />
        <input name="nyeri6" type="radio" value="Kadang-Kadang" />
      Kadang-Kadang. </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><strong>B.</strong><strong>&nbsp;&nbsp;&nbsp; </strong><strong>Riwayat Nyeri</strong></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">1.&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Pernah mengalami nyeri yang sama sebelumnya: </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri7" type="radio" value="Tidak Pernah" />        
        Tidak Pernah <br />
        <input name="nyeri7" type="radio" value="Pernah" />
      Pernah; kapan&hellip; </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nyeri yang dialami, apakah lokasinya sama: </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri8" type="radio" value="Tidak" />
        Tidak&nbsp; <br />
        <input name="nyeri8" type="radio" value="Ya" />
      Ya </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">3.&nbsp;&nbsp; &nbsp;Ketergantungan  terhadap obat penghilang nyeri tertentu: </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri9" type="radio" value="Tidak" />
        Tidak&nbsp; <br />
        <input name="nyeri9" type="radio" value="Ya" />
      Ya, sebutkan 
      <input type="text" name="nyeri15" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2">4.&nbsp;&nbsp;&nbsp; Pernah  mengalami reaksi yang tidak diharapkan, setelah mendapatkan obat penghilang  rasa nyeri: </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="2"><input name="nyeri10" type="radio" value="Tidak" />
        Tidak&nbsp; <br />
        <input name="nyeri10" type="radio" value="Ya" />
      Ya, reaksinya :&nbsp;
	  <input type="checkbox" name="nyeri11[]" value="Gatal-gatal" id="Gatal-gatal">Gatal-gatal 
	  <input type="checkbox" name="nyeri11[]" value="Sesak" id="Sesak">Sesak
	  <input type="checkbox" name="nyeri11[]" value="Pingsan" id="Pingsan">Pingsan
	  <input type="checkbox" name="nyeri11[]" value="Berdebar" id="Berdebar">Berdebar
	  <input type="checkbox" name="nyeri11[]" value="Sembelit" id="Sembelit">Sembelit
      Lainnya 
      <input type="text" name="nyeri11[]" /></td>
    </tr>
    <tr bgcolor="#D9E8F3">
      <td colspan="2"><input type="submit" name="Submit" value="Simpan" /></td>
    </tr>
  </table>
</form>
</body>
</html>
