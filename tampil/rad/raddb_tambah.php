<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<html>
<head>
<title>TAMBAH DATABASE RADIOLOGI</title>
<style type="text/css">
<!--
a:link {
	color: #000080;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
</head>
<body id="tab2">
</hr>
  <table align="left" width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <form name="form1" method="post" action="raddb_sim.php">
      <tr bgcolor="#FFFFFF">
     	<td colspan="2" bgcolor="#D9E8F3">TAMBAH DATABASE RADIOLOGI</td>
   	</tr>
    <tr bgcolor="#FFFFFF">
    <td bgcolor="#FFFFFF">Institusi</td>
    <td width="70%" bgcolor="#FFFFFF">
	<select name="inst" id="inst">
	<option value="">--Institusi--</option>
	<?php
	//mengambil nama-nama klinik yang ada di database
    $query1 = "SELECT * FROM institusi";
    $hasil1 = mysqli_query($koneksi,$query1);
    while ($data1 = mysqli_fetch_array($hasil1)){
	echo "<option value=\"$data1[inst]\">$data1[nama_institusi]</option>\n";
	}
	?>
	</select>
	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td bgcolor="#FFFFFF">Golongan</td>
    <td width="70%" bgcolor="#FFFFFF">
	<select name="gol_rad" id="gol_rad">
	<option value="">--Golongan--</option>
	<?php
	//mengambil nama-nama klinik yang ada di database
    $query = "SELECT * FROM gol_rad";
    $hasil = mysqli_query($koneksi,$query);
    while ($data = mysqli_fetch_array($hasil)){
	echo "<option value=\"$data[gol_rad]\">$data[gol_rad]</option>\n";
	}
	?>
	</select>
	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
   	  <td width="30%" bgcolor="#FFFFFF">Nama pemeriksaan </td>
      	<td align="left" bgcolor="#FFFFFF"><input type="text" name="nama_rad"></td>
	</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Harga</td>
      <td colspan="2" bgcolor="#FFFFFF"><input type="text" name="harga_rad"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Discount</td>
      <td colspan="2" bgcolor="#FFFFFF"><input type="text" name="discount"></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Keterangan</td>
      <td colspan="2" bgcolor="#FFFFFF"><input type="text" name="keterangan"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
   	  <td width="30%" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Tambahkan"></td>
      	<td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
	  </form>
</table>
</body>
</html></br></br>
