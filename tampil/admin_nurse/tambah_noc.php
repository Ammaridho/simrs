<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$kdubah = $_GET['kdubah'];
$sql = "SELECT * FROM diagnosadb WHERE kd_diagnosa='$kdubah'";
$qry = mysqli_query($koneksi, $sql) or die ("SQL Error".mysqli_error($koneksi));
$data = mysqli_fetch_array($qry); 

?>
<html>
<head>
<title>Update Diagnosa</title>
</head>
<body>
<form action="noc_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Tambah NOC yang berhubungan</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode</td>
  <td width="67%">
	<input name="kd_noc" type="hidden" size="22" maxlength="35" value="<?php echo kdauto("nocdb",Noc); ?>">
	<input name="kd_noc" type="text" size="22" maxlength="35" value="<?php echo kdauto("nocdb",Noc); ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">ID Diagnosa</td>
  <td width="67%">
	<input name="kd_diagnosa" type="hidden" size="22" maxlength="35" value="<?php echo $data['kd_diagnosa']; ?>">
        <input name="kd_diagnosa" type="text" size="22" maxlength="35" value="<?php echo $data['kd_diagnosa']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Diagnosa</td>
  <td>
<input name="nama_diagnosa" type="hidden" size="70" maxlength="200" value="<?php echo $data['nama_diagnosa']; ?>">
<input name="nama_diagnosa" type="text" size="70" maxlength="200" value="<?php echo $data['nama_diagnosa']; ?>" disabled="disabled">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>NOC</td>
  <td>
<input name="noc" type="text" size="70" maxlength="200" value="<?php echo $data['noc']; ?>">
  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>&nbsp;</td>
  <td> 
	<input name="Submit" type="submit" value="Simpan">
  </td>
</tr>
</table>
</form>
</body>
</html>