<?php
include "../librari/inc.koneksidb.php";
include "../librari/fungsi_indotgl.php";
include_once "../librari/inc.session.php";
?>
<?php 

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_error($koneksi));
   $data=mysqli_fetch_array($qry);
   $jumdata=mysqli_num_rows($qry);
}

$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($koneksi, $query);
$data_u = mysqli_fetch_array($hasil);

$tahun = floor($data_u['selisih']/365);
$bulan = floor(($data_u['selisih'] - ($tahun * 365))/30);
$hari = $data_u['selisih'] - $bulan * 30 - $tahun * 365;


//QUERY DATA PENGKAJIAN 
$asm_db1 = $_REQUEST['asm_db1'];
$query1 ="SELECT a.*, b.* FROM pengkajian a,asm_db1 b WHERE a.asm_db1=b.asm_db1_code AND a.kd_kunjungan='$kd_kunjungan' AND a.asm_db1='$asm_db1'";
$result1 =mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
$data1=mysqli_fetch_array($result1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['prn']; echo " - "; echo $data1['asm_db1_name'];?></title>
</head>
<body>

<?php 
echo "<table align='center' width='100%' border='0' cellpadding='2' cellspacing='1'>
<tr>
<td align='center' width='30%'><img src='../../media/image/logo_rsutangsel.png' width='100px' height='100px'></td>
<td align='center' width='70%'><h2><b>RSUD Kota Tangerang Selatan</b></h2>
Jl. Pajajaran No.101, Pamulang Bar., Kec. Pamulang, Kota Tangerang Selatan, Banten 15417
</td>
</tr></table>";
echo "<hr>";
echo "<div align='center'><h2><b>".$data1['asm_db1_name']."</b></h2></div>";

/* DATA PASIEN */
echo "<table align='center' width='100%' border='0' cellpadding='2' cellspacing='1'>";
echo "<tr><td width='30%'><b>IDENTITAS PASIEN</b></td>";
echo "<td width='2%'></td>";
echo "<td width='68%'></td></tr>";

echo "<tr><td width='30%'>Nama</td>";
echo "<td width='2%'>:</td>";
echo "<td width='68%'>$data[nama]</td></tr>";

echo "<tr><td width='30%'>Tanggal lahir</td>";
echo "<td width='2%'>:</td>";
echo "<td width='68%'>".tgl_indo2($data[tgl_lahir])."</td></tr>";

echo "<tr><td width='30%'>Nomor MR</td>";
echo "<td width='2%'>:</td>";
echo "<td width='68%'>$data[prn]</td></tr>

</table>";


$asm_db1 = $data1['asm_db1'];
$query2 ="SELECT * FROM pengkajian,asm_db2 WHERE pengkajian.asm_db2=asm_db2.asm_db2_code AND asm_db1='$asm_db1' AND kd_kunjungan='$kd_kunjungan' GROUP  BY asm_db2";
$result2 =mysqli_query($koneksi,$query2) or die(mysqli_error($koneksi));
while($data2=mysqli_fetch_array($result2)){
echo "<table align='center' width='100%' border='0' cellpadding='2' cellspacing='1' bgcolor='#FFFFFF'>";




/* DATA PENGKAJIAN */
echo"<tr><td colspan='3'>";
echo "<b>".$data2['asm_db2_name']."</b></td></tr>";





$asm_db2 = $data2['asm_db2'];
$query3 ="SELECT * FROM pengkajian,asm_db3 WHERE pengkajian.asm_db3=asm_db3.asm_db3_code AND asm_db2='$asm_db2' AND kd_kunjungan='$kd_kunjungan' ORDER BY asm_db3";
$result3 =mysqli_query($koneksi,$query3) or die(mysqli_error($koneksi));
while($data3=mysqli_fetch_array($result3)){
echo "<tr><td width='30%'>";
 echo $data3['asm_db3_name'];
 echo "</td>";
 echo "<td width='2%'>:</td>";
 echo "<td width='68%'>";

if($data3['mandatori']==0 && $data3['asm_db4']==""){
echo "N/A";}
else { 
echo $data3['asm_db4'];
echo"</td></tr>";
 
}

?>
<?php 
}
}
echo "<tr height='150px'><td></td><td></td><td>Tangerang selatan, ".date("d-m-Y")."</td></tr>";
echo "<tr><td></td><td></td><td> (".$_SESSION['nama'].")</td></tr>";
echo "</table>";

?>
</body>
</html>
<script>
	window.print();
</script>