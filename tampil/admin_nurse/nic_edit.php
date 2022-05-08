<?php 
include "../librari/inc.koneksidb.php";

$kdubah = $_GET['kdubah'];
$sql = "SELECT * FROM nicdb,diagnosadb WHERE nicdb.kd_diagnosa=diagnosadb.kd_diagnosa AND kd_nic='$kdubah'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry); 

?>
<html>
<head>
<title>Update NIC</title>
</head>
<body>
<form action="nic_edit_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Update NIC</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode NIC </td>
  <td width="67%">
	<input name="kd_nic" type="hidden" size="22" maxlength="35" value="<? echo $data['kd_nic']; ?>">
        <input name="kd_nic" type="text" size="22" maxlength="35" value="<? echo $data['kd_nic']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Diagnosa</td>
  <td><input name="kd_diagnosa" type="hidden" size="70" maxlength="200" value="<? echo $data['kd_diagnosa']; ?>">
      <input name="nama_diagnosa" type="text" size="70" maxlength="200" value="<? echo $data['nama_diagnosa']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>NIC</td>
  <td><input name="nic" type="text" size="70" maxlength="200" value="<? echo $data['nic']; ?>">
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
