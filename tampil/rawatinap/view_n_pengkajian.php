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
Pengkajian:
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<?php
// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM discharge_plan WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$adadata = mysqli_num_rows($hasil);
$i=1;
if ($adadata >=1) {
   while ($data = mysqli_fetch_array($hasil)){
   $kalimat = substr($data['outcome'],0,50)
   ?>
   <tr bgcolor="#FFFFFF">
      <td width="5%" bgcolor="#FFFFFF"><div align="center"><?php echo $i;?></div></td>
      <td width="20%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['tanggal'];?></div></td>
      <td width="10%" bgcolor="#FFFFFF"><div align="left">Skor: <?php echo $data['hasil'];?></div></td>
      <td width="65%" bgcolor="#FFFFFF"><div align="left"><?php echo $data['kriteria'];?></div></td>
   </tr>
   <?php
   $i++;
   }
}
else {
   include "pengkajian_viewall.php";
}
?>
</table>
</body>
</html>