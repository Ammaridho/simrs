<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "../librari/fungsi_indotgl.php";
include "../rawatinap/data_pasien.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi,$sql)
      or die ("SQL Error".mysqli_connect_error());
   $data=mysqli_fetch_array($qry);
}
?>
<html>
<head>
<title>ORDER LABORATORIUM <?php echo $data['kd_kunjungan'];?></title>
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
</head>
<body>
</hr>
  <table align="left" width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#FFFFFF">
     	<td width="2%" align="center" bgcolor="#D9E8F3"><b>No</b></td>
     	<td width="9%" align="center" bgcolor="#D9E8F3">Tanggal</td>
     	<td width="9%" align="center" bgcolor="#D9E8F3">Jam</td>
     	<td width="56%" align="center" bgcolor="#D9E8F3"><b>Item laboratorium </b></td>
      	<td width="6%" align="center" bgcolor="#D9E8F3"><b>Hasil</b></td>
	    <td width="18%" align="center" bgcolor="#D9E8F3"><b>Keterangan</b></td>
   	</tr>
  <form name="form1" method="post" action="lab_input_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
  <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
  <input name="tanggal_lab" type="hidden" value="<?php echo "".date('Y-m-d');?>" />
  <input name="jam_lab" type="hidden" value="<?php echo "".date('H:i');?>" />
  <input name="dr_pengirim" type="hidden" value="<?php echo "".$_SESSION['klinik']."";?>"/>
  <?php
$kd_kunjungan=$_GET["kd_kunjungan"];
$query = "SELECT * FROM lab WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$i = 0;
while ($data = mysqli_fetch_array($hasil))
{
$tanggal = tgl_indo($data['tanggal_hasil']);
?>
  <tr bgcolor="#FFFFFF">
    <td align="center" bgcolor="#FFFFFF"><?php echo $i + 1;?></td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $tanggal;?></td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $data['jam_hasil'];?></td>
    <td align="left" bgcolor="#FFFFFF"><input type="hidden" size="6" value="<?php echo $data['nama_lab'];?>" name="nama_lab<?php echo $i;?>" />
      <?php echo $data['nama_lab'];?></td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $data['hasil'];?></td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $data['keterangan'];?>
      <?php $i++;?></td>
  </tr>    <?php
}
?>
  <tr bgcolor="#FFFFFF">
    <td width="2%" align="center" bgcolor="#FFFFFF"><input type="hidden" value="<?php echo $data['id'];?>" name="lab<?php echo $i;?>" /></td>
    <td width="9%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="9%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="56%" align="left" bgcolor="#FFFFFF">
    <input name="button" type="button" class="noPrint" onClick="window.print()" value="Print">    </td>
	<td width="6%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
	<td width="18%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
	  </form>
	  <script>
<!--
/*By George Chiang(JK's JavaScript tutorial)http://javascriptkit.com 
Credit must stay intact for use*/
function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM"
if(hours>11){
dn="PM"
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.form1.jam_dx.value=hours+":"+minutes+":"+seconds+" "+dn
setTimeout("show()",1000)
}
show()
//-->
</script>
</table>
</body>
</html>
