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
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR DIAGNOSA</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
      <td width="70%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA DIAGNOSA</strong></div></td>
      <td width="20%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM group_diagnosa ORDER BY group_diagnosa";
	$qry = query($sql, $koneksi) 
		 or die ("SQL Error".error());
	while ($data=fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['id_diagnosa'];?></td>
      <td><?php echo $data['group_diagnosa'];?></td>
      <td><div align="center"><a href="diagnosa_edit.php?kdubah=<?php echo $data['id_diagnosa']; ?>">Edit</a> 
      | <a href="hapus_diagnosa.php?kdhapus=<?php echo $data['id_diagnosa']; ?>" class="style1">Hapus</a></div></td>
      <?php
}
?>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td  colspan="3"><a href="tambah_diagnosa.php">Tambah</a></td>
    </tr>
  </table>
</body>
</html>
