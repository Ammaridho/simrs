<?php 
include "../../config/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat,data_pasien WHERE pasien_rawat.prn=data_pasien.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}

$tanggal = $data['tanggal'];
$tgl_lahir = $data['tgl_lahir'];
$query = "SELECT datediff('$tanggal', '$tgl_lahir')
          as selisih";

$hasil = mysqli_query($query);
$data_u = mysql_fetch_array($hasil);

$tahun = floor($data_u['selisih']/365);
$bulan = floor(($data_u['selisih'] - ($tahun * 365))/30);
$hari = $data_u['selisih'] - $bulan * 30 - $tahun * 365;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
rC = function(radioEl) {
		if(radioEl.checked == true) {
				radioEl.checked = false;
				return false;
				}
				else {
				radioEl.checked = true;
				return true;
				}
		}
</script>
<script>
function startCalc(){
interval = setInterval("calc()",1);
}
function calc(){
one = document.form1.kaji_awal76.value;
two = document.form1.kaji_awal77.value;
three = document.form1.kaji_awal78.value;
document.form1.kaji_awal79.value = (one*1) + (two*1) + (three*1);
}
function stopCalc(){
clearInterval(interval);
}
</script>
<title>PENGKAJIAN AWAL DEWASA</title>
</head>
<body>
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" action="pengkajian_dewasa_sim.php" method="POST">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
<input name="jam" type="hidden" id="jam" value="<?php echo "".date('H:i:s') ;?>">
	<input name="shift" type="hidden" id="jam" value="<?php echo $_SESSION['shift'] ;?>">
	<input name="nik" type="hidden" id="nik" value="<?php echo $_SESSION['username'] ;?>">
  <tr bgcolor="#D9E8F3">
      <td colspan="3"><B>&nbsp;&nbsp;    PENGKAJIAN TAMBAHAN KHUSUS PASIEN TERMINAL/MENJELANG AKHIR HAYAT&nbsp;&nbsp;:</B></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td width="48%">&nbsp;&nbsp;    1. Spiritual&nbsp;</td>
    <td width="1%">:</td>
    <td width="51%"></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Respon pasien terhadap keadaannya</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Respon keluarga terhadap keadaan pasien</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Perasaan yang dialami saat menjelang akhir hayat</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Kebutuhan pendampingan rohani&nbsp;    dari&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    2. Psikososial&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Kebutuhan relasi</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Kebutuhan kelanjutan perawatan</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Kebutuhan pelayanan dukungan</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Kebutuhan lain-lain&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    3. Respon fisik&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Pernapasan</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pencernaan</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Sirkulasi</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Eliminasi</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    - Urine</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    - Defikasi</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;    4. Mental sensori&nbsp;</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    a. Penglihatan</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    b. Pendengaran</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    c. Penghidu</td>
    <td>:</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    d. Peraba</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr onMouseOver="this.bgColor='lightblue'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td>&nbsp;&nbsp;
      <input type="submit" name="Submit" value="Submit" /></td>
    <td>:</td>
    <td></td>
  </tr>
  </form>
</table>
</body>
</html>
