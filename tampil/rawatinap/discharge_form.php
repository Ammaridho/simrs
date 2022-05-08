<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
include "header.php";
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
  <script src="../src/js/jscal2.js"></script>
    <script src="../src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/steel/steel.css" />
<script type="text/javascript">
    targetElement = null;
    function makeSelection(form1, id) {
      if(!form1 || !id)
        return;
      targetElement = form1.elements[id];
      var handle = window.open('template.php','Fullscreen', 'width=400, height=300, resizable=no, scrollbars=no');
    }
    </script>
<script type="text/javascript">
 function count()
  {
   document.form1.counter.value = document.form1.template.value.length;
  }
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
<title>Rencana ADL</title>
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
      <td colspan="6" bgcolor="#D9E8F3">Perencanaan pulang</td>
    </tr>
<form name="form1" method="post" action="discharge_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_adl" type="hidden" value="<?php echo kdauto("adl","ADL"); ?>">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Diagnosa keluar</td>
      <td><input name="diagnosa_keluar" type="text" id="diagnosa_keluar" value="<?php echo $data['diagnosa_keluar'];?>">
	</td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Tanggal/jam pulang</td>
      <td><input name="tgl_keluar" type="text" id="tgl_keluar" size="10" value="<?php echo "".date('Y-m-d') ;?>"> /
 	<input name="jam_keluar" type="text" id="jam_keluar" size="6" value="<?php echo "".date('H:i') ;?>"> WIB
	</td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Status pulang</td>
      <td><select name="status" id="status">
        <option value="Sembuh">Sembuh</option>
        <option value="Perbaikan">Perbaikan</option>
	<option value="Pulang APS">Pulang APS</option>
	<option value="Pindah ruang">Pindah ruang</option>
	<option value="Rujuk">Rujuk</option>
	<option value="Meninggal < 24 jam">Meninggal < 24 jam</option>
	<option value="Meninggal > 24 jam">Meninggal > 24 jam</option>
    </select>
      </td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Pesanan pulang</td>
      <td><textarea cols="80" rows="6" maxlength="160" name="template" onKeyUp="count()"></textarea></br>
          <input type="text" readonly name="counter" size="3" value="0" />
          <input type="button" size="3" value="Template" onClick="makeSelection(this.form, 'template');"/>
    </td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>SMS follow up</td>
      <td><input type="radio" name='sms' value='Tidak' onClick="Show('DIV1')">Tidak
	  <input type="radio" name='sms' value='Ya' onClick="Show('DIV2')">Ya
	  <div id='DIV2' class="RBtnTab">Tanggal/jam kirim <input name="tgl_kirim" type="text" id="tgl_kirim" size="10">
<image id="f_btn2" src="../data/calendar.jpg" width="16" height="15" border="0"></image>
		<script type="text/javascript">//<![CDATA[

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn2", "tgl_kirim", "%Y-%m-%d");
     //]]></script> / 
<input name="jam_kirim" type="text" id="jam_kirim" size="6" value="00:00" onblur="if(this.value=='') this.value='00:00';" onfocus="if(this.value=='00:00') this.value='';">
</div>
      </td>
    </tr>  
<tr> 
    <td colspan="6" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
</table>
</body>
</html>

