<?php 
include "../librari/inc.koneksidb.php";
$ID = $_REQUEST['ID'];

if ($ID !="") {
$sql = "DELETE FROM sms_inbox WHERE ID='$ID'";
mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_connect_error());

	$pesan= "Data berhasil disimpan";
}
include "inbox.php";
?>

