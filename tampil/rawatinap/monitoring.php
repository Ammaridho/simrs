<?php 
include "../librari/inc.koneksidb.php";
include "header.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysqli_fetch_array($qry);
}
?>
<html>
<head>
<title>Pengkajian</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="base.css" />
<link rel="stylesheet" type="text/css" href="blue.css" />
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
<body id="tab7">

<div id="dash_box_titlediagnosis"> <a href="monitoring_data.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">Tambah</a></div>
<div id="dash_boxdiagnosis">
<?php 
	$sql = "SELECT * FROM tm_db,monitoring WHERE tm_db.kd_tm=monitoring.kd_alat AND kd_kunjungan='$kd_kunjungan'";
	$qry = mysqli_query($koneksi, $sql) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
?>

<table width="876" height="25">    
<tr><td width="868">
<?php
$tanggal_lepas = $data[tanggal_lepas];
if ($tanggal_lepas !="0000-00-00"){?>
<?php echo $no;?>. <?php echo $data['nama_tm'];?><img src="../../media/image/stop.png" width="24" height="24">
<?php }
else {?>
<?php echo $no;?>. <a href="<?php echo $data['link'];?>?no_alat=<?php echo $data['no_alat'];?>"  onClick="NewWindow(this.href,'name','800','600','yes');return false"><?php echo $data['nama_tm'];?></a>
<a href="monitoring_stop.php?no_alat=<?php echo $data['no_alat'];?>"  onClick="NewWindow(this.href,'name','400','200','yes');return false"><img src="../../media/image/go.png" width="20" height="20"></a>
<?php
}
?>
</td>
</tr></table>
<table height="91" border="0">  
   <tr><td>  
<table width="100%" border="0">  
  <tr>   
    <td bgcolor='#D9E8F3' width="100" height='20'>TANGGAL</td>  
    </tr>  
    <tr>  
    <td height='20'>SKOR</td>  
    </tr>  
    <tr>  
    <td height='20'>KATEGORI</td>  
    </tr>  
	<tr>  
    <td height='20'>AKSI</td>  
    </tr>  
   
</table></td>  
<?php  
$kd_alat = $data[kd_alat];
$no_alat = $data[no_alat];
if ($kd_alat == 1 || $kd_alat == 5 || $kd_alat == 6 || $kd_alat == 7 || $kd_alat == 8 || $kd_alat == 9) {
    $np=1;  
    $tampil = mysqli_query("SELECT * FROM monitoring_plebitis WHERE no_alat = '$no_alat' ORDER BY no DESC LIMIT 8 ");  
    while($r=mysqli_fetch_array($koneksi,$tampil)){ ?>
        <td><table height="101" border="0">
          <tr> 
        <td bgcolor="#D9E8F3" width="100" height="20" align="center" title="<?php echo $r[6];?>"><?php echo $r[2];?></td></tr>
        <td bgcolor="#FFFFFF" width="100" height="20" align="center"><?php echo $r[5];?></td></tr>
		<td bgcolor="#FFFFFF" width="100" height="20" align="center"><?php echo $r[6];?></td></tr>
        <td bgcolor="#FFFFFF" width="100" height="20" align="center"> 
		<?php
		if ($tanggal_lepas !="0000-00-00"){?>
		
        <?php }
		else {?>
<a href="plebitis_edit.php?no=<?php echo $r[0];?>" onClick="NewWindow(this.href,'name','800','400','yes'); return false"><img src="../../media/image/edit.png" width="18"></a> 
		<?php }
		?>
		        <a href="plebitis.php?no_alat=<?php echo $data[no_alat];?>" onClick="NewWindow(this.href,'name','800','400','yes'); return false"><img src="../../media/image/view.png" width="28"></a> 
		
		<?php
        echo "</td></tr></table></td> ";  
    $np++;  
    }  
	}
elseif ($kd_alat == 3 ) {
    $ni=1;  
    $tampil = mysqli_query("SELECT * FROM monitoring_isk WHERE no_alat = '$no_alat' ORDER BY no DESC LIMIT 8 ");  
    while($r=mysqli_fetch_array($koneksi,$tampil)){  
    echo"<td><table border='0'><tr> 
        <td bgcolor='#D9E8F3' width='100' height='20' align='center' title='$r[6]'>$r[2]</td></tr>
        <td bgcolor='#FFFFFF' width='100' height='20' align='center'>$r[5]</td></tr>
		<td bgcolor='#FFFFFF' width='100' height='20' align='center'>$r[6]</td></tr>
        <td bgcolor='#FFFFFF' width='100' height='20' align='center'> 
        <a href='braden_form_edit.php?kd_kunjungan=".$data[kd_kunjungan]."&tanggal=$r[1]' onClick='NewWindow(this.href,'name','800','400','yes');return false'>EDIT</a> 
        </td></tr></table></td>  
    ";  
    $nc++;  
    }  
	}
elseif ($kd_alat == 4 ) {
    $nc=1;  
    $tampil = mysqli_query("SELECT * FROM monitoring_cpis WHERE no_alat='$no_alat' ORDER BY no_alat DESC LIMIT 8 ");  
    while($r=mysqli_fetch_array($koneksi,$tampil)){  
    echo"<td><table border='0'><tr> 
        <td bgcolor='#D9E8F3' width='100' height='20' align='center' title='$r[6]'>$r[2]</td></tr>
        <td bgcolor='#FFFFFF' width='100' height='20' align='center'>$r[11]</td></tr>
		<td bgcolor='#FFFFFF' width='100' height='20' align='center'>$r[12]</td></tr>
        <td bgcolor='#FFFFFF' width='100' height='20' align='center'> 
        <a href='braden_form_edit.php?kd_kunjungan=".$data[kd_kunjungan]."&tanggal=$r[1]' onClick='NewWindow(this.href,'name','800','400','yes');return false'>EDIT</a> 
        </td></tr></table></td>  
    ";  
    $nc++;  
    }  
	}
?>  
</tr></table> 
  <?php
}
?>

</body>
</html>
