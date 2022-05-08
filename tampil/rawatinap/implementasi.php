<?php 
include "../librari/inc.koneksidb.php";
include "header.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysqli_fetch_array($qry);
}
?>
<html>
<head><title>IMPLEMENTASI</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<style type="text/css">
@media print {
input.noPrint { display: none; }
}
</style>
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
<body id="tab4">

<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
   <tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3"><div align="left"><strong><a href="implementasi_data.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" onClick="NewWindow(this.href,'name','800','600%','yes');return false">Tambah</a></strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF">
      <?php
      $kd_kunjungan = $_REQUEST['kd_kunjungan'];
      $query1 = "SELECT * FROM tx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' GROUP BY tanggal_tx DESC";
      $hasil1 = mysqli_query($koneksi,$query1);
      $no = 1;
      while ($data1 = mysqli_fetch_array($hasil1))
      { 
      echo "<b><u>";
      echo $data1['tanggal_tx'];
      echo "</u></b>";
      echo "</br>";
         $tanggal_tx = $data1['tanggal_tx'];
         $query2 = "SELECT * FROM tx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND tanggal_tx='$tanggal_tx' GROUP BY 	shift";
         $hasil2 = mysqli_query($koneksi,$query2);
         $no = 1;
         while ($data2 = mysqli_fetch_array($hasil2))
         { 
         echo "<b>";
         echo $data2['shift'];
         echo "</b>";
            $shift = $data2['shift'];
            $query3 = "SELECT * FROM tx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND tanggal_tx='$tanggal_tx' AND shift='$shift'";
            $hasil3 = mysqli_query($koneksi,$query3);
            $no = 1;
            while ($data3 = mysqli_fetch_array($hasil3))
            { 
            echo $data3['jam_tx'] ; 
            echo " : ";
            echo $data3['implementasi'];
            echo "&nbsp;&nbsp;";
            echo $data3['keterangan'];
            echo "</br>";
            echo "<hr>";
            }
         }
      } 
      ?>
</div>
</br>
      </td>
    </tr>
</table>
</body>
</html>
