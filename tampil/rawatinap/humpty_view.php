<?php
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>HUMPTY DUMPTY</title>
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
    $tampil = mysqli_query("SELECT * FROM skala_jatuh WHERE kd_kunjungan='$kd_kunjungan'ORDER BY tanggal DESC LIMIT 8 ");  
    while($data_jatuh=mysql_fetch_array($tampil)){  
	if ($data_jatuh['jenis']=="HUMPTY DUMPTY"){
	echo "<tr><td colspan='2'>----------- BATAS ATAS COPY PASTE -----------</td></tr>";
	echo "<tr><td colspan='2'>HUMPTY DUMPTY</td></tr>";
	echo "<tr><td>Tanggal</td><td>: $data_jatuh[tanggal]</td></tr>";
	echo "<tr><td>Shift</td><td>: $data_jatuh[shift]</td></tr>";
	
echo "<tr><td>1. Usia </td><td>: "; if ($data_jatuh['jatuh01']=="4") {
echo "< 3 tahun (Skor ".$data_jatuh['jatuh01'].")";
}
elseif ($data_jatuh['jatuh01']=="3") {
echo "3 – 7 tahun (Skor ".$data_jatuh['jatuh01'].")";
}
elseif ($data_jatuh['jatuh01']=="2") {
echo "7 – 13 tahun (Skor ".$data_jatuh['jatuh01'].")";
}
elseif ($data_jatuh['jatuh01']=="1") {
echo "&ge; 13 tahun (Skor ".$data_jatuh['jatuh01'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>2. Jenis kelamin</td><td>: ";if ($data_jatuh['jatuh02']=="2") {
echo "Laki-laki (Skor ".$data_jatuh['jatuh02'].")";
}
elseif ($data_jatuh['jatuh02']=="1") {
echo "Perempuan (Skor ".$data_jatuh['jatuh02'].")";
}
else {
echo "Tidak ada data.";
}"</td></tr>";


	echo "<tr><td>3. Diagnosis</td><td>: "; if ($data_jatuh['jatuh03']=="4") {
echo "Diagnosis neurologi  (Skor ".$data_jatuh['jatuh03'].")";
}
elseif ($data_jatuh['jatuh03']=="3") {
echo "Perubahan oksigenasi (diagnosis respiratorik, dehidrasi, anemia, anoreksia, sinkop, pusing, dsb) (Skor ".$data_jatuh['jatuh03'].")";
}
elseif ($data_jatuh['jatuh03']=="2") {
echo "Gangguan perilaku / psikiatri (Skor ".$data_jatuh['jatuh03'].")";
}
elseif ($data_jatuh['jatuh03']=="1") {
echo "Diagnosis lainnya (Skor ".$data_jatuh['jatuh03'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>4. Gangguan kognitif </td><td>: "; 
if ($data_jatuh['jatuh04']=="3") {
echo "Tidak menyadari keterbatasan dirinya (Skor ".$data_jatuh['jatuh04'].")";
}
elseif ($data_jatuh['jatuh04']=="2") {
echo "Lupa akan adanya keterbatasan (Skor ".$data_jatuh['jatuh04'].")";
}
elseif ($data_jatuh['jatuh04']=="1") {
echo "Orientasi baik terhadap diri sendiri (Skor ".$data_jatuh['jatuh04'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>5. Faktor lingkungan</td><td>: "; if ($data_jatuh['jatuh05']=="4") {
echo "Riwayat jatuh / bayi diletakkan di tempat tidur dewasa (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="3") {
echo "Pasien menggunakan alat bantu / bayi diletakkan dalam tempat tidur bayi / perabot rumah (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="2") {
echo "Pasien diletakkan di tempat tidur (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="1") {
echo "Area di luar rumah sakit (Skor ".$data_jatuh['jatuh05'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>6. Respons terhadap pembedahan/ sedasi / anestesi </td><td>: "; if ($data_jatuh['jatuh06']=="3") {
echo "Dalam 24 jam (Skor ".$data_jatuh['jatuh06'].")";
}
elseif ($data_jatuh['jatuh06']=="2") {
echo "Dalam 48 jam (Skor ".$data_jatuh['jatuh06'].")";
}
elseif ($data_jatuh['jatuh06']=="1") {
echo "> 48 jam atau tidak menjalani pembedahan/sedasi/anestesi (Skor ".$data_jatuh['jatuh06'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";

	echo "<tr><td>. Respons terhadap penggunaan medikamentosa</td><td>: "; if ($data_jatuh['jatuh07']=="3") {
echo "Penggunaan multipel: sedatif, obat hipnosis, barbiturat, fenotiazin, antidepresan, pencahar, diuretik, narkose (Skor ".$data_jatuh['jatuh07'].")";
}
elseif ($data_jatuh['jatuh07']=="2") {
echo "Penggunaan salah satu obat di atas (Skor ".$data_jatuh['jatuh07'].")";
}
elseif ($data_jatuh['jatuh07']=="1") {
echo "Penggunaan medikasi lainnya / tidak ada medikasi (Skor ".$data_jatuh['jatuh07'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


echo "<tr><td>Total Skor</td><td>: $data_jatuh[total_skor]</td></tr>";
echo "<tr><td>Kategori</td><td>: $data_jatuh[kategori]</td></tr>";
echo "<tr bgcolor='#000000'><td></td><td></td></tr>";
    $no++;  
    }  
	}
?>  
</tr></table>  
</body>
</html>