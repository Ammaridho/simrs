<?php
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>FLACC</title>
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
 <table border="0">  
<?php  
    $no=1;  
    $tampil = mysqli_query($koneksi, "SELECT * FROM skala_nyeri WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC LIMIT 8 ")
                or die ("Error:".mysqli_error($koneksi));  
    while($data_nyeri=mysqli_fetch_array($tampil)){  
	if ($data_nyeri['jenis']=="NUMERIK"){
	echo "<tr><td colspan='2'>----------- BATAS ATAS COPY PASTE -----------</td></tr>";
	echo "<tr><td colspan='2'>PENGKAJIAN NYERI</td></tr>";
	echo "<tr><td>Tanggal</td><td>: $data_nyeri[tanggal]</td></tr>";
	echo "<tr><td>Shift</td><td>: $data_nyeri[shift]</td></tr>";
	
echo "<tr><td>1.  Faktor  Pencetus/Penyebab, apa yang membuat nyeri terasa semakin hebat</td><td>: $data_nyeri[nyeri01]</td></tr>";
echo "<tr><td>2.  Faktor yang meredakan nyeri, apa yang membuat nyeri berkurang</td><td>: $data_nyeri[nyeri02] $data_nyeri[nyeri12]</td></tr>";
echo "<tr><td>3.  Kualitas nyeri, seperti apa rasa nyerinya; seperti</td><td>: $data_nyeri[nyeri03] $data_nyeri[nyeri13]</td></tr>";
echo "<tr><td>4.  Apakah menyebar ke area lain</td><td>: $data_nyeri[nyeri04]</td></tr>";
echo "<tr><td>5.  Beratnya rasa nyeri </td><td>: Skala $data_nyeri[nyeri05]</td></tr>";
echo "<tr><td>6.  Kapan waktu nyeri menyerang</td><td>: $data_nyeri[nyeri06]</td></tr>";
echo "<tr><td>7.  Pernah mengalami nyeri yang sama sebelumnya</td><td>: $data_nyeri[nyeri07]</td></tr>";
echo "<tr><td>8.  Nyeri yang dialami, apakah lokasinya sama</td><td>: $data_nyeri[nyeri08]</td></tr>";
echo "<tr><td>9.  Ketergantungan terhadap obat penghilang nyeri tertentu</td><td>: $data_nyeri[nyeri09] $data_nyeri[nyeri15]</td></tr>";
echo "<tr><td>10. Pernah mengalami reaksi yang tidak diharapkan, setelah mendapatkan obat penghilang rasa nyeri</td><td>: $data_nyeri[nyeri10] $data_nyeri[nyeri11]</td></tr>";
echo "<tr bgcolor='#000000'><td></td><td></td></tr>";
    $no++;  
    }}
?>  
</table>  
</body>
</html>