<?php 
include "../librari/inc.koneksidb.php";

$kdubah = $_GET['kdubah'];
$sql = "SELECT * FROM nocdb,diagnosadb WHERE nocdb.kd_diagnosa=diagnosadb.kd_diagnosa AND kd_noc='$kdubah'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry); 

?>
<html>
<head>
<title>Update Diagnosa</title>
</head>
<body>
<form action="noc_edit_sim.php" method="post" name="form1" target="_self">
  <table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Update NOC</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode NOC </td>
  <td width="67%">
	<input name="kd_noc" type="hidden" size="22" maxlength="35" value="<? echo $data['kd_noc']; ?>">
        <input name="kd_noc" type="text" size="22" maxlength="35" value="<? echo $data['kd_noc']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Diagnosa</td>
  <td><input name="kd_diagnosa" type="hidden" size="70" maxlength="200" value="<? echo $data['kd_diagnosa']; ?>">
      <input name="nama_diagnosa" type="text" size="70" maxlength="200" value="<? echo $data['nama_diagnosa']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>NOC</td>
  <td><input name="noc" type="text" size="70" maxlength="200" value="<? echo $data['noc']; ?>">
  </td>
</tr>

<tr bgcolor="#FFFFFF"> 
  <td>&nbsp;</td>
  <td> 
	<input name="Submit" type="submit" value="Update">
  </td>
</tr>
</table>
</form>
</body>
</html>