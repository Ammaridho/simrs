<?php 
include "../../config/config.php";
include "../librari/inc.koneksidb.php";
include "header.php";
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal = $_REQUEST['tanggal'];
$kd_adl = $_REQUEST['kd_adl'];
$sql = "SELECT * FROM adl WHERE kd_adl='$kd_adl' AND kd_kunjungan='$kd_kunjungan'";
$qry = mysqli_query($sql);
$data = mysql_fetch_array($qry); 
?>
<html>
<head>
<script type="text/javascript" src="<?php echo $url;?>media/ckeditor/ckeditor.js"></script>
<script src="<?php echo $url;?>media/ckeditor/_samples/sample.js" type="text/javascript"></script>
<link href="<?php echo $url;?>media/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $url;?>media/kalendar/js/jscal2.js"></script>
    <script src="<?php echo $url;?>media/kalendar/js/lang/en.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>media/kalendar/css/steel/steel.css" />
<script type="text/javascript">
 function count()
  {
   document.form1.counter.value = document.form1.adl.value.length;
  }
//Create an array
  var allPageTags = new Array();

  function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
    var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
    for (var i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
      if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
        allPageTags[i].style.display='none';
      }
    }
  }

function Show(ids) {
  doSomethingWithClasses('RBtnTab');

  var obj = document.getElementById(ids);
  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'none'; }
}
</script>
<title>Rencana ADL</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
.style1 {font-size: 16px}

div.RBtnTab { display:none}
-->
</style>
</head>
<body id=tab3>
  <table align="center" width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td colspan="6" bgcolor="#D9E8F3">Rencana ADL</td>
    </tr>
<form name="form1" method="post" action="adl_edit_sim.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>">
<input name="kd_adl" type="hidden" value="<?php echo $data['kd_adl'];?>"/>
<input name="kd_kunjungan" type="hidden" value="<?php echo $data['kd_kunjungan'];?>"/>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Tanggal</td>
      <td><input name="tanggal" type="text" id="tanggal" size="10" value="<?php echo $data['tanggal'];?>">
	<image id="f_btn1" src="../data/calendar.jpg" width="16" height="15" border="0"></image>
		<script type="text/javascript">//<![CDATA[

      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() },
          showTime: false
      });
      cal.manageFields("f_btn1", "tanggal", "%Y-%m-%d");
     //]]></script> * Format : Thn-Bln-Tgl (Contoh : 2012-12-12)</td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Jam</td>
      <td><input name="jam" type="text" id="jam" size="10" value="<?php echo $data['jam'];?>"> * Format : Jam:Menit (Contoh : 10:10)</td>
    </tr>
    <tr onMouseOver="this.bgColor='lightyellow'" onMouseOut="this.bgColor='#ffffff'" bgcolor="#ffffff">
      <td>Isi</td>
      <td><textarea cols="80" rows="6" maxlength="160" name="adl" onKeyUp="count()" value="<?php echo $data['adl'];?>">
<?php echo $data['adl'];?></textarea>
<script type="text/javascript">
		//<![CDATA[

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.replace( 'adl',
				{
					skin : 'office2003',
					extraPlugins : 'uicolor',
					uiColor: '#DC0C4B',
					toolbar :
					[
						[ 'SelectAll','Copy','Cut','Paste','-','Bold', 'Italic','Underline','Strike','Superscript','Subscript','TextColor','BGColor','Smiley','-', 'NumberedList', 'BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Indent','Outdent','-','Undo','Redo' ]

					]
				} );

		//]]>
		</script></td>
    </tr>
<tr> 
    <td colspan="6" bgcolor="#CCCCCC">
    <input type='submit' name='Update' value='Update' onClick="this.form.target='_self';return true;">
    <input type='submit' name='Selesai' value='Selesai' onClick="form1.action='adl_selesai.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;"> 
    <input type='submit' name='Hapus' value='Hapus' onClick="form1.action='adl_hapus.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>'; return true;"> 
    </td>
  </tr>
   </form>
</table>
</body>
</html>

