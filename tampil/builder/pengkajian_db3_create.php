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
$asm_db2_code = $_GET['asm_db2_code'];
$query2 ="SELECT * FROM asm_db2 WHERE asm_db2_code='$asm_db2_code'";
$result2 =mysqli_query($koneksi,$query2) or die(mysqli_error($koneksi));
$data2a=mysqli_fetch_array($result2);

$asm_db3_code = $_GET['asm_db3_code'];
$query3 ="SELECT * FROM asm_db3 WHERE asm_db3_code='$asm_db3_code' AND asm_db2_code='$asm_db2_code'";
$result3 =mysqli_query($koneksi,$query3) or die(mysqli_error($koneksi));
$data3a=mysqli_fetch_array($result3);
$data3n=mysqli_num_rows($result3);
if ($data3n > 0) {
  ?>
<form class="form" id="form" method="post" action="pengkajian_db3_sim.php?act=update" style="font-size: 13px; font-family: Verdana; width: 650px;">
<tr bgcolor="#D9E8F3">
  <td align="center">UPDATE DATABASE PENGKAJIAN L3</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td ><label for="asm_db2_code">
    <input type="hidden" name="asm_db2_code" size="100%" value="<?php echo $data2a['asm_db2_code'];?>"/><?php echo $data2a['asm_db2_name'];?>
    </label></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td >Prioritas
	<input type="text" name="priority" size="4%" value="<?php echo $data3a['priority'];?>"/>
	Sub judul  : 
    <label for="asm_db3_code">
    <input type="hidden" name="asm_db3_code" size="100%" value="<?php echo $data3a['asm_db3_code'];?>"/>
	<input type="text" name="asm_db3_name" size="80%" value="<?php echo $data3a['asm_db3_name'];?>"/>
	
    </label></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td><label for="mandatori">
  <?php
  if($data3a['mandatori']==1){?>
  <input type="hidden" id="mandatori" name="mandatori" value="0">
  <input type="checkbox" id="mandatori" name="mandatori" value="1" checked/>Mandatori
  <?php }
  else {?>
  <input type="hidden" id="mandatori" name="mandatori" value="0">
  <input type="checkbox" id="mandatori" name="mandatori" value="1"/>Mandatori
  <?php 
  }
  ?></label>
  <?php
  if($data3a['exception']==1){?>
  <label for="exception"><input type="hidden" id="exception" name="exception" value="0">
  <input type="checkbox" id="exception" name="exception" value="1" checked>Exception</label>
  <?php }
  else {?>
  <label for="exception"><input type="hidden" id="exception" name="exception" value="0">
  <input type="checkbox" id="exception" name="exception" value="1">Exception</label>
  <?php 
  }
  ?>
  <label>
    <select id="datatype" name="datatype" value="">
      <option><?php echo $data3a['datatype'];?>
      <option>text
      <option>text id=datepicker
      <option>time
      <option>number
      <option>email
      <option>password
    </select>
  </label>
  </td>
</tr>
<tr bgcolor="#FFFFFF">
    <td>
      <input type="submit" name="Submit" value="Update" />
    </td>
  </tr>
  </form>
  <?php
  }
  else {?>

<!-- Bagian form Tambah database level 3 -->
<form class="form" id="form" method="post" action="pengkajian_db3_sim.php?act=tambah" style="font-size: 13px; font-family: Verdana; width: 650px;">
<tr bgcolor="#D9E8F3">
  <td align="center">TAMBAH DATABASE PENGKAJIAN  LEVEL 3</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td ><label for="asm_db2_code">
    <input type="hidden" name="asm_db2_code" size="100%" value="<?php echo $data2a['asm_db2_code'];?>"/>
	<?php echo $data2a['asm_db2_name'];?>
    </label></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td >Sub judul
    <label for="asm_db3_name">
    <input type="text" name="asm_db3_name" size="80%" value="<?php echo $data3a['asm_db3_name'];?>" required>
	Prioritas
	<input type="text" name="priority" size="4%" value="<?php echo $data3a['priority'];?>" required>
    </label></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td >
    <label for="mandatori">
      <input type="hidden" id="mandatori" name="mandatori" value="0">  
      <input type="checkbox" id="mandatori" name="mandatori" value="1">Mandatori
    </label>
	  <label for="exception"><input type="hidden" id="exception" name="exception" value="0">
    <input type="checkbox" id="exception" name="exception" value="1">Exception
    </label>
    </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td >
  <label>Type data
    <select id="datatype" name="datatype" width="100px">
      <option>text
      <option>text id=datepicker
      <option>time
      <option>number
      <option>email
      <option>password
    </select>
  </label>
  </td>
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
