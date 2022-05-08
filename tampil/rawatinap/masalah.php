<?php 
include "../librari/inc.koneksidb.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM pasien_rawat WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html>
<head>
<title>DIAGNOSA KEPERAWATAN</title>
</head>
<body id="tab2">
  <table>
      <tr>
      <td width="5%" align="center"><b>Cek</b></td>
      <td width="55%" align="center"><b>Masalah Keperawatan</b></td>
      <td width="40%" align="left"><b>Faktor yang berhubungan</b></td>
   	</tr>
  <form name="form1" method="post" action="diagnosasim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
    <input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
    <input name="tanggal_dx" type="hidden" value="<?php echo "".date('Y-m-d');?>" />
    <input name="jam_dx" type="hidden" value="<?php echo "".date('H:i');?>" />
    <input name="kd_unit" type="hidden" value="<?php echo $data['kd_unit'];?>" />
    <input name="user" type="hidden" value="<?php echo $_SESSION['username'];?>" />
  <tr>
<?php
$query = "SELECT * FROM data_keperawatan WHERE kd_kunjungan='$kd_kunjungan' GROUP BY data_keperawatan.nama_diagnosa";
$hasil = mysqli_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
?>
      <td width="5%" align="center"><input type="checkbox" value="<?php echo $data['nama_diagnosa'];?>" name="dx<?php echo $no;?>" /></td>
      <td width="55%" align="left"><?php echo $data['nama_diagnosa'];?></td>
      <td width="40%" align="left"><select name="bd<?php echo $no;?>">
    <option value=" bd ?" selected>[Pilih...]</option>
	<?php
	$nama_diagnosa = $data[nama_diagnosa];
	$sql = "SELECT * FROM data_keperawatan,diagnosadb,faktordb 
		WHERE data_keperawatan.nama_diagnosa=diagnosadb.nama_diagnosa AND 
		diagnosadb.kd_diagnosa=faktordb.kd_diagnosa AND diagnosadb.nama_diagnosa='$nama_diagnosa'
		AND data_keperawatan.kd_kunjungan='$kd_kunjungan' GROUP BY faktordb.nama_faktor";
      	$qry = @mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[kd_diagnosa]==$kd_diagnosa) {
	$cek="";
	}
	else {
	$cek="selected";
	}
	echo "<option value=' bd $data[nama_faktor]' $cek>".$data['nama_faktor']."</option>";
	}
	?>
    </select>

<?php$no++;?></td>
   	</tr>
    <?php
}
?>
    <tr>
      <td width="5%"><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" /></td>
      <td width="55%"><input type="submit" name="Submit" value="Tambahkan"></td>
      <td width="40%"></td>
    </tr>
	  </form>
</table>
</body>
</html>
