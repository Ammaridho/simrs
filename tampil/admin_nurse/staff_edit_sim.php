<?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$uploaddir = 'gambar/';
$fileName = $_FILES['userfile']['name'];     
$uploadfile = $uploaddir . $fileName;
// nama file temporary yang akan disimpan di server
$tmpName  = $_FILES['userfile']['tmp_name']; 
// ukuran file yang diupload
$fileSize = $_FILES['userfile']['size'];
// jenis file yang diupload
$fileType = $_FILES['userfile']['type'];

$nik		= $_REQUEST['nik'];
$unit		= $_REQUEST['unit'];
$nama		= $_REQUEST['nama'];
 // menyimpan file ke tabel upload dalam db

$query = "SELECT count(*) as jum FROM upload WHERE name = '$fileName'";
$hasil = query($query);
$data  = fetch_array($hasil);

if ($data['jum'] > 0)
{
   $query = "UPDATE user SET size = '$fileSize' WHERE name = '$fileName'";
}
else $query = "INSERT INTO user (name, size, type) VALUES ('$fileName', '$fileSize', '$fileType')";

query($query);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="2;url=staff_view.php" />
<title>Terima kasih !</title>
</head>
<body>
<h1>Okay !!</h1>
<h2>Database staff berhasil diupdate !</h2>
</div>
</body>
</html>
