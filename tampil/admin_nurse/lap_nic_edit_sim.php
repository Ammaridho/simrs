<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$kd_kunjungan   = $_REQUEST['kd_kunjungan'];
$shift          = $_REQUEST['shift'];
$prn		= $_REQUEST['prn'];
$nama		= $_REQUEST['nama'];
$tgl_lahir      = $_REQUEST['tgl_lahir'];
$jenis_kelamin  = $_REQUEST['jenis_kelamin']; 
$jam_datang	= $_REQUEST['jam_datang'];
$jam_respon	= $_REQUEST['jam_respon'];
$jam_keluar	= $_REQUEST['jam_keluar'];
$jenis_kunjungan = $_REQUEST['jenis_kunjungan'];
$rujukan	= $_REQUEST['rujukan'];
$triage		= $_REQUEST['triage'];
$pj_triage	= $_REQUEST['pj_triage'];
$keluhan	= $_REQUEST['keluhan'];
$group_diagnosa	= $_REQUEST['group_diagnosa'];
$diagnosa	= $_REQUEST['diagnosa'];
$tindakan	= $_REQUEST['tindakan'];
$infus		= $_REQUEST['infus'];
$jenis_kasus	= $_REQUEST['jenis_kasus'];
$jenis_kecelakaan = $_REQUEST['jenis_kecelakaan'];
$tanggal	= $_REQUEST['tanggal'];
$dokter		= $_REQUEST['dokter'];
$perawat	= $_REQUEST['perawat'];
$tindak_lanjut  = $_REQUEST['tindak_lanjut'];
$keterangan	= $_REQUEST['keterangan'];
$lab		= $_REQUEST['lab'];
$ro		= $_REQUEST['ro'];
$scan		= $_REQUEST['scan'];
$mri		= $_REQUEST['mri'];
$usg		= $_REQUEST['usg'];
$echo		= $_REQUEST['echo'];
$doppler	= $_REQUEST['doppler'];
$ctg		= $_REQUEST['ctg'];
$mon		= $_REQUEST['mon'];
$ekg		= $_REQUEST['ekg'];
$dc		= $_REQUEST['dc'];
$vent		= $_REQUEST['vent'];
$syr		= $_REQUEST['syr'];
$inf		= $_REQUEST['inf'];
$oxy		= $_REQUEST['oxy'];
$warm		= $_REQUEST['warm'];
$selesai	= $_REQUEST['selesai'];
 
	$sql  = " UPDATE laporan SET
                  shift='$shift',
		  prn='$prn',
                  jam_respon='$jam_respon',
                  jam_keluar='$jam_keluar',
		  jam_dpjp='$jam_dpjp',
		  jam_ip='$jam_ip',
                  keluhan='$keluhan',
		  group_diagnosa='$group_diagnosa',
                  diagnosa='$diagnosa',
                  tindakan='$tindakan',
                  infus='$infus',
                  triage='$triage',
                  pj_triage='$pj_triage',
                  jenis_kasus='$jenis_kasus',
                  rujukan='$rujukan',
                  jenis_kecelakaan='$jenis_kecelakaan',
                  dpjp='$dpjp',
                  dokter='$dokter',
                  perawat='$perawat',
                  tindak_lanjut='$tindak_lanjut',
                  keterangan='$keterangan',
		  lab='$lab',
		  ro='$ro',
		  scan='$scan',
		  mri='$mri',
		  usg='$usg',
		  echo='$echo',
		  doppler='$doppler',
		  ctg='$ctg',
		  mon='$mon',
		  ekg='$ekg',
		  dc='$dc',
		  vent='$vent',
		  syr='$syr',
		  inf='$inf',
		  oxy='$oxy',
		  warm='$warm',
		  selesai='$selesai'
                  WHERE kd_kunjungan='$kd_kunjungan' ";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EDIT TELAH SELESAI</title>
<script>

var howLong = 0;

t = null;
function closeMe(){
t = setTimeout("self.close()",howLong);
}
</script>
</head>
<body onLoad="closeMe(); self.focus()" bgcolor="#000000">
<div align="center">
<h1 style="color: #ffffff">SUKSES...</h1>
</div>

</body>
</html>
