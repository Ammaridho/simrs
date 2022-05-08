<script language="javascript">
	var win = null;
	function NewWindow(mypage,myname,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings =
	'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	win = window.open(mypage,myname,settings)
	}
</script>

<!-- Ini CSS untuk halaman-->
<style type="text/css">
 
div.pagination {
	padding: 3px;
	margin: 3px;
}
 
div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
 
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;
 
	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
 
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
 
		color: #DDD;
	}
 
</style>
 
<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include_once "../librari/inc.session.php";
 
	$tbl_name="diagnosadb";		//nama tabelnya
	// Halaman yang akan ditampilkan untuk pertengahan?
	$adjacents = 3;
 
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysqli_fetch_array(mysqli_query($koneksi, $query));
	$total_pages = $total_pages[num];
 
	/* variabel query. */
	$targetpage = "diagnosa_prwt_view.php"; 	//nama file  (nama file ini)
	$limit = 20; 					//berapa yang akan ditampilkan setiap halaman
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			
	else
		$start = 0;								//halaman awal
 
 
	$sql = "SELECT * FROM $tbl_name ORDER BY nama_diagnosa LIMIT $start, $limit";
	$result = mysqli_query($koneksi, $sql) or die("error:".mysqli_error($koneksi));
 
 
	if ($page == 0) $page = 1;	//jika variabel kosong maka defaultnya halaman pertama.
	$prev = $page - 1;		//halaman sebelumnya
	$next = $page + 1;		//halaman berikutnya
	$lastpage = ceil($total_pages/$limit);		
	$lpm1 = $lastpage - 1;						
 
 
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//Link halaman sebelumnya
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">Sebelumnya</a>";
		else
			$pagination.= "<span class=\"disabled\">Sebelumnya</span>";	
 
		//halaman
		if ($lastpage < 7 + ($adjacents * 2))	
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
 
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
 
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
 
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
 
		//link halaman selanjutnya
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">Selanjutnya</a>";
		else
			$pagination.= "<span class=\"disabled\">Selanjutnya</span>";
		$pagination.= "</div>\n";		
	}
?>
		<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D9E8F3">
		<tr>
		<td colspan="3"><b>Diagnosa keperawatan Nanda NIC NOC Linkage</b></td>
		</tr>

<a href="tambah_diagnosa_prwt.php" title="Tambah diagnosa keperawatan" onClick="NewWindow(this.href,'name','800','400','yes');return false">Tambah</a>

		<tr bgcolor="#FFFFFF"><td colspan="3"><?php echo $pagination; ?></td></tr>
	<?php
 
		while($row = mysqli_fetch_array($result))
		{
 
		// Data yang ditampilkan
		?>
		<tr bgcolor="#FFFFFF">
<td colspan="3"><b><?php echo $row['nama_diagnosa']?></b><div align="right"><a href="tambah_data.php?kdubah=<?php echo $row['kd_diagnosa']; ?>" title="Tambah data yang muncul"  target="_Blank">Data</a> | <a href="tambah_etiologi.php?kdubah=<? echo $row['kd_diagnosa']; ?>" title="Tambah faktor yang berhubungan"  target="_Blank">Etiologi</a> | 
		<a href="tambah_noc.php?kdubah=<?php echo $row['kd_diagnosa']; ?>" title="Tambah kriteria hasil" onClick="NewWindow(this.href,'name','800','400','yes');return false">NOC</a> |
	      <a href="tambah_nic.php?kdubah=<?php echo $row['kd_diagnosa']; ?>" title="Tambah kelas intervensi" onClick="NewWindow(this.href,'name','800','400','yes');return false">NIC</a></div></td>
		</tr>
 <tr bgcolor="#FFFFFF">
 <td valign=top width="33%"><b>Faktor : </b></br>
<?php
    $kd_diagnosa = $row['kd_diagnosa'];
	$sql1 = "SELECT * FROM faktordb WHERE kd_diagnosa='$kd_diagnosa'";
    $result1 = @mysqli_query($koneksi, $sql1);
	while ($row = mysqli_fetch_array($result1)) {
	if ($row[kd_diagnosa]==$kd_diagnosa) {
	echo "<ul><li>".$row['nama_faktor']." <a href='hapus_etiologi.php?kdhapus=".$row['kd_faktor']."' title='Hapus ".$row['nama_faktor']."'> x</a></li></ul>";
	}
	}
	?>
</td>
<td valign=top width="33%"><b>NOC : </b></br>
<?php
	$sql2 = "SELECT * FROM nocdb WHERE kd_diagnosa='$kd_diagnosa'";
    $result2 = @mysqli_query($koneksi, $sql2);
	while ($row = mysqli_fetch_array($result2)) {
	if ($row[kd_diagnosa]==$kd_diagnosa) {
	echo "<ul><li>".$row['noc']." <a href='hapus_noc.php?kdhapus=".$row['kd_noc']."' title='Hapus NOC'> x</a></li></ul>";
	}
	}
	?>
</td>
<td valign=top width="33%"><b>NIC : </b></br>
<?php
	$sql3 = "SELECT * FROM nicdb WHERE kd_diagnosa='$kd_diagnosa'";
    $result3 = @mysqli_query($koneksi, $sql3);
	while ($row = mysqli_fetch_array($result3)) {
	if ($row[kd_diagnosa]==$kd_diagnosa) {
	echo "<ul><li>".$row['nic']." <a href='hapus_nic.php?kdhapus=".$row['kd_nic']."' title='Hapus NIC'> x</a></li></ul>";
	}
	}
	?>
</td>
</tr>
<tr>
<td>
<?php
	$sql4 = "SELECT * FROM diagnosadb WHERE kd_diagnosa='$kd_diagnosa'";
    $result4 = @mysqli_query($koneksi, $sql4);
	$row = mysqli_fetch_array($result4);
	if ($row[kd_diagnosa]==$kd_diagnosa) {
	echo "<a href='hapus_diagnosa_prwt.php?kdhapus=".$row['kd_diagnosa']."' title='Hapus diagnosa keperawatan'>Hapus</a>";
	}
	?>
</td>
</tr>
<?php } ?>

		</table>
<?=$pagination?>
