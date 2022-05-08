<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysqli_fetch_array($qry);
}
$nama_diagnosa = $_REQUEST['nama_diagnosa']; 
?>
<html>
<head>
<title>DAFTAR IMPLEMENTASI</title>
</head>
<body id="tab4">
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" method="post" action="implementasisim.php?kd_kunjungan=<?php echo $kd_kunjungan;?>">
      <tr bgcolor="#D9E8F3">
      <td width="5%" align="center"></td>
      <td width="50%" align="left"><b>Implementasi</b></td>
      <td width="45%" align="left"><b>Keterangan/Hasil</b></td>
      </tr>
	<input name="kd_kunjungan" type="hidden" value="<?php echo $kd_kunjungan ;?>"/>
	<input name="tanggal_tx" type="hidden" id="tanggal_tx" value="<?php echo "".date('Y-m-d') ;?>">
	<input name="jam_tx" type="hidden" id="jam" size="8" value="<?php echo "".date('H:i') ;?>">
	<input name="nik" type="hidden" value="<?php echo $_SESSION['username'];?>" />
	<input name="shift" type="hidden" value="<?php echo $_SESSION['shift'];?>" />
    	


<?php
$query1 = "SELECT * FROM nic,nicdb WHERE nicdb.nic=nic.intervensi AND kd_kunjungan='$kd_kunjungan'";
$hasil1 = mysqli_query($koneksi,$query1);
$no = 1;
while ($data1 = mysqli_fetch_array($hasil1))
{
?>      <tr bgcolor="#FFFFFF">
      <td width="5%" align="center">
	  <input type="checkbox" value="<?php echo $data1['implementasi'];?>" name="nac<?php echo $no;?>"/>
	  <input name="dx<?php echo $no;?>" type="hidden" value="<?php echo $data1['nama_diagnosa'] ;?>" />	  </td>
      <td width="70%" align="left">	<input name="jam_tx<?php echo $no;?>" type="text" id="jam" size="8" value="<?php echo "".date('H:i') ;?>"><?php echo $data1['implementasi'];?></td>
      <td width="24%" align="left"><input type="text" value="<?php echo $data1['keterangan'];?>" name="ket<?php echo $no;?>" />
	<?php $no++;?>      </td>
      </tr>
<?php
}
?>
    <tr bgcolor="#D9E8F3">
      <td width="5%"><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" /></td>
      <td width="55%"><input type="submit" name="Submit" value="Tambahkan"></td>
      <td width="40%"></td>
    </tr>
</form>
</table>
</body>
</html>

