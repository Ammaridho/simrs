<?php 
include "../librari/inc.koneksidb.php";

	$sql3 = "SELECT * FROM noc WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
    $qry3 = mysqli_query($koneksi,$sql3) or die ("gagal Query");
	while ($data3 =mysqli_fetch_array($qry3)) {
	if ($data3['nama_diagnosa']==$nama_diagnosa) {
	echo "Kriteria hasil : ".$data3['outcome'].", target (".$data3['target'].") ".$data['hasil']."</br>";
	}
	?>
	<?php
    $outcome = $data3['outcome'];
	$sql4 = "SELECT * FROM evaluasi WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa' 
	AND outcome='$outcome' ORDER BY tanggal_eval DESC";
      	$qry4 = mysqli_query($koneksi,$sql4) or die ("gagal Query");
	while ($data4 =mysqli_fetch_array($qry4)) {
	if ($data4['outcome']==$outcome) {
	echo ".:: ".$data4['tanggal_eval'].", skor : ".$data4['hasil']."/".$data3['target']."</br><hr>";
	}
	}
	}
	?>