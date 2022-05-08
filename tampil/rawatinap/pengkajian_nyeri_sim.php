<?php 
include "../librari/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$jam	= $_REQUEST['jam'];
$shift	= $_REQUEST['shift'];
$nik	= $_REQUEST['nik'];
$jenis	= $_REQUEST['jenis'];
$nyeri1 	= $_REQUEST['nyeri1'];
$nyeri2= array(); 
$nyeri2=$_REQUEST['nyeri2']; 
for($i=0;$i<count($nyeri2);$i++) 
{ 
    $selected_nyeri2=$selected_nyeri2.$nyeri2[$i]. ", "; 
} 
$nyeri3 	= $_REQUEST['nyeri3'];
$nyeri4 	= $_REQUEST['nyeri4'];
$nyeri5 	= $_REQUEST['nyeri5'];
$nyeri6 	= $_REQUEST['nyeri6'];
$nyeri7 	= $_REQUEST['nyeri7'];
$nyeri8 	= $_REQUEST['nyeri8'];
$nyeri9 	= $_REQUEST['nyeri9'];
$nyeri10 	= $_REQUEST['nyeri10'];
$nyeri11= array(); 
$nyeri11=$_REQUEST['nyeri11']; 
for($i=0;$i<count($nyeri11);$i++) 
{ 
    $selected_nyeri11=$selected_nyeri11.$nyeri11[$i]. ", "; 
}
$nyeri12 	= $_REQUEST['nyeri12'];
$nyeri13 	= $_REQUEST['nyeri13'];
$nyeri14 	= $_REQUEST['nyeri14'];
$nyeri15 	= $_REQUEST['nyeri15'];
 
	$sql  = " INSERT INTO skala_nyeri (kd_kunjungan,tanggal,jam,shift,nik,jenis,nyeri01,nyeri02,nyeri03,nyeri04,nyeri05,nyeri06,nyeri07,nyeri08,nyeri09,nyeri10,nyeri11,nyeri12,nyeri13,nyeri14,nyeri15,total_skor,kategori)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$jam','$shift','$nik','Skala nyeri numerik','$nyeri1','$selected_nyeri2','$nyeri3','$nyeri4','$nyeri5','$nyeri6','$nyeri7','$nyeri8','$nyeri9','$nyeri10' ,'$selected_nyeri11','$nyeri12','$nyeri13','$nyeri14','$nyeri15','','')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Pengkajian awal sudah ada yang mengecek !".mysqli_error($koneksi));

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
