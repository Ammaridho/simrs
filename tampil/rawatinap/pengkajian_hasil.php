<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<table width="98%" cellpadding="0" cellspacing="0">
  <col width="25%" span="2" />
  <col width="25%" />
  <col width="25%" />
  <tr height="">
    <td height="19" width="131">Tanggal</td>
    <td width="136">Skor</td>
    <td width="291">Keterangan</td>
    <td width="388">User</td>
  </tr>
  <?php
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$nama_table= $data1['nama_table'];
$query2 = "SELECT * FROM $nama_table WHERE kd_kunjungan='$kd_kunjungan'";
$hasil2 = mysqli_query($query2);
while($data2 = mysql_fetch_array($hasil2))
{
?>
  <tr height="19">
    <td height="19"><?php echo $data2['tanggal'];?></td>
    <td><?php echo $data2['hasil'];?></td>
    <td><?php echo $data2['keterangan'];?></td>
    <td><?php echo $data2['nik'];?></td>
  </tr><?php
}
?>
</table>
</body>
</html>
