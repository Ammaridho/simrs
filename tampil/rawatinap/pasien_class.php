<?php 
include "../librari/inc.koneksidb.php"; 
?>
<html>
<head>
<title>Klasifikasi pasien</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
<script type="text/javascript">
  
  function ajax() 
  {
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("sms").innerHTML = xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","../sms/reminder.php",true);
  xmlhttp.send();
  setTimeout("ajax()", 1000);
  }  
  </script>
</head>
<body onLoad="ajax()">
<div id="sms">
</div>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr onMouseOver="this.bgColor='lightblue'"
onmouseout="this.bgColor='#efefef'" bgcolor="#efefef"
>
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>Klasifikasi pasien per tanggal <?php echo date("d-m-Y");?></strong></div> </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="16%" bgcolor="#D9E8F3"><div align="center"><strong>PRN</strong></div></td>
      <td width="24%" bgcolor="#D9E8F3"><div align="center"><strong>Nama </strong></div></td>
      <td width="17%" bgcolor="#D9E8F3"><div align="center"><strong>Ruang</strong></div></td>
      <td width="9%" bgcolor="#D9E8F3"><div align="center"><strong>Kamar</strong></div></td>
      <td width="18%" bgcolor="#D9E8F3"><div align="center"><strong>Klasifikasi</strong></div>        </td>
      <td width="16%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php 
$tanggal = date("Y-m-d");

	$sql = "SELECT * FROM data_pasien,class WHERE data_pasien.kd_kunjungan=class.kd_kunjungan AND data_pasien.status='Aktif' AND class.tanggal='$tanggal'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
  ?>
    <tr onmouseover="this.bgColor='lightyellow'" onmouseout="this.bgColor='#ffffff'" bgcolor="#ffffff" span class="style1">
      <td><a href="../renpra/diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['prn'];?></a></td>
      <td><a href="../renpra/diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['nama'];?></a></td>
      <td><a href="../renpra/diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kd_unit'];?></a></td>
      <td><a href="../renpra/diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>"><?php echo $data['kamar'];?></a></td>
      <td>
<?php
	$tanggal=date("Y-m-d");
	$kd_kunjungan = $data[kd_kunjungan];
	$sql2 = "SELECT * FROM class WHERE kd_kunjungan='$kd_kunjungan' AND tanggal='$tanggal'";
      	$qry2 = @mysqli_query($sql2, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry2)) {

$class01 = $data['class01'];
$class02 = $data['class02'];
$class03 = $data['class03'];
$class04 = $data['class04'];
$class05 = $data['class05'];
$class06 = $data['class06'];
$class07 = $data['class07'];
$class08 = $data['class08'];
$class09 = $data['class09'];
$class10 = $data['class10'];
$class_pasien = $class01 + $class02 + $class03 + $class04 + $class05 + $class06 + $class07 + $class08 + $class09 + $class10;

if ($class_pasien<="13") {
$min_care = "Minimal Care";
}
elseif ($class_pasien>="14" && $class_pasien<="22") {
$min_care = "Partial Care";
}
if ($class_pasien>="23") {
$min_care = "Total Care";
}

	echo "".$min_care."";
	}
	?>
      </td>
      <td><div align="center"><a href="pasien_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>">Edit</a> 
      | <a href="pasien_batal.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" class="style1">Hapus</a></div></td>
      <?php
}
?>
  </table>
</body>
</html>
