<?php
// include('gateway.php');
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])) {
header('location:/login.php?redirect=upload.php'); }
else { $usr = $_SESSION['username']; }
require_once("include/connection.php");
include('include/upload_file.php');
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Vaxza Homepage">
    <meta name="keywords" content="ACPB, Pascaline, Mad Father, Misfortune Melody, Software, Technology">
    <meta name="author" content="Dani Pragustia">
	
	<title>Mikofile.tk - Free File Hosting</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
	<script>
	$(function(){
		$("#frmUpload").validator({
			onSubmit: function(form){
				$("#frmUpload").fadeOut();
				$("#pre-upload").fadeIn("3000");
			}
		});
	});
</script>
</head>
<body>
<?php
	include('include/header.php');
?>
<br>
<br>
<div class="container page-content">
	<h1>Upload File<h1>
	<form id="frmUpload" method="post" enctype="multipart/form-data" action="">
	<div class="margin20 no-margin-left no-margin-right sub-header text-light">
		Upload your file here, Your can upload documents, programs, video, and many more with full speed.
		<div class="input-control file full-size" data-role="input">
			<input type="file" name="data_upload">
			<button class="button"><span class="mif-folder"></span></button>
		</div>
		Password :
		<div class="input-control password full-size" data-role="input">
                <input type="password" name="keydownload" id="keydownload">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
        </div>
		<font color="grey">(*) Fill blank to unset password</font>
		</div>
		<input type="submit" name="btnUpload" class="success button" value="Upload"/>
	</form>
	<div id="pre-upload" style="display:none;" class="margin20 no-margin-left no-margin-right sub-header text-light">
	<center>
	<div id="preload-download" data-role="preloader" data-type="ring" data-style="dark"></div>
		<h2 class="text-light">Uploading file...</h2>
		<font color="grey">This will take some time depends size uploading...</font><br>
		<div class="progress" data-value="0" data-color="bg-green" data-role="progress"></div>
	</center>
	</div>
</div>
</body>
</html>
