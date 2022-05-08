<?php 
include "../librari/inc.koneksidb.php";

$kdubah = $_GET['kdubah'];
$sql = "SELECT * FROM tindakandb WHERE kd_tindakan='$kdubah'";
$qry = query($sql);
$data = fetch_array($qry); 

?>
<html>
<head>
<title>Update Diagnosa</title>
</head>
<body>
<form action="tindakan_edit_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Update Tindakan</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">ID Tindakan</td>
  <td width="67%">
	<input name="kd_tindakan" type="hidden" size="22" maxlength="35" value="<?php echo $data['kd_tindakan']; ?>">
        <input name="kd_tindakan" type="text" size="22" maxlength="35" value="<?php echo $data['kd_tindakan']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Diagnosa</td>
  <td><input name="nama_tindakan" type="text" size="70" maxlength="200" value="<?php echo $data['nama_tindakan']; ?>">
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
