<html>
<head>
<title>.: LAPORAN UGD EKA HOSPITAL</title>
</head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr>
      <td colspan="8" bgcolor="#CCCCCC"><div align="center"><strong>LAPORAN KUNJUNGAN </strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="16%" bgcolor="#D9E8F3"><strong>Kasus</strong></td>
      <td width="11%" bgcolor="#D9E8F3"><div align="center"><strong>Pulang</strong></div></td>
      <td width="11%" bgcolor="#D9E8F3"><div align="center"><strong>Rawat</strong></div></td>
      <td width="11%" bgcolor="#D9E8F3"><div align="center"><strong>Rujuk </strong></div></td>
      <td width="11%" bgcolor="#D9E8F3"><div align="center"><strong>Meninggal  </strong></div></td>
      <td width="11%" bgcolor="#D9E8F3"><div align="center"><strong>DOA</strong></div></td>
      <td width="14%" bgcolor="#D9E8F3"><div align="center"><strong>Menolak Rawat</strong></div></td>
      <td width="15%" bgcolor="#D9E8F3"><div align="center"><strong>Jumlah</strong></div></td>
    </tr>
<?php
// koneksi ke mysql
include "../librari/inc.koneksidb.php";
?>
    <tr bgcolor="#FFFFFF">
      <td><strong>Bedah</strong></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd_plg = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd_rwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd_rjk = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd_mgl = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd_doa = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd_mrwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Bedah'";
$hasil = query($query);
$num_rows_bd = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><strong>Non Bedah </strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb_plg = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb_rwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb_rjk = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb_mgl = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb_doa = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb_mrwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Non Bedah'";
$hasil = query($query);
$num_rows_nb = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><strong>Kebidanan</strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg_plg = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg_rwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg_rjk = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg_mgl = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg_doa = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg_mrwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Obgyn'";
$hasil = query($query);
$num_rows_obg = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><strong>Pediatrik</strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped_plg = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped_rwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped_rjk = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped_mgl = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped_doa = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped_mrwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_mrwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Pediatrik'";
$hasil = query($query);
$num_rows_ped = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped;?></div></td>
    </tr>
    
    <tr bgcolor="#FFFFFF">
      <td><strong>Psikiatrik</strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi_plg = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi_rwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi_rjk = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi_mgl = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi_doa = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi_mrwt = num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Psikiatrik'";
$hasil = query($query);
$num_rows_psi= num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
     <td bgcolor="#CCCCCC"><strong>Jumlah</strong></td>
     <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang'";
$hasil = query($query);
$num_rows_plg = num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat'";
$hasil = query($query);
$num_rows_rwt = num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk'";
$hasil = query($query);
$num_rows_rjk = num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal'";
$hasil = query($query);
$num_rows_mgl = num_rows($hasil);
?>
      <td bgcolor="#C1C1C1"><div align="center"><?php echo $num_rows_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA'";
$hasil = query($query);
$num_rows_doa = num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat'";
$hasil = query($query);
$num_rows_mrwt = num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = query($query);
$num_rows_total = num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_total;?></div></td>
    </tr>
  </table>
</body>
</html>
