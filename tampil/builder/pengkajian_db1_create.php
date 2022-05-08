<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PENGKAJIAN AWAL DEWASA</title>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<?php 
$asm_db1_code = $_GET['asm_db1_code'];
$query1 ="SELECT * FROM asm_db1 WHERE asm_db1_code='$asm_db1_code'";
$result1 =mysqli_query($koneksi,$query1) or die(mysqli_error($koneksi));
$data1a=mysqli_fetch_array($result1);
$data1n=mysqli_num_rows($result1);
if ($data1n > 0) {
  ?>
<form class="form" id="form" method="post" action="pengkajian_db1_sim.php?act=update" style="font-size: 13px; font-family: Verdana; width: 650px;">
<tr bgcolor="#D9E8F3">
  <td align="center">UPDATE DATABASE PENGKAJIAN </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td >NAMA PENGKAJIAN AWAL : 
    <label for="asm_db1">
    <input type="hidden" name="asm_db1_code" size="100%" value="<?php echo $data1a['asm_db1_code'];?>"/>
	<input type="text" name="asm_db1_name" size="100%" value="<?php echo $data1a['asm_db1_name'];?>"/>
    </label></td>
</tr>
<tr bgcolor="#FFFFFF">
    <td><label>
      <input type="submit" name="Submit" value="Update" />
    </label></td>
  </tr>
  </form>
  <?php
  }
  else {?>
  <form class="form" id="form" method="post" action="pengkajian_db1_sim.php?act=tambah" style="font-size: 13px; font-family: Verdana; width: 650px;">
<tr bgcolor="#D9E8F3">
  <td align="center">TAMBAH DATABASE PENGKAJIAN </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td >NAMA PENGKAJIAN AWAL : 
    <label for="asm_db1">
    <input type="text" name="asm_db1" size="100%"/>
    </label></td>
</tr>
<tr bgcolor="#FFFFFF">
    <td><label>
      <input type="submit" name="Submit" value="Submit" />
    </label></td>
  </tr>
  </form>
  <?php }?>
</table>
</body>
</html>
