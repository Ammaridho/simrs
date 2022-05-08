<?php
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
?>
<html>
<head>
<title>Tambah Spesialis</title>
</head>
<body>
<form action="spesialis_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">TAMBAH SPESIALIS</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Kode Spesialis</td>
  <td width="67%">
	<input name="kd_klinik" type="text" size="10" maxlength="35"  value=""  placeholder="Terisi otomatis" readonly>  </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td>Kategori</td>
  <td><select name="kategori" id="kategori">
    <option>[ Pilih kategori ]</option>
    <?php
//mengambil nama-nama kategori SDM yang ada di database
$sql      = "SELECT * FROM gol_tm ORDER BY kd_gol_tm";
$kategori = mysqli_query($koneksi,$sql);
while($p=mysqli_fetch_array($kategori)){
echo "<option value=\"$p[kd_gol_tm]\">$p[gol_tm]</option>\n";
}
?>
$sql  = " INSERT INTO klinikdb (kd_klinik,kd_gol_tm,nama_klinik)";
$sql .= "VALUES ('$kd_klinik','$kategori','$nama_klinik')";
	mysqli_query($koneksi,$sql) 


  </select></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Spesialis</td>
  <td><input name="nama_klinik" type="text" size="70" maxlength="200">  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>&nbsp;</td>
  <td> 
	<input name="Submit" type="submit" value="Tambah">  </td>
</tr>
</table>
</form>
</body>
</html>
