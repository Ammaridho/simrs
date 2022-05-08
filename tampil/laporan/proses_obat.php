<?php
include "../librari/inc.koneksidb.php";
include "../librari/inc.umum.php";
$bydate1	= $_REQUEST['bydate1'];
$bydate2	= $_REQUEST['bydate2'];
?>
<html>
<head>
<title>Laporan Pengeluaran Obat <?php echo $bydate1;?> sd <?php echo $bydate1;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
a:link {
	color: #000080;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
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
<h3 align="center">Laporan Obat-obat</h3>
<h4 align="center">Tanggal <?php echo $bydate1;?> sd <?php echo $bydate2;?>
<form> 
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
 <tr bgcolor="#D9E8F3">
    <td width="5%"><div align="center">No</div></td>
    <td width="15%"><div align="center">Kode Visit</div></td>
    <td width="30%">Nama item</td>
    <td width="10%">Qty</td>
	<td width="10%">Asuransi</td>
	<td width="10%">Self Paid</td>
    <td width="20%">Sub Total</td>
 </tr>
<?php
// koneksi ke mysql
$query = "SELECT * FROM reg a, transaksi b WHERE a.kd_kunjungan=b.kd_kunjungan 
		AND b.grup_item='Drug and retail'
		AND a.batal='Tidak'
		AND b.tanggal_trx>='$bydate1' 
		AND b.tanggal_trx<='$bydate2'";
$hasil = mysqli_query($koneksi,$query);
$no=1;
while ($data = mysqli_fetch_array($hasil))
{
?>
  <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
    <td class="style1"><?php echo $no++;?></td>
    <td class="style1"><?php echo $data['kd_kunjungan'];?></td>
	<td class="style1"><?php echo $data['nama_item'];?></td>
	<td class="style1"><?php echo $data['qty_item'];?></td>
    <td class="style1"><?php echo $data['asuransi'];?></td>
	<td class="style1"><?php echo $data['pribadi'];?></td>
    <td class="style1">
	<?php
	$asuransi   = $data['asuransi'];
	$pribadi    = $data['pribadi'];
	$sub_total  = $asuransi + $pribadi;
	$total      = $total + $sub_total;
	echo $sub_total;
	?></td>
  </tr>
<?php
}
?>
  <tr bgcolor="#D9E8F3">
    <td colspan="6" align="right">Total Pemasukan : </div></td>
    <td>
	<?php
	
	echo $total;
	?></td>
  </tr>
</table>
<input class="noPrint" type="button" value="Print" onClick="window.print()">
</form>
</p>
</body>
</html>

