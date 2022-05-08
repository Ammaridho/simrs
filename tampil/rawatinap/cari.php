<?php 
include "tab_ranap.php";
?>
<html>
<head>
<script src="../src/js/jscal2.js"></script>
    <script src="../src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/steel/steel.css" />
<title>Daftar Pasien</title></head>
<body id="tab2">
<form method="post" action="cari_hasil.php">
  <table align="center" width="100%" bgcolor="#FFFFFF">
  <tr>
    <td width="20%" bgcolor="#FFFFFF">Pilih Ruangan</td>
  <td width="80%" bgcolor="#FFFFFF">:
      <select name="kd_unit" id="kd_unit">
        <option value="">Semua kd_unit</option>
        <option value="UPI">UPI</option>
      <option value="Shorea">Shorea</option>
	<option value="Pinus">Pinus</option>
	<option value="Cantleya">Cantleya</option>
	<option value="Eucaliptus">Eucaliptus</option>
	<option value="Acacia">Acacia</option>
      </select> <input align="center" type="submit" name="submit" value="Search"></td>
  </tr>
</table>
</form>
</body>
</html>


