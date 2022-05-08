<?php 
include "../librari/inc.koneksidb.php"; 
include "inc.session.php";
?>
<html>
<head>
<title>DAFTAR TINDAKAN</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="7" bgcolor="#CCCCCC"><div align="left"><strong>Nursing Intervention Classification (NIC)</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
      <td width="25%" bgcolor="#D9E8F3"><div align="center"><strong>Diagnosa</strong></div></td>
      <td width="50%" bgcolor="#D9E8F3"><div align="center"><strong>N I C</strong></div></td>
      <td width="15%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM diagnosadb,nicdb WHERE diagnosadb.kd_diagnosa=nicdb.kd_diagnosa ORDER BY nama_diagnosa";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td><? echo $data['kd_nic'];?></td>
	<td><? echo $data['nama_diagnosa'];?></td>
      <td><? echo $data['nic'];?></td>
      <td><div align="center"><a href="nic_edit.php?kdubah=<? echo $data['kd_nic']; ?>">Edit</a> 
      | <a href="hapus_nic.php?kdhapus=<? echo $data['kd_nic']; ?>" class="style1">Hapus</a></div></td>
      <?php
}
?>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td  colspan="3"></td>
    </tr>
  </table>
</body>
</html>
