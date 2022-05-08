<?php 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Ketenagaan</title>
</head>
<body>
<form name="form1" method="post" action="tenaga.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
  <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
 <tr>
      <td colspan="6" bgcolor="#CCCCCC"><div align="left"><strong>Perhitungan tenaga perawat (Douglas)</strong></div></td>
</tr>
      <tr bgcolor="#FFFFFF">
      <td width="100" align="right" bgcolor="#FFFFFF">Cari</td>
      <td width="90" bgcolor="#FFFFFF">Ruang</td>
      <td width="400" bgcolor="#FFFFFF"><select name="kd_unit" id="kd_unit">
	<option value="" selected>----------------------</option>
       <option value="UPI">UPI</option>
      <option value="NICU">NICU</option>
	<option value="OK">OK</option>
	<option value="Intermediet">Intermediet</option>
      <option value="Shorea">Shorea</option>
	<option value="Pinus">Pinus</option>
	<option value="Cantleya">Cantleya</option>
	<option value="Eucaliptus">Eucaliptus</option>
	<option value="Acacia">Acacia</option>
    </select><input type="submit" name="Submit" value="Cari"></td>
<?php 
$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM data_pasien WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($sql);
$data = mysql_fetch_array($qry); 
?>
<input name="kd_kunjungan" id="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan']; ?>">
      <td bgcolor="#FFFFFF"></td>
     </tr>
  </table>
</form>
</body>
</html>
