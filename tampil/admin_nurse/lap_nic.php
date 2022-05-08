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
<title>Tampilan Data Gejala</title></head>
<body>
<form method="post" action="prosescari_nic.php">
  <table align="center" width="100%" bgcolor="#CCCCCC">
  
  <tr>
    <td colspan="2" bgcolor="#CCCCCC">Laporan Pj Shift</td>
    </tr>
  
  <tr>
    <td width="20%" bgcolor="#FFFFFF">Tanggal</td>
    <td width="80%" bgcolor="#FFFFFF">
      <input name="bydate1" type="text" id="bydate1" size="8">
    	<image id="f_btn1" src="calendar.jpg" width="16" height="15" border="0"></image>
		<script type="text/javascript">//<![CDATA[

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn1", "bydate1", "%Y-%m-%d");
     //]]></script>	</td>
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
