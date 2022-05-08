<title>STOP !</title><?php 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$no_alat		= $_REQUEST['no_alat'];
$tanggal_lepas	= $_REQUEST['tanggal_lepas'];
$jam_lepas		= $_REQUEST['jam_lepas'];
$pelepas		= $_REQUEST['pelepas'];
$alasan_lepas	= $_REQUEST['alasan_lepas'];

	  $sql  = " UPDATE monitoring SET 		
		tanggal_lepas='$tanggal_lepas',
		jam_lepas='$jam_lepas',
		pelepas='$pelepas',
		alasan_lepas='$alasan_lepas'
		WHERE no_alat='$no_alat' ";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf, data belum berhasil di-update !");


echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
