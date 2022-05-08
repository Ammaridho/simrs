<?php 
include "../librari/inc.koneksidb.php"; 
include "../librari/inc.session.php";
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
      <td colspan="7" bgcolor="#CCCCCC"><div align="left"><strong>Nursing Outcome Classification (NOC)</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
      <td width="25%" bgcolor="#D9E8F3"><div align="center"><strong>Diagnosa</strong></div></td>
      <td width="50%" bgcolor="#D9E8F3"><div align="center"><strong>N O C</strong></div></td>
      <td width="15%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM diagnosadb,nocdb WHERE diagnosadb.kd_diagnosa=nocdb.kd_diagnosa ORDER BY nama_diagnosa";
	$qry = mysqli_query($koneksi,$sql)  
          or die ("SQL Error".mysql_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['kd_noc'];?></td>
	<td><?php echo $data['nama_diagnosa'];?></td>
      <td><?php echo $data['noc'];?></td>
      <td><div align="center"><a href="noc_edit.php?kdubah=<?php echo $data['kd_noc']; ?>">Edit</a> 
      | <a href="hapus_noc.php?kdhapus=<?php echo $data['kd_noc']; ?>" class="style1">Hapus</a></div></td>
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
