<?php 
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$nama_diagnosa = $_REQUEST['nama_diagnosa']; 
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_error($koneksi));
   $data=mysqli_fetch_array($qry);
}

?>
<html>
<head>
<title>EVALUASI</title>
<link rel="stylesheet" type="text/css" href="base.css" />
<link rel="stylesheet" type="text/css" href="blue.css" />
</head>
<body id="tab5">
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" method="post" action="evaluasisim.php?kd_kunjungan=<?php echo $kd_kunjungan;?>">
      <tr bgcolor="#D9E8F3">
      <td width="4%" align="center"></td>
      <td width="46%" align="left"><b>Kriteria hasil</b></td>
      <td width="50%" align="left"><b>Evaluasi (skor)</b></td>
      </tr>
    	<input name="kd_kunjungan" type="hidden" value="<?php echo $kd_kunjungan ;?>"/>
	<input name="tanggal_eval" type="hidden" id="tanggal_eval" value="<?php echo "".date('Y-m-d') ;?>">
	<input name="jam_eval" type="hidden" id="jam" size="8" value="<?php echo "".date('H:i') ;?>">
    	<input name="nama_diagnosa" type="hidden" value="<?php echo $nama_diagnosa ;?>" />
    	<input name="user" type="hidden" value="<?php echo $_SESSION['nama'];?>" />
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
<?php
$query = "SELECT * FROM noc WHERE nama_diagnosa='$nama_diagnosa' AND kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query) or die ("error:".mysqli_error($koneksi));
$no = 1;
while ($data = mysqli_fetch_array($hasil))
{
?>
      <td bgcolor="#FFFFFF" width="4%" align="center">
	<input type="checkbox" value="<?php echo $data['outcome'];?>" name="noc<?php echo $no;?>"/></td>
      <td bgcolor="#FFFFFF" width="46%" align="left"><?php echo $data['outcome'];?></td>
      <td bgcolor="#FFFFFF" width="50%" align="left">
<input name="hasil<?php echo $no;?>" type="radio" value="0" <?php echo $cek_1;?>>
Not Met
 <input name="hasil<?php echo $no;?>" type="radio" value="5" <?php echo $cek_3?>>
Partial Met
<input name="hasil<?php echo $no;?>" type="radio" value="10" <?php echo $cek_3?>>
Fully Met <?php $no++;?>      </td>
    </tr>
<?php
}
?>
    <tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3" width="4%"><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" /></td>
      <td bgcolor="#D9E8F3" width="46%"><input type="submit" name="Submit" value="Tambahkan"></td>
      <td bgcolor="#D9E8F3" width="50%"></td>
    </tr>
</form>
</table>
</body>
</html>

