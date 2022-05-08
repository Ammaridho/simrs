<?php 
include "../../config/config.php"; 
include "../librari/inc.koneksidb.php"; 
include "inc.session.php";
?>
<html>
<head>
<title>DAFTAR STAFF</title>
    <script language="javascript">
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script></head>
<body>
  <table width="100%" height="170" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><strong>DETAIL DATA  STAFF</strong></td>
    </tr>
<?php 
$username = $_REQUEST['username'];
	$sql = "SELECT * FROM user,unit WHERE user.kd_unit=unit.kd_unit AND username='$username'";
	$qry = query($sql, $koneksi) 
		 or die ("SQL Error".error());
	while ($data=fetch_array($qry)) {
  ?>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
    <td width="21%" rowspan="8">
<?php
	$username = $data['username'];
	$photo = $data['photo'];
	$jenis_kelamin = $data['jenis_kelamin'];
        if ($photo=="" & $jenis_kelamin=="LAKI-LAKI") {?>
	<a href="photo.php?username=<?php echo $data['username'];?>" title="<?php echo $data['nama'];?>" onClick="NewWindow(this.href,'name','320','460','yes');return false"><img src='../../media/photo/nopic_male.gif' width='124' height='124' /></a>
	<?php }
	elseif ($photo=="" & $jenis_kelamin=="PEREMPUAN") {?>
	<a href="photo.php?username=<?php echo $data['username'];?>" title="<?php echo $data['nama'];?>" onClick="NewWindow(this.href,'name','320','460','yes');return false"><img src='../../media/photo/nopic.gif' width='124' height='124' /></a>
	<?php }
	else {?>
	<a href="photo.php?username=<?php echo $data['username'];?>" title="<?php echo $data['nama'];?>" onClick="NewWindow(this.href,'name','320','460','yes');return false"><img src="../../media/photo/<?php echo $data['photo'];?>" width="160" height="180"/></a>
	<?php
	}
	?></td>
	<td width="17%">NIK</td>
   	<td width="62%"></a><?php echo $data['username'];?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td width="17%">Nama</td>
     <td><?php echo $data['nama'];?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td>Tempat, tanggal lahir </td>
     <td width="62%"><?php echo "".$data['tempat_lahir'].", ".$data['tanggal_lahir']."";?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td>Jenis kelamin </td>
     <td width="62%"><?php echo "".$data['jenis_kelamin']."";?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td>Alamat</td>
     <td width="62%"><?php echo "".$data['alamat']."";?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td>No Telpon </td>
     <td width="62%"><?php echo "".$data['telp']."";?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td>Status</td>
     <td width="62%"><?php echo "".$data['status']."";?></td>
   </tr>
   <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff" span>
     <td><div align="center"><a href="user_edit.php?username=<?php echo $data['username'];?>" title="<?php echo $data['nama'];?>" onClick="NewWindow(this.href,'name','800','400','yes');return false">Update</a></div></td>
     <td width="62%">&nbsp;</td>
   </tr>

<?php
}
?>

	<?php
	include "../staff/pendidikan.php";
	include "../staff/pengalaman.php";
	include "../staff/pelatihan.php";
	?>
  </table>
</body>
</html>
