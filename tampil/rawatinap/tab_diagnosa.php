<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "data_pasien.php";
$prn = $_GET['prn'];
$kd_kunjungan = $_GET['kd_kunjungan'];
// query untuk mencari file berdasarkan kategori
$query = "SELECT * FROM reg WHERE kd_kunjungan='$kd_kunjungan'";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
?>
<html>
<head>
<title>RENCANA KEPERAWATAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="dddropdownpanel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/css/tab.css" />
<style type="text/css">

/*Credits: Dynamic Drive CSS Library */
/*URL: http://www.dynamicdrive.com/style/ */
    
.animatedtabs{
border-bottom: 1px solid gray;
overflow: hidden;
width: 100%;
font-size: 14px; /*font of menu text*/
}


.animatedtabs ul{
list-style-type: none;
margin: 0;
margin-left: 10px; /*offset of first tab relative to page left edge*/
padding: 0;
}

.animatedtabs li{
float: left;
margin: 0;
padding: 0;
}

.animatedtabs a{
float: left;
position: relative;
top: 5px; /* 1) Number of pixels to protrude up for selected tab. Should equal (3) MINUS (2) below */
background: url(tab-blue-left.gif) no-repeat left top;
margin: 0;
margin-right: 3px; /*Spacing between each tab*/
padding: 0 0 0 9px;
text-decoration: none;

}

.animatedtabs a span{
float: left;
position: relative;
display: block;
background: url(tab-blue-right.gif) no-repeat right top;
padding: 5px 14px 3px 5px; /* 2) Padding within each tab. The 3rd value, or 3px, should equal (1) MINUS (3) */
font-weight: bold;
color: black;
}

/* Commented Backslash Hack hides rule from IE5-Mac \*/
.animatedtabs a span {float:none;}
/* End IE5-Mac hack */


.animatedtabs .selected a{
background-position: 0 -125px;
top: 0;
}

.animatedtabs .selected a span{
background-position: 100% -125px;
color: black;
padding-bottom: 8px; /* 3) Bottom padding of selected tab. Should equal (1) PLUS (2) above */
top: 0;
}

.animatedtabs a:hover{
background-position: 0% -125px;
top: 0;
}

.animatedtabs a:hover span{
background-position: 100% -125px;
padding-bottom: 8px; /* 3) Bottom padding of selected tab. Should equal (1) PLUS (2) above */
top: 0;
}

</style>
<script type="text/javascript" src="dddropdownpanel.js">

/***********************************************
* DD Drop Down Panel- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<style type="text/css">
<!--
a:link {
	color: #FF0000;
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
.style1 {font-size: 12px}
-->
</style>
</head>
<body>
<table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<ul id="tabnav">
<li class="tab1"><a href="asesmen_dewasa.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Pengkajian keperawatan"><span>Pengkajian</span></a></li>
<li class="tab2"><a href="diagnosascr.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Diagnosa keperawatan"><span>Diagnosa</span></a></li>
<li class="tab3"><a href="renpraview.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Rencana Keperawatan"><span>Perencanaan</span></a></li>
<li class="tab4"><a href="adl.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Tindakan keperawatan"><span>Implementasi</span></a></li>
<li class="tab5"><a href="class_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Evaluasi"><span>Evaluasi</span></a></li>
<li class="tab6"><a href="handover_form.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" title="Timbang terima shift"><span>Catatan Perawat</span></a></li>	
</ul>
</table>
<div id="mypanel" class="ddpanel">
<div id="mypanelcontent" class="ddpanelcontent">
</br><?php echo include "data_pasien.php";?>
</div>
<div id="mypaneltab" class="ddpaneltab">
<a href="#"><span></span></a>
</div>
</body>
</html>

