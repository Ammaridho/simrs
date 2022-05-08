<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$act = $_GET['act'];
if($act=="input"){
$asm_db5_code = kdauto("asm_db5","asm_db5_code","4","");
$asm_db5_name = $_REQUEST['asm_db5_name'];
$sql  = " INSERT INTO asm_db5 (asm_db5_code,asm_db5_name)";
$sql .=	" VALUES ('$asm_db5_code','$asm_db5_name')";
mysqli_query($koneksi, $sql) or die ("Maaf! Data diinput !" .mysqli_error($koneksi));
}
elseif($act=="add") {
   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['asm_db5_code'.$i]))
     {
      $asm_db4_code = kdauto("asm_db4","asm_db4_code","4","");
	    $asm_db3_code = $_POST['asm_db3_code'];
	    $asm_db5_code = $_POST['asm_db5_code'.$i];
       $query = "INSERT INTO asm_db4 VALUES('$asm_db3_code','$asm_db4_code','$asm_db5_code')";
       mysqli_query($koneksi, $query) or die ("Maaf! Data tidak berhasil diinput !" .mysqli_error($koneksi));
     }
   }
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
}
elseif($act=="del") {
   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['asm_db4_code'.$i]))
     {
	   $asm_db4_code = $_POST['asm_db4_code'.$i];
       $query = "DELETE FROM asm_db4 WHERE asm_db4_code='$asm_db4_code'";
       mysqli_query($koneksi, $query) or die ("Maaf! Data tidak berhasil dihapus !" .mysqli_error($koneksi));
     }
   }
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
}

include "db5_view.php"
?>