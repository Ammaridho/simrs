<?php
include "../librari/config.php"; 
include "../librari/inc.koneksidb.php"; 

// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.

$uploaddir = 'gambar/';
$kode = $_REQUEST['kode'];
$fileName = $_FILES['userfile']['name'];     
$uploadfile = $uploaddir . $fileName;
// nama file temporary yang akan disimpan di server
$tmpName  = $_FILES['userfile']['tmp_name']; 
// ukuran file yang diupload
$fileSize = $_FILES['userfile']['size'];
// jenis file yang diupload
$fileType = $_FILES['userfile']['type'];

// menyimpan file ke tabel upload dalam db


   $query = "UPDATE data_klinik SET logo = '$fileName' WHERE kode = '$kode'";
	mysqli_query($koneksi,$query);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?> 
