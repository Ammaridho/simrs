<?php
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
?>
<html>
<head>
<title>Edit Tindakan</title>
</head>
<body>
<form action="tindakan_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Tambah Tindakan</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode Tindakan</td>
  <td width="67%">
	<input name="kd_tindakan" type="text" size="22" maxlength="35" value="<?php echo kdauto("tindakandb","Tx"); ?>">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Tindakan</td>
  <td><input name="nama_tindakan" type="text" size="70" maxlength="200">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>&nbsp;</td>
  <td> 
	<input name="Submit" type="submit" value="Tambah">
  </td>
</tr>
</table>
</form>
</body>
</html>
