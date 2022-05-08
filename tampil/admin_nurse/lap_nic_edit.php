<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
include "inc.session.php";

$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM laporan WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry); 

$DataPerawat = $data['perawat'];
$DataDokter = $data['dokter'];
$keluhan = $data['keluhan'];
$group_diagnosa = $data['group_diagnosa'];

?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type" />
	<script type="text/javascript" src="../ckeditor.js"></script>
	<script src="sample.js" type="text/javascript"></script>
	<link href="sample.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
  function konfirmasi (kd_kunjungan) {
   tanya = confirm('Yakin akan disimpan ?');
   if (tanya == true) return true;
   else return false;
   }
</script>
<script src="../src/js/jscal2.js"></script>
    <script src="../src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/steel/steel.css" />
<title>Laporan harian</title>
<style type="text/css">
<!--
.style2 {font-size: 9px}
.style2 {font-size: 9px}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="lap_nic_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
  <tr bgcolor="#D9E8F3"> 
    <td colspan="7" align="left"><strong>Laporan harian</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="left"><strong>PRN</strong></td>
    <td width="100">
      <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan']; ?>">
    <input name="prn" type="text" id="prn" size="8" value="<?php echo $data['prn']; ?>">
    </td>
    <td colspan="3"><strong>Tanggal</strong></td>
    <td width="260"><?php echo $data['tanggal'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="left"><strong>Nama</strong></td>
    <td><?php echo $data['nama']; ?> (<?php echo $data['karyawan']; ?>)</td>
    <td colspan="3"><strong>Jam Datang </strong></td>
    <td><?php echo $data['jam_datang'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="left"><strong>Tanggal Lahir </strong></td>
    <td><input name="tgl_lahir" type="text" id="tgl_lahir" size="8" value="<?php echo $data['tgl_lahir']; ?>"></td>
    <td colspan="3"><strong>Jam Respon </strong></td>
    <td><input name="jam_respon" type="text" id="jam_respon" size="8" value="<?php echo $data['jam_respon'];?>">
      Format J:M:D </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="left"><strong>Jenis Kelamin</strong></td>
    <td><?php echo $data['jenis_kelamin']; ?></td>
    <td colspan="3"><strong>Jenis Kunjungan </strong></td>
    <td><?php echo $data['jenis_kunjungan'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="left"><strong>Perawat</strong></td>
    <td align="left"><select name="perawat" id="perawat">
    <option value="" selected>[Pilih...]</option>
	<?php
	$sql = "SELECT * FROM staffdb WHERE unit='NCD' AND status='Yes'";
      	$qry = @mysql_query($sql, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[nama]==$DataPerawat) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[nama]' $cek>".$data['nama']."</option>";
	}
	?>
    </select></td>
<?php 
$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM laporan WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry); 
?>
    <td colspan="3" align="left"><strong>Rujukan dari </strong></td>
    <td align="left"><input name="rujukan" type="text" id="rujukan"  value="<?php echo $data['rujukan'];?>"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2" align="left"><strong>Shift</strong></td>
    <td align="left"><select name="shift" id="shift">
      <?php 
        if ($data['shift']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data['shift']=="Pagi") echo "<option value='Pagi' selected>Pagi</option>";
        else echo "<option value='Pagi'>Pagi</option>";
        if ($data['shift']=="Malam A") echo "<option value='Malam A' selected>Malam A</option>";
        else echo "<option value='Malam A'>Malam A</option>";
        if ($data['shift']=="Malam B") echo "<option value='Malam B' selected>Malam B</option>";
        else echo "<option value='Malam B'>Malam B</option>";
        ?>
    </select></td>
    <td colspan="3" align="left"><strong>Dokter</strong></td>
    <td align="left"><select name="dokter" id="dokter">
    <option value="" selected>[Pilih...]</option>
      <?php
	$sql = "SELECT * FROM staffdb WHERE unit='MSD' AND status='Yes'";
      	$qry = @mysql_query($sql, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[nama]==$DataDokter) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[nama]' $cek>".$data['nama']."</option>";
	}
	?>
    </select></td>
    </tr>
<?php 
$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM laporan WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry); 
?>
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="left"><strong>Keluhan</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="left"><textarea cols="80" id="keluhan" name="keluhan" rows="10"><?php echo $data['keluhan']; ?></textarea>
			<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'keluhan',
					{
						fullPage : false
					});

			//]]>
			</script></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="left"><strong>Diagnosa</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
   <td align="left" colspan="4" ><select name="group_diagnosa" id="group_diagnosa">
    <option value="" selected>[Pilih...]</option>
	<?php
	$sql = "SELECT * FROM group_diagnosa";
      	$qry = @mysql_query($sql, $koneksi) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[group_diagnosa]==$group_diagnosa) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[group_diagnosa]' $cek>".$data['group_diagnosa']."</option>";
	}
	?>
    </select></td>
<?php 
$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM laporan WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry); 
?>
    <td height="26" colspan="4" align="left">
      <input name="diagnosa" type="text" id="diagnosa" value="<?php echo $data['diagnosa']; ?>" size="40" col="5">
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="left"><strong>Tindakan</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="7" align="left">
    <textarea cols="80" id="tindakan" name="tindakan" rows="10"><?php echo $data['tindakan']; ?></textarea>
			<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'tindakan',
					{
						fullPage : false
					});

			//]]>
			</script>
    <strong>Infus</strong> : 
    <input name="infus" type="text" id="infus" value="<?php echo $data['infus'];?>" size="2">
    x</td>
    </tr>
  <tr bgcolor="#FFFFFF">
        <td colspan="3" align="left"><strong>Triage</strong> :   
        <select name="triage" id="triage">
        <?php 
        if ($data['triage']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data['triage']=="Merah (P1)") echo "<option value='Merah (P1)' selected>Merah (P1)</option>";
        else echo "<option value='Merah (P1)'>Merah (P1)</option>";
        if ($data['triage']=="Kuning (P2)") echo "<option value='Kuning (P2)' selected>Kuning (P2)</option>";
        else echo "<option value='Kuning (P2)'>Kuning (P2)</option>";
        if ($data['triage']=="Hijau (P3)") echo "<option value='Hijau (P3)' selected>Hijau (P3)</option>";
        else echo "<option value='Hijau (P3)'>Hijau (P3)</option>";
        if ($data['triage']=="Hitam (P0)") echo "<option value='Hitam (P0)' selected>Hitam (P0)</option>";
        else echo "<option value='Hitam (P0)'>Hitam (P0)</option>";
        ?>             
        </select>     </td>
    <td colspan="4" align="left"><strong>Petugas triage</strong> : 
      <?php
	if ($data['pj_triage']=="Dokter") {
	$cek_d = "checked";
	$cek_p = "";
	}
	else {
	$cek_d= "";
	$cek_p = "checked";
	}
	?>
      <input name="pj_triage" type="radio" value="Dokter" <?php echo $cek_d;?>>
      Dokter 
      <input name="pj_triage" type="radio" value="Perawat" <?php echo $cek_p;?>>
      Perawat</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="3" align="left"><strong>Jenis Kasus</strong> : 
      <select name="jenis_kasus" id="select">
       <?php 
        if ($data['jenis_kasus']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data['jenis_kasus']=="Bedah") echo "<option value='Bedah' selected>Bedah</option>";
        else echo "<option value='Bedah'>Bedah</option>";
        if ($data['jenis_kasus']=="Non Bedah") echo "<option value='Non Bedah' selected>Non Bedah</option>";
        else echo "<option value='Non Bedah'>Non Bedah</option>";
        if ($data['jenis_kasus']=="Obgyn") echo "<option value='Obgyn' selected>Obgyn</option>";
        else echo "<option value='Obgyn'>Obgyn</option>";
        if ($data['jenis_kasus']=="Pediatrik") echo "<option value='Pediatrik' selected>Pediatrik</option>";
        else echo "<option value='Pediatrik'>Pediatrik</option>";
        if ($data['jenis_kasus']=="Psikiatrik") echo "<option value='Psikiatrik' selected>Psikiatrik</option>";
        else echo "<option value='Psikiatrik'>Psikiatrik</option>";
        ?>     
        </select></td>
    <td colspan="4" align="left"><strong>Jenis Kecelakaan</strong> :      
      <select name="jenis_kecelakaan" id="jenis_kecelakaan">
        <?php 
        if ($data['jenis_kecelakaan']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data['jenis_kecelakaan']=="KK") echo "<option value='KK' selected>Kecelakaan Kerja </option>";
        else echo "<option value='KK'>Kecelakaan Kerja </option>";
        if ($data['jenis_kecelakaan']=="KLL") echo "<option value='KLL' selected>Kecelakaan Lalu Lintas</option>";
        else echo "<option value='KLL'>Kecelakaan Lalu Lintas</option>";
        if ($data['jenis_kecelakaan']=="KRT") echo "<option value='KRT' selected>Kecelakaan Rumah Tangga</option>";
        else echo "<option value='KRT'>Kecelakaan Rumah Tangga</option>";
        if ($data['jenis_kecelakaan']=="KPK") echo "<option value='KPK' selected>Kecelakaan Pejalan Kaki</option>";
        else echo "<option value='KPK'>Kecelakaan Pejalan Kaki</option>";
        if ($data['jenis_kecelakaan']=="KTU") echo "<option value='KTU' selected>Kecelakaan Tempat Umum</option>";
        else echo "<option value='KTU'>Kecelakaan Tempat Umum</option>";
        if ($data['jenis_kecelakaan']=="KKP") echo "<option value='KKP' selected>Kecelakaan Kriminal & Perkelahian</option>";
        else echo "<option value='KKP'>Kecelakaan Kriminal & Perkelahian</option>";
        ?>
            </select></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="3" align="left"><strong>Pemeriksaan penunjang </strong></td>
    <td colspan="4" align="left"><strong>Alat yang digunakan </strong></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td width="225" align="left">
    <?php 
    if ($data['lab']==1) echo "<input type='checkbox' name='lab' value='1' checked>Lab";
    else echo "<input type='checkbox' name='lab' value='1'>Lab";
    ?>    </td>
    <td colspan="2" align="left"><?php 
    if ($data['usg']==1) echo "<input type='checkbox' name='usg' value='1' checked>USG";
    else echo "<input type='checkbox' name='usg' value='1'>USG";
    ?></td>
    <td colspan="2"><?php 
    if ($data['mon']==1) echo "<input type='checkbox' name='mon' value='1' checked>Monitor";
    else echo "<input type='checkbox' name='mon' value='1'>Monitor";
    ?></td>
    <td colspan="2"><?php 
    if ($data['syr']==1) echo "<input type='checkbox' name='syr' value='1' checked>Syringe Pump";
    else echo "<input type='checkbox' name='syr' value='1'>Syringe Pump";
    ?></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left">
    <?php 
    if ($data['ro']==1) echo "<input type='checkbox' name='ro' value='1' checked>Rontgen";
    else echo "<input type='checkbox' name='ro' value='1'>Rontgen";
    ?>    </td>
    <td colspan="2" align="left"><?php 
    if ($data['echo']==1) echo "<input type='checkbox' name='echo' value='1' checked>Echo";
    else echo "<input type='checkbox' name='echo' value='1'>Echo";
    ?></td>
    <td colspan="2"><?php 
    if ($data['ekg']==1) echo "<input type='checkbox' name='ekg' value='1' checked>EKG";
    else echo "<input type='checkbox' name='ekg' value='1'>EKG";
    ?></td>
    <td colspan="2"><?php 
    if ($data['inf']==1) echo "<input type='checkbox' name='inf' value='1' checked>Infuse Pump";
    else echo "<input type='checkbox' name='inf' value='1'>Infuse Pump";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left">
    <?php 
    if ($data['scan']==1) echo "<input type='checkbox' name='scan' value='1' checked>CT Scan";
    else echo "<input type='checkbox' name='scan' value='1'>CT Scan";
    ?>    </td>
    <td colspan="2" align="left"><?php 
    if ($data['doppler']==1) echo "<input type='checkbox' name='doppler' value='1' checked>Doppler";
    else echo "<input type='checkbox' name='doppler' value='1'>Doppler";
    ?></td>
    <td colspan="2"><?php 
    if ($data['dc']==1) echo "<input type='checkbox' name='dc' value='1' checked>DC Shock";
    else echo "<input type='checkbox' name='dc' value='1'>DC Shock";
    ?></td>
    <td colspan="2"><?php 
    if ($data['oxy']==1) echo "<input type='checkbox' name='oxy' value='1' checked>Pulse Oxymetri";
    else echo "<input type='checkbox' name='oxy' value='1'>Pulse Oxymetri";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left">
    <?php 
    if ($data['mri']==1) echo "<input type='checkbox' name='mri' value='1' checked>MRI";
    else echo "<input type='checkbox' name='mri' value='1'>MRI";
    ?>    </td>
    <td colspan="2" align="left"><?php 
    if ($data['ctg']==1) echo "<input type='checkbox' name='ctg' value='1' checked>CTG";
    else echo "<input type='checkbox' name='ctg' value='1'>CTG";
    ?></td>
    <td colspan="2"><?php 
    if ($data['vent']==1) echo "<input type='checkbox' name='vent' value='1' checked>Ventilator";
    else echo "<input type='checkbox' name='vent' value='1'>Ventilator";
    ?></td>
    <td colspan="2"><?php 
    if ($data['warm']==1) echo "<input type='checkbox' name='warm' value='1' checked>Blood Warmer";
    else echo "<input type='checkbox' name='warm' value='1'>Blood Warmer";
    ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Tindak lanjut</strong></td>
    <td colspan="6" align="left"><select name="tindak_lanjut" id="tindak_lanjut">
        <?php 
        if ($data['tindak_lanjut']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data['tindak_lanjut']=="Pulang") echo "<option value='Pulang' selected>Pulang</option>";
        else echo "<option value='Pulang'>Pulang</option>";
        if ($data['tindak_lanjut']=="Rawat") echo "<option value='Rawat' selected>Rawat</option>";
        else echo "<option value='Rawat'>Rawat</option>";
        if ($data['tindak_lanjut']=="Rujuk") echo "<option value='Rujuk' selected>Rujuk</option>";
        else echo "<option value='Rujuk'>Rujuk</option>";
        if ($data['tindak_lanjut']=="Meninggal") echo "<option value='Meninggal' selected>Meninggal</option>";
        else echo "<option value='Meninggal'>Meninggal</option>";
        if ($data['tindak_lanjut']=="DOA") echo "<option value='DOA' selected>DOA</option>";
        else echo "<option value='DOA'>DOA</option>";
        if ($data['tindak_lanjut']=="Menolak Rawat") echo "<option value='Menolak Rawat' selected>Menolak Rawat</option>";
        else echo "<option value='Menolak Rawat'>Menolak Rawat</option>";
        ?>             
        </select></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"> <strong>Keterangan</strong></td>
    <td colspan="6" align="left"><input name="keterangan" type="text" id="keterangan" value="<?php echo $data['keterangan']; ?>">
      * <span class="style2">Isi dengan RS atau Ward  tujuan atau alasan dirujuk </span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Konsul DPJP </strong></td>
    <td colspan="3" align="left"><input name="dpjp" type="text" id="dpjp" value="<?php echo $data['dpjp'];?>"></td>
    <td width="169" align="left"><strong>Jam periksa </strong></td>
    <td colspan="2" align="left"><input name="jam_dpjp" type="text" id="jam_dpjp" size="8" value="<?php echo $data['jam_dpjp'];?>"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Jam IP</strong></td>
    <td colspan="3" align="left"><input name="jam_ip" type="text" id="jam_ip" value="<?php echo $data['jam_ip'];?>"></td>
    <td width="168" align="left"></td>
    <td colspan="2" align="left"></td>
  </tr>
  <tr> 
    <td colspan="7" bgcolor="#CCCCCC"><label>
    <select name="selesai" id="selesai">
      <option value="Yes">Selesai</option>
      <option value="">Simpan</option>
    </select>
    <input name="jam_keluar" type="text" id="jam_keluar" value="<?php echo $data['jam_keluar'];?>">
    <input type="submit" name="Submit" value="Submit" onclick="return konfirmasi ('$row [0]')">
    </label></td>
  </tr>
  </form>
</table>
</body>
</html>
 