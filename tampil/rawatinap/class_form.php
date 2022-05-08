<?php 
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysqli_connect_error());
   $data=mysqli_fetch_array($qry);
}
?>
<html>
<head>
<title>DAFTAR PASIEN</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
a:link {
	color: #FF0000;
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
</head>
<body id=tab6>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="8" bgcolor="#D9E8F3"><div align="left">Tingkat Ketergantungan</strong></div></td>
    </tr>
<form name="form1" method="post" action="class_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Keadaan umum</div></td>
      <td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class01" type="radio" value="1" <?php echo $cek_1;?>>Ringan</td>
<td><input name="class01" type="radio" value="2" <?php echo $cek_2;?>>Sedang</td>
<td><input name="class01" type="radio" value="3" <?php echo $cek_3;?>>Berat
      </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Kebersihan diri, mandi, ganti pakaian</div></td>
	<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class02" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
<td><input name="class02" type="radio" value="2" <?php echo $cek_2;?>>Dibantu sebagian</td>
<td><input name="class02" type="radio" value="3" <?php echo $cek_3;?>>Dibantu penuh
      </div>
</td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Makan dan minum</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class03" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
<td><input name="class03" type="radio" value="2" <?php echo $cek_2;?>>Dibantu</td>
<td><input name="class03" type="radio" value="3" <?php echo $cek_3;?>>Melalui maag slang
      </div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Ambulasi</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left"><div align="left">
  <input name="class04" type="radio" value="1" <?php echo $cek_1;?>>Mandiri</td>
<td><input name="class04" type="radio" value="2" <?php echo $cek_2;?>>Dibantu sebagian</td>
<td><input name="class04" type="radio" value="3" <?php echo $cek_3;?>>Mika-miki / 2jam
      </div></div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Observasi tanda-tanda vital</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class05" type="radio" value="1" <?php echo $cek_1;?>>Tiap shift</td>
<td><input name="class05" type="radio" value="2" <?php echo $cek_2;?>>Tiap 4 jam</td>
<td><input name="class05" type="radio" value="3" <?php echo $cek_3;?>>Tiap 2 jam
      </div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Pengobatan</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class06" type="radio" value="1" <?php echo $cek_1;?>>Oral</td>
<td><input name="class06" type="radio" value="2" <?php echo $cek_2;?>>Parenteral</td>
<td><input name="class06" type="radio" value="3" <?php echo $cek_3;?>>Drips
      </div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Alat yang terpasang</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">

<input name="class07" type="radio" value="1" <?php echo $cek_1;?>>Tidak pakai</td>
<td><input name="class07" type="radio" value="2" <?php echo $cek_2;?>>1-2 alat</td>
<td><input name="class07" type="radio" value="3" <?php echo $cek_3;?>>Lebih dari 2 alat
      </div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Suction</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class08" type="radio" value="1" <?php echo $cek_1;?>>Tidak</td>
<td><input name="class08" type="radio" value="2" <?php echo $cek_2;?>>1-5 kali</td>
<td><input name="class08" type="radio" value="3" <?php echo $cek_3;?>>Lebih dari 5 kali
      </div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Perawatan luka</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class09" type="radio" value="1" <?php echo $cek_1;?>>Tidak / sederhana</td>
<td><input name="class09" type="radio" value="2" <?php echo $cek_2;?>>Luka Sedang</td>
<td><input name="class09" type="radio" value="3" <?php echo $cek_3;?>>Luka Besar
      </div></td>
    </tr><tr bgcolor="#FFFFFF">
      <td bgcolor="#FFFFFF"><div align="left">Status Psikologi</div></td>
<td colspan="5" bgcolor="#FFFFFF"><div align="left">
<input name="class10" type="radio" value="1" <?php echo $cek_1;?>>Stabil</td>
<td><input name="class10" type="radio" value="2" <?php echo $cek_2;?>>Dibawah pengaruh obat</td>
<td><input name="class10" type="radio" value="3" <?php echo $cek_3;?>>Gelisah/Disorientasi
      </div></td>
    </tr>
<tr> 
    <td colspan="6" bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Simpan"></td>
  </tr>
   </form>
<?php
include "classview.php"; 
?>
</table>
</body>
</html>
