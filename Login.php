<?php
include_once "tampil/librari/inc.koneksidb.php";

$sql = "SELECT * FROM data_klinik";
$qry = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($qry); 
?>
<!doctype html>
<html lang="en"> 
<head>
	<link rel="shortcut icon" href="media/image/icon.gif" type="image/x-icon">
	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $data['nama_klinik'];?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="media/login_template/css/base.css">
	<link rel="stylesheet" href="media/login_template/css/skeleton.css">
	<link rel="stylesheet" href="media/login_template/css/layout.css">
	
</head>
<body>
	<!-- Primary Page Layout -->
	<div class="container">
		<div class="form-bg">
			<form action="LoginPeriksa.php" method="post" name="form1" target="_self">
				<h2>Login</h2>
				<p><input type="text" name="TxtUser" placeholder="Username"></p>
				<p><input type="password" name="TxtPasswd" placeholder="Password"></p>
				<label for="remember">
				  <input type="checkbox" id="remember" value="remember" />
				  <span>Remember me on this computer</span>
				</label>
				<button type="submit"></button>
			<form>
		</div>
	</div><!-- container -->
	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="media/login_template/js/app.js"></script>
<!-- End Document -->
</body>
</html>