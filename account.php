<?php
// include('gateway.php');
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
header('location:/login.php'); }
else { $usr = $_SESSION['username']; }
require_once("include/connection.php");
include('include/account_process.php');
$query = mysql_query("SELECT * FROM user WHERE username = '$usr'");
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
	
	<title>Account Setting - Mikofile.tk</title>
	
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <link href="css/metro-schemes.css" rel="stylesheet">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
    <script src="js/docs.js"></script>
	
	<script> 
	$(document).ready(function(){
	$(".panel").hide();
	$("#chgpwd").click(function(){
	$(".panel").fadeToggle(500);
	});
	});
</script>
</head>
<body>
<?php
	include('include/header.php');
?>
<div class="container page-content">
	<br>
	<h1 class="text-light">Account Settings</h1>
	<hr class="thin bg-grayLighter">
	<br><br>
	<table class="table" id="user_info" width="auto" cellpadding="1" cellspacing="0">
		<tr>
			<td>Username :</td>
			<td>
			<div class="input-control text full-size" style="width:50%">
				<input type="text" value="<?php echo "$usr"; ?>" disabled>
			</div>
			</td>
			</tr>
			<tr>
			<td>Change Password :</td>
			<td>
			<button id="chgpwd" name="chgpwd" class="button warning">Change Password</button>
			<div class="panel">
			<br>
			<form method="post" enctype="multipart/form-data" action="">
			Old Password :<br>
			<div class="input-control text full-size" style="width:50%">
				<input type="password" name="old_password" autocomplete="off">
			</div>
			
			New Password :<br>
			<div class="input-control text full-size" style="width:50%">
				<input type="password" name="new_password">
			</div>
			<font color="grey">* Your only can change password once 24 hours</font>
			<br><br>
			<input type="submit" name="btnPassword" class="success button" value="Change"/>
			</form>
			</div>
			</td>
			<tr>
			<td>Status Account :</td>
			<td>
			<?php
				if ($hasil['status']==0) {
					echo '<b>Not Activated </b><a href="activate.php"><button class="button warning">Activate Now!</button></a>';
				}
				if ($hasil['status']==1) {
					echo "<b>Activate</b>";
				}
				if ($hasil['status']==2) {
					echo "<b>Banned</b>";
				}
				if ($hasil['status']==3) {
					echo "<b>Admin</b>";
				}
			?>
			</td>
			</tr>
	</table>
	<br><br>
		<table class="table" id="user_info" width="auto" cellpadding="1" cellspacing="0">
		<tr>
			<td>Avatar :</td>
			<td>
			<form method="post" enctype="multipart/form-data" action="">
			<div class="input-control file full-size" data-role="input">
				<input type="file" name="data_upload">
				<button class="button"><span class="mif-folder"></span></button>
			</div>
			<font color="grey">(*) Image must be square with size 256x256 pixel, if image more bigger it will resize.</font><br><br>
			<input type="submit" name="btnUpload" class="success button" value="Upload"/>
			</form>
			</td>
			</tr>
			<tr>
			<td>Bio :</td>
			<td>
			<form method="post" enctype="multipart/form-data" action="">
			<div class="input-control textarea full-size" data-text-auto-resize="true" data-text-max-height="1200">
				<textarea type="text" name="bio_text"></textarea>
			</div>
			<input type="submit" name="btnBio" class="success button" value="Save"/>
			</form>
			</td>
			</tr>
	</table>
</div>
</body>
<footer>
<?php
	include('include/footer.php');
?>