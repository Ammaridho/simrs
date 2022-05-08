<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$act = $_GET['act'];
# Baca variabel Form (If Register Global ON)
if($act=="tambah") {
$asm_db1_code = $_REQUEST['asm_db1_code'];
$asm_db2_code = kdauto("asm_db2","asm_db2_code","4","");
$asm_db2_name = $_REQUEST['asm_db2_name'];

$sql  = " INSERT INTO asm_db2 (asm_db1_code,asm_db2_code,asm_db2_name)";
$sql .=	" VALUES ('$asm_db1_code','$asm_db2_code','$asm_db2_name')";
mysqli_query($koneksi, $sql) or die ("Data lvl2 gagal simpan!".mysqli_error($koneksi));
} 
else {
$asm_db1_code = $_REQUEST['asm_db1_code'];
$asm_db2_code = $_REQUEST['asm_db2_code'];
$asm_db2_name = $_REQUEST['asm_db2_name'];
$sql  = " UPDATE asm_db2 SET asm_db2_name ='$asm_db2_name' WHERE asm_db2_code='$asm_db2_code'";
mysqli_query($koneksi, $sql) or die ("SQL Error".mysqli_error($koneksi));
}

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
