<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
            "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv"Script-Content-Type" content="text/javascript">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Expires" content="0"> <!-- disable caching -->
    <title>Template SMS Follow Up</title>
    <script type="text/javascript">
    function makeSelection(form1, id) {
      if(!form1 || !id)
        return;
      var elem = form1.elements[id];
      if(!elem)
        return;
      var val = elem.options[elem.selectedIndex].value;
      opener.targetElement.value = val;
      this.close();
    }
    </script>
</head>
<body>
  <form id="form1" name="form1" action="#">
    <div align="center">
<?php
include "../librari/inc.koneksidb.php";
$nama = $data['nama']
?>
    <select name="nameSelection" size="15" id="nameSelection">
	<option value="" selected></option>
        <?php
	$sql = "SELECT * FROM template";
      	$qry = @mysqli_query($koneksi, $sql) or die ("gagal Query");
	while ($data =mysql_fetch_array($qry)) {
	if ($data[kd_template]==$kd_template) {
	$cek="selected";
	}
	else {
	$cek="";
	}
	echo "<option value='$data[isi_template]' $cek>".$data['nama_template']."</option>";
	}
	?>
      </select>
      <input name="button" type="button" onClick="makeSelection(this.form, 'nameSelection');" value="Pilih">
    </div></br>
  </form>
</body>
</html>

