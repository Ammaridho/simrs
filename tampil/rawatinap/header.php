<?php
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "../librari/terbilang.php";
include "../librari/fungsi_indotgl.php";
include "data_pasien.php";
?>
<html>
<head>
<title>PROSES KEPERAWATAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="dddropdownpanel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/css/tab.css" />
</head>
<body>
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<ul id="tabnav">
<li class="tab10"><a href="view_nursing.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Pengkajian keperawatan"><span>Nursing Care</span></a></li>
<li class="tab1"><a href="pengkajian_tampil.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Pengkajian keperawatan"><span>Pengkajian</span></a></li>
<!-- <li class="tab2"><a href="diagnosaview.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Diagnosa keperawatan"><span>Diagnosa</span></a></li>
-->
<li class="tab3"><a href="renpraview.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Rencana Keperawatan"><span>Perencanaan</span></a></li>
<li class="tab4"><a href="implementasi.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Tindakan keperawatan"><span>Implementasi</span></a></li>
<!--
<li class="tab7"><a href="monitoring.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Monitoring"><span>Monitoring</span></a></li>
-->
<li class="tab5"><a href="evaluasi.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Evaluasi"><span>Evaluasi</span></a></li>
<li class="tab6"><a href="handover_form.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" title="Catatan penting"><span>Catatan Perawat</span></a></li>	
</ul>
<?php 
   $sql3 = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry3 = mysqli_query($koneksi,$sql3)
      or die ("SQL Error 3".mysqli_error());
   $data3=mysqli_fetch_array($qry3);
   $kd_unit=$data3['kd_unit'];

   //peringatan pengkajian risiko jatuh
   $sqlAlert = "SELECT * FROM skala_jatuh WHERE kd_kunjungan='$kd_kunjungan' ORDER BY tanggal DESC";
   $qryAlert = mysqli_query($koneksi,$sqlAlert)
      or die ("SQL Error allert".mysqli_error());
   $alert=mysqli_num_rows($qryAlert);
   $alert=mysqli_fetch_array($qryAlert);

   //mencari selisih hari
   $tgl1 = date('Y-m-d'); 
   $tgl2 = $alert['tanggal'];
   $selisih = strtotime($tgl1) -  strtotime($tgl2);
   $hari = $selisih/(60*60*24);

if($alert < 1 ){
include "alert1.php";
   }
elseif($hari >= 1 && ($alert['kategori']=='Risiko tinggi' || $alert['kategori']=='Sedang' || $alert['kategori']=='Tinggi')){
   include "alert2.php";
   }
elseif($hari >= 3 && ($alert['kategori']=='Rendah' || $alert['kategori']=='Risiko rendah')){
   include "alert2.php";
   }
?>
</table>
</body>
</html>

