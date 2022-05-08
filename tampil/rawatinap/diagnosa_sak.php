<?php 
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>DIAGNOSA KEPERAWATAN</title></head>
<body id="tab8">
  <table align="left" width="22%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF">
      <td width="1%" align="center" bgcolor="#D9E8F3"><strong>NO</strong></td>
      <td width="5%" align="center" bgcolor="#D9E8F3"><strong>PENYAKIT</strong></td>
    </tr>
  <tr bgcolor="#FFFFFF">
<?php
$kd_penyakit = $_REQUEST['kd_penyakit'];
$query2 = "SELECT * FROM sak GROUP BY kd_penyakit";
$hasil2 = mysqli_query($query2);
$no = 1;
while ($data2 = mysql_fetch_array($hasil2))
{
?>
      <td width="1%" align="left" bgcolor="#FFFFFF"><?php echo $no++;?></td>
      <td width="5%" align="left" bgcolor="#FFFFFF"><a href="?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&kd_penyakit=<?php echo $data2['kd_penyakit'];?>"><?php echo $data2['penyakit'];?></a></td>
    </tr>
    <?
}
?>
</table>
<?php
include "diagnosa_sak2.php";
?>
</body>
</html>
