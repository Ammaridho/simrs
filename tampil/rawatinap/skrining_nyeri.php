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

<script src="<?php echo $url;?>media/kalendar/js/jscal2.js"></script>
    <script src="<?php echo $url;?>media/kalendar/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/steel/steel.css" />
	<script type="text/javascript">
//Create an array
  var allPageTags = new Array();

  function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
    var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
    for (var i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
      if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
        allPageTags[i].style.display='none';
      }
    }
  }

function Show(ids) {
  doSomethingWithClasses('RBtnTab');

  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'none'; }
}
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

   var radio_val = check_radio(form1.skrining);
   if (radio_val === false)
    {
      alert("Skrining belum diisi!");
      return false;
    }
	
   return (true);
}
</script>
<title>KELENGKAPAN SKRINING NYERI</title>
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

div.RBtnTab { display:none}
-->
</style>
</head>
<body id="tab10">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="2" bgcolor="#D9E8F3">KELENGKAPAN SKRINING NYERI </td>
    </tr>
<form name="form1" method="post" action="skrining_nyeri_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onSubmit="return validasi()">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tracer" type="hidden" value="<?php echo $_SESSION['username'];?>"/>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td width="52%">Tanggal skrining </td>
      <td width="48%"><input name="tanggal_masuk" type="text" id="tanggal_masuk" size="10" value="<?php echo $data['tgl_masuk'] ;?>"><image id="f_btn1" src="<?php echo $url;?>media/kalendar/calendar.jpg" width="16" height="15" border="0"></image>
      <script type="text/javascript">//<![CDATA[
      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn1", "tanggal_masuk", "%Y-%m-%d");
     //]]></script></td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>NIK Perawat yang mengkaji </td>
      <td><input name="nik" type="text" id="nik" size="10"></td>
    </tr>
    
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Skrining</td>
      <td><input type="radio" name='skrining' value='Tidak' onClick="Show('DIV1')">Tidak
        <input type="radio" name='skrining' value='Ya' onClick="Show('DIV2')">Ya
        <div id='DIV2' class="RBtnTab"><hr>
        <input type="radio" name='hasil' value='Tidak dilakukan' checked="checked">
        Tidak dilakukan
        <input name='hasil' type="radio" value='Tidak nyeri'>
        Tidak nyeri
        <input type="radio" name='hasil' value='Nyeri'>Nyeri</td></tr>  
<tr> 
    <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>

