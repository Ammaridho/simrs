<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM dx_keperawatan WHERE kd_kunjungan='$kd_kunjungan' AND nama_diagnosa='$nama_diagnosa'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>RENCANA KEPERAWATAN</title>
</head>
<body id="tab3">
<?php $nama_diagnosa = $_REQUEST['nama_diagnosa']; ?>
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<form name="form1" method="post" action="renprasim.php?kd_kunjungan=<?php echo $kd_kunjungan;?>">
<input name="user" type="hidden" id="user" value="<?php echo $_SESSION['klinik'] ;?>">
Target waktu <input name="waktu" type="text" value="<?php echo $waktu ;?>" size="2"/> 
	<select name="satuan" id="satuan">
        <option value="24 Jam">24 Jam</option>
        <option value="1 Jam">1 Jam</option>
    </select>, <?php echo $nama_diagnosa ;?>
      <tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3" width="3%" align="center"></td>
      <td bgcolor="#D9E8F3" width="55%" align="left" colspan="2"><b>Kriteria hasil</b></td>
      </tr>
    <input name="kd_kunjungan" type="hidden" value="<?php echo $kd_kunjungan ;?>"/>
    <input name="nama_diagnosa" type="hidden" value="<?php echo $nama_diagnosa ;?>" />
  <tr bgcolor="#FFFFFF">
<?php
$query = "SELECT * FROM diagnosadb,nocdb WHERE diagnosadb.kd_diagnosa=nocdb.kd_diagnosa AND nama_diagnosa='$nama_diagnosa' ORDER BY noc";
$hasil = mysqli_query($koneksi,$query);
$no = 1;
while ($data = mysqli_fetch_array($hasil))
{
?>
      <td bgcolor="#FFFFFF" width="3%" align="center"><input type="checkbox" value="<?php echo $data['noc'];?>" name="noc<?php echo $no;?>" /></td>
      <td bgcolor="#FFFFFF" width="55%" align="left"><?php echo $data['noc'];?></td>
	  <td bgcolor="#FFFFFF" width="55%" align="left"><input type="text" value="<?php echo $data['target'];?>" name="target<?php echo $no;?>" /><?php $no++;?></td>
   	</tr>
    <?php
}
?>
<tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3" width="3%" align="center"></td>
      <td bgcolor="#D9E8F3" colspan="2" align="left"><b>Intervensi</b></td>
      </tr>
  <tr bgcolor="#FFFFFF">
<?php
$query2 = "SELECT * FROM diagnosadb,nicdb WHERE diagnosadb.kd_diagnosa=nicdb.kd_diagnosa AND nama_diagnosa='$nama_diagnosa' ORDER BY nic";
$hasil2 = mysqli_query($koneksi,$query2);
$no = 1;
while ($data = mysqli_fetch_array($hasil2))
{
?>
      <td bgcolor="#FFFFFF" width="3%" align="center"><input type="checkbox" value="<?php echo $data['nic'];?>" name="nic<?php echo $no;?>" /></td>
      <td bgcolor="#FFFFFF" colspan="2" align="left"><?php echo $data['nic'];?><?php $no++;?></td>
   	</tr>
    <?php
}
?>
    <tr bgcolor="#D9E8F3">
      <td bgcolor="#D9E8F3" width="3%"><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" /></td>
      <td colspan="2" bgcolor="#D9E8F3"><input type="submit" name="Submit" value="Tambahkan"></td>
</tr>
</form>
</table>
</body>
</html>
