<?php
include "../librari/config.php";
include_once "../librari/inc.session.php";
include "../librari/inc.koneksidb.php";
include "data_pasien.php";
//$prn = $_GET['prn'];
$kd_kunjungan = $_GET['kd_kunjungan'];
// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<style>
@media print {
input.noPrint { display: none; }
}
@page 
        {
            size: auto;   /* auto is the initial value */
			margin: 20mm;
        }

</style>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/css/tab.css" />
</head>
<body>
<ul id="tabnav">
<li class="tab10"><a href="../poliklinik/view_emr.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Catatan">Resume</a></li>
<li class="tab1"><a href="../poliklinik/lap_poli.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Catatan">Catatan</a></li>
<li class="tab2"><a href="../poliklinik/lab_view.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Catatan">Laboratorium</a></li>
<li class="tab3"><a href="../poliklinik/rad_view.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Catatan">Radiologi</a></li>
<li class="tab4"><a href="../poliklinik/diagnosa_view.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Tindakan">Diagnosa</a></li>
<li class="tab5"><a href="../poliklinik/resep_view.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Resep">Resep</a></li>
<li class="tab6"><a href="../poliklinik/tm_view.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Tindakan">Tindakan</a></li>
<li class="tab7"><a href="../poliklinik/tindak_lanjut.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Tindakan">Tindak Lanjut</a></li>
<li class="tab8"><a href="emr.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&prn=<?php echo $data['prn'];?>" title="Riwayat Berobat">Riwayat Berobat</a></li>
</ul>
</body>
