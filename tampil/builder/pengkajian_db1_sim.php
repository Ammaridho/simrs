<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$act = $_GET['act'];
# Baca variabel Form (If Register Global ON)
if($act=="tambah") {
$asm_db1_code = kdauto("asm_db1","asm_db1_code","4","");
$asm_db1 = $_REQUEST['asm_db1'];
$sql  = " INSERT INTO asm_db1 (asm_db1_code,asm_db1_name)";
$sql .=	" VALUES ('$asm_db1_code','$asm_db1')";
mysqli_query($koneksi, $sql) or die ("Maaf! Pengkajian awal sudah ada yang mengecek !");
} 
else {
$asm_db1_code = $_REQUEST['asm_db1_code'];
$asm_db1_name = $_REQUEST['asm_db1_name'];
$sql  = " UPDATE asm_db1 SET asm_db1_name ='$asm_db1_name' WHERE asm_db1_code='$asm_db1_code'";
mysqli_query($koneksi, $sql) or die ("SQL Error".mysqli_error($koneksi));
}

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
