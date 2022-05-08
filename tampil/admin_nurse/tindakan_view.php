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
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR DIAGNOSA</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
      <td width="70%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA DIAGNOSA</strong></div></td>
      <td width="20%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM tindakandb ORDER BY nama_tindakan";
	$qry = query($sql, $koneksi) 
		 or die ("SQL Error".error());
	while ($data=fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['kd_tindakan'];?></td>
      <td><?php echo $data['nama_tindakan'];?></td>
      <td><div align="center"><a href="tindakan_edit.php?kdubah=<?php echo $data['kd_tindakan']; ?>">Edit</a> 
      | <a href="hapus_tindakan.php?kdhapus=<?php echo $data['kd_tindakan']; ?>" class="style1">Hapus</a></div></td>
      <?php
}
?>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td  colspan="3"><a href="tambah_tindakan.php">Tambah</a></td>
    </tr>
  </table>
</body>
</html>
