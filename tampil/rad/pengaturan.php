<?php 
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";

if (isset($_GET['action'])) {
if ($_GET['action'] == "del")
{
   // membaca nilai n dari hidden value
   $n = $_POST['n'];

   for ($i=0; $i<=$n-1; $i++)
   {
     if (isset($_POST['rad'.$i]))
     {
       $rad = $_POST['rad'.$i];
       $query = "DELETE FROM rad_db WHERE kd_rad='$rad'";
       mysqli_query($koneksi,$query);
     }
   }
}
}
?>
<html>
<head>
<title>Masterdata Radiologi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style type="text/css">
<!--
a:link {
	color: #000080;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0000FF;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
.style1 {font-size: 16px}
-->
</style>
<script type="text/javascript">

  function pilihan()
  {
     // membaca jumlah komponen dalam form bernama 'myform'
     var jumKomponen = document.form1.length;

     // jika checkbox 'Pilih Semua' dipilih
     if (document.form1[0].checked == true)
     {
        // semua checkbox pada data akan terpilih
        for (i=1; i<=jumKomponen; i++)
        {
            if (document.form1[i].type == "checkbox") document.form1[i].checked = true;
        }
     }
     // jika checkbox 'Pilih Semua' tidak dipilih
     else if (document.form1[0].checked == false)
        {
            // semua checkbox pada data tidak dipilih
            for (i=1; i<=jumKomponen; i++)
            {
               if (document.form1[i].type == "checkbox") document.form1[i].checked = false;
            }
        }
  }

  </script>
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
</head>
<body>
<a href="raddb_tambah.php" onClick="NewWindow(this.href,'name','800','400','yes');return false"><b>+ Tambah</b></a>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?&action=del">
<table class="table" width="99%" height="81" border="0" align="left" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<tr bgcolor="#FFFFFF">
     	<td width="2%" height="23" align="center" bgcolor="#D9E8F3"><input class="form-check-input" type="checkbox" name="pilih" onClick="pilihan()" /></td>
     	<td width="10%" align="center" bgcolor="#D9E8F3"><strong>Institusi</strong></td>
     	<td width="40%" align="center" bgcolor="#D9E8F3"><strong>Item radiologi </strong></td>
      	<td width="15%" align="center" bgcolor="#D9E8F3"><strong>Harga</strong></td>
	    <td width="10%" align="center" bgcolor="#D9E8F3"><strong>Discount</strong></td>
	    <td width="20%" align="center" bgcolor="#D9E8F3"><strong>Keterangan</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
<?php
$query = "SELECT * FROM rad_db";
$hasil = mysqli_query($koneksi,$query);
$i = 0;
while ($data = mysqli_fetch_array($hasil))
{
?>
    <td width="2%" height="26" align="center" bgcolor="#FFFFFF"><input type="checkbox" value="<?php echo $data['kd_rad'];?>" name="rad<?php echo $i;?>" /></td>
    <td align="left" bgcolor="#FFFFFF"><radel>
      <input type="text" size="6" value="<?php echo $data['inst'];?>" name="inst<?php echo $i;?>" />
    </radel></td>
    <td align="left" bgcolor="#FFFFFF"><radel>
      <input type="text" size="50" value="<?php echo $data['nama_rad'];?>" name="nama_rad<?php echo $i;?>" />
    </radel></td>
	<td align="left" bgcolor="#FFFFFF"><input type="text" size="6" value="<?php echo $data['harga_rad'];?>" name="harga_rad<?php echo $i;?>" /></td>
	<td align="left" bgcolor="#FFFFFF"><input type="text" size="6" value="<?php echo $data['discount'];?>" name="discount<?php echo $i;?>" /></td>
	<td align="left" bgcolor="#FFFFFF"><input type="text" size="10" value="<?php echo $data['keterangan'];?>" name="keterangan<?php echo $i;?>" />
	  <span class="style1">
	  <?php $i++;?>
	  </span></td>
  </tr>
    <?php
}
?>
    <tr bgcolor="#FFFFFF">
      	<td width="2%" height="28" bgcolor="#FFFFFF"><input type="hidden" name="n" value="<?php echo $i; ?>" /></td>
      	<td colspan="5" bgcolor="#FFFFFF">
        <button type="submit" name="Hapus" class="btn btn-primary" onClick="form1.action='raddb_edit_sim.php'; return true;">Update</button>
        <button type="submit" name="Hapus" class="btn btn-primary">Hapus</button>
    </tr>
</table>
</form>
</body>
</html>