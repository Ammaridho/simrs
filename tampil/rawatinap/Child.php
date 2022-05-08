<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
            "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv"Script-Content-Type" content="text/javascript">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Expires" content="0"> <!-- disable caching -->
    <title>Example</title>
    <script type="text/javascript">
    function makeSelection(frm, id) {
      if(!frm || !id)
        return;
      var elem = frm.elements[id];
      if(!elem)
        return;
      var val = elem.options[elem.selectedIndex].value;
      opener.targetElement.value = val;
      this.close();
    }
    </script>
</head>
<body>
  <form id="frm" name="frm" action="#">
<?php
$my['host']	= "localhost";
$my['user']	= "root";
$my['pass']	= "12345678";
$my['dbs']	= "renpra";

$koneksi	= mysql_connect($my['host'], 
							$my['user'], 
							$my['pass']);
if (! $koneksi) {
  echo "Gagal koneksi boss..!";
  mysql_error();
}
mysql_select_db($my['dbs'])
	 or die ("Database nggak ada tuh".mysql_error());


   $sql = "SELECT * FROM diagnosadb";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);

?>
    <span>Berhubungan dengan </span>:</br>
    <select name="nameSelection" id="nameSelection" value="<?php echo $data['kd_diagnosa']; ?>">
    <option value="" selected>[Pilih...]</option>
	<?php
       	$nama_diagnosa = $data[nama_diagnosa];
	$kd_diagnosa = $data[kd_diagnosa];
	$sql = "SELECT * FROM faktordb WHERE kd_diagnosa='$kd_diagnosa'";
      	$qry = @mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[nama_faktor]==$nama_faktor) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[nama_faktor]' $cek>".$data['nama_faktor']."</option>";
	}
	?>
    </select>
    <input type="button" value="Pilih" onclick="makeSelection(this.form, 'nameSelection');">
  </form>
</body>
</html>

