<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$kdubah = $_GET['kdubah'];
$sql = "SELECT * FROM diagnosadb WHERE kd_diagnosa='$kdubah'";
$qry = query($sql);
$data = fetch_array($qry); 

?>
<html>
<head>
<title>TAMBAH DATA</title>
</head>
<body>
<form action="data_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">TAMBAH DATA</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode</td>
  <td width="67%">
	<input name="kd_kaji" type="hidden" size="22" maxlength="35" value="<? echo kdauto("kajidb",K); ?>">
	<input name="kd_kaji" type="text" size="22" maxlength="35" value="<? echo kdauto("kajidb",K); ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Divisi</td>
  <td width="67%">
	<input name="kd_divisi" type="hidden" size="22" maxlength="35" value="<? echo $data['kd_divisi']; ?>">
        <input name="kd_divisi" type="text" size="22" maxlength="35" value="<? echo $data['kd_divisi']; ?>" disabled="disabled">

  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">ID Diagnosa</td>
  <td width="67%">
	<input name="kd_diagnosa" type="hidden" size="22" maxlength="35" value="<? echo $data['kd_diagnosa']; ?>">
        <input name="kd_diagnosa" type="text" size="22" maxlength="35" value="<? echo $data['kd_diagnosa']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Diagnosa</td>
  <td>
<input name="nama_diagnosa" type="hidden" size="70" maxlength="200" value="<? echo $data['nama_diagnosa']; ?>">
<input name="nama_diagnosa" type="text" size="70" maxlength="200" value="<? echo $data['nama_diagnosa']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Data </td>
  <td>
<input name="data" type="text" size="70" maxlength="200" value="<? echo $data['data']; ?>">
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
