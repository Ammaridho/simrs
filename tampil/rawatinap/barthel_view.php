<?php
include "../librari/inc.koneksidb.php";
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
<body>
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
    $no=1;  
    $tampil = mysqli_query("SELECT * FROM barthel WHERE kd_kunjungan='$kd_kunjungan'ORDER BY tanggal DESC LIMIT 8 ");  
    while($r=mysql_fetch_array($tampil)){  
    echo"<td><table border='0'><tr> 
        <td bgcolor='#D9E8F3' width='100' height='20' align='center' title='$r[10]'>$r[1]</td></tr>
        <td bgcolor='#FFFFFF' width='100' height='20' align='center'>$r[13]</td></tr>
		<td bgcolor='#FFFFFF' width='100' height='20' align='center'>$r[14]</td></tr>
        <td bgcolor='#FFFFFF' width='100' height='20' align='center'> 
        <a href='braden_form_edit.php?kd_kunjungan=".$data[kd_kunjungan]."&tanggal=$r[1]' onClick='NewWindow(this.href,'name','800','400','yes');return false'>EDIT</a> 
        </td></tr></table></td>  
    ";  
    $no++;  
    }  
?>  
</tr></table>  
</body>
</html>