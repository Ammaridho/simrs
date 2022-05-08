<?php
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
$asm_db3_code = $_REQUEST['asm_db3_code'];
$sql3 = "SELECT * FROM asm_db3 WHERE asm_db3_code='$asm_db3_code'";
$qry3 = mysqli_query($sql3);
$data3 = mysqli_fetch_array($qry3); 
?>
<html>
<head>
<title>MENU USER</title>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<a href="db5_view.php?asm_db3_code=<?php echo $data3['asm_db3_code'];?>&mod=add"><img src="file_add.png" height="15" width="15"/></a>
<?php
$mod = $_GET['mod'];
if($mod=="view"){
?>
<form name="myform" method="post" action="db5_sim.php?act=add">
  <tr bgcolor="#D9E8F3">
    <td width="50%" height="21"><div align="center">Database BD4 DB5 answer</div></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td valign="top">
	<input type="hidden" value="<?php echo "".$_SESSION['nama']."";?>" name="username" placeholder="username">
      <?php
$sql5 = "SELECT * FROM asm_db5";
$qry5 = mysqli_query($koneksi,$sql5)
       or die ("SQL Error".mysqli_error($koneksi));
	   $i = 1;
while ($data5=mysqli_fetch_array($qry5)){;
?>
      <input type="checkbox" value="<?php echo $data5['asm_db5_code'];?>" name="asm_db5_code<?php echo $i;?>" />
      <input name="asm_db3_code" type="hidden" value=<?php echo $asm_db3_code;?>>
	  <?php echo $data5['asm_db5_name'];?>
      <?php $i++;?></br>
      <?php	  
}
?>
      <input type="text" name="n" value="<?php echo $i; ?>"/></td>
  </tr>
  <tr bgcolor="#ffffff">  
    <td valign="top"><input type="submit" value="add" name="submit">
    </td>
  </tr>
</form>
<?php }
elseif($mod=="update"){?>
<form name="myform" method="post" action="db5_sim.php?act=del">
  <tr bgcolor="#D9E8F3">
    <td width="50%" height="21"><div align="center">Database DB4 answer</div></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td valign="top">
	<input type="hidden" value="<?php echo "".$_SESSION['nama']."";?>" name="username" />
      <?php
$sql4 = "SELECT * FROM asm_db4,asm_db5 WHERE asm_db4.asm_db5_code=asm_db5.asm_db5_code AND asm_db3_code='$asm_db3_code'";
$qry4 = mysqli_query($koneksi,$sql4)
       or die ("SQL Error".mysqli_error($koneksi));
	   $i = 1;
while ($data4=mysqli_fetch_array($qry4)){;
?>
      <input type="checkbox" name="asm_db4_code<?php echo $i;?>" value="<?php echo $data4['asm_db4_code'];?>"/>
      <input type="hidden" name="asm_db3_code" value="<?php echo $data4['asm_db3_code'];?>">
	  <input type="hidden" name="asm_db5_code" value="<?php echo $data4['asm_db5_code'];?>">
	  <?php echo $data4['asm_db5_name'];?>
      <?php $i++;?></br>
      <?php	  
}
?>
      <input type="hidden" name="n" value="<?php echo $i; ?>"/></td>
  </tr>
  <tr bgcolor="#ffffff">  
    <td valign="top"><input type="submit" value="delete" name="submit">
    </td>
  </tr>
</form>
<?php }
else {
?>
<form class="form" id="form" method="post" action="db5_sim.php?asm_db3_code=<?php echo $asm_db3_code;?>&mod=view&act=input" style="font-size: 13px; font-family: Verdana; width: 650px;">
  <tr bgcolor="#D9E8F3">
    <td>Tambah database db5</td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td><input name="asm_db5_name" type="text" size="100"></td>
  </tr>
  <tr bgcolor="#D9E8F3">
	<td><input type="submit" name="submit" value="input"></td>
  </tr>
</form>
<?php
}
?>

</table>
</body>
</html>
