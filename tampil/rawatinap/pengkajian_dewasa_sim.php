<title>PENGKAJIAN AWAL DEWASA</title><?php 
include "../librari/inc.koneksidb.php";
include "../../config/config.php";
# Baca variabel Form (If Register Global ON)
$kd_kunjungan = $_REQUEST['kd_kunjungan'];
$tanggal= $_REQUEST['tanggal'];
$jam	= $_REQUEST['jam'];
$shift	= $_REQUEST['shift'];
$nik	= $_REQUEST['nik'];
$jenis	= $_REQUEST['jenis'];
$pengantar	= $_REQUEST['pengantar'];
$kaji_awal01	=	$_REQUEST['kaji_awal01'];
$kaji_awal02	=	$_REQUEST['kaji_awal02'];
$kaji_awal03	=	$_REQUEST['kaji_awal03'];
$kaji_awal04	=	$_REQUEST['kaji_awal04'];
$kaji_awal05	=	$_REQUEST['kaji_awal05'];
$kaji_awal06	=	$_REQUEST['kaji_awal06'];
$kaji_awal07	=	$_REQUEST['kaji_awal07'];
$kaji_awal08	=	$_REQUEST['kaji_awal08'];
$kaji_awal09	=	$_REQUEST['kaji_awal09'];
$kaji_awal10	=	$_REQUEST['kaji_awal10'];
$kaji_awal11	=	$_REQUEST['kaji_awal11'];
$kaji_awal12	=	$_REQUEST['kaji_awal12'];
$kaji_awal13	=	$_REQUEST['kaji_awal13'];
$kaji_awal14	=	$_REQUEST['kaji_awal14'];
$kaji_awal15	=	$_REQUEST['kaji_awal15'];
$kaji_awal16	=	$_REQUEST['kaji_awal16'];
$kaji_awal17	=	$_REQUEST['kaji_awal17'];
$kaji_awal18	=	$_REQUEST['kaji_awal18'];
$kaji_awal19	=	$_REQUEST['kaji_awal19'];
$kaji_awal20	=	$_REQUEST['kaji_awal20'];
$kaji_awal21	=	$_REQUEST['kaji_awal21'];
$kaji_awal22	=	$_REQUEST['kaji_awal22'];
$kaji_awal23	=	$_REQUEST['kaji_awal23'];
$kaji_awal24	=	$_REQUEST['kaji_awal24'];
$kaji_awal25	=	$_REQUEST['kaji_awal25'];
$kaji_awal26	=	$_REQUEST['kaji_awal26'];
$kaji_awal27	=	$_REQUEST['kaji_awal27'];
$kaji_awal28	=	$_REQUEST['kaji_awal28'];
$kaji_awal29	=	$_REQUEST['kaji_awal29'];
$kaji_awal30	=	$_REQUEST['kaji_awal30'];
$kaji_awal31	=	$_REQUEST['kaji_awal31'];
$kaji_awal32	=	$_REQUEST['kaji_awal32'];
$kaji_awal33	=	$_REQUEST['kaji_awal33'];
$kaji_awal34	=	$_REQUEST['kaji_awal34'];
$kaji_awal35	=	$_REQUEST['kaji_awal35'];
$kaji_awal36	=	$_REQUEST['kaji_awal36'];
$kaji_awal37	=	$_REQUEST['kaji_awal37'];
$kaji_awal38	=	$_REQUEST['kaji_awal38'];
$kaji_awal39	=	$_REQUEST['kaji_awal39'];
$kaji_awal40	=	$_REQUEST['kaji_awal40'];
$kaji_awal41	=	$_REQUEST['kaji_awal41'];
$kaji_awal42	=	$_REQUEST['kaji_awal42'];
$kaji_awal43	=	$_REQUEST['kaji_awal43'];
$kaji_awal44	=	$_REQUEST['kaji_awal44'];
$kaji_awal45	=	$_REQUEST['kaji_awal45'];
$kaji_awal46	=	$_REQUEST['kaji_awal46'];
$kaji_awal47	=	$_REQUEST['kaji_awal47'];
$kaji_awal48	=	$_REQUEST['kaji_awal48'];
$kaji_awal49	=	$_REQUEST['kaji_awal49'];
$kaji_awal50	=	$_REQUEST['kaji_awal50'];
$kaji_awal51	=	$_REQUEST['kaji_awal51'];
$kaji_awal52	=	$_REQUEST['kaji_awal52'];
$kaji_awal53	=	$_REQUEST['kaji_awal53'];
$kaji_awal54	=	$_REQUEST['kaji_awal54'];
$kaji_awal55	=	$_REQUEST['kaji_awal55'];
$kaji_awal56	=	$_REQUEST['kaji_awal56'];
$kaji_awal57	=	$_REQUEST['kaji_awal57'];
$kaji_awal58	=	$_REQUEST['kaji_awal58'];
$kaji_awal59	=	$_REQUEST['kaji_awal59'];
$kaji_awal60	=	$_REQUEST['kaji_awal60'];
$kaji_awal61	=	$_REQUEST['kaji_awal61'];
$kaji_awal62	=	$_REQUEST['kaji_awal62'];
$kaji_awal63	=	$_REQUEST['kaji_awal63'];
$kaji_awal64	=	$_REQUEST['kaji_awal64'];
$kaji_awal65	=	$_REQUEST['kaji_awal65'];
$kaji_awal66	=	$_REQUEST['kaji_awal66'];
$kaji_awal67	=	$_REQUEST['kaji_awal67'];
$kaji_awal68	=	$_REQUEST['kaji_awal68'];
$kaji_awal69	=	$_REQUEST['kaji_awal69'];
$kaji_awal70	=	$_REQUEST['kaji_awal70'];
$kaji_awal71	=	$_REQUEST['kaji_awal71'];
$kaji_awal72	=	$_REQUEST['kaji_awal72'];
$kaji_awal73	=	$_REQUEST['kaji_awal73'];
$kaji_awal74	=	$_REQUEST['kaji_awal74'];
$kaji_awal75	=	$_REQUEST['kaji_awal75'];
$kaji_awal76	=	$_REQUEST['kaji_awal76'];
$kaji_awal77	=	$_REQUEST['kaji_awal77'];
$kaji_awal78	=	$_REQUEST['kaji_awal78'];
$kaji_awal79	=	$_REQUEST['kaji_awal79'];
$kaji_awal80	=	$_REQUEST['kaji_awal80'];
$kaji_awal81	=	$_REQUEST['kaji_awal81'];
$kaji_awal82	=	$_REQUEST['kaji_awal82'];
$kaji_awal83	=	$_REQUEST['kaji_awal83'];
$kaji_awal84	=	$_REQUEST['kaji_awal84'];
$kaji_awal85	=	$_REQUEST['kaji_awal85'];
$kaji_awal86	=	$_REQUEST['kaji_awal86'];
$kaji_awal87	=	$_REQUEST['kaji_awal87'];
$kaji_awal88	=	$_REQUEST['kaji_awal88'];
$kaji_awal89	=	$_REQUEST['kaji_awal89'];
$kaji_awal90	=	$_REQUEST['kaji_awal90'];
$kaji_awal91	=	$_REQUEST['kaji_awal91'];
$kaji_awal92	=	$_REQUEST['kaji_awal92'];
$kaji_awal93	=	$_REQUEST['kaji_awal93'];
$kaji_awal94	=	$_REQUEST['kaji_awal94'];
$kaji_awal95	=	$_REQUEST['kaji_awal95'];
$kaji_awal96	=	$_REQUEST['kaji_awal96'];
$kaji_awal97	=	$_REQUEST['kaji_awal97'];
$kaji_awal98	=	$_REQUEST['kaji_awal98'];
$kaji_awal99	=	$_REQUEST['kaji_awal99'];
$kaji_awal100	=	$_REQUEST['kaji_awal100'];
$kaji_awal101	=	$_REQUEST['kaji_awal101'];
$kaji_awal102	=	$_REQUEST['kaji_awal102'];
$kaji_awal103	=	$_REQUEST['kaji_awal103'];
$kaji_awal104	=	$_REQUEST['kaji_awal104'];
$kaji_awal105	=	$_REQUEST['kaji_awal105'];
$kaji_awal106	=	$_REQUEST['kaji_awal106'];
$kaji_awal107	=	$_REQUEST['kaji_awal107'];
$kaji_awal108	=	$_REQUEST['kaji_awal108'];
$kaji_awal109	=	$_REQUEST['kaji_awal109'];
$kaji_awal110	=	$_REQUEST['kaji_awal110'];
$kaji_awal111	=	$_REQUEST['kaji_awal111'];
$kaji_awal112	=	$_REQUEST['kaji_awal112'];
$kaji_awal113	=	$_REQUEST['kaji_awal113'];
$kaji_awal114	=	$_REQUEST['kaji_awal114'];
$kaji_awal115	=	$_REQUEST['kaji_awal115'];
$kaji_awal116	=	$_REQUEST['kaji_awal116'];
$kaji_awal117	=	$_REQUEST['kaji_awal117'];
$kaji_awal118	=	$_REQUEST['kaji_awal118'];
$kaji_awal119	=	$_REQUEST['kaji_awal119'];
$kaji_awal120	=	$_REQUEST['kaji_awal120'];
$kaji_awal121	=	$_REQUEST['kaji_awal121'];
$kaji_awal122	=	$_REQUEST['kaji_awal122'];
$kaji_awal123	=	$_REQUEST['kaji_awal123'];
$kaji_awal124	=	$_REQUEST['kaji_awal124'];
$kaji_awal125	=	$_REQUEST['kaji_awal125'];
$kaji_awal126	=	$_REQUEST['kaji_awal126'];
$kaji_awal127	=	$_REQUEST['kaji_awal127'];
$kaji_awal128	=	$_REQUEST['kaji_awal128'];
$kaji_awal129	=	$_REQUEST['kaji_awal129'];
$kaji_awal130	=	$_REQUEST['kaji_awal130'];
$kaji_awal131	=	$_REQUEST['kaji_awal131'];
$kaji_awal132	=	$_REQUEST['kaji_awal132'];
$kaji_awal133	=	$_REQUEST['kaji_awal133'];
$kaji_awal134	=	$_REQUEST['kaji_awal134'];
$kaji_awal135	=	$_REQUEST['kaji_awal135'];
$kaji_awal136	=	$_REQUEST['kaji_awal136'];
$kaji_awal137	=	$_REQUEST['kaji_awal137'];
$kaji_awal138	=	$_REQUEST['kaji_awal138'];
$kaji_awal139	=	$_REQUEST['kaji_awal139'];
$kaji_awal140	=	$_REQUEST['kaji_awal140'];
$kaji_awal140	=	$_REQUEST['kaji_awal140'];
$kaji_awal141	=	$_REQUEST['kaji_awal141'];
$kaji_awal141a	=	$_REQUEST['kaji_awal141a'];
$kaji_awal142	=	$_REQUEST['kaji_awal142'];
$kaji_awal143	=	$_REQUEST['kaji_awal143'];
$kaji_awal144	=	$_REQUEST['kaji_awal144'];
$kaji_awal145	=	$_REQUEST['kaji_awal145'];
$kaji_awal146	=	$_REQUEST['kaji_awal146'];
$kaji_awal147	=	$_REQUEST['kaji_awal147'];
$kaji_awal148	=	$_REQUEST['kaji_awal148'];
$kaji_awal149	=	$_REQUEST['kaji_awal149'];
$kaji_awal150	=	$_REQUEST['kaji_awal150'];
$kaji_awal151	=	$_REQUEST['kaji_awal151'];
$kaji_awal152	=	$_REQUEST['kaji_awal152'];
$kaji_awal153	=	$_REQUEST['kaji_awal153'];
$kaji_awal154	=	$_REQUEST['kaji_awal154'];
$kaji_awal155	=	$_REQUEST['kaji_awal155'];
$status			=	$_REQUEST['status'];
 
$sql  = " INSERT INTO pengkajian_awal (kd_kunjungan,
tanggal,
jam,
shift,
nik,
jenis,
pengantar,
kaji_awal01,
kaji_awal02,
kaji_awal03,
kaji_awal04,
kaji_awal05,
kaji_awal06,
kaji_awal07,
kaji_awal08,
kaji_awal09,
kaji_awal10,
kaji_awal11,
kaji_awal12,
kaji_awal13,
kaji_awal14,
kaji_awal15,
kaji_awal16,
kaji_awal17,
kaji_awal18,
kaji_awal19,
kaji_awal20,
kaji_awal21,
kaji_awal22,
kaji_awal23,
kaji_awal24,
kaji_awal25,
kaji_awal26,
kaji_awal27,
kaji_awal28,
kaji_awal29,
kaji_awal30,
kaji_awal31,
kaji_awal32,
kaji_awal33,
kaji_awal34,
kaji_awal35,
kaji_awal36,
kaji_awal37,
kaji_awal38,
kaji_awal39,
kaji_awal40,
kaji_awal41,
kaji_awal42,
kaji_awal43,
kaji_awal44,
kaji_awal45,
kaji_awal46,
kaji_awal47,
kaji_awal48,
kaji_awal49,
kaji_awal50,
kaji_awal51,
kaji_awal52,
kaji_awal53,
kaji_awal54,
kaji_awal55,
kaji_awal56,
kaji_awal57,
kaji_awal58,
kaji_awal59,
kaji_awal60,
kaji_awal61,
kaji_awal62,
kaji_awal63,
kaji_awal64,
kaji_awal65,
kaji_awal66,
kaji_awal67,
kaji_awal68,
kaji_awal69,
kaji_awal70,
kaji_awal71,
kaji_awal72,
kaji_awal73,
kaji_awal74,
kaji_awal75,
kaji_awal76,
kaji_awal77,
kaji_awal78,
kaji_awal79,
kaji_awal80,
kaji_awal81,
kaji_awal82,
kaji_awal83,
kaji_awal84,
kaji_awal85,
kaji_awal86,
kaji_awal87,
kaji_awal88,
kaji_awal89,
kaji_awal90,
kaji_awal91,
kaji_awal92,
kaji_awal93,
kaji_awal94,
kaji_awal95,
kaji_awal96,
kaji_awal97,
kaji_awal98,
kaji_awal99,
kaji_awal100,
kaji_awal101,
kaji_awal102,
kaji_awal103,
kaji_awal104,
kaji_awal105,
kaji_awal106,
kaji_awal107,
kaji_awal108,
kaji_awal109,
kaji_awal110,
kaji_awal111,
kaji_awal112,
kaji_awal113,
kaji_awal114,
kaji_awal115,
kaji_awal116,
kaji_awal117,
kaji_awal118,
kaji_awal119,
kaji_awal120,
kaji_awal121,
kaji_awal122,
kaji_awal123,
kaji_awal124,
kaji_awal125,
kaji_awal126,
kaji_awal127,
kaji_awal128,
kaji_awal129,
kaji_awal130,
kaji_awal131,
kaji_awal132,
kaji_awal133,
kaji_awal134,
kaji_awal135,
kaji_awal136,
kaji_awal137,
kaji_awal138,
kaji_awal139,
kaji_awal140,
kaji_awal141,
kaji_awal141a,
kaji_awal142,
kaji_awal143,
kaji_awal144,
kaji_awal145,
kaji_awal146,
kaji_awal147,
kaji_awal148,
kaji_awal149,
kaji_awal150,
kaji_awal151,
kaji_awal152,
kaji_awal153,
kaji_awal154,
kaji_awal155,	
status
)";
	$sql .=	" VALUES ('$kd_kunjungan','$tanggal','$jam','$shift','$nik','Pengkajian awal dewasa dan lansia','$pengantar',
'$kaji_awal01',
'$kaji_awal02',
'$kaji_awal03',
'$kaji_awal04',
'$kaji_awal05',
'$kaji_awal06',
'$kaji_awal07',
'$kaji_awal08',
'$kaji_awal09',
'$kaji_awal10',
'$kaji_awal11',
'$kaji_awal12',
'$kaji_awal13',
'$kaji_awal14',
'$kaji_awal15',
'$kaji_awal16',
'$kaji_awal17',
'$kaji_awal18',
'$kaji_awal19',
'$kaji_awal20',
'$kaji_awal21',
'$kaji_awal22',
'$kaji_awal23',
'$kaji_awal24',
'$kaji_awal25',
'$kaji_awal26',
'$kaji_awal27',
'$kaji_awal28',
'$kaji_awal29',
'$kaji_awal30',
'$kaji_awal31',
'$kaji_awal32',
'$kaji_awal33',
'$kaji_awal34',
'$kaji_awal35',
'$kaji_awal36',
'$kaji_awal37',
'$kaji_awal38',
'$kaji_awal39',
'$kaji_awal40',
'$kaji_awal41',
'$kaji_awal42',
'$kaji_awal43',
'$kaji_awal44',
'$kaji_awal45',
'$kaji_awal46',
'$kaji_awal47',
'$kaji_awal48',
'$kaji_awal49',
'$kaji_awal50',
'$kaji_awal51',
'$kaji_awal52',
'$kaji_awal53',
'$kaji_awal54',
'$kaji_awal55',
'$kaji_awal56',
'$kaji_awal57',
'$kaji_awal58',
'$kaji_awal59',
'$kaji_awal60',
'$kaji_awal61',
'$kaji_awal62',
'$kaji_awal63',
'$kaji_awal64',
'$kaji_awal65',
'$kaji_awal66',
'$kaji_awal67',
'$kaji_awal68',
'$kaji_awal69',
'$kaji_awal70',
'$kaji_awal71',
'$kaji_awal72',
'$kaji_awal73',
'$kaji_awal74',
'$kaji_awal75',
'$kaji_awal76',
'$kaji_awal77',
'$kaji_awal78',
'$kaji_awal79',
'$kaji_awal80',
'$kaji_awal81',
'$kaji_awal82',
'$kaji_awal83',
'$kaji_awal84',
'$kaji_awal85',
'$kaji_awal86',
'$kaji_awal87',
'$kaji_awal88',
'$kaji_awal89',
'$kaji_awal90',
'$kaji_awal91',
'$kaji_awal92',
'$kaji_awal93',
'$kaji_awal94',
'$kaji_awal95',
'$kaji_awal96',
'$kaji_awal97',
'$kaji_awal98',
'$kaji_awal99',
'$kaji_awal100',
'$kaji_awal101',
'$kaji_awal102',
'$kaji_awal103',
'$kaji_awal104',
'$kaji_awal105',
'$kaji_awal106',
'$kaji_awal107',
'$kaji_awal108',
'$kaji_awal109',
'$kaji_awal110',
'$kaji_awal111',
'$kaji_awal112',
'$kaji_awal113',
'$kaji_awal114',
'$kaji_awal115',
'$kaji_awal116',
'$kaji_awal117',
'$kaji_awal118',
'$kaji_awal119',
'$kaji_awal120',
'$kaji_awal121',
'$kaji_awal122',
'$kaji_awal123',
'$kaji_awal124',
'$kaji_awal125',
'$kaji_awal126',
'$kaji_awal127',
'$kaji_awal128',
'$kaji_awal129',
'$kaji_awal130',
'$kaji_awal131',
'$kaji_awal132',
'$kaji_awal133',
'$kaji_awal134',
'$kaji_awal135',
'$kaji_awal136',
'$kaji_awal137',
'$kaji_awal138',
'$kaji_awal139',
'$kaji_awal140',
'$kaji_awal141',
'$kaji_awal141a',
'$kaji_awal142',
'$kaji_awal143',
'$kaji_awal144',
'$kaji_awal145',
'$kaji_awal146',
'$kaji_awal147',
'$kaji_awal148',
'$kaji_awal149',
'$kaji_awal150',
'$kaji_awal151',
'$kaji_awal152',
'$kaji_awal153',
'$kaji_awal154',
'$kaji_awal155',
'Inprogress')";
	mysqli_query($koneksi, $sql) 
		  or die ("Maaf! Data pengkajian tidak tersimpan!");
		  
echo "<script>
opener.location.reload(true);".
"self.close()".
"</script>";
exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
	$kd_kunjungan =$_REQUEST['kd_kunjungan'];
	$sql2 = "SELECT * FROM pasien_rawat";
	$qry2 = mysqli_query($sql2, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry2)) {
	$no++;
  ?>
<meta http-equiv="refresh" content="1;url=pengkajian_dewasa_edit.php?kd_kunjungan=<?php echo $data['kd_kunjungan'];?>" />
<?php
}
?>
<title>Terima kasih !</title>
</head>
<body>
<h3 align="center">Sedang menyimpan...</h3>
<h3 align="center"><img src="<?php echo $url;?>media/image/facebook.gif"/></h3>
</div>
</body>
</html>