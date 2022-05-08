<?php
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
$kd_obat = $_GET['kd_obat'];
?>
<html>
<head>
<title>Tambah Kandungan Obat</title>
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
<form action="obat_formula_sim.php" method="post" name="form1" target="_self">
<table width="100%"  border="0" align="left" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr align="left"> 
  <th colspan="2" scope="col">Tambah Kandungan Obat Formula</th>
</tr>
<tr bgcolor="#FFFFFF">
  <td>Nama Obat </td>
  <td><?php echo $kd_obat;?>
    <input name="kd_obat" type="hidden" size="35" maxlength="200" value="<?php echo $kd_obat;?>"></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td width="33%">Nama bahan </td>
  <td width="67%"><input class="form-control" name="nama_bahan" type="text" size="35" maxlength="200" value="" placeholder="Nama bahan obat"></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>Keterangan</td>
  <td><input class="form-control" name="keterangan" type="text" size="35" maxlength="200" value="" placeholder="Keterangan"></td>
</tr>
<tr bgcolor="#FFFFFF"> 
  <td>&nbsp;</td>
  <td> 
	<button type="submit" name="Hapus" class="btn btn-primary">Tambah</button>
</tr>
</table>
</form>
</body>
</html>
