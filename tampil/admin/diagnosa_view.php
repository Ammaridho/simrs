<?php 
include "../librari/inc.koneksidb.php"; 
include_once "../librari/inc.session.php";
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
      <td colspan="3" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR DIAGNOSA</strong></div></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td  colspan="3"><a href="tambah_diagnosa.php">Tambah</a></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
      <td width="70%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA DIAGNOSA</strong></div></td>
      <td width="20%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>

<?php 

	$sql = "SELECT * FROM mrconso ORDER BY STR LIMIT 100";
	$qry = mysqli_query($koneksi,$sql) 
		 or die ("SQL Error".mysqli_connect_error());
	while ($data=mysqli_fetch_array($qry)) {
  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['CODE'];?></td>
      <td><?php echo $data['STR'];?></td>
      <td><div align="center"><a href="diagnosa_edit.php?kdubah=<?php echo $data['id_diagnosa']; ?>">Edit</a> 
      | <a href="diagnosa_hapus.php?kdhapus=<?php echo $data['id_diagnosa']; ?>" class="style1">Hapus</a></div></td>
      <?php
}
?>
    </tr>
  </table>
</body>
</html>
