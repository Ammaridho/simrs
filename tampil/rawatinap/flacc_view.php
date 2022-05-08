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
 <table height="91" border="0">  
   <tr>
<?php  
    $no=1;  
    $tampil = mysqli_query("SELECT * FROM skala_nyeri WHERE kd_kunjungan='$kd_kunjungan'ORDER BY tanggal DESC LIMIT 8 ");  
    while($data_nyeri=mysql_fetch_array($tampil)){  
	if ($data_nyeri['jenis']=="FLACC"){
	echo "<tr><td colspan='2'>----------- BATAS ATAS COPY PASTE -----------</td></tr>";
	echo "<tr><td colspan='2'>FLACC</td></tr>";
	echo "<tr><td>Tanggal</td><td>: $data_nyeri[tanggal]</td></tr>";
	echo "<tr><td>Shift</td><td>: $data_nyeri[shift]</td></tr>";
	
echo "<tr><td>1. <B>F</B> Face / Muka</td><td>: "; if ($data_nyeri['nyeri01']=="0") {
echo "Tidak ada ekspresi/senyum (Skor ".$data_nyeri['nyeri01'].")";
}
elseif ($data_nyeri['nyeri01']=="1") {
echo "Sesekali meringis (Skor ".$data_nyeri['nyeri01'].")";
}
elseif ($data_nyeri['nyeri01']=="2") {
echo "Mengatupkan rahang (seperti marah) (Skor ".$data_nyeri['nyeri01'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>2. <B>L</B> Legs / Kaki</td><td>: ";if ($data_nyeri['nyeri02']=="0") {
echo "Posisi normal atau tenang dan rileks (Skor ".$data_nyeri['nyeri02'].")";
}
elseif ($data_nyeri['nyeri02']=="1") {
echo "Tidak nyaman / tidak dapat istirahat (Skor ".$data_nyeri['nyeri02'].")";
}
elseif ($data_nyeri['nyeri02']=="2") {
echo "Menendang, kaki diangkat keatas, sengaja tidak bergerak (Skor ".$data_nyeri['nyeri02'].")";
}
else {
echo "Tidak ada data.";
}"</td></tr>";


	echo "<tr><td>3. <B>A</B> Activity / Aktivitas</td><td>: "; if ($data_nyeri['nyeri03']=="0") {
echo "Mudah berbaring dengan tenang (Skor ".$data_nyeri['nyeri03'].")";
}
elseif ($data_nyeri['nyeri03']=="1") {
echo "Menggeliat, tegang (Skor ".$data_nyeri['nyeri03'].")";
}
elseif ($data_nyeri['nyeri03']=="2") {
echo "Badan terlihat kaku (Skor ".$data_nyeri['nyeri03'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>4. <B>C</B> Cry / Menangis</td><td>: "; 
if ($data_nyeri['nyeri04']=="0") {
echo "Tidak menangis (bangun atau tidur) (Skor ".$data_nyeri['nyeri04'].")";
}
elseif ($data_nyeri['nyeri04']=="1") {
echo "Mengerang/merintih (Skor ".$data_nyeri['nyeri04'].")";
}
elseif ($data_nyeri['nyeri04']=="2") {
echo "Menangis/merintih terus sampai dengan menjerit (Skor ".$data_nyeri['nyeri04'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>5. <B>C</B> Consolability / Respon tubuh</td><td>: "; if ($data_nyeri['nyeri05']=="4") {
echo "Santai (Skor ".$data_nyeri['nyeri05'].")";
}
elseif ($data_nyeri['nyeri05']=="1") {
echo "Mudah terangsang dengan sentuhan (Skor ".$data_nyeri['nyeri05'].")";
}
elseif ($data_nyeri['nyeri05']=="2") {
echo "Mudah terangsang tanpa sentuhan (Skor ".$data_nyeri['nyeri05'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


echo "<tr><td>Total Skor</td><td>: $data_nyeri[total_skor]</td></tr>";
echo "<tr><td>Kategori</td><td>: $data_nyeri[kategori]</td></tr>";
echo "<tr bgcolor='#000000'><td></td><td></td></tr>";
    $no++;  
    }}
?>  
</tr></table>  
</body>
</html>