<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];

?>
<html>
<head>
</head>
<body>
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
 <tr bgcolor="#FFFFFF">
    <td width="2%" bgcolor="#D9E8F3"><div align="center">No</div></td>
    <td width="9%" bgcolor="#D9E8F3"><div align="center">Tanggal</div></td>
    <td width="9%" bgcolor="#D9E8F3"><div align="center">Jam</div></td>
    <td width="24%" bgcolor="#D9E8F3"><div align="center">Nama Tindakan </div></td>
 </tr>
 <tr bgcolor="#FFFFFF">
    <td colspan="4" bgcolor="#D9E8F3"><div align="center">Expertise</div></td>
 </tr>
</body>
</html>