<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
include "../librari/inc.kodeauto.php";
?>
<html>
<head>
    <script src="<?php echo $url;?>media/kalendar/js/jscal2.js"></script>
    <script src="<?php echo $url;?>media/kalendar/js/lang/en.js"></script>
	<SCRIPT language=javascript id=clientEventHandlersJS>
<!--
function form1_onsubmit() 
{   
       if (document.form1.nama_asuransi.value =="")
       {
	   alert("Anda belum mengisi kolom NAMA!")
       return false;
	   }
	   if (document.form1.alamat1.value =="")
       {
	   alert("Anda belum mengisi kolom ALAMAT!")
       return false;
	   }
	   if (document.form1.telp.value =="")
       {
	   alert("Anda belum mengisi kolom No Telp!")
       return false;
	   }
}
//-->
</SCRIPT>

<title>PENDAFTARAN PASIEN BARU</title></head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="asuransi_sim.php"  onsubmit="return form1_onsubmit()" >
<tr bgcolor="#CCCCCC">
    <td colspan="4" align="left"><strong>DATA ASURANSI </strong><b></b></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td width="20%">Nama Asuransi*</td>
    <td width="30%"><input name="nama_asuransi" type="text" id="nama_asuransi">      </td>
    <td width="20%">Telpon*</td>
    <td width="30%"><input name="telp" type="text" id="telp"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Alamat 1* </td>
    <td><input name="alamat1" type="text" id="alamat1"></td>
    <td>Fax</td>
    <td><input name="fax" type="text" id="fax"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Alamat 2 </td>
    <td><input name="alamat2" type="text" id="alamat2"></td>
    <td>Email</td>
    <td><input name="email" type="text" id="email"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" align="left">Diskon/Mark up </td>
    <td colspan="3" align="left" bgcolor="#FFFFFF"><input name="charge" type="text" id="charge"  maxlength="4" size="3">
      %</td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF" colspan="4" align="left"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>
