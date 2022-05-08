<?php 
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
?>
<html>
<head>
	<title>DAFTAR FORMULA OBAT</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style type="text/css">
		<!--
		.style1 {color: #FF0000}
		-->
		</style>
		</head>
		<body>
	<table class="table" align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
			<td colspan="5" bgcolor="#CCCCCC"><div align="left"><strong>FORMULA OBAT</strong></div></td>
			</tr>
			<tr bgcolor="#FFFFFF">
			<td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>KODE</strong></div></td>
			<td width="10%" bgcolor="#D9E8F3"><div align="center"><strong>GOLONGAN</strong></div></td>
			<td width="25%" bgcolor="#D9E8F3"><div align="center"><strong>NAMA OBAT </strong></div></td>
			<td width="39%" bgcolor="#D9E8F3"><div align="center"><strong>ISI OBAT </strong></div></td>
			<td width="16%" bgcolor="#D9E8F3"><div align="center"></div></td>
			</tr>
		<?php 
			$sql = "SELECT * FROM obat_db WHERE gol_obat='Formula' ORDER BY kd_obat";
			$qry = mysqli_query($koneksi,$sql) 
				or die ("SQL Error".mysqli_connect_error());
			while ($data=mysqli_fetch_array($qry)) {
		?>
			<tr bgcolor="#FFFFFF">
			<td><?php echo $data['kd_obat'];?></td>
			<td><?php echo $data['gol_obat'];?></td>
			<td><?php echo $data['nama_obat'];?></td>
			<td align="left">
			<?php 
			$kd_obat = $data['kd_obat'];
			$sql2 = "SELECT * FROM obat_formula WHERE kd_obat='$kd_obat' ORDER BY nama_bahan";
			$qry2 = mysqli_query($koneksi,$sql2) 
				or die ("SQL Error".mysqli_connect_error());
			while ($data2=mysqli_fetch_array($qry2)) {
				echo "".$data2[nama_bahan].", ket : ".$data2[keterangan]."</br>";
				}
			?>
			</td>
			<td><a href="obat_formula.php?kd_obat=<?php echo $data['kd_obat']; ?>"><button class="btn btn-primary">Tambah</button></a></td>
			<?php
		}
		?>
			</tr>
  </table>
</body>
</html>
