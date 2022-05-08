<?php
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
?>
<!DOCTYPE html>
<html>
<body id="tab10">
<p>
<iframe src="view_n_pengkajian.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="49%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="view_n_diagnosis.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="49%" height="200" style="border:1px solid black;">
</iframe>

</p>

<p>
<iframe src="view_n_outcome.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="49%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="view_n_intervensi.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="49%" height="200" style="border:1px solid black;">
</iframe>
</p>

<p>
<iframe src="view_n_implementasi.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="49%" height="200" style="border:1px solid black;">
</iframe>

<iframe src="view_n_evaluasi.php?kd_kunjungan=<?php echo $kd_kunjungan;?>" width="49%" height="200" style="border:1px solid black;">
</iframe>
</p>

</body>
</html>
