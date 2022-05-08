<?php 
include "../librari/inc.koneksidb.php";
include "header.php";

$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi, $sql) or die ("error:".mysqli_error($koneksi));
$data = mysqli_fetch_array($qry); 
?>
<html>
<head>
<title>Cari Diagnosa</title>
</head>
<body id="tab2">
<form name="form1" method="post" action="diagnosa.php?kd_kunjungan=<?php echo $kd_kunjungan; ?>">
  <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
      <tr bgcolor="#FFFFFF">
      <td width="100" align="right" bgcolor="#FFFFFF">Cari</td>
      <td width="90" bgcolor="#FFFFFF">Diagnosa</td>
      <td width="400" bgcolor="#FFFFFF"><input name="diagnosa" type="text" id="diagnosa" value="<?php echo $diagnosa; ?>"><input type="submit" name="Submit" value="Cari"></td>
<input name="kd_kunjungan" id="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan']; ?>">
      <td bgcolor="#FFFFFF"></td>
     </tr>
  </table>
</form>
</body>
</html>
<?php 
include "diagnosa_lihat.php";
?>
