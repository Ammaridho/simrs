<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$kdubah = $_GET['kdubah'];
$sql = "SELECT * FROM diagnosadb WHERE kd_diagnosa='$kdubah'";
$qry = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($qry); 

?>
<html>
<head>
<title>Update Diagnosa</title>
</head>
<body>
<form action="etiologi_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Tambah Faktor yang berhubungan</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode</td>
  <td width="67%">
	<input name="kd_faktor" type="text" size="22" maxlength="35" placeholder="Otomatis" disabled="disabled">
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
  <td>Faktor yang berhubungan</td>
  <td>
<input name="nama_faktor" type="text" size="70" maxlength="200" value="<? echo $data['nama_faktor']; ?>">
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

