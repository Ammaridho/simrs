<?php
include "tab_order_poli_edit.php";
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";

$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$sql = "SELECT * FROM pasien_poliklinik WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($qry);
$DataPerawat = $data['perawat'];
$DataDokter = $data['dokter'];
$keluhan = $data['keluhan'];
$group_diagnosa = $data['group_diagnosa'];
?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type" />
<script type="text/javascript" src="<?php echo $url;?>media/ckeditor/ckeditor.js"></script>
<script src="<?php echo $url;?>media/ckeditor/_samples/sample.js" type="text/javascript"></script>
<link href="<?php echo $url;?>media/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
  function konfirmasi (kd_kunjungan) {
   tanya = confirm('Yakin akan disimpan ?');
   if (tanya == true) return true;
   else return false;
   }
</script>
<script src="../src/js/jscal2.js"></script>
    <script src="../src/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/steel/steel.css" />
<title>POLIKLINIK</title>
<style type="text/css">
<!--
.style2 {font-size: 9px}
.style2 {font-size: 9px}
-->
</style>
</head>
<body id="tab1">
<table width="99%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="lap_poli_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>">
   <tr bgcolor="#FFFFFF">
    <td width="2%" bgcolor="#D9E8F3" colspan="4">CATATAN MEDIS</td>
   </tr>
   <tr bgcolor="#FFFFFF"><input name="prn" type="hidden" id="prn"  value="<?php echo $data['prn'];?>">
    <td width="25%" align="left"><strong>
      <input name="tgl_respon" type="hidden" id="tgl_respon" size="9" value="<?php echo "".date('Y-m-d') ;?>" onBlur="if(this.value=='') this.value='<?php echo "".date('Y-m-d') ;?>';" onFocus="if(this.value=='<?php echo "".date('Y-m-d') ;?>') this.value='';">
      <input name="jam_respon" type="hidden" id="jam_respon" size="7" value="<?php echo $data['jam_respon'];?>" onBlur="if(this.value=='') this.value='<?php echo $data['jam_respon'];?>';" onFocus="if(this.value=='<?php echo $data['jam_respon'];?>') this.value='';">
      Petugas</strong></td>
    <td width="19%" align="left"><select name="perawat" id="perawat">
    <option value="" selected>[Pilih...]</option>
	<?php
	$sql = "SELECT * FROM user WHERE status='Aktif'";
      	$qry = @mysqli_query($koneksi,$sql) or die ("gagal Query");
	while ($data =mysqli_fetch_array($qry)) {
	if ($data[nama]==$DataPerawat) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[nama_user]' $cek>".$data['nama_user']."</option>";
	}
	?>
    </select></td>
    <td width="19%" align="left"><strong>Shift</strong></td>
    <td width="37%" align="left"><select name="shift" id="shift">
      <?php 
        if ($data['shift']=="Pagi") echo "<option value='Pagi' selected>Pagi</option>";
        else echo "<option value='Pagi'>Pagi</option>";
 		if ($data['shift']=="Sore") echo "<option value='Sore' selected>Sore</option>";
        else echo "<option value='Sore'>Sore</option>";
		if ($data['shift']=="Malam") echo "<option value='Malam' selected>Malam</option>";
        else echo "<option value='Malam'>Malam</option>";
        ?>
    </select></td>
    <?php 
$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM pasien_poliklinik WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($qry); 
?>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left"><strong>Riwayat alergi </strong></td>
    <td align="left" colspan="3"><input type="text" name="alergi" value="<?php echo $data['alergi'];?>"> </td>
      </tr>
	  <tr bgcolor="#FFFFFF">
    <td colspan="4" align="left"><strong>Riwayat Penyakit</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="left">
    <?php 
    if ($data['hepatitis']=="X") echo "<input type='checkbox' name='hepatitis' value='X' checked>Hepatitis";
    else echo "<input type='checkbox' name='hepatitis' value='X'>Hepatitis";
    ?>    </td>
    <td align="left"><?php 
    if ($data['hipertensi']=="X") echo "<input type='checkbox' name='hipertensi' value='X' checked>Hipertensi";
    else echo "<input type='checkbox' name='hipertensi' value='X'>Hipertensi";
    ?></td>
    <td><?php 
    if ($data['diabetes']=="X") echo "<input type='checkbox' name='diabetes' value='X' checked>Diabetes";
    else echo "<input type='checkbox' name='diabetes' value='X'>Diabetes";
    ?></td>
    <td><?php 
    if ($data['gastritis']=="X") echo "<input type='checkbox' name='gastritis' value='X' checked>Gastritis";
    else echo "<input type='checkbox' name='gastritis' value='X'>Gastritis";
    ?></td>
    </tr>
	  
	  
<?php 
$kd_kunjungan = $_GET['kd_kunjungan'];
$sql = "SELECT * FROM pasien_poliklinik WHERE kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($qry); 
?>
  <tr bgcolor="#FFFFFF">
    <td colspan="4" align="left"><strong>Keluhan</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="4" align="left"><textarea cols="80" id="keluhan" name="keluhan" rows="10"><?php echo $data['keluhan']; ?></textarea>
			<script type="text/javascript">
		//<![CDATA[

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.replace( 'keluhan',
				{
					skin : 'office2003',
					extraPlugins : 'uicolor',
					uiColor: '#DC0C4B',
					toolbar :
					[
						[ 'NewPage','Save','Preview','Print','-','SelectAll','Copy','Cut','Paste','-','Bold', 'Italic','Underline','Strike','Superscript','Subscript','TextColor','BGColor','Smiley','-', 'NumberedList', 'BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Indent','Outdent','-','Undo','Redo' ]

					]
				} );

		//]]>
		</script></td>
  </tr>
  <tr> 
    <td colspan="4" bgcolor="#FFFFFF"><label>
    <input name="jam_keluar" type="hidden" id="jam_keluar" value="<?php echo "".date('H:i') ;?>">
    <input type="submit" name="Submit" value="Update" title="Simpan laporan">
    </label></td>
  </tr>
  </form>
</table>
</body>
</html> 
