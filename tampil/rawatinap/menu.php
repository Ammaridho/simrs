<html>
<head>
<style type="text/css">

.wireframemenu{
border: 0px ;
background-color: transparent;
border-bottom-width: 0;
width: 100px;
position: absolute;
}

* html .wireframemenu{ /*IE only rule. Original menu width minus all left/right paddings */
width: 164px;
}

.wireframemenu ul{
padding: 0;
margin: 0;
list-style-type: none;
}

.wireframemenu a{
font: bold 13px Verdana;
padding: 4px 3px;
display: block;
width: 100%; /*Define width for IE6's sake*/
color: #595959;
text-decoration: none;
border-bottom: 0px ;
}

.wireframemenu a:visited{
color: #595959;
}

html>body .wireframemenu a{ /*Non IE rule*/
width: auto;
}

.wireframemenu a:hover{
background-color: #F8FBBD;
color: black;
}

</style>

<script type="text/javascript">

/***********************************************
* Static Menu script- by JavaScript Kit (www.javascriptkit.com)
* This notice must stay intact for usage
* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more
***********************************************/

//ids of menus to keep static on page (must be absolutely positioned, with left/top attribute added inline inside tag)
//Separate multiple ids with a comma (ie: ["menu1", "menu2"]
var staticmenuids=["staticmenu"]

var staticmenuoffsetY=[]

function getmenuoffsetY(){
	for (var i=0; i<staticmenuids.length; i++){
		var currentmenu=document.getElementById(staticmenuids[i])
	 staticmenuoffsetY.push(isNaN(parseInt(currentmenu.style.top))? 0 : parseInt(currentmenu.style.top))
	}
		initstaticmenu()
}

function initstaticmenu(){
	var iebody=(document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
	var topcorner=(window.pageYOffset)? window.pageYOffset : iebody.scrollTop
	for (var i=0; i<staticmenuids.length; i++)
		document.getElementById(staticmenuids[i]).style.top=topcorner+staticmenuoffsetY[i]+"px"
	setTimeout("initstaticmenu()", 100)
}

if (window.addEventListener)
window.addEventListener("load", getmenuoffsetY, false)
else if (window.attachEvent)
window.attachEvent("onload", getmenuoffsetY)

</script>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
<body>
<div id="staticmenu" class="wireframemenu" style="right: 8px; top: 8px">
<ul>
<li><a href="javascript:parent.resizeFrame('0,10')">Hide/Show</a></li>
</ul>
</div>
</body>
</html>
