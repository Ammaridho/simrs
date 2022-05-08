<?php 
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
   $sqlPt = "SELECT * FROM data_pasien,pasien_rawat WHERE data_pasien.prn=pasien_rawat.prn AND pasien_rawat.kd_kunjungan='$kd_kunjungan'";
   $qryPt = mysqli_query($koneksi, $sqlPt)
      or die ("SQL Error alert 1".mysqli_connect_error());
   $alertPt=mysqli_fetch_array($qryPt);
   
$tgl1 = $alertPt['tgl_lahir']; 
$tgl2 = $alertPt['tgl_masuk'];
$query = "SELECT datediff('$tgl2', '$tgl1')
          as selisih";

$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);

$tahun = floor($data['selisih']/365);
$bulan = floor(($data['selisih'] - ($tahun * 365))/30);
$hari = $data['selisih'] - $bulan * 30 - $tahun * 365;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Twitter Bootstrap 3 Modals</title>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
  <script language="javascript">
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perhatian</h4>
            </div>
            <div class="modal-body">
                <p class="text-warning"><large> 
				<?php 
				if($tahun < 17 && $tgl1=="0000-00-00"){?>
				<p>Tanggal lahir belum diisi !</p>
				<a href="../../tampil/registrasi/baru_edit.php?prn=<?php echo $alertPt['prn'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">KLIK DISINI UNTUK MENGUPDATE DATA</a>
				<?php }
				elseif ($tahun >= 17) {?>
				<p>Pengkajian risiko jatuh (MORSE) belum dibuat !</p>
				<a href="morse_form.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">KLIK DISINI SEKARANG JUGA</a>
				<?php }
				else {?>
				<p>Pengkajian risiko jatuh (HUMPTY DUMPTY) belum dibuat !</p>
				<a href="humpty_form.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">KLIK DISINI SEKARANG JUGA</a>
				<?php
				}
				?>
				</large>
				</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</body>
</html>                                		