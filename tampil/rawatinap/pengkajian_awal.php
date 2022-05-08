<?php
session_start();
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
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
    <script src="<?php echo $url;?>media/kalendar/js/jscal2.js"></script>
    <script src="<?php echo $url;?>media/kalendar/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/steel/steel.css" />
	<script>
            function validasi(){
                var tanggal_kaji = document.getElementById('tanggal_kaji');
				var nik = document.getElementById('nik');
				var lengkap = document.getElementById('lengkap');

                if (harusDiisi(tanggal_kaji, "tanggal belum diisi")) {
				  if (harusDiisi(nik, "nik belum diisi")) {
                    if (harusDiisi(lengkap, "nama belum diisi")) {

                            return true;
                        };
                    };
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

   var radio_val = check_radio(form.lengkap);
   if (radio_val === false)
    {
      alert("Kelengkapan belum diisi!");
      return false;
    }
	
	  var mincar = 2;
  if (form.nik.value.length < mincar){
    alert("Panjang Username Minimal 2 Karater!");
    form.nik.focus();
    return (false);
  }

 pola_username=/^[a-zA-Z0-9\_\-]{2,100}$/;
   if (!pola_username.test(form.nik.value)){
      alert ('Username minimal 2 karakter dan hanya boleh Huruf atau Angka!');
      form.nik.focus();
      return false;
   }
   
   if (form.telp.value != ""){
  var x = (form.telp.value);
  var status = true;
  var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
  for (i=0; i<=x.length-1; i++)
  {
  if (x[i] in list) cek = true;
  else cek = false;
 status = status && cek;
  }
  if (status == false)
  {
  alert("Telp harus angka!");
  form.telp.focus();
  return false;
  }
  }
   
   return (true);
}
</script>
<title>KELENGKAPAN PENGKAJIAN AWAL</title>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="form" method="post" action="pengkajian_awal_sim.php" onSubmit="return validasi()">
  <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="username" type="hidden" id="username" value="<?php echo $_SESSION['username'] ;?>">
<tr bgcolor="#D9E8F3"> 
    <td colspan="2" align="left"><strong>KELENGKAPAN PENGKAJIAN AWAL </strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="28%">NIK Perawat yang mengkaji </td>
    <td width="72%"><input name="nik" type="text" id="nik" size="4">
      <input name="telp" type="text" id="telp" size="4"></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left">Tanggal Masuk </td>
    <td><input name="tanggal_masuk" type="text" id="tanggal_masuk" size="10" value="<?php echo $data['tgl_masuk'] ;?>"><image id="f_btn1" src="<?php echo $url;?>media/kalendar/calendar.jpg" width="16" height="15" border="0"></image>
      <script type="text/javascript">//<![CDATA[
      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn1", "tanggal_masuk", "%Y-%m-%d");
     //]]></script></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td>Tanggal Pengkajian </td>
    <td><input name="tanggal_kaji" type="text" id="tanggal_kaji" size="10"><image id="f_btn2" src="<?php echo $url;?>media/kalendar/calendar.jpg" width="16" height="15" border="0"></image>
      <script type="text/javascript">//<![CDATA[
      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn2", "tanggal_kaji", "%Y-%m-%d");
     //]]></script>	</td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td>Kelengkapan</td>
    <td><input name="lengkap" type="radio" value="Lengkap">
      Lengkap
        <input name="lengkap" type="radio" value="Tidak Lengkap">
     Tidak Lengkap </td>
    </tr>
  
<tr>
    <td bgcolor="#D9E8F3" colspan="2" align="left"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>
