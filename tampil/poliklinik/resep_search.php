<?php
include "../librari/inc.koneksidb.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
if ($kd_kunjungan !="") {
   $sql = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
   $qry = mysqli_query($koneksi,$sql)
      or die ("SQL Error".mysqli_connect_error());
   $data=mysqli_fetch_array($qry);
}
?>
<html>
<head>
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","resep_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>&q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body id="tab2">
<form name="form1" method="post" action="resep.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" target="_self">
  <input type="text" name="q" placeholder="Cari nama obat">
  <input type="submit" name="Submit" value="Cari...">
</form>
<body>
</html> 