<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
include "../../config/config.php";

$no_alat = $_REQUEST['no_alat'];
if ($no_alat !="") {
   $sql = "SELECT * FROM monitoring WHERE no_alat='$no_alat'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>STOP </title>
</head>

<body>
<form id="form1" name="form1" method="post" action="monitoring_stop_sim.php">
  <input type="text" name="tanggal_lepas" value="<?php echo "".date('Y-m-d') ;?>"/>
  <input type="text" name="jam_lepas" value="<?php echo "".date('H:i') ;?>"/>
  <input name="alasan_lepas" onkeyup="showUser(this.value)" value="Alasan lepas..." onblur="if(this.value=='') this.value='Alasan lepas...';" onfocus="if(this.value=='Alasan lepas...') this.value='';" size="47" />
  <input type="hidden" name="pelepas" value="<?php echo $_SESSION['username'];?>"/>
  <input type="hidden" name="no_alat" value="<?php echo $data['no_alat'];?>"/>
  <br />
  <input type="submit" name="Submit" value="STOP !" />
</form>
</body>
</html>
