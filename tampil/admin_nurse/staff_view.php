<?php 
include "../../config/config.php"; 
include "../librari/inc.koneksidb.php"; 
include "inc.session.php";

?>
<html>
<head>
<title>DAFTAR STAFF</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
  <link href="<?php echo $url;?>media/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="<?php echo $url;?>media/facebox/faceplant.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="<?php echo $url;?>media/facebox/jquery.js" type="text/javascript"></script>
  <script src="<?php echo $url;?>media/facebox/facebox.js" type="text/javascript"></script>
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
<form name="form1" method="post" action="staff_view.php?kd_unit='$kd_unit'">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1">
    <tr>
      <td colspan="2" bgcolor="#CCCCCC"><div align="left"><strong>DAFTAR STAFF</strong></div></td>
    </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
     <td colspan="2"><select name="kd_unit" id="kd_unit">
       <option value="%" selected>[Semua Unit]</option>
       <?php
	$sql = "SELECT * FROM unit WHERE kd_unit <='20'";
      	$qry = @query($sql, $koneksi) or die ("gagal Query");
	while ($data =fetch_array($qry)) {
	if ($data[kd_unit]==$kd_unit) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[kd_unit]' $cek>".$data['nama_unit']."</option>";
	}
	?>
     </select>
       <input type="submit" name="Submit" value="Tampilkan"><a href="tambah_staff.php">Tambah</a></td>
    </tr>
	<?php 
	$kd_unit = $_REQUEST[kd_unit];
	$sql = "SELECT * FROM user,unit WHERE user.kd_unit=unit.kd_unit AND user.kd_unit LIKE '$kd_unit'";
	$qry = query($sql, $koneksi) 
		 or die ("SQL Error".error());
	while ($data=fetch_array($qry)) {
  ?>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
    <td width="3%">
<?php
	$username = $data['username'];
	$photo = $data['photo'];
	$jenis_kelamin = $data['jenis_kelamin'];
        if ($photo=="" & $jenis_kelamin=="LAKI-LAKI") {
	echo "<img src='../../media/photo/nopic_male.gif' width='124' height='124' />";
	}
	elseif ($photo=="" & $jenis_kelamin=="PEREMPUAN") {
	echo "<img src='../../media/photo/nopic.gif' width='124' height='124' />";
	}
	else {?>
	<a href="photo.php?username=<?php echo $data['username'];?>" title="<?php echo $data['nama'];?>" onClick="NewWindow(this.href,'name','320','420','yes');return false"><img src="../../media/photo/<?php echo $data['photo'];?>" width="124" height="124"/></a>
	<?php
	}
	?></td>
	<td><a href="detail_view.php?username=<?php echo $data['username']; ?>"><?php echo "".$data['username']."</br>".$data['nama']."</br>".$data['nama_unit']."";?></a></td>
   	</tr>

<?php
}
?>
    

    <tr bgcolor="#FFFFFF">
      <td  colspan="2"></td>
    </tr>
  </table>
  </form>
</body>
</html>
