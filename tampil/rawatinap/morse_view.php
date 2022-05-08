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
   <tr>
<?php  
    $no=1;  
    $tampil = mysqli_query("SELECT * FROM skala_jatuh WHERE kd_kunjungan='$kd_kunjungan'ORDER BY tanggal DESC LIMIT 8 ");  
    while($data_jatuh=mysql_fetch_array($tampil)){  
	if ($data_jatuh['jenis']=="MORSE"){
	echo "<tr><td colspan='2'>----------- BATAS ATAS COPY PASTE -----------</td></tr>";
	echo "<tr><td colspan='2'> </td></tr>";
	echo "<tr><td colspan='2'>SKALA MORSE</td></tr>";
	echo "<tr><td>Tanggal</td><td>: $data_jatuh[tanggal]</td></tr>";
	echo "<tr><td>Shift</td><td>: $data_jatuh[shift]</td></tr>";
    echo "<tr><td>1. Riwayat jatuh dalam 3 (tiga) bulan terakhir </td><td>: "; if ($data_jatuh['jatuh01']=="0") {
echo "Tidak (Skor ".$data_jatuh['jatuh01'].")";
}
elseif ($data_jatuh['jatuh01']=="25") {
echo "Ya (Skor ".$data_jatuh['jatuh01'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>2. Diagnosa sekunder</td><td>: ";if ($data_jatuh['jatuh02']=="0") {
echo "Tidak (Skor ".$data_jatuh['jatuh02'].")";
}
elseif ($data_jatuh['jatuh02']=="15") {
echo "Ya (Skor ".$data_jatuh['jatuh02'].")";
}
else {
echo "Tidak ada data.";
}"</td></tr>";


	echo "<tr><td>3. Menggunakan alat bantu</td><td>: "; if ($data_jatuh['jatuh03']=="30") {
echo "Furniture (meja, kursi/sofa, lemari, dll) (Skor ".$data_jatuh['jatuh03'].")";
}
elseif ($data_jatuh['jatuh03']=="15") {
echo "Kruk, tongkat berjalan, walker (Skor ".$data_jatuh['jatuh03'].")";
}
elseif ($data_jatuh['jatuh03']=="0") {
echo "Tidak menggunakan alat bantu/bedrest (Skor ".$data_jatuh['jatuh03'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>4. Penggunaan alat kesehatan (IV catheter, Dower catheter, NGT) </td><td>: "; 
if ($data_jatuh['jatuh04']=="0") {
echo "Tidak (Skor ".$data_jatuh['jatuh04'].")";
}
elseif ($data_jatuh['jatuh04']=="20") {
echo "Ya (Skor ".$data_jatuh['jatuh04'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>5. Mobilisasi/pergerakkan</td><td>: "; if ($data_jatuh['jatuh05']=="0") {
echo "Normal/Bedrest total/immobilisasi (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="10") {
echo "Mobilisasi lemah (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="20") {
echo "Terganggu, menggunakan pegangan untuk keseimbangan (Skor ".$data_jatuh['jatuh05'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";


	echo "<tr><td>6. Status mental</td><td>: "; if ($data_jatuh['jatuh06']=="0") {
echo "Sadar akan kemampuan dirinya (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh06']=="15") {
echo "Tidak sadar/keterbatasan (Skor ".$data_jatuh['jatuh06'].")";
}
else {
echo "Tidak ada data";
}"</td></tr>";
echo "<tr><td>Total Skor</td><td>: $data_jatuh[total_skor]</td></tr>";
echo "<tr><td>Kategori</td><td>: $data_jatuh[kategori]</td></tr>";

	echo "<tr><td>7. Menggunakan obat-obat/alkohol</td><td>: "; 
echo"$data_jatuh[ketergantungan_obat], $data_jatuh[keterangan]</td></tr>";
	echo "<tr><td colspan='2'> </td></tr>";
	echo "<tr><td colspan='2'>----------- BATAS ATAS COPY PASTE -----------</td></tr>";
    $no++;  
    }  
	}
?>  
</tr></table>  
</body>
</html>