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
      <td colspan="8" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR OBAT </strong></div></td>
    </tr>
	    <tr bgcolor="#FFFFFF">
      <td  colspan="8"><a href="tambah_gol_obat.php"><button class="btn btn-primary">Tambah</button></a></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>GOLONGAN</strong></div></td>
      <td width="22%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA OBAT </strong></div></td>
	  <td width="9%" bgcolor="#D9E8F3"><div align="center"><strong>BELI</strong></div></td>
	  <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>MARK UP</strong></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><B>PPN</B></div></td>
	  <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>JUAL</strong></div></td>
      <td width="15%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM obat_db ORDER BY kd_obat";
	$qry = mysqli_query($koneksi,$sql) 
		 or die ("SQL Error".mysqli_connect_error());
	while ($data=mysqli_fetch_array($qry)) {

  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['kd_obat'];?></td>
      <td><?php echo $data['gol_obat'];?></td>
	  <td><?php echo $data['nama_obat'];?></td>
	  <td align="right"><?php echo $data['harga_beli'];?></td>
	  <td align="center"><?php echo $data['markup'];?>%</td>
	  <td align="center"><?php echo $data['ppn'];?>%</td>
	  <td align="right"><?php echo $data['harga_jual'];?></td>

      <td><div align="center"><a href="obat_edit.php?kdubah=<?php echo $data['kd_obat']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> |
	  <?php 
	  $gol_obat = $data['gol_obat'];
	  if ($gol_obat=="Formula"){
	  echo	"<a href='obat_formula.php?kd_obat=".$data['kd_obat']."'><i class='fa-solid fa-pen'></i></a>";
	  }
	  else {
	  echo "<i class='fa-solid fa-pen'></i>";
	  }
	  ?>
	  </div></td>
      <?php
}
?>
    </tr>
  </table>
</body>
</html>
