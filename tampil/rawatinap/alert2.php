<?php 
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
   $sqlAlert = "SELECT * FROM skala_jatuh WHERE kd_kunjungan='$kd_kunjungan'";
   $qryAlert = mysqli_query($koneksi, $sqlAlert,)
      or die ("SQL Error".mysqli_connect_error());
   $alert=mysqli_fetch_array($qryAlert);
   $jenis=$alert['jenis'];
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
                <p>Pengkajian risiko jatuh belum diulang sejak <?php echo $hari;?> hari terakhir </p>
                <p class="text-warning"><large>Buatlah ! 
				<?php 
				if($tahun < 17 && $tgl1=="0000-00-00"){?>
				<p>Tanggal lahir belum diisi !</p>
				<a href="../../tampil/registrasi/baru_edit.php?prn=<?php echo $alertPt['prn'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">KLIK DISINI UNTUK MENGUPDATE DATA</a>
				<?php }
				elseif ($tahun >= 17) {?>
				<a href="morse_form.php?kd_kunjungan=<?php echo $_REQUEST['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">KLIK DISINI SEKARANG JUGA</a>
				<?php }
				else {?>
                
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