<?php
include "../librari/inc.koneksidb.php";
include "tab_order_poli.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
?>
<!DOCTYPE html>
<html>
<body id="tab10">
<p>
<iframe src="catatan_hasil.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="32%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="diagnosis_hasil.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="32%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="resep_hasil.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="32%" height="200" style="border:1px solid black;">
</iframe>
</p>

<p>
<iframe src="rad_hasil.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="32%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="lab_hasil.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="32%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="tindakan_hasil.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="32%" height="200" style="border:1px solid black;">
</iframe>
</p>



</body>
</html>