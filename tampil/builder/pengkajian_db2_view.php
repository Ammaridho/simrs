<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ASSESMENT FORM BUILDER</title>
<script language="javascript">
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
<?php 
$asm_db1_code=$_REQUEST['asm_db1_code'];
$query1 ="SELECT * FROM asm_db1 WHERE asm_db1_code='$asm_db1_code'";
$result1 =mysqli_query($koneksi,$query1) or die(mysqli_error($koneksi));
while($data1=mysqli_fetch_array($result1)){
  ?>
<tr bgcolor="#D9E8F3">
    <td colspan="4"><div align="center"><b><?php echo $data1['asm_db1_name'];?></b></div></td>
  </tr>
  <tr bgcolor="#D9E8F3">
    <td colspan="4"><a href="pengkajian_db2_create.php?asm_db1_code=<?php echo $data1['asm_db1_code'];?>" title="Tambah subtitle" onClick="NewWindow(this.href,'name','800','600','yes');return false"><img src="file_add.png" height="15" width="15"/></a></td>
  </tr>
<?php 
$asm_db1_code = $data1[asm_db1_code];
$query2 ="SELECT * FROM asm_db2 WHERE asm_db1_code='$asm_db1_code' ORDER BY prioritas ASC";
$result2 =mysqli_query($koneksi,$query2) or die(mysqli_error($koneksi));
while($data2=mysqli_fetch_array($result2)){
?>

  <tr bgcolor="#D9E8F3">
    <td colspan="4">
	<a href="pengkajian_db2_create.php?asm_db1_code=<?php echo $data1['asm_db1_code'];?>&asm_db2_code=<?php echo $data2['asm_db2_code'];?>" title="Update subtitle" onClick="NewWindow(this.href,'name','800','200','yes');return false"><img src="file_edit.png" height="15" width="15"/></a>&nbsp;
	<B>[DB2]&nbsp;<?php echo $data2['asm_db2_name'];?></B> :	</td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="4%">&nbsp;</td>
    <td width="56%"><a href="pengkajian_db3_create.php?asm_db2_code=<?php echo $data2['asm_db2_code'];?>" onClick="NewWindow(this.href,'name','800','600','yes');return false"><img src="file_add.png" height="15" width="15"/></a></td>
    <td width="1%">&nbsp;</td>
    <td width="40%">&nbsp;</td>
  </tr>
<?php 
$asm_db2_code = $data2[asm_db2_code];
$query3 ="SELECT * FROM asm_db3 WHERE asm_db2_code='$asm_db2_code' ORDER BY priority ASC";
$result3 =mysqli_query($koneksi,$query3) or die(mysqli_error($koneksi));
while($data3=mysqli_fetch_array($result3)){
$no++;
?>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="32"></td>
    <td width="371"><a href="pengkajian_db3_create.php?asm_db2_code=<?php echo $data2['asm_db2_code'];?>&asm_db3_code=<?php echo $data3['asm_db3_code'];?>" onClick="NewWindow(this.href,'name','800','200','yes');return false"><img src="file_edit.png" height="15" width="15"/></a>
	&nbsp;<?php echo $data3['priority'];?> &nbsp; <?php echo $data3['asm_db3_name'];
	if($data3['mandatori']==1){ echo "*";}
	else {};
	?>
	
	
	</td>
    <td width="6">:</td>
    <td width="874">
	<input type=<?php echo $data3['datatype'];?> list=kaji<?php echo $data3['asm_db3_code'];?> name=kaji<?php echo $data3['asm_db3_code'];?> placeholder="Pilih atau ketik langsung">
	<a href="db5_view.php?asm_db3_code=<?php echo $data3['asm_db3_code'];?>&mod=view" title="Tambahkan pilihan" onClick="NewWindow(this.href,'name','400','450','yes');return false"><img src="file_add.png" height="15" width="15"/></a>
	<a href="db5_view.php?asm_db3_code=<?php echo $data3['asm_db3_code'];?>&mod=update" title="Lihat pilihan" onClick="NewWindow(this.href,'name','400','450','yes');return false"><img src="file_search.png" height="15" width="15"/></a>
	<datalist id=kaji<?php echo $data3['asm_db3_code'];?> >
		<?php 
$asm_db3_code = $data3[asm_db3_code];
$query4 ="SELECT * FROM asm_db4,asm_db5 WHERE asm_db4.asm_db5_code=asm_db5.asm_db5_code AND asm_db3_code='$asm_db3_code'";
$result4 =mysqli_query($koneksi,$query4) or die(mysqli_error($koneksi));
while($data4=mysqli_fetch_array($result4)){
$no++;
?>
   			<option> <?php echo $data4['asm_db5_name'];?>  <?php } ?>
	  </datalist>	</td>
  </tr>
  <?php }}}?>
  <tr bgcolor="#D9E8F3">
    <td colspan="2">&nbsp;&nbsp;
      <input name="submit" type="submit" id="sendButton" style="margin-top: 0px;" value="Submit" /></td>
    <td>:</td>
    <td></td>
  </tr>
</table>
</body>
</html>
