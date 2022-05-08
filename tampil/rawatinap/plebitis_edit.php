<?php 
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
$no = $_REQUEST['no'];
if ($no !="") {
   $sql = "SELECT * FROM monitoring_plebitis WHERE no='$no'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EDIT PEMANTAUAN PLEBITIS</title>
</head>

<body>
<img src="plebitis.jpg" width="784" height="590" alt="TestLinkGambar" usemap="#LinkGambar">
<map name="LinkGambar">
<area shape="rect" alt="plebitis 0" title="Skor 0" coords="80,46,774,118" href="plebitis_edit_sim.php?no=<?php echo $data['no'];?>&no_alat=<?php echo $data['no_alat'];?>&skor=0&tanggal=<?php echo "".date('Y-m-d') ;?>&jam=<?php echo "".date('H:i') ;?>&ipcln=<?php echo $_SESSION['username'];?>&kesimpulan=Tidak Plebitis"/>
<area shape="rect" alt="plebitis 1" title="Skor 1" coords="80,131,774,200" href="plebitis_edit_sim.php?no=<?php echo $data['no'];?>&no_alat=<?php echo $data['no_alat'];?>&skor=1&tanggal=<?php echo "".date('Y-m-d') ;?>&jam=<?php echo "".date('H:i') ;?>&ipcln=<?php echo $_SESSION['username'];?>&kesimpulan=Plebitis"/>
<area shape="rect" alt="plebitis 2" title="Skor 2" coords="80,211,774,280" href="plebitis_edit_sim.php?no=<?php echo $data['no'];?>&no_alat=<?php echo $data['no_alat'];?>&skor=2&tanggal=<?php echo "".date('Y-m-d') ;?>&jam=<?php echo "".date('H:i') ;?>&ipcln=<?php echo $_SESSION['username'];?>&kesimpulan=Plebitis"/>
<area shape="rect" alt="plebitis 3" title="Skor 3" coords="80,294,774,361" href="plebitis_edit_sim.php?no=<?php echo $data['no'];?>&no_alat=<?php echo $data['no_alat'];?>&skor=3&tanggal=<?php echo "".date('Y-m-d') ;?>&jam=<?php echo "".date('H:i') ;?>&ipcln=<?php echo $_SESSION['username'];?>&kesimpulan=Plebitis"/>
<area shape="rect" alt="plebitis 4" title="Skor 4" coords="80,377,774,443" href="plebitis_edit_sim.php?no=<?php echo $data['no'];?>&no_alat=<?php echo $data['no_alat'];?>&skor=4&tanggal=<?php echo "".date('Y-m-d') ;?>&jam=<?php echo "".date('H:i') ;?>&ipcln=<?php echo $_SESSION['username'];?>&kesimpulan=Plebitis"/>
<area shape="rect" alt="plebitis 5" title="Skor 5" coords="80,456,774,539" href="plebitis_edit_sim.php?no=<?php echo $data['no'];?>&no_alat=<?php echo $data['no_alat'];?>&skor=5&tanggal=<?php echo "".date('Y-m-d') ;?>&jam=<?php echo "".date('H:i') ;?>&ipcln=<?php echo $_SESSION['username'];?>&kesimpulan=Plebitis"/>
</form>
</body>
</html>