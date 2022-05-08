<html>
<head>
<title>.: LAPORAN PJ SHIFT</title></head>
<body>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr>
      <td colspan="10" bgcolor="#CCCCCC"><div align="center"><strong>LAPORAN PJ SHIFT</strong></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="11%" bgcolor="#D9E8F3">Tanggal</td>
      <td width="9%" bgcolor="#D9E8F3">Jam</td>
      <td width="10%" bgcolor="#D9E8F3">PRN</td>
      <td width="16%" bgcolor="#D9E8F3">Nama</td>
      <td width="15%" bgcolor="#D9E8F3">Diagnosa</td>
      <td width="6%" bgcolor="#D9E8F3">Sex</td>
      <td width="8%" bgcolor="#D9E8F3">Kasus</td>
      <td width="12%" bgcolor="#D9E8F3">Tindak lanjut</td>
	<td width="12%" bgcolor="#D9E8F3">Perawat</td>
      <td width="13%" bgcolor="#D9E8F3">&nbsp;</td>
    </tr>
<?php
// koneksi ke mysql
include "../librari/inc.koneksidb.php";

// inisialisasi bagian WHERE dari query pencarian
$bagianWhere = "";
 
// jika yang dipilih adalah search by filename
if (isset($_POST['namaFile']))
{
   // baca nama file yang mau dicari
   $namaFile = $_POST['namaFile'];
 
   // proses menyambung bagian WHERE dari query
   if (empty($bagianWhere))
   {
        $bagianWhere .= "shift LIKE '%$namaFile%'";
   }
}
 
// jika yang dipilih kategori tanggal mulai upload
if (isset($_POST['bydate1']))
{
   // membaca tanggal, bulan dan tahun mulai upload
   // lalu mengkonstruksi menjadi format yyyy-mm-dd sesuai format DATE di MySQL
   $tglSetelah = $_POST['bydate1'];
 
   // proses menyambung bagian WHERE untuk tanggal mulai upload   
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tanggal = '$tglSetelah'";
   }
   else
   {
        $bagianWhere .= " AND tanggal = '$tglSetelah'";
   }
}

// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM laporan WHERE tanggal='$bydate1' ORDER BY prn";
$hasil = mysql_query($query);
 
while ($data = mysql_fetch_array($hasil))
{
?>
    <tr bgcolor="#FFFFFF">
      <td><?php echo $data['tanggal'];?></td>
      <td><?php echo $data['jam_datang'];?></td>
      <td><?php echo $data['prn'];?></td>
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['group_diagnosa'];?> [ <?php echo $data['diagnosa'];?> ]</td>
      <td><?php echo $data['jenis_kelamin'];?></td>
      <td><?php echo $data['jenis_kasus'];?></td>
      <td><?php echo $data['tindak_lanjut'];?></td>
  	<td><?php echo $data['perawat'];?></td>
      <td><a href="lap_nic_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" target="_blank">Edit</a></td>
    </tr>
	<?php
}
?>
<?php
$query = "SELECT * FROM laporan WHERE ".$bagianWhere;
$hasil = mysql_query($query);
$num_rows = mysql_num_rows($hasil);
?>
    <tr bgcolor="#FFFFFF">
      <td>Jumlah</td>
      <td><?php echo $num_rows;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</body>
</html>
