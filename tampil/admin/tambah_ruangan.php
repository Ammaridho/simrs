<?php
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
?>
<html>
<head>
<title>Tambah Ruangan</title>
</head>
<body>
<form action="ruangan_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="7" scope="col">TAMBAH RUANGAN</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Lantai</td>
  <td width="67%">
	<select name="kd_lantai" id="kd_lantai">
  <option value="1">Lantai 1</option>
  <option value="2">Lantai 2</option>
</select>  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Nama Ruangan</td>
  <td width="40%">
	<input name="ruang" type="text" size="50" maxlength="80">  </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td>Kamar</td>
  <td><input name="kamar" type="text" size="50" maxlength="80"></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Kelas</td>
  <td><input name="kelas" type="text" size="50" maxlength="80"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td>Nomor Bed</td>
  <td><input name="bed" type="text" size="50" maxlength="80"></td>
</tr bgcolor="#FFFFFF">
  <td>Harga</td>
  <td><input name="harga" type="text" size="50" maxlength="80"></td>
</tr bgcolor="#FFFFFF">
  <td>Keterangan</td>
  <td><input name="keterangan" type="text" size="50" maxlength="80"></td>
</tr>
<tr> 
  <td colspan="2"> 
	<input name="Submit" type="submit" value="Tambah">  </td>
  </tr>
</table>
</form>
</body>
</html>
