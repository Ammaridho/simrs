<?php
include "../librari/config.php";
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
?>
<html>
<head>
<title>Tambah Golongan Obat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script>
function startCalc(){
interval = setInterval("calc()",1);
}
function calc(){
harga_beli = document.form1.harga_beli.value;
markup = document.form1.markup.value;
harga_markup = (harga_beli * 1) + harga_beli * (markup/100);
ppn = document.form1.ppn.value;
document.form1.harga_jual.value = (harga_beli * 1) + harga_beli*(markup/100) + harga_markup *(ppn/100);
}
function stopCalc(){
clearInterval(interval);
}
</script>
</head>
<body>
<form action="obat_gol_sim.php" method="post" name="form1" target="_self">
<table class="table" width="100%" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Tambah Golongan Obat</th>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Kode Golongan Obat</td>
  <td>
	<input class="form-control" name="kd_gol_obat" type="text" size="22" maxlength="6" value="" placeholder="Terisi otomatis" readonly>  </td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Nama Golongan Obat </td>
  <td><input class="form-control" name="gol_obat" type="text" size="35" maxlength="200" value="" placeholder="Nama Golongan Obat"></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>&nbsp;</td>
  <td> 
	<button type="submit" name="Submit" class="btn btn-primary">Tambah</button></td>
</tr>
</table>
</form>
</body>
</html>
