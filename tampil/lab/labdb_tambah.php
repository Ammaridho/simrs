<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<html>
<head>
<title>TAMBAH DATABASE LABORATORIUM</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
  <table class="table" align="left" width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <form name="form1" method="post" action="labdb_sim.php">
      <tr bgcolor="#FFFFFF">
     	<td colspan="2" bgcolor="#D9E8F3">TAMBAH DATABASE LABORATORIUM</td>
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
	<select name="gol_lab" id="gol_lab">
	<option value="">--Golongan Lab--</option>
	<?php
	//mengambil nama-nama klinik yang ada di database
	$lab = mysqli_query($koneksi, "SELECT * FROM gol_lab");
	while($l=mysqli_fetch_array($lab)){
	echo "<option value=\"$l[gol_lab]\">$l[gol_lab]</option>\n";
	}
	?>
	</select>
	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
   	  <td width="30%" bgcolor="#FFFFFF">Nama pemeriksaan </td>
      	<td align="left" bgcolor="#FFFFFF"><input class="form-control" type="text" name="nama_lab"></td>
	</tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Nilai normal atas </td>
      <td colspan="2" bgcolor="#FFFFFF"><input class="form-control" type="text" name="nilai_atas"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Nilai normal bawah </td>
      <td colspan="2" bgcolor="#FFFFFF"><input class="form-control" type="text" name="nilai_bawah"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Harga</td>
      <td colspan="2" bgcolor="#FFFFFF"><input class="form-control" type="text" name="harga_lab"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">Discount</td>
      <td colspan="2" bgcolor="#FFFFFF"><input class="form-control" type="text" name="discount"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
   	  <td width="30%" bgcolor="#FFFFFF"><button type="submit" name="Hapus" class="btn btn-primary">Tambah</button></td>
      	<td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
	  </form>
</table>
</body>
</html></br></br>
