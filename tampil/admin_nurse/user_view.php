<?php 
include "../../config/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<html>
<head>
<title>DAFTAR STAFF</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="7" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR USER</strong></div></td>
    </tr>
	    <tr bgcolor="#FFFFFF">
      <td  colspan="7"><a href="user_tambah.php">Tambah</a></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="3%" bgcolor="#D9E8F3">NO</td>
      <td width="36%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>USERNAME</strong></div></td>
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>NO KTA </strong></div></td>
      <td width="9%" bgcolor="#D9E8F3"><div align="center"><strong>UNIT</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>STATUS</strong></div></td>
      <td width="8%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 

	$sql = "SELECT * FROM user";
	$qry = query($sql, $koneksi) 
		 or die ("SQL Error".error());
    $no = 1;
	while ($data=fetch_array($qry)) {
	  ?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $no++;?></td>
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['username'];?></td>
      <td><?php echo $data['no_kta'];?></td>
      <td><?php echo $data['kd_unit'];?></td>
      <td><?php
	    
        if ($data['status']=="Aktif") {
	echo "Aktif | <a href='user_blokir.php?username=".$data['username']."'>Non Aktif</a>";
	}
	else {
	echo "<a href='user_aktifkan.php?username=".$data['username']."'>Aktif</a> | Non Aktif";
	}
	?></td>
      <td><div align="center"><a href="menu_view.php?username=<?php echo $data['username']; ?>">Menu</a> | <a href="user_edit.php?username=<?php echo $data['username']; ?>">Edit</a></div></td>
      <?php
}
?>
    </tr>
  </table>
</body>
</html>
