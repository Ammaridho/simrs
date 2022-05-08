<?php
include "koneksi.php";

$query = "SELECT count(*) AS jum FROM sms_inbox WHERE flagRead = '0' AND (idfolder is null OR idfolder = '0')";
$hasil = mysqli_query($koneksi,$query);
$data  = mysqli_fetch_array($hasil);

?>

<a href="inbox.php?page=1">INBOX</a> (<a href="inbox.php?op=unread&idfolder=0" title="Belum dibaca: <?php echo $data['jum']; ?>">Unread: <?php echo $data['jum']; ?>)</a>
							<?php
							include "koneksi.php";
								$query = "SELECT * FROM sms_folder ORDER BY folder";
								$hasil = mysqli_query($koneksi,$query);
								if (mysqli_num_rows($hasil) > 0)
								{
								echo "<ul>";
								while ($data = mysqli_fetch_array($hasil))
								{
									$idfolder = $data['id'];
									$query2 = "SELECT count(*) as jum FROM sms_inbox WHERE idFolder = '$idfolder' AND flagRead = '0'";
									$hasil2 = mysqli_query($koneksi,$query2);
									$data2  = mysqli_fetch_array($hasil2);
									echo "<li style='border-bottom: 1px dashed #ffffff; list-style-image: url(images/folder.jpg); margin-left: 23px;'><a href='inbox.php?op=showfolder&idfolder=".$data['id']."'>".$data['folder']."</a> (<a href='inbox.php?op=unread&idfolder=".$idfolder."' title='Belum dibaca: ".$data2['jum']."'>Unread: ".$data2['jum'].")</a></li>";
								}
								echo "</ul>";
								}
							?>