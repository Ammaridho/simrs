<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$act = $_GET['act'];
# Baca variabel Form (If Register Global ON)
if($act=="tambah") {
$asm_db2_code = $_REQUEST['asm_db2_code'];
$asm_db3_code = kdauto("asm_db3","asm_db3_code","4","");
$asm_db3_name = $_REQUEST['asm_db3_name'];
$mandatori = $_REQUEST['mandatori'];
$priority 	  = $_REQUEST['priority'];
$exception 	  = $_REQUEST['exception'];
$datatype 	  = $_REQUEST['datatype'];

$sql  = " INSERT INTO asm_db3 (asm_db2_code,asm_db3_code,asm_db3_name,mandatori,priority,exception,datatype)";
$sql .=	" VALUES ('$asm_db2_code','$asm_db3_code','$asm_db3_name','$mandatori','$priority','$exception','$datatype')";
mysqli_query($koneksi, $sql) or die ("Maaf! Pengkajian awal sudah ada yang mengecek !".mysqli_error($koneksi));
} 
else {
$asm_db2_code = $_REQUEST['asm_db2_code'];
$asm_db3_code = $_REQUEST['asm_db3_code'];
$asm_db3_name = $_REQUEST['asm_db3_name'];
$mandatori	  = $_REQUEST['mandatori'];
$priority 	  = $_REQUEST['priority'];
$exception 	  = $_REQUEST['exception'];
$datatype 	  = $_REQUEST['datatype'];
$sql  = " UPDATE asm_db3 SET asm_db3_name ='$asm_db3_name',mandatori='$mandatori', priority='$priority', exception='$exception',datatype='$datatype' WHERE asm_db3_code='$asm_db3_code'";
mysqli_query($koneksi, $sql) or die ("SQL Error".mysqli_error($koneksi));
}

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>