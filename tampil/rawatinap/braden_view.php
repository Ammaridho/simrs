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
    $tampil = mysqli_query("SELECT * FROM braden WHERE kd_kunjungan='$kd_kunjungan'ORDER BY tanggal DESC LIMIT 8 ");  
    while($data_braden=mysql_fetch_array($tampil)){
    echo "<tr><td colspan=2>--------BATAS ATAS COPY PASTE-----------</td><tr>";  
    echo "<tr><td colspan=2>SKALA BRADEN</td><tr>";
    echo "<tr><td colspan=2>".$data_braden['tanggal']."</td><tr>";
    echo "<tr><td>1. Persepsi sensori</td><td>: "; if ($data_braden['braden01']=="1") {
echo "Sangat terbatas (Skor ".$data_braden['braden01'].")";
}
elseif ($data_braden['braden01']=="2") {
echo "Terbatas (Skor ".$data_braden['braden01'].")";
}
elseif ($data_braden['braden01']=="3") {
echo "Sedikit terbatas (Skor ".$data_braden['braden01'].")";
}
elseif ($data_braden['braden01']=="4") {
echo "Normal (Skor ".$data_braden['braden01'].")";
}
else {
echo "Tidak ada data_braden";
}"</td></tr>";
	echo "<tr><td>2. Kelembaban</td><td>: ";if ($data_braden['braden02']=="1") {
echo "Selalu lembab (Skor ".$data_braden['braden02'].")";
}
elseif ($data_braden['braden02']=="2") {
echo "Sering lembab (Skor ".$data_braden['braden02'].")";
}
elseif ($data_braden['braden02']=="3") {
echo "Kadang-kadang lembab (Skor ".$data_braden['braden02'].")";
}
elseif ($data_braden['braden02']=="4") {
echo "Jarang lembab (Skor ".$data_braden['braden02'].")";
}
else {
echo "";
}"</td></tr>";
	echo "<tr><td>3. Aktifitas</td><td>: "; if ($data_braden['braden03']=="1") {
echo "Di tempat tidur (Skor ".$data_braden['braden03'].")";
}
elseif ($data_braden['braden03']=="2") {
echo "Terbatas di kursi atau kursi roda (Skor ".$data_braden['braden03'].")";
}
elseif ($data_braden['braden03']=="3") {
echo "Kadang-kadang berjalan (Skor ".$data_braden['braden03'].")";
}
elseif ($data_braden['braden03']=="4") {
echo "Sering berjalan (Skor ".$data_braden['braden03'].")";
}
else {
echo "";
}"</td></tr>";
	echo "<tr><td>4. Mobilisasi</td><td>: "; if ($data_braden['braden04']=="1") {
echo "Tergantung (Skor ".$data_braden['braden04'].")";
}
elseif ($data_braden['braden04']=="2") {
echo "Sangat terbatas (Skor ".$data_braden['braden04'].")";
}
elseif ($data_braden['braden04']=="3") {
echo "Sedikit terbatas (Skor ".$data_braden['braden04'].")";
}
elseif ($data_braden['braden04']=="4") {
echo "Tidak terbatas (Skor ".$data_braden['braden04'].")";
}
else {
echo "";
}"</td></tr>";
	echo "<tr><td>5. Nutrisi</td><td>: "; if ($data_braden['braden05']=="1") {
echo "Sangat buruk (Skor ".$data_braden['braden05'].")";
}
elseif ($data_braden['braden05']=="2") {
echo "Tidak cukup (Skor ".$data_braden['braden05'].")";
}
elseif ($data_braden['braden05']=="3") {
echo "Cukup (Skor ".$data_braden['braden05'].")";
}
elseif ($data_braden['braden05']=="4") {
echo "Sangat baik (Skor ".$data_braden['braden05'].")";
}
else {
echo "";
}"</td></tr>";
	echo "<tr><td>6. Pergesekan</td><td>: "; if ($data_braden['braden06']=="1") {
echo "Masalah (Skor ".$data_braden['braden05'].")";
}
elseif ($data_braden['braden06']=="2") {
echo "Masalah potensial (Skor ".$data_braden['braden06'].")";
}
elseif ($data_braden['braden06']=="3") {
echo "Tidak ada masalah nyata (Skor ".$data_braden['braden06'].")";
}
else {
echo "";
}"</td></tr>";
echo "<tr><td>Total Skor</td><td>: $data_braden[braden_pasien]</td></tr>";
echo "<tr><td>Kategori</td><td>: $data_braden[keterangan]</td></tr>";
echo "<tr><td colspan=2>--------BATAS BAWAH COPY PASTE-----------</td></tr>";
    $no++;  
    }  
?>  

</tr>
</table>  
</body>
</html>