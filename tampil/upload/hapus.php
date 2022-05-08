<?php

    mysql_connect('localhost','root','12345678');
    mysql_select_db('latihan');

    $id      = $_GET['id'];
    $query   = "SELECT * FROM upload WHERE id = '$id'";
    $hasil   = mysqli_query($koneksi,$query);
    $data    = mysqli_fetch_array($hasil);
    $namaFile = $data['name'];
	
	$query = "DELETE FROM upload WHERE name = '$namaFile'";
	mysqli_query($koneksi,$query);
	
	unlink("data/".$namaFile);
	echo "File telah dihapus";

?>
