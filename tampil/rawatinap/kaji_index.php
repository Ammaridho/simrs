<?php 
include "header.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>RENCANA KEPERAWATAN EKA HOSPITAL</title>
</head>
<body>
<table>
<tr>
<td>
<iframe src="kaji.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" width="226" height="418" name="iFrame1" id="iFrame1" title="iFrame1" bgcolor="#D9E8F3"></iframe>
</td>
<td>
<iframe src="kaji_view.php?kd_kunjungan=<?php echo $data['kd_kunjungan']; ?>" width="754" height="418" name="iFrame2" id="iFrame2" title="iFrame2"></iframe>
</td>
</tr>
</table>
</body>
</html>

