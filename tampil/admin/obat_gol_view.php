<?php 
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<html>
<head>
<title>DAFTAR OBAT</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/64c79ef594.js" crossorigin="anonymous"></script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table class="table" align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR GOLONGAN OBAT </strong></div></td>
    </tr>
	    <tr bgcolor="#FFFFFF">
      <td colspan="3">
      <a href="tambah_gol_obat.php"><button class="btn btn-primary">Tambah</button></a>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="25%" bgcolor="#D9E8F3"><div align="center"><strong>KODE GOLONGAN </strong></div></td>
	  <td width="53%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA GOLONGAN OBAT </strong></div></td>
      <td width="22%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 
	$sql = "SELECT * FROM gol_obat ORDER BY kd_gol_obat";
	$qry = mysqli_query($koneksi,$sql) 
		 or die ("SQL Error".mysqli_connect_error());
	while ($data=mysqli_fetch_array($qry)) {

  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['kd_gol_obat'];?></td>
      <td><?php echo $data['gol_obat'];?></td>
	    <td><div align="center"><a href="obat_gol_edit.php?kdubah=<?php echo $data['kd_gol_obat']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> 
      | <a href="obat_gol_hapus.php?kdhapus=<?php echo $data['kd_gol_obat']; ?>" class="style1"><i class="fa-solid fa-trash-can"></i></a></div></td>
      <?php
}
?>
    </tr>
  </table>
</body>
</html>
