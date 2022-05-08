<?php
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>NIPS</title>
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
	if ($data_nyeri['jenis']=="NIPS"){
	echo "<tr><td colspan='2'>----------- BATAS ATAS COPY PASTE -----------</td></tr>";
	echo "<tr><td colspan='2'>NIPS</td></tr>";
	echo "<tr><td>Tanggal</td><td>: $data_nyeri[tanggal]</td></tr>";
	echo "<tr><td>Shift</td><td>: $data_nyeri[shift]</td></tr>";
	
echo "<tr><td>1. Ekspresi Wajah</td><td>: "; if ($data_nyeri['nyeri01']=="0") {
echo "Santai (Skor ".$data_nyeri['nyeri01'].")";
}
elseif ($data_nyeri['nyeri01']=="1") {
echo "Meringis (Skor ".$data_nyeri['nyeri01'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>2. Menangis</td><td>: ";if ($data_nyeri['nyeri02']=="0") {
echo "Tidak Menangis (Skor ".$data_nyeri['nyeri02'].")";
}
elseif ($data_nyeri['nyeri02']=="1") {
echo "Merintih (Skor ".$data_nyeri['nyeri02'].")";
}
elseif ($data_nyeri['nyeri02']=="2") {
echo "Menagis kuat (Skor ".$data_nyeri['nyeri02'].")";
}
else {
echo "Tidak ada data.";
}"</td></tr>";


	echo "<tr><td>3. Pola bernapas</td><td>: "; if ($data_nyeri['nyeri03']=="0") {
echo "Santai (Skor ".$data_nyeri['nyeri03'].")";
}
elseif ($data_nyeri['nyeri03']=="1") {
echo "Perubahan pola napas (Skor ".$data_nyeri['nyeri03'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>4. Lengan</td><td>: "; 
if ($data_nyeri['nyeri04']=="0") {
echo "Santai (Skor ".$data_nyeri['nyeri04'].")";
}
elseif ($data_nyeri['nyeri04']=="1") {
echo "Flexi/extensi (Skor ".$data_nyeri['nyeri04'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>5. Kaki</td><td>: "; if ($data_nyeri['nyeri05']=="4") {
echo "Santai (Skor ".$data_nyeri['nyeri05'].")";
}
elseif ($data_nyeri['nyeri05']=="1") {
echo "Flexi/extensi (Skor ".$data_nyeri['nyeri05'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


echo "<tr><td>6. Keadaan rangsangan</td><td>: "; if ($data_nyeri['nyeri06']=="0") {
echo "Tertidur/bangun (Skor ".$data_nyeri['nyeri06'].")";
}
elseif ($data_nyeri['nyeri06']=="1") {
echo "Rewel (Skor ".$data_nyeri['nyeri06'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";

	echo "<tr><td>7. Nadi</td><td>: "; if ($data_nyeri['nyeri07']=="0") {
echo "10% dari baseline (Skor ".$data_nyeri['nyeri07'].")";
}
elseif ($data_nyeri['nyeri07']=="1") {
echo "11-20% dari baseline (Skor ".$data_nyeri['nyeri07'].")";
}
elseif ($data_nyeri['nyeri07']=="2") {
echo "&gt;20% dari baseline (Skor ".$data_nyeri['nyeri07'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";

	echo "<tr><td>8. Saturasi oksigen</td><td>: "; if ($data_nyeri['nyeri08']=="0") {
echo "Tidak memerlukan oksigen tambahan (Skor ".$data_nyeri['nyeri08'].")";
}
elseif ($data_nyeri['nyeri08']=="1") {
echo "Memerlukan oksigen tambahan (Skor ".$data_nyeri['nyeri08'].")";
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