<?php
include "tab_order_poli.php";
include "../librari/config.php";
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_GET['kd_kunjungan'];
$sql1 = "SELECT * FROM pasien_poliklinik WHERE kd_kunjungan='$kd_kunjungan'";
$qry1 = mysqli_query($koneksi,$sql1);
$data1 = mysqli_fetch_array($qry1); 
?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type" />
<script type="text/javascript" src="<?php echo $url;?>media/ckeditor/ckeditor.js"></script>
<script src="<?php echo $url;?>media/ckeditor/_samples/sample.js" type="text/javascript"></script>
<link href="<?php echo $url;?>media/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
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
<title>POLIKLINIK</title>
<style type="text/css">
<!--
.style2 {font-size: 9px}
.style2 {font-size: 9px}
-->
</style>
</head>
<body id="tab7">
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" method="post" action="tindak_lanjut_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
   <tr bgcolor="#FFFFFF">
    <td width="2%" bgcolor="#D9E8F3" colspan="4">TINDAK LANJUT</td>
   </tr>
 <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Tindak lanjut</strong></td>
    <td align="left"><select name="tindak_lanjut" id="tindak_lanjut">
        <?php 
        if ($data1['tindak_lanjut']=="") echo "<option value='' selected>[Pilih...]</option>";
        else echo "<option value=''>[Pilih...]</option>";
        if ($data1['tindak_lanjut']=="Pulang") echo "<option value='Pulang' selected>Pulang</option>";
        else echo "<option value='Pulang'>Pulang</option>";
        if ($data1['tindak_lanjut']=="Rawat") echo "<option value='Rawat' selected>Rawat</option>";
        else echo "<option value='Rawat'>Rawat</option>";
        if ($data1['tindak_lanjut']=="Rujuk") echo "<option value='Rujuk' selected>Rujuk</option>";
        else echo "<option value='Rujuk'>Rujuk</option>";
        if ($data1['tindak_lanjut']=="Meninggal") echo "<option value='Meninggal' selected>Meninggal</option>";
        else echo "<option value='Meninggal'>Meninggal</option>";
        if ($data1['tindak_lanjut']=="DOA") echo "<option value='DOA' selected>DOA</option>";
        else echo "<option value='DOA'>DOA</option>";
        if ($data1['tindak_lanjut']=="Menolak Rawat") echo "<option value='Menolak Rawat' selected>Menolak Rawat</option>";
        else echo "<option value='Menolak Rawat'>Menolak Rawat</option>";
        ?>             
        </select></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"> <strong>Keterangan</strong></td>
    <td colspan="3" align="left"><input name="keterangan" type="text" id="keterangan" value="<?php echo $data['keterangan']; ?>">
      * <span class="style2">Isi dengan RS atau Ward  tujuan atau alasan dirujuk </span></td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#FFFFFF"><label>
    <input name="jam_keluar" type="hidden" id="jam_keluar" value="<?php echo "".date('H:i') ;?>">
    <input type="submit" name="Submit" value="Update" title="Simpan laporan">
    <input type="submit" name="submit" value="Selesai" onClick="form1.action='lap_poli_selesai.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;" title="Selesaikan dan tutup laporan">
    </label></td>
  </tr>
  </form>
</table>
</body>
</html> 
