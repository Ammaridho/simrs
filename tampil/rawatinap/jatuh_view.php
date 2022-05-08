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
	if ($data_jatuh['']=="MORSE"){
	
	
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


	echo "<tr><td>4. Penggunaan alat kesehatan (IV catheter, Dower catheter, NGT) </td><td>: "; if ($data_jatuh['jatuh04']=="1") {
echo "Tergantung (Skor ".$data_jatuh['jatuh04'].")";
}
elseif ($data_jatuh['jatuh04']=="2") {
echo "Sangat terbatas (Skor ".$data_jatuh['jatuh04'].")";
}
elseif ($data_jatuh['jatuh04']=="3") {
echo "Sedikit terbatas (Skor ".$data_jatuh['jatuh04'].")";
}
elseif ($data_jatuh['jatuh04']=="4") {
echo "Tidak terbatas (Skor ".$data_jatuh['jatuh04'].")";
}
else {
echo "";
}"</td></tr>";


	echo "<tr><td>5. Mobilisasi/pergerakkan</td><td>: "; if ($data_jatuh['jatuh05']=="1") {
echo "Sangat buruk (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="2") {
echo "Tidak cukup (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="3") {
echo "Cukup (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh05']=="4") {
echo "Sangat baik (Skor ".$data_jatuh['jatuh05'].")";
}
else {
echo "";
}"</td></tr>";


	echo "<tr><td>6. Status mental</td><td>: "; if ($data_jatuh['jatuh06']=="1") {
echo "Masalah (Skor ".$data_jatuh['jatuh05'].")";
}
elseif ($data_jatuh['jatuh06']=="2") {
echo "Masalah potensial (Skor ".$data_jatuh['jatuh06'].")";
}
elseif ($data_jatuh['jatuh06']=="3") {
echo "Tidak ada masalah nyata (Skor ".$data_jatuh['jatuh06'].")";
}
else {
echo "";
}"</td></tr>";
echo "<tr><td>Total Skor</td><td>: $data_jatuh[jatuh_pasien]</td></tr>";
echo "<tr><td>Kategori</td><td>: $data_jatuh[keterangan]</td></tr>";
    $no++;  
    }  
	}
?>  
</tr></table>  
</body>
</html>