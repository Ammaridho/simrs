<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];

?>
<html>
<head>
</head>
<body>
Laboratorium:
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<?php
// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM lab WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$adadata = mysqli_num_rows($hasil);
$i=1;
if ($adadata >=1) {
   while ($data = mysqli_fetch_array($hasil)){
   $kalimat = substr($data['nama_obat'],0,20)
   ?>
   <tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="center"><?php echo $i;?></div></td>
      <td width="25%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['tanggal_lab'];?></div></td>
      <td width="70%" bgcolor="#FFFFFF"><div align="left">
         <?php 
         echo $data['nama_lab'];
         echo " : ";
         echo $data['hasil'];
         ?></div></td>
   </tr>
   <?php
   $i++;
   }
}
else {
   echo "Tidak ada data";
}
?>
</table>
</body>
</html>