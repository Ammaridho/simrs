<?php
include "inc.session.php";
?>
<html>
<head>
<script src="../src/js/jscal2.js"></script>
    <script src="../src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/steel/steel.css" />
<title>Laporan pemakaian alat</title></head>
<body>
<form method="post" action="prosescari_alat.php">
  <table align="center" width="100%" bgcolor="#CCCCCC">
  
  <tr>
    <td colspan="2" bgcolor="#CCCCCC">Laporan Pemakaian Alat</td>
    </tr>
  <tr>
    <td width="20%" bgcolor="#FFFFFF">Shift</td>
  <td width="80%" bgcolor="#FFFFFF">
      <select name="namaFile" id="namaFile">
        <option value="">24 Jam</option>
        <option value="Pagi">Pagi</option>
        <option value="Malam A">Malam A</option>
	<option value="Malam B">Malam B</option> 
      </select>    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">Tanggal</td>
    <td bgcolor="#FFFFFF">
      <input name="bydate1" type="text" id="bydate1" size="8">
    	<image id="f_btn1" src="calendar.jpg" width="16" height="15" border="0"></image>
		<script type="text/javascript">//<![CDATA[

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn1", "bydate1", "%Y-%m-%d");
     //]]></script> 
		sd	
		<input name="bydate2" type="text" id="bydate2" size="8">
		<image id="f_btn2" src="calendar.jpg" width="16" height="15" border="0"></image>
		<script type="text/javascript">//<![CDATA[

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn2", "bydate2", "%Y-%m-%d");
     //]]></script> </td>
  </tr>
  

  <tr>

    <td colspan="2" bgcolor="#FFFFFF">

      <div align="left">

        <input align="center" type="submit" name="submit" value="Search">
        </div></td></tr>  
</table>

</form>
</body>
</html>