<?php
include "tampil/librari/config.php";
include "tampil/librari/inc.koneksidb.php";
include_once "tampil/librari/inc.session.php";

unset($_SESSION['klinik']);
echo "<meta http-equiv='refresh' content='0; url=".$url."Login.php'>";
exit;
?>