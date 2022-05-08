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
$hasil = mysql_query($query);
$num_rows_bd_plg = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Bedah'";
$hasil = mysql_query($query);
$num_rows_bd_rwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Bedah'";
$hasil = mysql_query($query);
$num_rows_bd_rjk = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Bedah'";
$hasil = mysql_query($query);
$num_rows_bd_mgl = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Bedah'";
$hasil = mysql_query($query);
$num_rows_bd_doa = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Bedah'";
$hasil = mysql_query($query);
$num_rows_bd_mrwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Bedah'";
$hasil = mysql_query($query);
$num_rows_bd = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_bd;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><strong>Non Bedah </strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb_plg = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb_rwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb_rjk = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb_mgl = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb_doa = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb_mrwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Non Bedah'";
$hasil = mysql_query($query);
$num_rows_nb = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_nb;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><strong>Kebidanan</strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg_plg = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg_rwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg_rjk = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg_mgl = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg_doa = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg_mrwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Obgyn'";
$hasil = mysql_query($query);
$num_rows_obg = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_obg;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td><strong>Pediatrik</strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped_plg = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped_rwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped_rjk = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped_mgl = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped_doa = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped_mrwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped_mrwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Pediatrik'";
$hasil = mysql_query($query);
$num_rows_ped = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_ped;?></div></td>
    </tr>
    
    <tr bgcolor="#FFFFFF">
      <td><strong>Psikiatrik</strong></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi_plg = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi_rwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi_rjk = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi_mgl = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi_doa = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi_mrwt = mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND jenis_kasus='Psikiatrik'";
$hasil = mysql_query($query);
$num_rows_psi= mysql_num_rows($hasil);
?>
      <td><div align="center"><?php echo $num_rows_psi;?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
     <td bgcolor="#CCCCCC"><strong>Jumlah</strong></td>
     <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Pulang'";
$hasil = mysql_query($query);
$num_rows_plg = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_plg;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rawat'";
$hasil = mysql_query($query);
$num_rows_rwt = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_rwt;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Rujuk'";
$hasil = mysql_query($query);
$num_rows_rjk = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_rjk;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Meninggal'";
$hasil = mysql_query($query);
$num_rows_mgl = mysql_num_rows($hasil);
?>
      <td bgcolor="#C1C1C1"><div align="center"><?php echo $num_rows_mgl;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='DOA'";
$hasil = mysql_query($query);
$num_rows_doa = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_doa;?></div></td>
<?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2' AND tindak_lanjut='Menolak Rawat'";
$hasil = mysql_query($query);
$num_rows_mrwt = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_mrwt;?></div></td>
	  <?php
$query = "SELECT * FROM laporan WHERE  shift LIKE '%$namaFile%' AND tanggal>='$bydate1' AND tanggal<='$bydate2'";
$hasil = mysql_query($query);
$num_rows_total = mysql_num_rows($hasil);
?>
      <td bgcolor="#CCCCCC"><div align="center"><?php echo $num_rows_total;?></div></td>
    </tr>
  </table>
</body>
</html>
