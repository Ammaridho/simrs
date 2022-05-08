<?php 
include "../librari/inc.koneksidb.php"; 
include "inc.session.php";
?>
<html>
<head>
<title>DAFTAR DIAGNOSA</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>ETIOLOGI</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="30%" bgcolor="#D9E8F3"><div align="center"><strong>DIAGNOSA</strong></div></td>
      <td width="50%" bgcolor="#D9E8F3"><div align="center"><strong>FAKTOR YANG BERHUBUNGAN</strong></div></td>
      <td width="20%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM diagnosadb,faktordb WHERE diagnosadb.kd_diagnosa=faktordb.kd_diagnosa ORDER BY nama_diagnosa";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['nama_diagnosa'];?></td>
      <td><?php echo $data['nama_faktor'];?></td>
      <td><div align="center"><a href="etiologi_edit.php?kdubah=<?php echo $data['kd_faktor']; ?>">Edit</a> 
      | <a href="hapus_etiologi.php?kdhapus=<?php echo $data['kd_faktor']; ?>" class="style1">Hapus</a></div></td>
      <?php
}
?>
    </tr>
   </table>
</body>
</html>
