<?php
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Edit Diagnosa</title>
</head>
<body>
<form action="staff_sim.php" method="post" name="form1" target="_self" enctype="multipart/form-data">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Tambah Database Staff</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">NIK</td>
  <td width="67%">
	<input name="nik" type="text" size="10" maxlength="20">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Staff</td>
  <td><input name="nama" type="text" size="40" maxlength="200">
  </td>
</tr>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Departemen</td>
  <td align="left"><select name="unit" id="unit">
      <?php 
        if ($data['unit']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data['unit']=="MSD") echo "<option value='MSD' selected>MSD</option>";
        else echo "<option value='MSD'>MSD</option>";
        if ($data['unit']=="NCD") echo "<option value='NCD' selected>NCD</option>";
        else echo "<option value='NCD'>NCD</option>";
	  if ($data['unit']=="Spesialis") echo "<option value='Spesialis' selected>Spesialis</option>";
        else echo "<option value='Spesialis'>Spesialis</option>";
        ?>
    </select></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Photo Profil</td>
  <td><input type=file name='userfile' size=40> * Tipe gambar harus JPG/JPEG
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
